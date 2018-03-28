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
$sql=new Sql();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$student=trim($_POST["student"]);
$course=trim($_POST["course"]);
$score=trim($_POST["score"]);
//精确到小数点后一位
$score=sprintf( "%.1f ",$score);

//  判断输入不能为空，否则不跳转
if ($student==null||$course==null||$score==null){
    echo "<script>alert('输入不能为空，请重新输入');window.location.href='../html/scoreInput.html'</script>";
}elseif (strlen($student)>20||strlen($course)>20){
    echo "<script>alert('姓名或课程不能超过20位，请重新输入');window.location.href='../html/scoreInput.html'</script>";
} elseif($score>100||$score<0){
    echo "<script>alert('成绩输入错误，请重新输入');window.location.href='../html/scoreInput.html'</script>";
}else{
    //分别查出对应学生表和课程表的ID
    $sql->studentSelectId($student);
    $result=$sql->result;
    if ($result->num_rows!=1){
        echo "<script>alert('该学生不存在，请重新输入');window.location.href='../html/scoreInput.html'</script>";
    }else {
        while (list($id) = $result->fetch_row()) {
            $student_id = $id;
        }
    }
    $sql->courseSelectId($course);
    $result=$sql->result;
    if ($result->num_rows!=1) {
        echo "<script>alert('该课程不存在，请重新输入');window.location.href='../html/scoreInput.html'</script>";
    }else {
        while (list($id) = $result->fetch_row()) {
            $course_id = $id;
        }
    }
    $sql->scoreInput($student_id,$course_id,$score);
    if ($sql->result==true){
        echo "<script>alert('录入成功');window.location.href='score.php'</script>";
    }else {
        echo "<script>alert('录入失败，请重新录入');window.location.href='../html/scoreInput.html'</script>";
    }
}

