<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>录入商品</title>
</head>
<body>
<div align="center">
    <h4>录入商品功能</h4>
    <form>
        <table>
            <tr>
                <td>商品名：</td>
                <td><input type="text" placeholder="请输入商品名" name="name" id="name"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="button" value="录入" onclick="goods.add()" /><input type="button" value="返回" onclick="goods.back()"/></td>
            </tr>
        </table>
    </form>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/goods.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>