<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>录入车辆</title>
</head>
<body>
<div align="center">
    <h4>录入车辆功能</h4>
    <form>
        <table>
            <tr>
                <td>车牌号：</td>
                <td>
                    <select name="province">
                        <?php if(is_array($province)): foreach($province as $key=>$vo): ?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                    </select>
                    <select name="city">
                        <?php if(is_array($city)): foreach($city as $key=>$vo): ?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                    </select>
                    <input type="text" placeholder="请输入车牌号后五位" name="plate" id="plate" size="15px">
                </td>
            </tr>
            <tr>
                <td>车架号：</td>
                <td><input type="text" placeholder="请输入车架号" name="frame" id="frame"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="button" value="录入" onclick="car.add()" /><input type="button" value="返回" onclick="car.back()"/></td>
            </tr>
        </table>
    </form>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/car.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>