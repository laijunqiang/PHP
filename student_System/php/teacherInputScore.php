<?php
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$sql=new Sql();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$id=$_POST['id'];
$course=$_POST["course"];
$student=$_POST["student"];
$score=trim($_POST["score"]);
//精确到小数点后一位
$score=sprintf( "%.1f ",$score);

//  判断输入不能为空，否则不跳转
if ($student==null||$score==null){
    echo "<script>alert('输入不能为空，请重新输入');window.location.href='teacherInputPage.php?name=$course&&id=$id'</script>";
}elseif($score>100||$score<0){
    echo "<script>alert('成绩输入小于100且大于0，请重新输入');window.location.href='teacherInputPage.php?name=$course&&id=$id'</script>";
}else{
/*    //分别查出对应学生表和课程表的ID
    $sql->studentSelectId($student);
    $result=$sql->result;
    if ($result->num_rows!=1){
        echo "<script>alert('该学生不存在，请重新输入');window.location.href='teacherInputPage.php?name=$course'</script>";
    }else {
        while (list($id) = $result->fetch_row()) {
            $studentId = $id;
        }
    }
    $sql->courseSelectId($course);
    $result=$sql->result;
    if ($result->num_rows!=1) {
        echo "<script>alert('该课程不存在，请重新输入');window.location.href='teacherInputPage.php?name=$course'</script>";
    }else {
        while (list($id) = $result->fetch_row()) {
            $courseId = $id;
        }
    }*/

    $sql->scoreInput($student,$id,$score);
    if ($sql->result!=false){
        echo "<script>alert('录入成功');window.location.href='teacherScore.php??name=$course&&id=$id'</script>";
    }else {
        echo "<script>alert('录入失败，请重新录入');window.location.href='teacherInputPage.php?name=$course&&id=$id'</script>";
    }
}

