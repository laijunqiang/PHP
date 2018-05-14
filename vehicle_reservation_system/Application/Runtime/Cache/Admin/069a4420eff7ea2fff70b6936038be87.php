<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>录入油品</title>
</head>
<body>
<div align="center">
    <h4>录入油品功能</h4>
    <form>
        <table>
            <tr>
                <td>油品名：</td>
                <td><input type="text" placeholder="请输入油品名" name="name" id="name"></td>
            </tr>
            <tr>
                <td>油品类型：</td>
                <td>
                    <select name="type">
                        <option value="">--请选择--</option>
                        <option value="芳香烃">芳香烃</option>
                        <option value="烷烃">烷烃</option>
                        <option value="烯烃">烯烃</option>
                        <option value="炔烃">炔烃</option>
                    </select>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="button" value="录入" onclick="oil.add()" /><input type="button" value="返回" onclick="oil.back()"/></td>
            </tr>
        </table>
    </form>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/oil.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>