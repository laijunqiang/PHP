<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/31
 * Time: 9:09
 */
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$admin=new admin();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$number=$_POST["number"];
$name=$_POST["name"];
$sex=$_POST["sex"];
$age=$_POST["age"];

//  判断输入不能为空，否则不跳转
if ($number==null||$name==null||$sex==null||$age==null){
    echo "<script>alert('输入不能为空');window.location.href='../html/stuLuru.html'</script>";
}else{
    $admin->stuLuru($number,$name,$sex,$age);
    if ($admin->result!=false){
//        echo "录入成功";
        header("location:student.php");
    }else {
        echo "录入失败";
    }
}

