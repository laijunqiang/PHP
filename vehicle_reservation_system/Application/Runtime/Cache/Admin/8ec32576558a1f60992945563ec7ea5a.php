<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加车辆</title>
</head>
<body>
<div align="center">
    <h4>添加车辆功能</h4>
    <form>
        <table>
            <tr>
                <td>油品：</td>
                <td>
                    <select name="oil_type">
                        <option value="">--请选择--</option>
                        <option value="芳香烃">芳香烃</option>
                        <option value="烷烃">烷烃</option>
                        <option value="烯烃">烯烃</option>
                        <option value="炔烃">炔烃</option>
                    </select>
                    <select name="oil_name">
                        <option value="">--请先选择油品类型--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>司机名：</td>
                <td>
                    <select name="driver_name">
                        <option value="">--请选择--</option>
                        <?php if(is_array($restDriverName)): foreach($restDriverName as $key=>$vo): ?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="button" value="生成" onclick="order.add()" /><input type="button" value="返回" onclick="order.back()"/></td>
            </tr>
        </table>
    </form>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/order.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>