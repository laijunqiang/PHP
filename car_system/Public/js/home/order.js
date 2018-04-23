/**
 * 订单业务类
 */
var order = {
    back: function () {
        window.location.href="/index.php/Home/Order";
    },
    update:function () {
        // 获取修改订单页面中的信息
        var id=$('input[name="id"]').val();
        var number=$('input[name="number"]').val();
        var order_number = $('input[name="order_number"]').val();
        var create_time =$('input[name="create_time"]').val();
        var departure_time=$('input[name="departure_time"]').val();
        var car_plate=$('select[name="car_plate"]').val();
        var destination = $('input[name="destination"]').val();
        var order_status=$('select[name="order_status"]').val();
        var goods_name = $('input[name="goods_name"]').val();
        var goods_quantity = $('input[name="goods_quantity"]').val();
        var driver_id=$('input[name="driver_id"]').val();
        //alert(driver_id);
        var driver_number=$('input[name="driver_number"]').val();
        var pick_number = $('input[name="pick_number"]').val();
        var contract_number = $('input[name="contract_number"]').val();
        var short_info = $('input[name="short_info"]').val();
        var pick_quantity = $('input[name="pick_quantity"]').val();
        var pick_time = $('input[name="pick_time"]').val();
        var company = $('input[name="company"]').val();

        if (pick_number.length > 20) {
            dialog.error("提货单号不能超过20位，请重新输入！");
        } else if (contract_number.length > 20) {
            dialog.error("合同号不能超过20位，请重新输入！");
        } else if (short_info.length > 20) {
            dialog.error("缺货信息不能超过20位，请重新输入！");
        } else if (pick_quantity.length > 10) {
            dialog.error("商品提货数量不能超过10位，请重新输入！");
        } else if (pick_time.length > 16) {
            dialog.error("提货时间不能超过16位，请重新输入！");
        } else if (company.length > 20) {
            dialog.error("结算单位不能超过20位，请重新输入！");
        } else {

            var url = "/index.php/Home/Order/updateOrder";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id':id,
                'number':number,
                'order_number': order_number,
                'destination': destination,
                'goods_name': goods_name,
                'goods_quantity': goods_quantity,
                'departure_time': departure_time,
                'create_time':create_time,
                'car_plate':car_plate,
                'order_status':order_status,
                'driver_id':driver_id,
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
                    return dialog.success(result.message, '/index.php/Home/PersonalOrder');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};


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
    if ($("#pick_time").val().length==0) {
        dialog.error("提货时间不能为空，请重新输入！");
    }
});
$("#company").blur(function () {
    if ($("#company").val().length>20) {
        dialog.error("结算单位不能超过20位，请重新输入！");
    }
});
