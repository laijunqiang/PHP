<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div align="center">
    <nav>
        <p>欢迎，</p>
        <a href="/index.php/Home/PublicOrder" target="iframe">公共订单池</a>
        <a href="https://www.baidu.com/index.php?tn=monline_3_dg" target="iframe">个人订单</a>
        <a href="https://www.cnblogs.com/" target="iframe">个人中心</a>
        <a href="">退出登陆</a>
    </nav>
</div>
<iframe src="/index.php/Home/PublicOrder" scrolling="auto" name="iframe" frameborder="0" width="100%" height="2000">
</iframe>
</body>
</html>