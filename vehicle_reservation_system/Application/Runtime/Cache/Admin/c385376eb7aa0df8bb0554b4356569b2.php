<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改用户信息</title>
</head>
<body>
<div align="center">
    <table>
        <tr>
            <td>用户ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>用户账号：</td>
            <td><input type="text" placeholder="请输入用户账号" value="<?php echo ($ret["account"]); ?>" name="account" id="account"></td>
        </tr>
        <tr>
            <td>用户密码：</td>
            <td><input type="password" placeholder="请输入用户密码" value="<?php echo ($ret["password"]); ?>"  name="password" id="password"></td>
        </tr>
        <tr>
            <td>用户名：</td>
            <td><input type="text" placeholder="请输入用户名" value="<?php echo ($ret["name"]); ?>"  name="name" id="name"></td>
        </tr>
        <tr>
            <td>角色：</td>
            <td>
                <select name="role">
                    <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["id"]) == $ret["role_id"]): ?><option value="<?php echo ($vo["id"]); ?>" selected="selected"><?php echo ($vo["name"]); ?></option>
                        <?php else: ?>
                            <option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="user.update()">修改</button>
                <button onclick="user.updateBack()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/jquery.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/Admin/user.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog/layer.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog.js"></script>
</body>
</html>