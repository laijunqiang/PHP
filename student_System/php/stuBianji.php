<?php
include "class.php";
header("content-type:text/html;charset=utf-8");
$id=$_GET["id"];
$admin=new admin();
$admin->stuSelect($id);
while(list($number,$name,$sex,$age)=$admin->result->fetch_row()){
    $num=$number;
    $nam=$name;
    $se=$sex;
    $ag=$age;
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
<form action="stuBianji2.php" method="post">
    <table align="center" border="1" >
        <tr>
            <td>ID：</td>
            <td><input type="text" name="id" <?php echo "value='$id'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>学号(number)：</td>
            <td><input type="text" name="number" <?php echo "value='$num'"?>/></td>
        </tr>
        <tr>
            <td>姓名(name)：</td>
            <td><input type="text" name="name" <?php echo "value='$nam'"?>/></td>
        </tr>
        <tr>
            <td>性别(sex,0表示女,1表示男)：</td>
            <td><input type="text" name="sex" <?php echo "value='$se'"?>/></td>
        </tr>
        <tr>
            <td>年龄(age)：</td>
            <td><input type="text" name="age" <?php echo "value='$ag'"?>/></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" value="修改" /></td>
        </tr>
    </table>
</form>
</body>
</html>