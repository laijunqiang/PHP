<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        /*        if(!session('driverUser')) {
                    $this->redirect('Login/index');
                }else {
                    $firstNotice=D('Notice')->getFirstNotice();
                    $content=$firstNotice['content'];
                    $this->assign('content',$content);
                    $order=D('Order')->getOrdering();
                    $this->assign('order',$order);
        //            ajax跳转时，有display的控制器的视图会被覆盖
                    $this->display();
                }*/
        $this->checkSignature();
        $this->getCode();
    }

    //验证服务器URL
    public function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = "laijunqiang";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        $echostr = $_GET['echostr'];
        if ($tmpStr == $signature) {
            echo $echostr;
        } else {
            return false;
        }
    }

    //获取code
    public function getCode()
    {
        $appID = C('appID');
        //用户同意授权后回调的网址.必须使用url对回调网址进行编码，我们也将授权完跳转对网址,
        $redirect_uri = urlencode('http://yijiangbangtest.wsandos.com/laijunqiang/vehicle_reservation_system/Home/Index/getUserInfo');
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appID . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect';
        header("Location:" . $url);
    }

    //获取用户信息
    public function getUserInfo()
    {
        $appID = C('appID');
        $appsecret = C('appsecret');
        $code = $_GET["code"];
        //第一步:取access_token
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appID&secret=$appsecret";
        $token = $this->getJson($url);
        //var_dump($token);die;
        //第二步:取得openid
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appID&secret=$appsecret&code=$code&grant_type=authorization_code";
        $oauth2 = $this->getJson($oauth2Url);

        //第三步:根据全局access_token和openid查询用户信息
        $access_token = $token["access_token"];
        $openid = $oauth2['openid'];
        $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
        $userinfo = $this->getJson($get_user_info_url);

        //打印用户信息
        echo "<pre>";
        print_r($userinfo);
        echo "</pre>";
        EXIT;
        $res = D('Student')->add($userinfo);
        if (!$res) {
            echo "失败";
        } else {
            echo "成功";
        }
    }

    //创建菜单
    public function createMenu($data)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=10_SeUm2vPn-COceshdis_2dMSn2RHBTgxSsUHgGR0lt229yDN8KRqeQjGLsLXq4arlrLFIDvuXDzUtgzQSOoejjr4EXhmqJ5zyqgALTtgQRW3AUjsWxqTd7Pl_It-xf8lWGMmDwpRLSIoNN8tcUQPbAAACYX"
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=10_SeUm2vPn-COceshdis_2dMSn2RHBTgxSsUHgGR0lt229yDN8KRqeQjGLsLXq4arlrLFIDvuXDzUtgzQSOoejjr4EXhmqJ5zyqgALTtgQRW3AUjsWxqTd7Pl_It-xf8lWGMmDwpRLSIoNN8tcUQPbAAACYX");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
    }

    public function getJson($url){
        /*      resource curl_init ([ string $url = NULL ] )
                初始化新的会话，返回 cURL 句柄，供curl_setopt()、 curl_exec() 和 curl_close() 函数使用。*/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//CURLOPT_URL 指定请求的URL；
//        FALSE 禁止 cURL 验证对等证书（peer's certificate）。
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        /*        CURLOPT_SSL_VERIFYHOST的值
                设为0表示不检查证书
                设为1表示检查证书中是否有CN(common name)字段
                设为2表示在1的基础上校验当前的域名是否与CN匹配*/
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//        使用PHP curl获取页面内容或提交数据，有时候希望返回的内容作为变量储存，而不是直接输出。这个时候就必需设置curl的CURLOPT_RETURNTRANSFER选项为1或true。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);// 已经获取到内容，没有输出到页面上。
        curl_close($ch);
//      json_decode — 对 JSON 格式的字符串进行解码，当该参数为 TRUE 时，将返回 array 而非 object 。
        return json_decode($output, true);
    }

    public function responseMsg()
    {
        //1.获取到微信推送过来的POST数据（xml格式）
        $postArr = $GLOBALS["HTTP_RAW_POST_DATA"];

        $postObj=simplexml_load_string($postArr,'SimpleXMLElement', LIBXML_NOCDATA);

        if(strtolower($postObj->MsgType)=='event'){
            if(strtolower($postObj->Event=='subscribe')){
                $toUser=$postObj->FromUserName;
                $fromUser=$postObj->ToUserName;
                $time=time();
                $msgType='text';
                $content="欢迎关注".$postObj->FromUserName;
                $template="<xml>
                                <toUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
                $info=sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
                echo $info;
            }
        }
    }

    //通过油品类型查询排队信息
    public function selectType($type){
        $this->assign('type',$type);
        //dump($type);
        //获取油品名
        $name=D('Oil')->getNameByType($type);
        $this->assign('name',$name);
        $firstName=$name[0];
        //通过油品名获取排队信息
        $order = D('Order')->getOrderByName($firstName);
        $this->assign('order', $order);
        $firstNotice=D('Notice')->getFirstNotice();
        $content=$firstNotice['content'];
        $this->assign('content',$content);
        $this->display('index');
    }
    //通过油品名称查询排队信息
    public function selectName($name,$type){
        $this->assign('type',$type);
        $this->assign('oilName',$name);
        $order = D('Order')->getOrderByName($name);
        $this->assign('order', $order);
        $firstNotice=D('Notice')->getFirstNotice();
        $content=$firstNotice['content'];
        $this->assign('content',$content);
        $name=D('Oil')->getNameByType($type);
        $this->assign('name',$name);

        //通过油品名获取排队信息
        $this->display('index');
    }
    //搜索框搜索
    public function search($search){
        $this->assign('search',$search);
        $order=D('Order')->search($search);
        $this->assign('order',$order);
        $firstNotice=D('Notice')->getFirstNotice();
        $content=$firstNotice['content'];
        $this->assign('content',$content);
        $this->display('index');
    }

}