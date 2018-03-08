<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息</title>
</head>
<body>
<?php
session_start();
?>
<?php
    include "class.php";
    $admin=new admin();
    //  $_POST 变量用于收集来自 method="post"的表单中的值
    $chaxun=$_POST["chaxun"];

    //  判断输入不能为空，否则不跳转
    if ($chaxun==null){
        echo "<script>alert('输入不能为空');window.location.href='student.php'</script>";
    }
    $admin->stuChaxun($chaxun);
    $result = $admin->result;
    if ($result->num_rows<1){
        echo "<script>alert('查询为空，请重新查询');window.location.href='student.php'</script>";
    }else{
?>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>sex</td>
        <td>age</td>
        <td>create_time</td>
        <td>update_time</td>
    </tr>
    <?php
    while (list($id, $number, $name, $sex, $age, $create_time, $update_time) = $result->fetch_row()) {
        echo "<tr>
            <td>$id</td>
            <td>$number</td>
            <td>$name</td>
            <td>$sex</td>
            <td>$age</td>
            <td>$create_time</td>
            <td>$update_time</td>
        </tr>";
    }
    }
?>
</table>
</body>
</html>


