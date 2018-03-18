<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/31
 * Time: 18:09
 */
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$sql=new Sql();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$id=$_GET["id"];

$sql->courseDelete($id);
if ($sql->result==true){
    echo "<script>alert('删除成功');window.location.href='course.php'</script>";
}else {
    echo "<script>alert('删除失败，请重新删除');window.location.href='course.php'</script>";
}

