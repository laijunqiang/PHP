<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>车辆预约系统登陆页面</title>
    <link rel="stylesheet" href="/Public/css/home/login.css">
</head>
<body>
<h2 align="center">车辆预约系统</h2>
<div>
    <table align="center">
        <tr>
            <td>账号：</td>
            <!--placeholder 属性提供可描述输入字段预期值的提示信息（hint）。
            该提示会在输入字段为空时显示，并会在字段获得焦点时消失。-->
            <td><input type="text" name="account" placeholder="请输入您的账号"  /></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" id="input" name="password" placeholder="请输入您的密码" /></td>
            <td><img id="img" onclick="login.hideShowPsw()" src="/Public/image/visible.png">  </td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="button" value="登陆" onclick="login.check()" style="width:100%;"/></td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/Admin/login.js"></script>
</body>
</html>