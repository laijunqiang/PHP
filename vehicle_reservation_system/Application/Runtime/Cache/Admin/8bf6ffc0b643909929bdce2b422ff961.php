<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公告内容管理</title>
    <link rel="stylesheet" href="/laijunqiang/vehicle_reservation_system/Public/css/admin/align.css">
</head>
<body>
<div align="center">
    <h3>公告信息表</h3>
    <button><a href="<?php echo U('Notice/add');?>">录入</a></button>
    <table border="1px">
        <tr>
            <td>公告ID</td>
            <td>公告编号</td>
            <td>公告内容</td>
            <td>创建记录时间</td>
            <td>修改记录时间</td>
            <td>操作</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["number"]); ?></td>
                <td><?php echo ($vo["content"]); ?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td><?php echo ($vo["update_time"]); ?></td>
                <td>
                    <!--1.通过<a>标签   2.window.location.href="/admin.php/Driver";
                        才可以跳转到<iframe>页面-->
                    <?php if(($vo["top"]) == "0"): ?><button><a onclick="notice.top('<?php echo ($vo["id"]); ?>')">置顶</a></button>
                        <?php else: ?>
                        <button><a onclick="notice.untop('<?php echo ($vo["id"]); ?>')">取消置顶</a></button><?php endif; ?>

                    <button><a href="<?php echo U('Notice/update',array('id'=>$vo['id']));?>">修改</a></button>
                    <button><a onclick="dialog.confirmNotice('是否确定删除？','<?php echo ($vo["id"]); ?>')">删除</a></button>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/jquery.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog/layer.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/Admin/notice.js"></script>
</body>
</html>