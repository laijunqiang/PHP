<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>排队信息管理</title>
    <link rel="stylesheet" href="/Public/css/admin/align.css">
</head>
<body>
<div align="center">
    <h3>排队信息表</h3>
    <nav>
        <button><a href="/admin.php/Order/add">添加车辆</a></button>
        <button id="stop">暂停全部车辆排队</button>
        <button id="excel">生成excel文档</button>
    </nav>
    <br>
    <b>订单状态：</b>
    <select class="select">
        <option value="">--请选择--</option>
        <?php if(($status) == "0"): ?><option value="0" selected="selected">已装</option>
            <?php else: ?>
            <option value="0">已装</option><?php endif; ?>
        <?php if(($status) == "1"): ?><option value="1" selected="selected">装车中</option>
            <?php else: ?>
            <option value="1">装车中</option><?php endif; ?>
        <?php if(($status) == "2"): ?><option value="2" selected="selected">厂区内待装</option>
            <?php else: ?>
            <option value="2">厂区内待装</option><?php endif; ?>
        <?php if(($status) == "3"): ?><option value="3" selected="selected">厂外待装</option>
            <?php else: ?>
        <option value="3">厂外待装</option><?php endif; ?>
    </select>

    <br>
    <b>订单时间搜索：</b>
    <input name="searchTime" type="text" id="searchTime" size="35px" value="<?php echo ($searchTime); ?>"/>
    <input name="search" type="button" value="搜索" class="search">
    <input name="empty" type="button" value="清空">
    <table border="1px">
        <tr>
            <td>订单ID</td>
            <td>订单编号</td>
            <td>油品名称</td>
            <td>油品类型</td>
            <td>车牌号</td>
            <td>真实姓名</td>
            <td>隶属公司</td>
            <td>订单状态</td>
            <td>排队次序</td>
            <td>创建时间</td>
            <td>修改时间</td>
            <td>操作</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["number"]); ?></td>
                <td><?php echo ($vo["oil_name"]); ?></td>
                <td><?php echo ($vo["oil_type"]); ?></td>
                <td><?php echo ($vo["plate"]); ?></td>
                <td><?php echo ($vo["driver_name"]); ?></td>
                <td><?php echo ($vo["driver_company"]); ?></td>
                <?php if(($vo["order_status"]) == "0"): ?><td>已装</td><?php endif; ?>
                <?php if(($vo["order_status"]) == "1"): ?><td>装车中</td><?php endif; ?>
                <?php if(($vo["order_status"]) == "2"): ?><td>厂区内待装</td><?php endif; ?>
                <?php if(($vo["order_status"]) == "3"): ?><td>厂外待装</td><?php endif; ?>
                <td><?php echo ($vo["order_number"]); ?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td><?php echo ($vo["update_time"]); ?></td>
                <td>
                    <?php if(($vo["order_status"]) == "0"): else: ?>
                        <?php if(($vo["order_number"]) == "1"): else: ?>
                            <?php if(($vo["order_number"]) == "2"): ?><button><a onclick="order.down('<?php echo ($vo["id"]); ?>')">下移</a></button>
                                <?php if(($vo["order_number"]) >= $maxOrder-3): ?><button><a onclick="dialog.confirmOrder('是否确定删除？','<?php echo ($vo["id"]); ?>')">删除</a></button><?php endif; ?>
                                <?php else: ?>
                                <?php if(($vo["order_number"]) == $maxOrder): ?><button><a onclick="order.up('<?php echo ($vo["id"]); ?>')">上移</a></button>
                                    <?php else: ?>
                                    <button><a onclick="order.up('<?php echo ($vo["id"]); ?>')">上移</a></button>
                                    <button><a onclick="order.down('<?php echo ($vo["id"]); ?>')">下移</a></button>
                                    <?php if(($vo["order_number"]) >= $maxOrder): ?><button><a onclick="dialog.confirmOrder('是否确定删除？','<?php echo ($vo["id"]); ?>')">删除</a></button><?php endif; endif; endif; endif; endif; ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/Admin/order.js"></script>
<script src="/Public/laydate/laydate.js"></script>
<!--不能直接使用layUI，"/Public/laydate/layui.css"有样式-->
<script>
    //日期时间范围
    laydate.render({
        elem: '#searchTime'
        ,type: 'datetime'
        ,range: true
    });
</script>
</body>
</html>