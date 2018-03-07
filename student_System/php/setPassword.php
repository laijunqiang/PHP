<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/30
 * Time: 15:11
 */
//  session每次用之前都要启用！
    session_start();
    header("content-type:text/html;charset=utf-8");
//  $_POST 变量用于收集来自 method="post"的表单中的值
    $name=trim($_POST["username"]);
    $oldPassword=$_POST["oldpassword"];
    $newPassword=$_POST["newpassword"];
    $assertpassword=$_POST['assertpassword'];
    if ($name==null||$oldPassword==null||$newPassword==null||$assertpassword==null)
        echo "<script>alert('输入不能为空');window.location.href='../html/setPassword.html'</script>";
    include "class.php";
    $admin=new admin();
    $query="select id from t_admin where name='$name' and password='$oldPassword'";
    $result=$admin->query($query);
    if ($result->num_rows<1){
        echo "<script>alert('账号密码错误，请重新输入');window.location.href='../html/setPassword.html'</script>";
    }else {
        $admin->setPassword($name,$newPassword);
        echo "<script>alert('修改成功');window.location.href='../html/index.html'</script>";
    }
//  恢复查询内存
    $result->free();