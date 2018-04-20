<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>出发订单细节填写</title>
</head>
<body>
<div align="center">
    <h3>出发订单细节填写</h3>
    <table>
        <tr>
            <td>订单ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>订单编号：</td>
            <td><input type="text" value="<?php echo ($ret["number"]); ?>" name="number" id="number" disabled="disabled"></td>
        </tr>
        <tr>
            <td>订单号：</td>
            <td><input type="text" value="<?php echo ($ret["order_number"]); ?>" name="order_number" id="order_number" disabled="disabled"></td>
        </tr>
        <tr>
            <td>创建时间：</td>
            <td><input type="text" value="<?php echo ($ret["create_time"]); ?>" name="order_number" id="create_time" disabled="disabled"></td>
        </tr>
        <tr>
            <td>出发时间：</td>
            <td><input type="datetime-local" value="<?php echo ($ret["departure_time"]); ?>" name="departure_time" id="departure_time" disabled="disabled"></td>
        </tr>
        <tr>
            <td>车牌号：</td>
            <td><input type="text" name="car_plate" id="car_plate"></td>
        </tr>
        <tr>
            <td>目的地：</td>
            <td><input type="text" value="<?php echo ($ret["destination"]); ?>" name="destination" id="destination" disabled="disabled"></td>
        </tr>
        <tr>
            <td>订单状态：</td>
            <td>
                <select name="order_status">
                    <!--disabled规定禁用该下拉列表。selected 默认选择-->
                    <option value ="0" disabled="disabled">未接单</option>
                    <option value ="1" selected="selected" >已接单</option>
                    <option value ="2" disabled="disabled">已结束</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>商品：</td>
            <td><input type="text" value="<?php echo ($ret["goods_name"]); ?>" name="goods_name" id="goods_name" disabled="disabled"></td>
        </tr>
        <tr>
            <td>数量：</td>
            <td><input type="text" value="<?php echo ($ret["goods_quantity"]); ?>" name="goods_quantity" id="goods_quantity" disabled="disabled"></td>
        </tr>
        <tr>
            <td>司机编号：</td>
            <td><input type="text" value="<?php echo ($driver["number"]); ?>" name="driver_number" id="driver_number" disabled="disabled"></td>
        </tr>
        <tr>
            <td>提货单号：</td>
            <td><input type="text"  name="pick_number" id="pick_number"></td>
        </tr>
        <tr>
            <td>合同号：</td>
            <td><input type="text"  name="contract_number" id="contract_number"></td>
        </tr>
        <tr>
            <td>缺货信息：</td>
            <td><input type="text"  name="short_info" id="short_info"></td>
        </tr>
        <tr>
            <td>提货数量：</td>
            <td><input type="text"  name="pick_quantity" id="pick_quantity"></td>
        </tr>
        <tr>
            <td>提货时间：</td>
            <td><input type="datetime-local"  name="pick_time" id="pick_time"></td>
        </tr>
        <tr>
            <td>结算单位：</td>
            <td><input type="text" name="company" id="company"></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="order.update()">提交</button>
                <button onclick="order.back()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/Home/order.js"></script>
</body>
</html>