<?php
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$sql=new Sql();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$id=$_POST["id"];
$number=trim($_POST["number"]);
$name=trim($_POST["name"]);
$sex=$_POST["sex"];
$age=$_POST["age"];

//  判断输入不能为空，否则不跳转
if ($id==null||$number==null||$name==null||$sex==null||$age==null){
    echo "<script>alert('输入不能为空，请重新输入');window.location.href='studentEditPage.php?id=$id'</script>";
}elseif (strlen($number)>18||strlen($name)>20){
    echo "<script>alert('学号不能超过18位或姓名不能超过20位，请重新输入');window.location.href='studentEditPage.php?id=$id'</script>";
}else{
    $sql->studentEdit($id,$number,$name,$sex,$age);
    /*针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。
    针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。*/
    if ($sql->result==true){
        echo "<script>alert('编辑成功');window.location.href='student.php'</script>";
    }else {
        echo "<script>alert('编辑失败，请重新编辑');window.location.href='studentEditPage.php'</script>";
    }
}

