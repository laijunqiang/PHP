<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../Index.html'</script>";
}
$name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
</head>
<body>
    <h2 align="center">学生管理系统</h2>
    <form action="adminPassword.php" method="post" >
        <table align="center">
            <tr>
                <td>用户名：</td>
                <td><input type="text" name="userName" <?php echo "value='$name'"?> readonly="readonly"/></td>
            </tr>
            <tr>
                <td>旧密码：</td>
                <td><input type="password" name="oldPassword" placeholder="请输入您的旧密码"/></td>
            </tr>
            <tr>
                <td>新密码：</td>
                <td><input type="password" name="newPassword"  placeholder="请输入您的新密码"//></td>
            </tr>
            <tr>
                <td>确认新密码：</td>
                <td><input type="password" name="assertPassword" placeholder="请重新输入您的新密码" /></td>
            </tr>
            <tr align="center">
                <td><input type="submit"  value="修改密码"></td>
                <td><a href="main.php"><input type="button" value="返回"/></a></td>
            </tr>
        </table>
    </form>
</body>
</html>