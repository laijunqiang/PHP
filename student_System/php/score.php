<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../Index.html'</script>";
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
<h3 align="center"><a href="../html/scoreInput.html" >录入</a></h3>
<table border="1" align="center">
    <tr>
        <td>学号</td>
        <td>姓名</td>
        <td>课程号</td>
        <td>课程名</td>
        <td>成绩</td>
        <td>创建时间</td>
    </tr>
    <?php
    include "class.php";
    $sql=new Sql();
    $sql->scoreSelect();
    $result=$sql->result;
    while(list($studentNumber,$studentName,$courseNumber,$courseName,$score,$create_time)=$result->fetch_row())
    {
        echo "<tr>
                <td>$studentNumber</td>
                <td>$studentName</td>
                <td>$courseNumber</td>
                <td>$courseName</td>
                <td>$score</td>
                <td>$create_time</td>
            </tr>";
    }
    ?>
</table>
<br />
<div align="center">
    <a href="main.php"><input type="button" value="返回主功能页面"/></a>
</div>
</body>
</html>