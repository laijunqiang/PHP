<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/19
 * Time: 19:41
 */
session_start();
$number=$_SESSION['name'];

include "class.php";
header("content-type:text/html;charset=utf-8");
$sql=new Sql();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$course=$_POST['course'];

//  判断输入不能为空，否则不跳转
if ($course==null){
    echo "<script>alert('选择不能为空，请重新选择');window.location.href='teacherSeleteCourse.php'</script>";
}else{
    $sql->teacherInputCourse($number,$course);
    /*针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。
    $mysqli_query()返回一个对象，即使查询为空
    针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。*/
    if ($sql->result==true){
        echo "<script>alert('选课成功');window.location.href='teacherCourse.php'</script>";
    }else {
        echo "<script>alert('选课失败，请重新选课');window.location.href='teacherSeleteCourse.php'</script>";
    }
}

