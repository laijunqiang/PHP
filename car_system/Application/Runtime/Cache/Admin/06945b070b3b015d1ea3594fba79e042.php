<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改权限信息</title>
</head>
<body>
<div align="center">
    <table>
        <tr>
            <td>权限ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>角色名：</td>
            <td><input type="text" value="<?php echo ($ret["name"]); ?>" name="name" id="name"></td>
        </tr>
        <tr>
            <td>请选择权限：</td>
            <td>
                <?php if(($ret["order_manage"]) == "1"): ?><input type="checkbox" name="role" value="order_manage" checked="checked"/>订单管理权限
                <?php else: ?>
                    <input type="checkbox" name="role" value="order_manage" />订单管理权限<?php endif; ?>
                <?php if(($ret["driver_manage"]) == "1"): ?><input type="checkbox" name="role" value="driver_manage" checked="checked"/>用户管理权限
                <?php else: ?>
                    <input type="checkbox" name="role" value="driver_manage"/>用户管理权限<?php endif; ?>
                <?php if(($ret["car_manage"]) == "1"): ?><input type="checkbox" name="role" value="car_manage" checked="checked"/>车辆管理权限
                <?php else: ?>
                    <input type="checkbox" name="role" value="car_manage"/>车辆管理权限<?php endif; ?>
                <?php if(($ret["goods_manage"]) == "1"): ?><input type="checkbox" name="role" value="goods_manage" checked="checked"/>商品管理权限
                    <?php else: ?>
                    <input type="checkbox" name="role" value="goods_manage"/>商品管理权限<?php endif; ?>
                <?php if(($ret["user_manage"]) == "1"): ?><input type="checkbox" name="role" value="user_manage" checked="checked"/>用户管理权限
                    <?php else: ?>
                    <input type="checkbox" name="role" value="user_manage"/>用户管理权限<?php endif; ?>
                <?php if(($ret["role_manage"]) == "1"): ?><input type="checkbox" name="role" value="role_manage" checked="checked"/>角色管理权限
                <?php else: ?>
                    <input type="checkbox" name="role" value="role_manage"/>角色管理权限<?php endif; ?>
                <?php if(($ret["log_manage"]) == "1"): ?><input type="checkbox" name="role" value="log_manage" checked="checked"/>日志管理权限
                <?php else: ?>
                    <input type="checkbox" name="role" value="log_manage"/>日志管理权限<?php endif; ?>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="role.update()">修改</button>
                <button onclick="role.back()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/role.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>