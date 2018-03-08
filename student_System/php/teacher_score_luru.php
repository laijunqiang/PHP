<?php
header("content-type:text/html;charset=utf-8");
$id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成绩信息录入</title>
</head>
<body>
<h2 align="center">成绩信息录入</h2>
<form action="teacher_score_luru2.php" method="post">
    <table align="center" border="1" >
        <tr>
            <td>student_id：</td>
            <td><input type="text" name="student_id" /></td>
        </tr>
        <tr>
            <td>course_id：</td>
            <td><input type="text" name="course_id" <?php echo "value='$id'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>score：</td>
            <td><input type="text" name="score" /></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" value="修改" /></td>
        </tr>
    </table>
</form>
</body>
</html>