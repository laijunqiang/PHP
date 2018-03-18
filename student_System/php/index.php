<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/30
 * Time: 9:09
 */
/*    session每次用之前都要启用！
    session_start();创建一个新的会话（如果没有找到SID）或继续当前会话*/
    session_start();
//  header — 发送原生 HTTP 头
    header("content-type:text/html;charset=utf-8");
    //去掉首尾空格
    $name=trim($_POST["usern"]);
    $password=$_POST["passw"];
    if ($name==null||$password==null)
        echo "<script>alert('账号密码不能为空，请重新输入');window.location.href='../index.html';</script>";
    if (strlen($name)>20)
        echo "<script>alert('账号不能超过20位，请重新输入');window.location.href='../index.html';</script>";
//  先查看输入的账号，再根据输入的账号去数据库查密码，最后验证密码是否和mysql里面的密码相匹配
    $password=md5($password); //md5只是做了一个摘抄，只取了数据得一部分。是没有办法解密得，因为他不是对数据进行加密，
    include "class.php";
    $sql=new Sql();
//  $mysqli_query()返回一个对象，即使查询为空
/*针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。
针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。*/
    $sql->adminLogin($name,$password);
    $adminResult=$sql->result;
    $sql->teacherLogin($name,$password);
    $teacherResult=$sql->result;
  /*  mysql_num_rows()或者$result->num_rows
    返回结果集中行的数目。此命令仅对 SELECT 语句有效。
    要取得被 INSERT，UPDATE 或者 DELETE 查询所影响到的行的数目，用mysql_affected_rows()。*/
    if ($adminResult->num_rows<1 && $teacherResult->num_rows<1){
        echo "<script>alert('账号密码错误，请重新输入');window.location.href='../index.html'</script>";
    }elseif ($adminResult->num_rows==1){
        $_SESSION['name']=$name;
        header("location:main.php");
    }else{
        $_SESSION['name']=$name;
        echo "<script>window.location.href='teacherCourse.php?name=$name'</script>";
    }




