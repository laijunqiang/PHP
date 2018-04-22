<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单信息管理</title>
</head>
<body>
<div align="center">
    <h3>订单信息表</h3>
    <nav>
        <button><a href="/admin.php/Order/add">生成订单</a></button>
    </nav>
    <br>
    <b>订单状态：</b>
    <select class="select">
        <?php if(($status) == "0"): ?><option value="0" selected="selected">未接单</option>
            <?php else: ?>
            <option value="0">未接单</option><?php endif; ?>
        <?php if(($status) == "1"): ?><option value="1" selected="selected">已接单</option>
            <?php else: ?>
            <option value="1">已接单</option><?php endif; ?>
        <?php if(($status) == "2"): ?><option value="2" selected="selected">已结束</option>
            <?php else: ?>
            <option value="2">已结束</option><?php endif; ?>
    </select>
    <button id="select">查询</button>
    <br>
    <b>订单时间搜索：</b>
    <input name="startTime" type="datetime-local" id="startTime" value="<?php echo ($startTime); ?>"/>到
    <input name="endTime" type="datetime-local" id="endTime" value="<?php echo ($endTime); ?>"/>
    <input name="search" type="button" id='search' value="搜索">
    <button id="excel" value="<?php echo ($ret); ?>">生成excel文档</button>
    <table border="1px">
        <tr>
            <td>订单ID</td>
            <td>订单编号</td>
            <td>订单号</td>
            <td>商品</td>
            <td>数量</td>
            <td>创建时间</td>
            <td>出发时间</td>
            <td>车牌号</td>
            <td>目的地</td>
            <td>订单状态</td>
            <td>司机编号</td>
            <td>提货单号</td>
            <td>合同号</td>
            <td>缺货信息</td>
            <td>提货数量</td>
            <td>提货时间</td>
            <td>结算单位</td>
            <td>修改时间</td>
            <td>操作</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["number"]); ?></td>
                <td><?php echo ($vo["order_number"]); ?></td>
                <td><?php echo ($vo["goods_name"]); ?></td>
                <td><?php echo ($vo["goods_quantity"]); ?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td><?php echo ($vo["departure_time"]); ?></td>
                <td><?php echo ($vo["car_plate"]); ?></td>
                <td><?php echo ($vo["destination"]); ?></td>
                <?php if(($vo["order_status"]) == "0"): ?><td>未接单</td><?php endif; ?>
                <?php if(($vo["order_status"]) == "1"): ?><td>已接单</td><?php endif; ?>
                <?php if(($vo["order_status"]) == "2"): ?><td>已结束</td><?php endif; ?>
                <td><?php echo ($vo["driver_number"]); ?></td>
                <td><?php echo ($vo["pick_number"]); ?></td>
                <td><?php echo ($vo["contract_number"]); ?></td>
                <td><?php echo ($vo["short_info"]); ?></td>
                <td><?php echo ($vo["pick_quantity"]); ?></td>
                <td><?php echo ($vo["pick_time"]); ?></td>
                <td><?php echo ($vo["company"]); ?></td>
                <td><?php echo ($vo["update_time"]); ?></td>
                <td>
                    <button><a href="/admin.php/Order/update?id=<?php echo ($vo["id"]); ?>">修改</a></button>
                    <button><a onclick="dialog.confirmOrder('是否确定删除？','<?php echo ($vo["id"]); ?>')">删除</a></button>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/Admin/order.js"></script>
</body>
</html>