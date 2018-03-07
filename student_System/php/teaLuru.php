<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 19:41
 */
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$admin=new admin();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$number=$_POST["number"];
$password=$_POST['password'];
$name=$_POST["name"];

//  判断输入不能为空，否则不跳转
if ($number==null||$password==null||$name==null){
    echo "<script>alert('输入不能为空');window.location.href='../html/teaLuru.html'</script>";
}else{
    $password=md5($password);
    $admin->teaLuru($number,$password,$name);
    /*针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。
    $mysqli_query()返回一个对象，即使查询为空
    针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。*/
    if ($admin->result!=false){
        echo "<script>alert('录入成功');window.location.href='teacher.php'</script>";
    }else {
        echo "<script>alert('录入失败，请重新录入');window.location.href='../html/teaLuru.html'</script>";
    }
}

