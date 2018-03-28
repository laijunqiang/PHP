<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生学习成绩信息</title>
</head>
<body>
<?php
session_start();
?>
<h2 align="center">学生学习成绩信息</h2>
<table border="1" align="center">
    <tr>
        <td>学生学号</td>
        <td>学生姓名</td>
        <td>课程名称</td>
        <td>课程成绩</td>
    </tr>
    <?php
    include "class.php";
    $sql=new Sql();
    //  $_POST 变量用于收集来自 method="post"的表单中的值
    $number=$_POST["number"];

    //  判断输入不能为空，否则不跳转
    if ($number==null){
        echo "<script>alert('输入不能为空');window.location.href='main.php'</script>";
    }elseif (strlen($number)>18){
        echo "<script>alert('所要查询的学号不能超过18位，请重新输入');window.location.href='main.php'</script>";
    } else {
        $sql->select($number);
        $result = $sql->result;
        if ($result->num_rows<1){
            echo "<script>alert('查询为空');window.location.href='main.php'</script>";
        }
        while (list($number, $name, $course, $score) = $result->fetch_row()) {
            echo "<tr>
               <td>$number</td>
               <td>$name</td>
               <td>$course</td>
               <td>$score</td>
               </tr>";
        }
    }
    ?>
</table>
<br />
<div align="center">
    <a href="main.php"><input type="button" value="返回主功能页面"/></a>
</div>
</body>
</html>