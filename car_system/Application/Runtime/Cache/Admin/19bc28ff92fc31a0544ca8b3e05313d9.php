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
            <td><input type="text" value="<?php echo ($ret["number"]); ?>" name="number" id="number" disabled="disabled"></td>
        </tr>
        <tr>
            <td>车牌号：</td>
            <td>
                <select name="province">
                    <?php if(is_array($province)): foreach($province as $key=>$vo): if(($vo) == $provinceSelected): ?><option value="<?php echo ($vo); ?>" selected="selected"><?php echo ($vo); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>
                </select>
                <select name="city">
                    <?php if(is_array($city)): foreach($city as $key=>$vo): if(($vo) == $citySelected): ?><option value="<?php echo ($vo); ?>" selected="selected"><?php echo ($vo); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>
                </select>
                <input type="text" placeholder="请输入车牌号后五位" name="plate" id="plate" size="15px" value="<?php echo ($plateSelected); ?>">
            </td>
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