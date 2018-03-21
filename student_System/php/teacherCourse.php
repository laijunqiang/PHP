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
$number=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教导课程信息</title>
</head>
<body>
<?php
    include "class.php";
    $sql=new Sql();
    $sql->teacherCourse($number);
    $result=$sql->result;
    if ($result->num_rows<1){
        echo "<script>alert('没有该教师教导的课程，请选择一门教导');window.location.href='teacherSeleteCourse.php'</script>";
    }
    ?>
<h2 align="center">教导课程信息管理</h2>
<h4 align="center">欢迎<?php echo $number;?>!</h4>
<table align="center">
    <tr>
        <td align="center" colspan="2"><a href="teacherSeleteCourse.php"><input type="button" value="选课"/></a></td>
    </tr>
    <tr>
        <td><a href="teacherSetPassword.php"><input type="button" value="修改密码"/></a></td>
        <?php echo "<td><a href='logout.php?name=$number'><input type='button' value='退出登陆'/></a></td>"?>
    </tr>
</table>
<?php
        echo "<table border=\"1\" align=\"center\">
                    <tr>
                        <td align='center'>课程ID</td>
                        <td align='center'>课程号</td>
                        <td align='center'>课程名</td>
                        <td align='center'>学分</td>
                        <td align='center'>开课时间</td>
                        <td align='center'>任课老师账号</td>
                        <td align='center'>任课老师姓名</td>
                        <td align='center'>管理</td>
                        </tr>";
        while (list($id, $courseNumber, $name, $credit, $time, $teacherNumber,$teacherName) = $result->fetch_row()) {
            echo "<tr>
                <td align='center'>$id</td>
                <td align='center'>$courseNumber</td>
                <td align='center'>$name</td>
                <td align='center'>$credit</td>
                <td align='center'>$time</td>
                <td align='center'>$teacherNumber</td>
                <td align='center'>$teacherName</td>
                <td>
                <a href=\"teacherStudent.php?name=$name\" >查看学生</a>
                <a href=\"teacherScore.php?name=$name\" >查看成绩</a>
                </td>
            </tr>";
        }
    ?>
</table>
</body>
</html>