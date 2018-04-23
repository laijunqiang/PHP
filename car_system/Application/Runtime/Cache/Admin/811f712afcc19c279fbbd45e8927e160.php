<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改司机信息</title>
</head>
<body>
<div align="center">
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
            <td><input type="text" value="<?php echo ($ret["account"]); ?>" name="account" id="account"></td>
        </tr>
        <tr>
            <td>司机密码：</td>
            <td><input type="password" value="<?php echo ($ret["password"]); ?>" name="password" id="password"></td>
        </tr>
        <tr>
            <td>真实姓名：</td>
            <td><input type="text" value="<?php echo ($ret["name"]); ?>" name="name" id="name"></td>
        </tr>
        <tr>
            <td>头像路径：</td>
            <td><input type="text" value="<?php echo ($ret["image"]); ?>" name="image" id="image"></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="driver.update()">修改</button>
                <button onclick="driver.back()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/driver.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>