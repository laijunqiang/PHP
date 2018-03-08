<?php
include "class.php";
header("content-type:text/html;charset=utf-8");
$id=$_GET["id"];
$admin=new admin();
$admin->couSelect($id);
while(list($number,$name,$credit,$time)=$admin->result->fetch_row()){
    $num=$number;
    $nam=$name;
    $cre=$credit;
    $tim=$time;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程信息编辑</title>
</head>
<body>
<h2 align="center">课程信息编辑</h2>
<form action="couBianji2.php" method="post">
    <table align="center" border="1" >
        <tr>
            <td>ID：</td>
            <td><input type="text" name="id" <?php echo "value='$id'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>课程号(number)：</td>
            <td><input type="text" name="number" <?php echo "value='$num'"?>/></td>
        </tr>
        <tr>
            <td>课程名(name)：</td>
            <td><input type="text" name="name" <?php echo "value='$nam'"?>/></td>
        </tr>
        <tr>
            <td>学分(credit)：</td>
            <td><input type="text" name="credit" <?php echo "value='$cre'"?>/></td>
        </tr>
        <tr>
            <td>开课时间点(time)：</td>
            <td><input type="text" name="time" <?php echo "value='$tim'"?>/></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" value="修改" /></td>
        </tr>
    </table>
</form>
</body>
</html>