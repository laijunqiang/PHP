<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        //createMenu();
        checkSignature();
        //$this->sendTemplate();
        //getCode();
    }
    //获取用户信息
    //1.通过全局Access Token获取用户基本信息
    //https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID
    //2.通过OAuth2.0方式弹出授权页面获得用户基本信息
    //https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN
    //3.通过OAuth2.0方式不弹出授权页面获得用户基本信息   scope=snsapi_base 表示应用授权作用域为 不弹出授权页面，直接跳转，只获取用户openid
    public function getUserInfo()
    {
        $appID = C('appID');
        $appsecret = C('appsecret');
        $code = $_GET["code"];

        /*//第一步:取access_token
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appID&secret=$appsecret";
        $token =getJson($url);*/
        //var_dump($token);die;
        //第二步:通过code换取网页授权access_token
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appID&secret=$appsecret&code=$code&grant_type=authorization_code";
        $oauth2 =getJson($oauth2Url);

        //第三步:根据网页授权access_token和openid查询用户信息
        $access_token = $oauth2["access_token"];
        $openid = $oauth2['openid'];
        $get_user_info_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $userinfo =getJson($get_user_info_url);

        session('openid',$userinfo['openid']);
        //查询有没有该司机
        $driver=D('Driver')->getDriver();
        foreach ($driver as $item){
            if ($item['openid']==$userinfo['openid']){
                $this->redirect('Order/index');
            }
        }
        //如果没有该司机就添加
        $date=array();
        $date['openid']=$userinfo['openid'];
        $date['image']=$userinfo['headimgurl'];
        $date['nickname']=$userinfo['nickname'];
        date_default_timezone_set("Asia/Shanghai");
        $date['create_time']=date("Y-m-d H:i:s");
        $ret=D('Driver')->addDriver($date);
        if ($ret) {
            $this->redirect('Order/index');
        }
    }
    //排队查询首页
    public function orderIndex(){
        $firstNotice=D('Notice')->getFirstNotice();
        $content=$firstNotice['content'];
        $this->assign('content',$content);
        $this->assign('type',"芳香烃");
        $name=D('Oil')->getNameByType("芳香烃");
        $this->assign('name',$name);
        $firstName=$name[0];
        $order = D('Order')->getOrderByName($firstName);
        $this->assign('order', $order);

        $fp = fopen($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt",'r');//打开文件
        if(file_exists($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt")){//当文件存在时，才读取内容
            $stop = fgetc($fp);//每执行一次fgetc()，文件指针就向后移动一位
        }else{
            echo "文件不存在！" ;
        }
        fclose($fp);
        //dump($stop);
        $this->assign('stop',$stop);

        $this->display('index');
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
        $fp = fopen($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt",'r');//打开文件
        if(file_exists($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt")){//当文件存在时，才读取内容
            $stop = fgetc($fp);//每执行一次fgetc()，文件指针就向后移动一位
        }else{
            echo "文件不存在！" ;
        }
        fclose($fp);
        dump($stop);
        $this->assign('stop',$stop);
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
        $fp = fopen($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt",'r');//打开文件
        if(file_exists($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt")){//当文件存在时，才读取内容
            $stop = fgetc($fp);//每执行一次fgetc()，文件指针就向后移动一位
        }else{
            echo "文件不存在！" ;
        }
        fclose($fp);
        dump($stop);
        $this->assign('stop',$stop);
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
        $fp = fopen($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt",'r');//打开文件
        if(file_exists($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Public/1.txt")){//当文件存在时，才读取内容
            $stop = fgetc($fp);//每执行一次fgetc()，文件指针就向后移动一位
        }else{
            echo "文件不存在！" ;
        }
        fclose($fp);
        dump($stop);
        $this->assign('stop',$stop);
        $this->display('index');
    }

}