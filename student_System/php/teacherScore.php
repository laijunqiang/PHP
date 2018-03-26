<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../Index.html'</script>";
}
$name=$_GET['name'];
$id=$_GET['id'];
include "class.php";
$sql=new Sql();
$sql->studentScore($name);
$result=$sql->result;
if ($result->num_rows <1) {
    echo "<script>alert('查询为空，没有学生选修');window.location.href='teacherCourse.php'</script>";
}
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
    <?php echo "<a href=\"teacherInputPage.php?name=$name&id=$id\" >录入</a>" ?>
</h3>
<table border="1" align="center">
    <tr>
        <td>学号</td>
        <td>姓名</td>
        <td>课程号</td>
        <td>课程名</td>
        <td>成绩</td>
    </tr>
    <?php
    while(list($studentNumber,$studentName,$courseNumber,$courseName,$score)=$result->fetch_row())
    {
        echo "<tr>
            <td>$studentNumber</td>
            <td>$studentName</td>
            <td>$courseNumber</td>
            <td>$courseName</td>
            <td>$score</td>
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