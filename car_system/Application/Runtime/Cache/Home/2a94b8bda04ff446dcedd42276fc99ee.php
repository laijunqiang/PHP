<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>出车管理系统</title>
    <link rel="stylesheet" href="/Public/css/home/image.css">
</head>
<body>
<div align="center">
    <h1>出车管理系统</h1>
    <!--输出$_SESSION['driverUser']变量-->
    <p>欢迎，<?php echo ($_SESSION['driverUser']['account']); ?>！</p>
    <img src="<?php echo ($ret["image"]); ?>" alt="上传后图片预览">
    <!--    　1、用a标签的target属性。
        2、跳转是用a标签的href传递参数，在含有iframe页面中用jquery接收判断传递过来的参数，然后获取iframe的id，根据参数设置iframe的src,显示指定的页面。-->
    <nav>
        <button><a href="/index.php/Home/Order" target="iframe">公共订单池</a></button>
        <button><a href="/index.php/Home/PersonalOrder" target="iframe">个人订单</a></button>
        <button><a href="/index.php/Home/PersonalCenter" target="iframe">个人中心</a></button>
        <button><a href="/index.php/Home/Login/loginout">退出登陆</a></button>
    </nav>
</div>
<iframe src="/index.php/Home/Order" scrolling="auto" name="iframe" frameborder="0" width="100%" height="600">
</iframe>
</body>
</html>