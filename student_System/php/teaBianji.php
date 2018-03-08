<?php
    include "class.php";
    header("content-type:text/html;charset=utf-8");
    $id=$_GET["id"];
    $admin=new admin();
    $admin->teaSelect($id);
    while(list($number,$password,$name)=$admin->result->fetch_row()){
        $num=$number;
        $pass=$password;
        $nam=$name;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>任课老师信息编辑</title>
</head>
<body>
<h2 align="center">任课老师信息编辑</h2>
<form action="teaBianji2.php" method="post">
    <table align="center" border="1" >
        <tr>
            <td>ID：</td>
            <td><input type="text" name="id" <?php echo "value='$id'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>编号(number)：</td>
            <td><input type="text" name="number" <?php echo "value='$num'"?>/></td>
        </tr>
        <tr>
            <td>密码(password)：</td>
            <td><input type="text" name="password" <?php echo "value='$pass'"?>/></td>
        </tr>
        <tr>
            <td>姓名(name)：</td>
            <td><input type="text" name="name" <?php echo "value='$nam'"?>/></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" value="修改" /></td>
        </tr>
    </table>
</form>
</body>
</html>