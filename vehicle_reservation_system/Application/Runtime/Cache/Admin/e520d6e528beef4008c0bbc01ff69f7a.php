<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改油品信息</title>
</head>
<body>
<div align="center">
    <table>
        <tr>
            <td>油品ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>油品编号：</td>
            <td><input type="text" value="<?php echo ($ret["number"]); ?>" name="number" id="number" disabled="disabled"></td>
        </tr>
        <tr>
            <td>油品名：</td>
            <td>
                <input type="text" placeholder="请输入油品名" name="name" id="name"  value="<?php echo ($ret["name"]); ?>">
            </td>
        </tr>
        <tr>
            <td>油品类型：</td>
            <td>
                <select name="type">
                    <option value="">--请选择--</option>
                    <?php if(($ret["type"]) == "芳香烃"): ?><option value="芳香烃" selected="selected">芳香烃</option>
                        <?php else: ?>
                        <option value="芳香烃">芳香烃</option><?php endif; ?>
                    <?php if(($ret["type"]) == "烷烃"): ?><option value="烷烃" selected="selected">烷烃</option>
                        <?php else: ?>
                        <option value="烷烃">烷烃</option><?php endif; ?>
                    <?php if(($ret["type"]) == "烯烃"): ?><option value="烯烃" selected="selected">烯烃</option>
                        <?php else: ?>
                        <option value="烯烃">烯烃</option><?php endif; ?>
                    <?php if(($ret["type"]) == "炔烃"): ?><option value="炔烃" selected="selected">炔烃</option>
                        <?php else: ?>
                        <option value="炔烃">炔烃</option><?php endif; ?>
                </select>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="oil.update()">修改</button>
                <button onclick="oil.back()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/oil.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>