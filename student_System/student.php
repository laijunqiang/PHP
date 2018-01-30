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
<table width="1000px" cellpadding="1" border="1"ellspacing="1">
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
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    !mysqli_connect_error() or die("连接失败！");
    $query="select id,number,name,sex,age,create_time,update_time from t_student";
    $result=$mysqli->query($query);
    while(list($id,$number,$name,$sex,$age,$create_time,$update_time)=$result->fetch_row())
    {
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
    ?>
</table>
</body>
</html>