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
$sql=new Sql();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$id=$_GET['id'];

$sql->studentDelete($id);
    if ($sql->result==true){
        echo "<script>alert('删除成功');window.location.href='student.php'</script>";
    }else {
        echo "<script>alert('删除失败，请重新删除');window.location.href='student.php'</script>";
    }

