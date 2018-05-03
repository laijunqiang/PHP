/**
 * 订单业务类
 */
var order = {
    add: function () {
        // 获取生成订单页面中的信息
        var order_number = $.trim($('input[name="order_number"]').val());
        var destination = $.trim($('input[name="destination"]').val());
        var goods_name = $('select[name="goods_name"] option:selected').val();
        var goods_quantity = $.trim($('input[name="goods_quantity"]').val());
        var departure_time = $('input[name="departure_time"]').val();
        /*console.log(goods_name);
        console.log(departure_time);*/
        if (!order_number || !destination || !goods_name || !goods_quantity || !departure_time) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空，请重新输入！');
        } else if (order_number.length > 20) {
            dialog.error("订单号不能超过20位，请重新输入！");
        } else if (destination.length > 30) {
            dialog.error("目的地不能超过30位，请重新输入！");
        } else if (goods_quantity.length > 10) {
            dialog.error("商品数量不能超过10位，请重新输入！");
        } else {
            var url = "/admin.php/Order/addOrder";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'order_number': order_number,
                'destination': destination,
                'goods_name': goods_name,
                'goods_quantity': goods_quantity,
                'departure_time': departure_time
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Order');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    back: function () {
        window.location.href="/admin.php/Order";
    },
    update:function () {
        // 获取修改订单页面中的信息
        var id=$('input[name="id"]').val();
        var number=$('input[name="number"]').val();
        var order_number = $('input[name="order_number"]').val();
        var goods_id = $('input[name="goods_id"]').val();
        var goods_name = $('select[name="goods_name"]').val();
        var goods_quantity = $('input[name="goods_quantity"]').val();
        var departure_time=$('input[name="departure_time"]').val();
        var car_plate=$('select[name="car_plate"]').val();
        var destination = $('input[name="destination"]').val();
        var order_status=$('select[name="order_status"]').val();
        var driver_number=$('select[name="driver_number"]').val();
        var pick_number = $('input[name="pick_number"]').val();
        var contract_number = $('input[name="contract_number"]').val();
        var short_info = $('input[name="short_info"]').val();
        var pick_quantity = $('input[name="pick_quantity"]').val();
        var pick_time = $('input[name="pick_time"]').val();
        var company = $('input[name="company"]').val();
        //alert(car_plate);alert(order_status);alert(driver_number);

        if (!order_number){
            dialog.error("订单号不能为空，请重新输入！");
        } else if (!goods_name){
            dialog.error("商品名称不能为空，请重新输入！");
        } else if (!goods_quantity){
            dialog.error("商品数量不能为空，请重新输入！");
        } else if (!destination){
            dialog.error("目的地不能为空，请重新输入！");
        } else if (!departure_time){
            dialog.error("出发时间不能为空，请重新输入！");
        } else if(order_number.length>20){
            dialog.error("订单号不能超过20位，请重新输入！");
        } else if (destination.length > 30) {
            dialog.error("目的地不能超过30位，请重新输入！");
        } else if (goods_quantity.length > 10) {
            dialog.error("商品数量不能超过10位，请重新输入！");
        }else if (pick_number.length > 20) {
            dialog.error("提货单号不能超过20位，请重新输入！");
        } else if (contract_number.length > 20) {
            dialog.error("合同号不能超过20位，请重新输入！");
        } else if (short_info.length > 20) {
            dialog.error("缺货信息不能超过20位，请重新输入！");
        } else if (pick_quantity.length > 10) {
            dialog.error("商品提货数量不能超过10位，请重新输入！");
        } else if (pick_time.length > 19) {
            dialog.error("提货时间不能超过19位，请重新输入！");
        } else if (company.length > 20) {
            dialog.error("结算单位不能超过20位，请重新输入！");
        } else {

            var url = "/admin.php/Order/updateOrder";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id':id,
                'number':number,
                'order_number': order_number,
                'destination': destination,
                'goods_id':goods_id,
                'goods_name': goods_name,
                'goods_quantity': goods_quantity,
                'departure_time': departure_time,
                'car_plate':car_plate,
                'order_status':order_status,
                'driver_number':driver_number,
                'pick_number':pick_number,
                'contract_number':contract_number,
                'short_info':short_info,
                'pick_quantity':pick_quantity,
                'pick_time':pick_time,
                'company':company
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Order');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};
$("#number").blur(function () {
    if ($("#number").val().length>14) {
        dialog.error("订单编号不能超过14位，请重新输入！");
    }
});
$("#order_number").blur(function () {
    if ($("#order_number").val().length>20) {
        dialog.error("订单号不能超过20位，请重新输入！");
    }
});
$("#destination").blur(function () {
    if ($("#destination").val().length>30) {
        dialog.error("目的地不能超过30位，请重新输入！");
    }
});
$("#goods_quantity").blur(function () {
    if ($("#goods_quantity").val().length>10) {
        dialog.error("商品数量不能超过10位，请重新输入！");
    }
});
$("#driver_number").blur(function () {
    if ($("#driver_number").val().length>20) {
        dialog.error("司机编号不能超过20位，请重新输入！");
    }
});
$("#pick_number").blur(function () {
    if ($("#pick_number").val().length>20) {
        dialog.error("提货单号不能超过20位，请重新输入！");
    }
});
$("#contract_number").blur(function () {
    if ($("#contract_number").val().length>20) {
        dialog.error("合同号不能超过20位，请重新输入！");
    }
});
$("#short_info").blur(function () {
    if ($("#short_info").val().length>20) {
        dialog.error("缺货信息不能超过20位，请重新输入！");
    }
});
$("#pick_quantity").blur(function () {
    if ($("#pick_quantity").val().length>10) {
        dialog.error("商品提货数量不能超过10位，请重新输入！");
    }
});
$("#pick_time").blur(function () {
    if ($("#pick_time").val().length>19) {
        dialog.error("提货时间不能超过19位，请重新输入！");
    }
});
$("#company").blur(function () {
    if ($("#company").val().length>20) {
        dialog.error("结算单位不能超过20位，请重新输入！");
    }
});
//清空
$('input[name="empty"]').click(function () {
    /*当调用.attr("value")在文本框中，它将返回在标记中设置的值
    value属性描述默认值对于元素，而不是当前值。当前值是通过value属性(JQuery)可以访问的内容。val()。*/
    $('input[name="searchTime"]').val("");
    //将状态下拉框清空，选择第一个option
    $(".select").val("");
});

// 订单状态查询，ajax无法跳转页面，除非有window.location.href
$('.select').change(function () {
    // jquery获取select选中的值
    var status=$(".select option:selected").val();
    //console.log(status);//value为空串，value!=null
    window.location.href = "/admin.php/Order/select?status=" + status;
});
//复合查询
$('.search').click(function () {
    var status=$(".select option:selected").val();
    var searchTime=$('input[name="searchTime"]').val();
    window.location.href = "/admin.php/Order/search?status=" + status+"&searchTime="+searchTime;
});

//生成excel文件
$('#excel').click(function () {
    var status=$(".select option:selected").val();
    var searchTime=$("#searchTime").val();
    //数据量大，不能直接生成
    if (status==""&&searchTime==""){
        dialog.error("条件不能为空，请重新输入！");
    }else {
        window.location.href = "/admin.php/Order/getExcel?status=" + status + "&searchTime=" + searchTime;
    }
});