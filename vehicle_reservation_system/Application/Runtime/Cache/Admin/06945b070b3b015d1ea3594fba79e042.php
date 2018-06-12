<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改角色信息</title>
</head>
<body>
<div align="center">
    <table>
        <tr>
            <td>角色ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>角色名：</td>
            <td><input type="text" value="<?php echo ($ret["name"]); ?>" name="name" id="name"></td>
        </tr>
        <tr>
            <td>请选择权限：</td>
            <td>
                <?php if(is_array($per)): $i = 0; $__LIST__ = $per;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(in_array(($vo["id"]), is_array($permission)?$permission:explode(',',$permission))): ?><input type="checkbox" name="role" value="<?php echo ($vo["id"]); ?>" checked="checked"/><?php echo ($vo["permission"]); ?>
                        <?php else: ?>
                        <input type="checkbox" name="role" value="<?php echo ($vo["id"]); ?>"/><?php echo ($vo["permission"]); endif; endforeach; endif; else: echo "" ;endif; ?>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="role.update()">修改</button>
                <button onclick="role.updateBack()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/jquery.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/Admin/role.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog/layer.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog.js"></script>
</body>
</html>