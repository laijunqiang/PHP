<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程信息</title>
</head>
<body>
<?php
session_start();
?>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>credit</td>
        <td>time</td>
        <td>create_time</td>
        <td>update_time</td>
    </tr>
    <?php
    include "class.php";
    $admin=new admin();
    //  $_POST 变量用于收集来自 method="post"的表单中的值
    $number=$_POST["number"];
    $name=$_POST["name"];

    //  判断输入不能为空，否则不跳转
    if ($number==null&&$name==null){
        echo "<script>alert('输入不能为空');window.location.href='student.php'</script>";
    }else {
        if ($number != null) {
            $admin->couNumber($number);
            $result = $admin->result;
            while (list($id, $number, $name,$credit, $time, $create_time, $update_time) = $result->fetch_row()) {
                echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$name</td>
                <td>$credit</td>
                <td>$time</td>
                <td>$create_time</td>
                <td>$update_time</td>
            </tr>";
            }
        } else {
            $admin->couName($name);
            $result = $admin->result;
            while (list($id, $number, $name,$credit, $time, $create_time, $update_time) = $result->fetch_row()) {
                echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$name</td>
                <td>$credit</td>
                <td>$time</td>
                <td>$create_time</td>
                <td>$update_time</td>
            </tr>";
            }
        }
    }
    ?>
</table>
</body>
</html>


