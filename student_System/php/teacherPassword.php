<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/19
 * Time: 15:11
 */
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
//  $_POST 变量用于收集来自 method="post"的表单中的值
$name=trim($_POST["userName"]);
$oldPassword=$_POST["oldPassword"];
$newPassword=$_POST["newPassword"];
$assertPassword=$_POST['assertPassword'];
if ($oldPassword==null||$newPassword==null||$assertPassword==null)
    echo "<script>alert('输入不能为空');window.location.href='adminSetPassword.php'</script>";
if ($newPassword!=$assertPassword)
    echo "<script>alert('新密码不相同，请重新输入');window.location.href='adminSetPassword.php'</script>";
include "class.php";
$sql=new Sql();
$oldPassword=md5($oldPassword);
$newPassword=md5($newPassword);
//查询超级管理员和任课老师信息
$sql->adminLogin($name,$oldPassword);
$adminResult=$sql->result;
$sql->teacherLogin($name,$oldPassword);
$teacherResult=$sql->result;
if ($adminResult->num_rows<1 && $teacherResult->num_rows<1){
    echo "<script>alert('账号密码错误，请重新输入');window.location.href='adminSetPassword.php'</script>";
}elseif ($adminResult->num_rows!=0) {
    $sql->adminSetPassword($name,$newPassword);
    echo "<script>alert('修改成功');window.location.href='main.php'</script>";
}else{
    $sql->teacherSetPassword($name,$newPassword);
    echo "<script>alert('修改成功');window.location.href='teacherCourse.php'</script>";
}