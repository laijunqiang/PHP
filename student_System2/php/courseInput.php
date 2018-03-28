<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/31
 * Time: 17:09
 */
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$sql=new Sql();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$number=trim($_POST["number"]);
$name=trim($_POST["name"]);
$credit=$_POST["credit"];
$time=$_POST["time"];

//  判断输入不能为空，否则不跳转
if ($number==null||$name==null||$credit==null||$time==null){
    echo "<script>alert('输入不能为空，请重新输入');window.location.href='../html/courseInput.html'</script>";
}elseif(strlen($number)>20||strlen($name)>20){
    echo "<script>alert('课程号或课程名不能超过20位，请重新输入');window.location.href='../html/courseInput.html'</script>";
}else {
    $sql->courseInput($number,$name,$credit,$time);
    if ($sql->result==true){
        echo "<script>alert('录入成功');window.location.href='course.php'</script>";
    }else {
        echo "<script>alert('录入失败，请重新录入');window.location.href='../html/courseInput.html'</script>";
    }
}

