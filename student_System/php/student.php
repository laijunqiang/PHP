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
<h2 align="center">学生信息管理</h2>
<h3 align="center"><a href="../html/stuLuru.html" >录入</a></h3>
<div align="center">
    <form action="stuSelect.php" method="post">
        <input type="text" name="chaxun" /><button type="submit" >查询</button>
    </form>
</div>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>sex</td>
        <td>age</td>
        <td>create_time</td>
        <td>update_time</td>
        <td>管理</td>
    </tr>
    <?php
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    !mysqli_connect_error() or die("连接失败！");
    $query="select id,number,name,sex,age,create_time,update_time from t_student where delete_time=0";
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
                <td>
                <a href=\"../html/stuBianji.html\" >编辑</a>
                <a href=\"stuDele.php?id=$id\" >删除</a>
                </td>
            </tr>";
    }
    ?>
</table>
</body>
</html>