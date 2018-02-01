<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/30
 * Time: 9:09
 */
//  session每次用之前都要启用！
    session_start();
//  header — 发送原生 HTTP 头
    header("content-type:text/html;charset=utf-8");
    $name=$_POST["usern"];
    $password=$_POST["passw"];
    if ($name==null||$password==null)
        echo "<script>alert('账号密码不能为空，请重新输入');window.location.href='../html/index.html'</script>";
//  先查看输入的账号，再根据输入的账号去数据库查密码，最后验证密码是否和mysql里面的密码相匹配
    $mysqli=new mysqli("localhost","root","root","db_student_system");
//  $_POST 变量用于收集来自 method="post"的表单中的值
    $query="select id from t_admin where name='$name' and password='$password'";
//  $mysqli_query()返回一个对象，即使查询为空
    $result=$mysqli->query($query);
  /*  mysql_num_rows()或者$result->num_rows
    返回结果集中行的数目。此命令仅对 SELECT 语句有效。
    要取得被 INSERT，UPDATE 或者 DELETE 查询所影响到的行的数目，用mysql_affected_rows()。*/
    if ($result->num_rows<1){
        echo "<script>alert('账号密码错误，请重新输入');window.location.href='../html/index.html'</script>";
    }else{
        header("location:../html/main.html");
    }




