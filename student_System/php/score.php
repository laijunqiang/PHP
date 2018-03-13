<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../html/index.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成绩信息</title>
</head>
<body>
<h2 align="center">学生成绩管理</h2>
<h3 align="center"><a href="../html/scoLuru.html" >录入</a></h3>
<table border="1" align="center">
    <tr>
        <td>student_id</td>
        <td>course_id</td>
        <td>score</td>
        <td>create_time</td>
        <td>update_time</td>
    </tr>
    <?php
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    !mysqli_connect_error() or die("连接失败！");
    $query="select student_id,course_id,score,create_time,update_time from t_score where delete_time='0'order by student_id desc";
    $result=$mysqli->query($query);
    while(list($student_id,$course_id,$score,$create_time,$update_time)=$result->fetch_row())
    {
        echo "<tr>
                <td>$student_id</td>
                <td>$course_id</td>
                <td>$score</td>
                <td>$create_time</td>
                <td>$update_time</td>
            </tr>";
    }
    ?>
</table>
</body>
</html>