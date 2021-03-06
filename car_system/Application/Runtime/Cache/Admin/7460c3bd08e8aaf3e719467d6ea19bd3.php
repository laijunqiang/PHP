<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品信息管理</title>
</head>
<body>
<div align="center">
    <h3>商品信息表</h3>
    <button><a href="/admin.php/Goods/add">录入</a></button>
    <table border="1px">
        <tr>
            <td>商品ID</td>
            <td>商品编号</td>
            <td>商品名</td>
            <td>创建记录时间</td>
            <td>修改记录时间</td>
            <td>操作</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["number"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td><?php echo ($vo["update_time"]); ?></td>
                <td>
                    <!--1.通过<a>标签   2.window.location.href="/admin.php/Driver";
                        才可以跳转到<iframe>页面-->
                    <button><a href="/admin.php/Goods/update?id=<?php echo ($vo["id"]); ?>">修改</a></button>
                    <button><a onclick="dialog.confirmGoods('是否确定删除？','<?php echo ($vo["id"]); ?>')">删除</a></button>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>