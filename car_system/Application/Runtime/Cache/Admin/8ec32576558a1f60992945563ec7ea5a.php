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
                <td><input type="text" placeholder="请输入订单号" name="order_number" id="order_number"></td>
            </tr>
            <tr>
                <td>目的地：</td>
                <td><input type="text" placeholder="请输入订单号" name="destination" id="destination"></td>
            </tr>
            <tr>
                <td>商品：</td>
                <td>
                    <select name="goods_name">
                        <?php if(is_array($ret)): $i = 0; $__LIST__ = $ret;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>数量(kg)：</td>
                <td><input type="number" placeholder="请输入商品数量" name="goods_quantity" id="goods_quantity"></td>
            </tr>
            <tr>
                <td>出发时间：</td>
                <td><input type="text" name="departure_time" id="departure_time"></td>
                <!--不要直接使用type定义日期选择，不同浏览器版本有兼容性问题-->
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
<script src="/Public/laydate/laydate.js"></script>
<!--不能直接使用layUI，"/Public/laydate/layui.css"有样式-->
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#departure_time' //指定元素
        ,type: 'datetime'
    });
</script>
</body>
</html>