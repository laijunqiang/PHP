<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/31
 * Time: 10:09
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
$sex=$_POST["sex"];
$age=$_POST["age"];

//  判断输入不能为空，否则不跳转
if ($id==null||$number==null||$name==null||$sex==null||$age==null){
    echo "<script>alert('输入不能为空');window.location.href='stuBianji.html'</script>";
}else{
    $admin->stuBianji($id,$number,$name,$sex,$age);
    if ($admin->result!=false){
//        echo "修改成功";
        header("location:student.php");
    }else {
        echo "修改失败";
    }
}

