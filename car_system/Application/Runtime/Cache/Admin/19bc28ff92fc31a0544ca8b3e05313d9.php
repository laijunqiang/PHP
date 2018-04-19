<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改车辆信息</title>
</head>
<body>
<div align="center">
    <table>
        <tr>
            <td>车辆ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>车辆编号：</td>
            <td><input type="text" value="<?php echo ($ret["number"]); ?>" name="number" id="number"></td>
        </tr>
        <tr>
            <td>车牌号：</td>
            <td><input type="text" value="<?php echo ($ret["plate"]); ?>" name="plate" id="plate"></td>
        </tr>
        <tr>
            <td>车架号：</td>
            <td><input type="text" value="<?php echo ($ret["frame"]); ?>" name="frame" id="frame"></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="car.update()">修改</button>
                <button onclick="car.back()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/car.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>