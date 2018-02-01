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
$id=$_GET["id"];

$admin->stuDele($id);
    if ($admin->result!=false){
//        echo "删除成功";
        header("location:student.php");
    }else {
        echo "删除失败";
    }

