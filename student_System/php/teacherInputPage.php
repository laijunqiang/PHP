<?php
header("content-type:text/html;charset=utf-8");
$name=$_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成绩信息录入</title>
</head>
<body>
<h2 align="center">成绩信息录入</h2>
<form action="teacherInputScore.php" method="post">
    <table align="center"  >
        <tr>
            <td>课程：</td>
            <td><input type="text" name="course" size="20" <?php echo "value='$name'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>学生：</td>
            <td><input type="text" name="student" size="20" placeholder="请输入该学生姓名"/></td>
        </tr>
        <tr>
            <td>成绩：</td>
            <td><input type="number" step="0.1"name="score"  placeholder="精确到小数点后一位"/></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="修改" />
                <?php echo "<a href='teacherScore.php?name=$name'><input type='button' value='返回'/></a>";?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>