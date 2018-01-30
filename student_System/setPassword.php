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
    $name=$_POST["username"];
    $oldPassword=$_POST["oldpassword"];
    $newPassword=$_POST["newpassword"];
    $id=0;
    include "class.php";
    $admin=new admin();
    $query="select id from t_admin where name='$name' and password='$oldPassword'";
//  $mysqli_query()失败时返回FALSE，成功执行SELECT, SHOW, DESCRIBE或 EXPLAIN查询会返回一个mysqli_result对象，其他查询则返回TRUE。
    $result=$admin->query($query);
    while(list($i)=$result->fetch_row()){
        $id=$i;
    }
    if ($id!=null){
        $admin->setPassword($name,$newPassword);
        echo $id."号：修改成功";
    }else {
        echo "修改失败";
    }
//  恢复查询内存
    $result->free();