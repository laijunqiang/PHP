<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 19:35
 */
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../index.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教导课程信息</title>
</head>
<body>
    <?php
    $number1=$_GET['name'];
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    $query="select t_course.id,t_course.number,t_course.name,t_course.credit,t_course.time,t_teacher.name from t_course,t_teacher,t_teacher_course where t_teacher.id=t_teacher_course.teacher_id and t_course.id=t_teacher_course.course_id and t_teacher.delete_time='0' and t_course.delete_time='0' and t_teacher.number='$number1'";
    $result=$mysqli->query($query);
    if ($result->num_rows<1){
        echo "<script>alert('没有该教师教导的课程');window.location.href='../index.html'</script>";
    }else {
        echo "<h2 align=\"center\">教导课程信息管理</h2>
                    <table border=\"1\" align=\"center\">
                        <tr>
                            <td>id</td>
                            <td>number</td>
                            <td>name</td>
                            <td>credit</td>
                            <td>time</td>
                            <td>teacher</td>
                            <td>管理</td>
                        </tr>";
        while (list($id, $number, $name, $credit, $time, $teacher) = $result->fetch_row()) {
            echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$name</td>
                <td>$credit</td>
                <td>$time</td>
                <td>$teacher</td>
                <td>
                <a href=\"teacher_student.php?id=$id\" >查看学生</a>
                <a href=\"teacher_score.php?id=$id\" >查看成绩</a>
                </td>
            </tr>";
        }
    }
    ?>
</table>
</body>
</html>