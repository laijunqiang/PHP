<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="/Public/css/home/image.css">
</head>
<body>
<div align="center">
    <h3>个人中心</h3>
    <nav>
        <button><a href="/index.php/Home/PersonalCenter/setPasswordPage">个人密码修改</a></button>
        <button><a href="/index.php/Home/PersonalCenter">个人信息</a></button>
        <button><a href="/index.php/Home/PersonalOrder">个人订单管理</a></button>
    </nav>
    <table>
        <tr>
            <td>司机ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>司机编号：</td>
            <td><input type="text" value="<?php echo ($ret["number"]); ?>" name="number" id="number" disabled="disabled"></td>
        </tr>
        <tr>
            <td>司机账号：</td>
            <td><input type="text" value="<?php echo ($ret["account"]); ?>" name="account" id="account" disabled="disabled"></td>
        </tr>
        <tr>
            <td>真实姓名：</td>
            <td><input type="text" value="<?php echo ($ret["name"]); ?>" name="name" id="name" disabled="disabled"></td>
        </tr>
    </table>
</div>
</body>
</html>