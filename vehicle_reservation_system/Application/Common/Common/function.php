<?php

/**
 * 公用的方法
 * 访问所有模块之前都会首先加载公共模块下面的配置文件（Conf/config.pgp）
 * 和公共函数文件（Common/function.php）
 */

function  show($status, $message,$data=array()) {
    $reuslt = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );
    //exit() 函数输出一条消息，并退出当前脚本。
    //json_encode — 对变量进行 JSON 编码
    exit(json_encode($reuslt));
}

function getMd5Password($password) {
    //C方法读取配置
    return md5($password . C('MD5_PRE'));
}

//创建菜单
function createMenu(){
    $appID = C('appID');
    $appsecret = C('appsecret');
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appID&secret=$appsecret";
    $token = $this->getJson($url);
    $ACCESS_TOKEN = $token["access_token"];
    $data = '{
         "button":[
             {  
                  "type":"view",
                  "name":"进入系统",
                  "url":"http://yijiangbangtest.wsandos.com/laijunqiang/vehicle_reservation_system/Home"
              }
              ]
         }';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$ACCESS_TOKEN}");
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
        echo 'Errno' . curl_error($ch);
    }
    curl_close($ch);
    var_dump($tmpInfo);
}

//验证服务器URL
function checkSignature(){
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
function getCode()
{
    $appID = C('appID');
    //用户同意授权后回调的网址.必须使用url对回调网址进行编码，我们也将授权完跳转对网址,
    $redirect_uri = urlencode('http://yijiangbangtest.wsandos.com/laijunqiang/vehicle_reservation_system/Home/Index/getUserInfo');
    $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appID . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect';
    header("Location:" . $url);
}

//取得微信返回的JSON数据
function getJson($url,$data=array()){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    // POST数据
    curl_setopt($ch, CURLOPT_POST, 1);
    // 把post的变量加上
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}

//发送模板消息
function sendTemplate(){
    $json_token=$this->http_request("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".C('appID')."&secret=".C('appsecret'));
    $access_token=json_decode($json_token,true);
//获得access_token
    $access_token=$access_token["access_token"];
//echo $this->access_token;exit;
//模板消息
    $template=array(
        'touser'=>'olgoZ0k5l2yjPY5R7221A2n5htDo',
        'template_id'=>"73ewhbXkBeO9yzgGm0WFQXdIvtBzKHjnkqOeWpyAJBc",
        'url'=>"",
        'data'=>array(
            'first'=>array('value'=>urlencode('您好！您的订单状态已更改'),'color'=>"#FF0000"),
            'keynote1'=>array('value'=>urlencode(date("Y-m-d H:i:s")),'color'=>'#FF0000'),
            'keynote2'=>array('value'=>urlencode('这是测试'),'color'=>'#FF0000'),
            'keynote3'=>array('value'=>urlencode('这是测试'),'color'=>'#FF0000'),
            'keynote4'=>array('value'=>urlencode('这是测试'),'color'=>'#FF0000'),
            'remark'=>array('value'=>urlencode('这是测试'),'color'=>'#FF0000'), )
    );
    $json_template=json_encode($template);
//echo $json_template;
//echo $this->access_token;
    $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
    $res=$this->http_request($url,urldecode($json_template));
    if ($res["errcode"]==0) echo '发送成功';
}




