<?php
include "class.php";
header("content-type:text/html;charset=utf-8");
$id=$_GET["id"];
$sql=new Sql();
$sql->studentId($id);
$result=$sql->result;
if ($result->num_rows!=1)
    echo "<script>alert('编辑出错，请重新编辑');window.location.href='student.php'</script>";
else{
while(list($number,$name,$sex,$age)=$result->fetch_row()){
    $sex=$sql->sexChange($sex);
    $number1=$number;
    $name1=$name;
    $sex1=$sex;
    $age1=$age;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息编辑</title>
</head>
<body>
<h2 align="center">学生信息编辑</h2>
<form action="studentEdit.php" method="post">
    <table align="center">
        <tr>
            <td>ID：</td>
            <td><input type="text" name="id" <?php echo "value='$id'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>学号：</td>
            <td><input type="text" name="number" <?php echo "value='$number1'"?>/></td>
        </tr>
        <tr>
            <td>姓名：</td>
            <td><input type="text" name="name" <?php echo "value='$name1'"?>/></td>
        </tr>
        <tr>
            <td>性别：</td>
            <td><input type="radio" name="sex" checked="checked" value="1"/>男<input type="radio" name="sex" value="0"/>女</td>
        </tr>
        <tr>
            <td>出生日期：</td>
            <td><input type="date" name="age" value="1998-01-01"/></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="修改" />
                <a href="student.php"><input type="button" value="返回"/></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php }?>