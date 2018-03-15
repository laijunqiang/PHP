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
    if ($oldPassword==null||$newPassword==null||$assertpassword==null)
        echo "<script>alert('输入不能为空');window.location.href='setPassw.php'</script>";
    if ($newPassword!=$assertpassword)
        echo "<script>alert('新密码不相同，请重新输入');window.location.href='setPassw.php'</script>";
    include "class.php";
    $admin=new admin();
    $oldPassword=md5($oldPassword);
    $newPassword=md5($newPassword);
    $query1="select * from t_admin where name='$name' and password='$oldPassword'";
    $query2="select * from t_teacher where number='$name' and password='$oldPassword'";
    $result1=$admin->query($query1);
    $result2=$admin->query($query2);
    if ($result1->num_rows<1 && $result2->num_rows<1){
        echo "<script>alert('账号密码错误，请重新输入');window.location.href='setPassw.php'</script>";
    }elseif ($result1->num_rows!=0) {
        $admin->setPassword1($name,$newPassword);
        echo "<script>alert('修改成功');window.location.href='main.php'</script>";
    }else{
        $admin->setPassword2($name,$newPassword);
        echo "<script>alert('修改成功');window.location.href='main.php'</script>";
    }
//  恢复查询内存
    $result->free();