<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登陆页面</title>
</head>
<body>
<div align="center">
    <form method="post">
        <h1>后台登陆页面</h1>
        <table>
            <tr>
                <td> <label>用户名：</label></td>
                <td><input type="text" name="username" placeholder="请输入账号"><br></td>
            </tr>
            <tr>
                <td><label>密码  ：</label></td>
                <td><input type="password" name="password" placeholder="请输入密码"><br></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="button" name="登陆" value="登录" onclick="login.check()"></td>
            </tr>
        </table>
    </form>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/admin/login.js"></script>
</body>
</html>