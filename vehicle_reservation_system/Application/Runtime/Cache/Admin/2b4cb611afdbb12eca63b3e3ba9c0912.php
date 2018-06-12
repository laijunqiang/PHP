<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>操作日志信息管理</title>
    <link rel="stylesheet" href="/laijunqiang/vehicle_reservation_system/Public/css/admin/page.css">
</head>
<body>
<div align="center">
    <h3>操作日志信息表</h3>
    <table border="1px">
        <tr>
            <td><input type="checkbox" name="checkAll" id="all" value="checkAll">全选</td>
            <td>日志ID</td>
            <td>用户</td>
            <td>操作内容</td>
            <td>操作时间</td>
            <td>操作</td>
        </tr>
        <!--volist标签通常用于查询数据集（select方法）的结果输出，通常模型的select方法返回的结果是一个二维数组，可以直接使用volist标签进行输出。-->
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type='checkbox' name='ck[]' class='ck' value='<?php echo ($vo["id"]); ?>' /></td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["user"]); ?></td>
                <td><?php echo ($vo["log"]); ?></td>
                <td><?php echo ($vo["time"]); ?></td>
                <td>
                    <!--1.通过<a>标签   2.window.location.href="/admin.php/Driver";
                        才可以跳转到<iframe>页面-->
                    <button><a onclick="dialog.confirmLog('是否确定删除？','<?php echo ($vo["id"]); ?>')">删除</a></button>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <button onclick="dialog.confirmDeleteLog()">批量删除</button>
    <div class="pagination">
        　　<ul>
        <li><?php echo ($page); ?></li>
    </ul>
    </div>
</div>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/jquery.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog/layer.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/dialog.js"></script>
<script src="/laijunqiang/vehicle_reservation_system/Public/js/Admin/log.js"></script>
</body>
</html>