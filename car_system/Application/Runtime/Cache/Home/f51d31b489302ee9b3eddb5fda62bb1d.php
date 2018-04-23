<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人订单</title>
</head>
<body>
<div align="center">
    <h3>个人订单</h3>
    <b>订单时间搜索：</b>
    <input name="startTime" type="month" id="startTime" value="<?php echo ($startTime); ?>"/>到
    <input name="endTime" type="month" id="endTime" value="<?php echo ($endTime); ?>"/>
    <input name="search" type="button" id='select' value="搜索">
    <table border="1px">
        <tr>
            <td>订单ID</td>
            <td>订单编号</td>
            <td>订单号</td>
            <td>创建时间</td>
            <td>出发时间</td>
            <td>目的地</td>
            <td>商品</td>
            <td>数量</td>
            <td>订单状态</td>
            <td>操作</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["number"]); ?></td>
                <td><?php echo ($vo["order_number"]); ?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td><?php echo ($vo["departure_time"]); ?></td>
                <td><?php echo ($vo["destination"]); ?></td>
                <td><?php echo ($vo["goods_name"]); ?></td>
                <td><?php echo ($vo["goods_quantity"]); ?></td>
                <?php if(($vo["order_status"]) == "0"): ?><td>未接单</td><?php endif; ?>
                <?php if(($vo["order_status"]) == "1"): ?><td>已接单</td><?php endif; ?>
                <?php if(($vo["order_status"]) == "2"): ?><td>已结束</td><?php endif; ?>
                <td>
                    <?php if(($vo["order_status"]) == "1"): ?><button><a onclick="dialog.confirm('是否确定送达？','/index.php/Home/PersonalOrder/deliveryOrder?id=<?php echo ($vo["id"]); ?>')">送达</a></button><?php endif; ?>
                    <button><a href="/index.php/Home/PersonalOrder/showOrder?id=<?php echo ($vo["id"]); ?>">查看</a></button>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>