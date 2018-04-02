<?php
/**
公用方法
 */
function show($status,$message,$data=array()){
    $result=array(
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    );
    exit(json_encode($result));
}
function getMd5Password($password){
/*  定义了配置文件之后，可以使用系统提供的C方法
    （如果觉得比较奇怪的话，可以借助Config单词来帮助记忆）来读取已有的配置*/
    return md5($password.C('MD5_PRE'));
}