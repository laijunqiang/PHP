<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改订单信息</title>
</head>
<body>
<div align="center">
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
            <td><input type="text" value="<?php echo ($ret["order_number"]); ?>" name="order_number" id="order_number"></td>
        </tr>
        <tr>
            <td>商品名：</td>
            <td>
                <select name="goods_name">
                    <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["name"]) == $ret["goods_name"]): ?><option value="<?php echo ($vo["name"]); ?>" selected="selected"><?php echo ($vo["name"]); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>数量(kg)：</td>
            <td><input type="number" value="<?php echo ($ret["goods_quantity"]); ?>" name="goods_quantity" id="goods_quantity"></td>
        </tr>
        <tr>
            <td>出发时间：</td>
            <td><input type="text" value="<?php echo ($ret["departure_time"]); ?>" name="departure_time" id="departure_time"></td>
        </tr>
        <tr>
            <td>车牌号：</td>
            <td>
                <select name="car_plate">
                    <?php if(is_array($car)): $i = 0; $__LIST__ = $car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["plate"]) == $ret["car_plate"]): ?><option value="<?php echo ($vo["plate"]); ?>" selected="selected"><?php echo ($vo["plate"]); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($vo["plate"]); ?>"><?php echo ($vo["plate"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>目的地：</td>
            <td><input type="text" value="<?php echo ($ret["destination"]); ?>" name="destination" id="destination"></td>
        </tr>
        <tr>
            <td>订单状态：</td>
            <td>
                <select name="order_status">
                    <!--比较标签  ret.order_status变量的值等于value就输出-->
                    <?php if(($ret["order_status"]) == "0"): ?><option value ="0" selected="selected">未接单</option>
                        <?php else: ?>
                        <option value ="0">未接单</option>不相等<?php endif; ?>
                    <?php if(($ret["order_status"]) == "1"): ?><option value ="1" selected="selected">已接单</option>
                        <?php else: ?>
                        <option value ="1">已接单</option><?php endif; ?>
                    <?php if(($ret["order_status"]) == "2"): ?><option value ="2" selected="selected">已结束</option>
                        <?php else: ?>
                        <option value ="2">已结束</option><?php endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>司机编号：</td>
            <td>
                <select name="driver_number">
                    <?php if(is_array($driver)): $i = 0; $__LIST__ = $driver;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["number"]) == $ret["driver_number"]): ?><option value="<?php echo ($vo["number"]); ?>" selected="selected"><?php echo ($vo["number"]); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($vo["number"]); ?>"><?php echo ($vo["number"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>提货单号：</td>
            <td><input type="text" value="<?php echo ($ret["pick_number"]); ?>" name="pick_number" id="pick_number"></td>
        </tr>
        <tr>
            <td>合同号：</td>
            <td><input type="text" value="<?php echo ($ret["contract_number"]); ?>" name="contract_number" id="contract_number"></td>
        </tr>
        <tr>
            <td>缺货信息：</td>
            <td><input type="text" value="<?php echo ($ret["short_info"]); ?>" name="short_info" id="short_info"></td>
        </tr>
        <tr>
            <td>提货数量(kg)：</td>
            <td><input type="number" value="<?php echo ($ret["pick_quantity"]); ?>" name="pick_quantity" id="pick_quantity"></td>
        </tr>
        <tr>
            <td>提货时间：</td>
            <td><input type="text" value="<?php echo ($ret["pick_time"]); ?>" name="pick_time" id="pick_time"></td>
        </tr>
        <tr>
            <td>结算单位：</td>
            <td><input type="text" value="<?php echo ($ret["company"]); ?>" name="company" id="company"></td>
        </tr>
        <tr>
            <td>真实数量(kg)：</td>
            <td><input type="number" value="<?php echo ($ret["real_quantity"]); ?>" name="real_quantity" id="real_quantity"></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="order.update()">修改</button>
                <button onclick="order.back()">返回</button>
            </td>
        </tr>
    </table>
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
    //执行一个laydate实例
    laydate.render({
        elem: '#pick_time' //指定元素
        ,type: 'datetime'
    });
</script>
</body>
</html>