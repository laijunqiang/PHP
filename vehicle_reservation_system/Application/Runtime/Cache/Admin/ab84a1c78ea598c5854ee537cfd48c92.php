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
            <td>角色名：</td>
            <td>
                <input type="text" name="name" id="name"/>
            </td>
        </tr>
        <tr>
            <td>请选择权限：</td>
            <td>
                <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="role" value="<?php echo ($vo["id"]); ?>"/><?php echo ($vo["permission"]); endforeach; endif; else: echo "" ;endif; ?>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="button" value="录入" onclick="role.add()" /><input type="button" value="返回" onclick="role.back()"/></td>
        </tr>
    </table>
</div>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/jquery.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/Admin/role.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog/layer.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog.js"></script>
</body>
</html>