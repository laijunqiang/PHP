<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/31
 * Time: 17:15
 */
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$admin=new admin();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$id=$_POST["id"];
$number=$_POST["number"];
$name=$_POST["name"];
$credit=$_POST["credit"];
$time=$_POST["time"];

//  判断输入不能为空，否则不跳转
if ($id==null||$number==null||$name==null||$credit==null||$time==null){
    echo "<script>alert('输入不能为空');window.location.href='couBianji.html'</script>";
}else{
    $admin->couBianji($id,$number,$name,$credit,$time);
    if ($admin->result!=false){
//        echo "修改成功";
        header("location:course.php");
    }else {
        echo "修改失败";
    }
}

