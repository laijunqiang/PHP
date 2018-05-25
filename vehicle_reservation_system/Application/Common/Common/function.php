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
function createMenu()
{
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





