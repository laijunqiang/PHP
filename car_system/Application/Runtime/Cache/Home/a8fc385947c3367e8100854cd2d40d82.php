<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人密码修改</title>
    <link rel="stylesheet" href="/Public/css/home/login.css">
</head>
<body>
<div align="center">
    <h3>个人密码修改</h3>
    <table>
        <tr>
            <td>司机账号：</td>
            <td><input type="text" value="<?php echo ($ret["account"]); ?>" name="account" id="account" disabled="disabled"></td>
        </tr>
        <tr>
            <td>司机密码：</td>
            <td><input type="password" id="input" name="password" placeholder="请输入您的密码" /></td>
            <td><img id="img" src="/Public/image/visible.png">

        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="personalCenter.setPassword()">修改</button>
                <button onclick="personalCenter.back()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/home/personalCenter.js"></script>
<script src="/Public/js/home/login.js" type="text/javascript"></script>
<!--status 304 not modified
如果客户端发送的是一个条件验证(Conditional Validation)请求,则web服务器可能会返回HTTP/304响应,这就表明了客户端中所请求资源的缓存仍然是有效的,也就是说该资源从上次缓存到现在并没有被修改过.
条件请求可以在确保客户端的资源是最新的同时避免因每次都请求完整资源给服务器带来的性能问题.-->
</body>
</html>