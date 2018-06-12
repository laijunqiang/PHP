<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>司机信息管理</title>
    <link rel="stylesheet" href="/laijunqiang/vehicle_reservation_system/Public/css/admin/image.css">
    <link rel="stylesheet" href="/laijunqiang/vehicle_reservation_system/Public/css/admin/align.css">
</head>
<body>
<div align="center">
    <h3>司机信息表</h3>
    <table border="1px">
        <tr>
            <td>司机ID</td>
            <td>openid</td>
            <!--司机密码没意义，不显示-->
            <!--<td>司机密码</td>-->
            <td>联系方式</td>
            <td>姓名</td>
            <td>头像</td>
            <td>昵称</td>
            <td>车牌号</td>
            <td>隶属公司</td>
            <td>创建记录时间</td>
            <td>修改记录时间</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["openid"]); ?></td>
                <td><?php echo ($vo["phone"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td>
                    <?php if(($vo["image"]) != ""): ?><img src="<?php echo ($vo["image"]); ?>"><?php endif; ?>
                </td>
                <td><?php echo ($vo["nickname"]); ?></td>
                <td><?php echo ($vo["plate"]); ?></td>
                <td><?php echo ($vo["company"]); ?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td><?php echo ($vo["update_time"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/jquery.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog/layer.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog.js"></script>
</body>
</html>