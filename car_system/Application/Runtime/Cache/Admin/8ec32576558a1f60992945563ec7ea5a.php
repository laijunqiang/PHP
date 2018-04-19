<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>生成订单</title>
</head>
<body>
<div align="center">
    <h4>生成订单功能</h4>
    <form>
        <table>
            <tr>
                <td>订单号：</td>
                <td><input type="text" placeholder="请输入订单号" name="order_number"></td>
            </tr>
            <tr>
                <td>目的地：</td>
                <td><input type="text" placeholder="请输入订单号" name="destination"></td>
            </tr>
            <tr>
                <td>商品：</td>
                <td><input type="text" placeholder="请输入商品名" name="goods_name"></td>
            </tr>
            <tr>
                <td>数量：</td>
                <td><input type="text" placeholder="请输入商品数量" name="goods_quantity"></td>
            </tr>
            <tr>
                <td>出发时间：</td>
                <td><input type="datetime-local" name="departure_time"></td>
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