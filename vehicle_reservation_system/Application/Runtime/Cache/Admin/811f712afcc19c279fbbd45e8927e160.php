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
            <td>司机账号：</td>
            <td><input type="text" value="<?php echo ($ret["account"]); ?>" name="account" id="account" placeholder="请输入司机账号"></td>
        </tr>
        <tr>
            <td>司机密码：</td>
            <td><input type="password" value="<?php echo ($ret["password"]); ?>" name="password" id="password" placeholder="请输入司机密码"></td>
        </tr>
        <tr>
            <td>姓名：</td>
            <td><input type="text" value="<?php echo ($ret["name"]); ?>" name="name" id="name" placeholder="请输入司机姓名"></td>
        </tr>
        <tr>
            <td>头像上传：</td>
            <td>
                <input type='file' id="file" accept = 'image/gif,image/jpeg,image/jpg,image/png' name="file" />
            </td>
        </tr>
        <tr align="center">
            <td colspan="2"><img src="<?php echo ($ret["image"]); ?>" id="img0" alt="上传后图片预览"></td>
        </tr>
        <tr>
            <td>昵称：</td>
            <td><input type="text" value="<?php echo ($ret["nickname"]); ?>" name="nickname" id="nickname" placeholder="请输入司机姓名"></td>
        </tr>
        <tr>
            <td>车牌号：</td>
            <td><input type="text" value="<?php echo ($ret["plate"]); ?>" name="plate" id="plate" placeholder="请输入车牌号"></td>
        </tr>
        <tr>
            <td>隶属公司：</td>
            <td><input type="text" value="<?php echo ($ret["company"]); ?>" name="company" id="company" placeholder="请输入隶属公司"></td>
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