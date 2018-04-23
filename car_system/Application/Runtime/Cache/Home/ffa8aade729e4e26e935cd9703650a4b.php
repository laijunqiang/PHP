<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公共订单池</title>
</head>
<body>
<div align="center">
    <h3>公共订单池</h3>
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
                <?php if(($vo["order_status"]) == "0"): ?><td>未接单</td>
                    <?php else: ?>
                    <td>已接单</td><?php endif; ?>
                <td>
                    <?php if(($vo["order_status"]) == "0"): ?><!--将id值传到js中，无法通过URL传id值-->
                        <button><a onclick="dialog.confirm('是否确定接单？','/index.php/Home/Order/takeOrder?id=<?php echo ($vo["id"]); ?>')">接单</a></button><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>

</body>
</html>