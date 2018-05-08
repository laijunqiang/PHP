<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单细节</title>
</head>
<body>
<div align="center">
    <h3>个人订单细节</h3>
    <table border="1px">
        <tr>
            <td>订单ID</td>
            <td>订单编号</td>
            <td>订单号</td>
            <td>商品ID</td>
            <td>商品</td>
            <td>数量(kg)</td>
            <td>创建时间</td>
            <td>出发时间</td>
            <td>车辆ID</td>
            <td>车牌号</td>
            <td>目的地</td>
            <td>订单状态</td>
            <td>司机ID</td>
            <td>司机编号</td>
            <td>提货单号</td>
            <td>合同号</td>
            <td>缺货信息</td>
            <td>提货数量(kg)</td>
            <td>提货时间</td>
            <td>结算单位</td>
            <td>实际数量(kg)</td>
            <td>修改时间</td>
        </tr>
        <tr>
            <td><?php echo ($ret["id"]); ?></td>
            <td><?php echo ($ret["number"]); ?></td>
            <td><?php echo ($ret["order_number"]); ?></td>
            <td><?php echo ($ret["goods_id"]); ?></td>
            <td><?php echo ($ret["goods_name"]); ?></td>
            <td><?php echo ($ret["goods_quantity"]); ?></td>
            <td><?php echo ($ret["create_time"]); ?></td>
            <td><?php echo ($ret["departure_time"]); ?></td>
            <td><?php echo ($ret["car_id"]); ?></td>
            <td><?php echo ($ret["car_plate"]); ?></td>
            <td><?php echo ($ret["destination"]); ?></td>
            <?php if(($ret["order_status"]) == "0"): ?><td>未接单</td><?php endif; ?>
            <?php if(($ret["order_status"]) == "1"): ?><td>已接单</td><?php endif; ?>
            <?php if(($ret["order_status"]) == "2"): ?><td>已结束</td><?php endif; ?>
            <td><?php echo ($ret["driver_id"]); ?></td>
            <td><?php echo ($ret["driver_number"]); ?></td>
            <td><?php echo ($ret["pick_number"]); ?></td>
            <td><?php echo ($ret["contract_number"]); ?></td>
            <td><?php echo ($ret["short_info"]); ?></td>
            <td><?php echo ($ret["pick_quantity"]); ?></td>
            <td><?php echo ($ret["pick_time"]); ?></td>
            <td><?php echo ($ret["company"]); ?></td>
            <td><?php echo ($ret["real_quantity"]); ?></td>
            <td><?php echo ($ret["update_time"]); ?></td>
        </tr>
    </table>
    <br>
    <button onclick="personalOrder.back()">返回</button>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/home/personalOrder.js"></script>
</body>
</html>