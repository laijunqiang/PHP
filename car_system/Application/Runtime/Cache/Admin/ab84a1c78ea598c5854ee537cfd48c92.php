<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>录入权限</title>
</head>
<body>
<div align="center">
    <h4>录入权限功能</h4>
    <table>
        <tr>
            <td>请选择用户：</td>
            <td>
                <select name="driver_name">
                    <!--循环输出一位数组-->
                    <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>请选择权限：</td>
            <td>
                <input type="checkbox" name="role" value="order_manage" checked="checked" disabled="disabled"/>订单管理权限
                <input type="checkbox" name="role" value="driver_manage"/>用户管理权限
                <input type="checkbox" name="role" value="car_manage"/>车辆管理权限
                <input type="checkbox" name="role" value="role_manage"/>角色管理权限
                <input type="checkbox" name="role" value="log_manage"/>日志管理权限
            </td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="button" value="录入" onclick="role.add()" /><input type="button" value="返回" onclick="role.back()"/></td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/role.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>