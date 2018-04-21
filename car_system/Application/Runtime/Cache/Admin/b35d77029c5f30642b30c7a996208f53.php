<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>角色/用户权限管理页面</title>
</head>
<body>
<div align="center">
    <h3>角色/用户权限管理表</h3>
    <button><a href="/admin.php/Role/add">录入</a></button>
    <table border="1px">
        <tr>
            <td>ID</td>
            <td>司机ID</td>
            <td>司机名称</td>
            <td>订单管理权限</td>
            <td>用户管理权限</td>
            <td>车辆管理权限</td>
            <td>角色管理权限</td>
            <td>日志管理权限</td>
            <td>创建时间</td>
            <td>修改时间</td>
            <td>操作</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["driver_id"]); ?></td>
                <td><?php echo ($vo["driver_name"]); ?></td>
                <td><?php echo ($vo["order_manage"]); ?></td>
                <td><?php echo ($vo["driver_manage"]); ?></td>
                <td><?php echo ($vo["car_manage"]); ?></td>
                <td><?php echo ($vo["role_manage"]); ?></td>
                <td><?php echo ($vo["log_manage"]); ?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td><?php echo ($vo["update_time"]); ?></td>
                <td>
                    <button><a href="/admin.php/Role/update?id=<?php echo ($vo["id"]); ?>">修改</a></button>
                    <button><a onclick="dialog.confirmRole('是否确定删除？','<?php echo ($vo["id"]); ?>')">删除</a></button>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>