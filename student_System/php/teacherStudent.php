<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../index.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选课学生信息</title>
</head>
<body>
<h2 align="center">选课学生信息</h2>
<table border="1" align="center">
    <tr>
        <td>学生ID</td>
        <td>学号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>年龄</td>
        <td>课程</td>
    </tr>
    <?php
    $name=$_GET['name'];
    include "class.php";
    $sql=new Sql();
    $sql->studentCourse($name);
    $result=$sql->result;
    while(list($id,$number,$name,$sex,$age,$course)=$result->fetch_row())
    {
        $sex=$sql->sexChange($sex);
        $age=$sql->ageChange($age);
        echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$name</td>
                <td>$sex</td>
                <td>$age</td>
                <td>$course</td>
            </tr>";
    }
    ?>
</table>
<br />
<div align="center">
    <a href="teacherCourse.php"><input type="button" value="返回"/></a>
</div>
</body>
</html>