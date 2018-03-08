<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../html/index.html'</script>";
}
$id1=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选课学生成绩信息</title>
</head>
<body>
<h2 align="center">选课学生成绩信息</h2>
<h3 align="center">
    <?php echo "<a href=\"teacher_score_luru.php?id=$id1\" >录入</a>" ?>
</h3>
<table border="1" align="center">
    <tr>
        <td>student_id</td>
        <td>student_name</td>
        <td>course_id</td>
        <td>course</td>
        <td>score</td>
    </tr>
    <?php
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    !mysqli_connect_error() or die("连接失败！");
    $query="select t_student.id,t_student.name,t_course.id,t_course.name,t_score.score from t_student,t_course,t_score where t_student.id=t_score.student_id and t_course.id=t_score.course_id and t_student.delete_time='0' and t_course.delete_time='0' and t_score.course_id='$id1'";
    $result=$mysqli->query($query);
    while(list($student_id,$student_name,$course_id,$course,$score)=$result->fetch_row())
    {
        echo "<tr>
            <td>$student_id</td>
            <td>$student_name</td>
            <td>$course_id</td>
            <td>$course</td>
            <td>$score</td>
            </tr>";
    }
    ?>
</table>
</body>
</html>