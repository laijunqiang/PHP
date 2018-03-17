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
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>sex</td>
        <td>age</td>
        <td>course</td>
    </tr>
    <?php
    $id1=$_GET['id'];
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    !mysqli_connect_error() or die("连接失败！");
    $query="select t_student.id,t_student.number,t_student.name,t_student.sex,t_student.age,t_course.name from t_student,t_course,t_score where t_student.id=t_score.student_id and t_course.id=t_score.course_id and t_student.delete_time='0' and t_course.delete_time='0' and t_score.course_id='$id1'";
    $result=$mysqli->query($query);
    while(list($id,$number,$name,$sex,$age,$course)=$result->fetch_row())
    {
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
</body>
</html>