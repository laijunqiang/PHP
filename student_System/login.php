<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/30
 * Time: 9:09
 */
//  session每次用之前都要启用！
    session_start();
    header("content-type:text/html;charset=utf-8");
    $name=$_POST["usern"];
    $password=$_POST["passw"];
    $id=0;
//  先查看输入的账号，再根据输入的账号去数据库查密码，最后验证密码是否和mysql里面的密码相匹配
    $mysqli=new mysqli("localhost","root","root","db_student_system");
//  $_POST 变量用于收集来自 method="post"的表单中的值
    $query="select id from t_admin where name='$name' and password='$password'";
//  $mysqli_query()失败时返回FALSE，成功执行SELECT, SHOW, DESCRIBE或 EXPLAIN查询会返回一个mysqli_result对象，其他查询则返回TRUE。
    $result=$mysqli->query($query);
    while(list($i)=$result->fetch_row()){
        $id=$i;
    }
    if ($id!=null){
//  登陆成功
        $_SESSION['name']=$name;
        header("location:main.html");
    }else {
        echo "登陆失败";
    }
//  恢复查询内存
    $result->free();




