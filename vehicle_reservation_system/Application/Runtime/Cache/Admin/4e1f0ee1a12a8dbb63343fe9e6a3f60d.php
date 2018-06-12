<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>录入用户</title>
</head>
<body>
<div align="center">
    <h4>录入用户功能</h4>
    <form>
        <table>
            <tr>
                <td>用户账号：</td>
                <td><input type="text" placeholder="请输入用户账号" name="account" id="account"></td>
            </tr>
            <tr>
                <td>用户密码：</td>
                <td><input type="password" placeholder="请输入用户密码" name="password" id="password"></td>
            </tr>
            <tr>
                <td>用户名：</td>
                <td><input type="text" placeholder="请输入用户名" name="name" id="name"></td>
            </tr>
            <tr>
                <td>角色：</td>
                <td>
                    <select name="role">
                        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="button" value="录入" onclick="user.add()" /><input type="button" value="返回" onclick="user.back()"/></td>
            </tr>
        </table>
    </form>
</div>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/jquery.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/Admin/user.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog/layer.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog.js"></script>
</body>
</html>