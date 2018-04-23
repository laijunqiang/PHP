<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>录入司机</title>
</head>
<body>
<div align="center">
    <h4>录入司机功能</h4>
    <form>
        <table>
            <tr>
                <td>司机账号：</td>
                <td><input type="text" placeholder="请输入司机账号" name="account" id="account"></td>
            </tr>
            <tr>
                <td>司机密码：</td>
                <td><input type="password" placeholder="请输入司机密码" name="password" id="password"></td>
            </tr>
            <tr>
                <td>真实姓名：</td>
                <td><input type="text" placeholder="请输入真实姓名" name="name" id="name"></td>
            </tr>
            <tr>
                <td>头像路径：</td>
                <td><input type="text" placeholder="请输入头像路径" name="image" id="image"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="button" value="录入" onclick="driver.add()" /><input type="button" value="返回" onclick="driver.back()"/></td>
            </tr>
        </table>
    </form>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/driver.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>