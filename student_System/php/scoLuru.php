<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/1
 * Time: 9:09
 */
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$admin=new admin();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$student_id=$_POST["student_id"];
$course_id=$_POST["course_id"];
$score=$_POST["score"];

//  判断输入不能为空，否则不跳转
if ($student_id==null||$course_id==null||$score==null){
    echo "<script>alert('输入不能为空');window.location.href='../html/scoLuru.html'</script>";
}else{
    $admin->scoLuru($student_id,$course_id,$score);
    if ($admin->result!=false){
        echo "<script>alert('录入成功');window.location.href='score.php'</script>";
    }else {
        echo "<script>alert('录入失败，请重新录入');window.location.href='../html/scoLuru.html'</script>";
    }
}

