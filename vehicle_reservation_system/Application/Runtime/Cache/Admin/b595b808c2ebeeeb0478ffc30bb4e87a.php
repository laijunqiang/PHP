<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>车辆预约系统</title>
</head>
<body>
<div align="center">
    <h1>车辆预约系统</h1>
    <!--输出$_SESSION['adminUser']变量-->
    <?php if($_SESSION['adminUser']['account']!= null): ?><p>欢迎，<?php echo ($_SESSION['adminUser']['account']); ?>！</p>
<!--    　1、用a标签的target属性。
    2、跳转是用a标签的href传递参数，在含有iframe页面中用jquery接收判断传递过来的参数，然后获取iframe的id，根据参数设置iframe的src,显示指定的页面。-->
    <nav>
        <!--模板中的{}代表<?php ?>，:U代表使用U方法-->
        <button><a href="<?php echo U('Order/index');?>" target="iframe">排队信息管理</a></button>
        <button><a href="<?php echo U('Driver/index');?>" target="iframe">司机信息管理</a></button>
        <button><a href="<?php echo U('Oil/index');?>" target="iframe" >油品信息管理</a></button>
        <button><a href="<?php echo U('User/index');?>" target="iframe" >用户信息管理</a></button>
        <button><a href="<?php echo U('Role/index');?>" target="iframe">角色信息管理</a></button>
        <button><a href="<?php echo U('Permission/index');?>" target="iframe">权限信息管理</a></button>
        <button><a href="<?php echo U('Log/index');?>" target="iframe">操作日志管理</a></button>
        <button><a href="<?php echo U('Notice/index');?>" target="iframe">公告内容管理</a></button>
        <button><a href="<?php echo U('Admin/index');?>" target="iframe">修改密码</a></button>
        <button><a href="<?php echo U('Login/loginout');?>">退出登陆</a></button>
    </nav>
    </div>
    <iframe src="<?php echo U('Order/index');?>" scrolling="auto" name="iframe" frameborder="0" width="100%" height="600">
    </iframe>
    <?php else: ?>
        <p>欢迎，<?php echo ($_SESSION['User']['name']); ?>！</p>
        <!--<?php if(is_array($_SESSION['adminUser'])): foreach($_SESSION['adminUser'] as $key=>$vo): echo ($key); ?>|<?php echo ($vo); ?><br><?php endforeach; endif; ?>-->
        <nav>
            <?php if(is_array($permission)): foreach($permission as $key=>$vo): if(($vo) == "1"): ?><button><a href="<?php echo U('Order/index');?>" target="iframe">排队信息管理</a></button><?php endif; ?>
                <?php if(($vo) == "2"): ?><button><a href="<?php echo U('Driver/index');?>" target="iframe">司机信息管理</a></button><?php endif; ?>
                <?php if(($vo) == "3"): ?><button><a href="<?php echo U('Oil/index');?>" target="iframe" >油品信息管理</a></button><?php endif; ?>
                <?php if(($vo) == "4"): ?><button><a href="<?php echo U('User/index');?>" target="iframe" >用户信息管理</a></button><?php endif; ?>
                <?php if(($vo) == "5"): ?><button><a href="<?php echo U('Role/index');?>" target="iframe">角色信息管理</a></button><?php endif; ?>
                <?php if(($vo) == "6"): ?><button><a href="<?php echo U('Permission/index');?>" target="iframe">权限信息管理</a></button><?php endif; ?>
                <?php if(($vo) == "7"): ?><button><a href="<?php echo U('Log/index');?>" target="iframe">操作日志管理</a></button><?php endif; ?>
                <?php if(($vo) == "8"): ?><button><a href="<?php echo U('Notice/index');?>" target="iframe">公告内容管理</a></button><?php endif; endforeach; endif; ?>
            <button><a href="<?php echo U('Login/loginout');?>">退出登陆</a></button>
        </nav>
    </div>
    <iframe src="<?php echo ($src); ?>" scrolling="auto" name="iframe" frameborder="0" width="100%" height="600">
    </iframe><?php endif; ?>
</body>
</html>