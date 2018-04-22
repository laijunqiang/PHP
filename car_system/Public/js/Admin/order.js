/**
 * 订单业务类
 */
var order = {
    add: function () {
        // 获取生成订单页面中的信息
        var order_number = $('input[name="order_number"]').val();
        var destination = $('input[name="destination"]').val();
        var goods_name = $('input[name="goods_name"]').val();
        var goods_quantity = $('input[name="goods_quantity"]').val();
        var departure_time = $('input[name="departure_time"]').val();

        if (!order_number || !destination || !goods_name || !goods_quantity || !departure_time) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空');
        } else if (order_number.length > 20) {
            dialog.error("订单号不能超过20位，请重新输入！");
        } else if (destination.length > 30) {
            dialog.error("目的地不能超过30位，请重新输入！");
        } else if (goods_name.length > 20) {
            dialog.error("商品名不能超过20位，请重新输入！");
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
        var goods_name = $('input[name="goods_name"]').val();
        var goods_quantity = $('input[name="goods_quantity"]').val();
        var departure_time=$('input[name="departure_time"]').val();
        var car_plate=$('input[name="car_plate"]').val();
        var destination = $('input[name="destination"]').val();
        var order_status=$('select').val();
        var driver_number=$('input[name="driver_number"]').val();
        var pick_number = $('input[name="pick_number"]').val();
        var contract_number = $('input[name="contract_number"]').val();
        var short_info = $('input[name="short_info"]').val();
        var pick_quantity = $('input[name="pick_quantity"]').val();
        var pick_time = $('input[name="pick_time"]').val();
        var company = $('input[name="company"]').val();

        if (number.length > 14) {
            dialog.error("订单编号不能超过14位，请重新输入！");
        } else if(order_number.length>20){
            dialog.error("订单号不能超过14位，请重新输入！");
        } else if (car_plate.length > 7) {
            dialog.error("车牌号不能超过7位，请重新输入！");
        } else if (destination.length > 30) {
            dialog.error("目的地不能超过30位，请重新输入！");
        } else if (departure_time.length==0) {
            //input的type="datetime-local"填写完整时长度为16，其他情况都是0
            dialog.error("出发时间不能为空，请重新输入！");
        } else if (goods_name.length > 20) {
            dialog.error("商品名不能超过20位，请重新输入！");
        } else if (goods_quantity.length > 10) {
            dialog.error("商品数量不能超过10位，请重新输入！");
        } else if (driver_number.length > 20) {
            dialog.error("司机编号不能超过20位，请重新输入！");
        } else if (pick_number.length > 20) {
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
$("#departure_time").blur(function () {
    //input的type="datetime-local"填写完整时长度为16，其他情况都是0
    if ($("#departure_time").val().length==0) {
        dialog.error("出发时间不能为空，请重新输入！");
    }
});
$("#car_plate").blur(function () {
    if ($("#car_plate").val().length>7) {
        dialog.error("车牌号不能超过7位，请重新输入！");
    }
});
$("#destination").blur(function () {
    if ($("#destination").val().length>30) {
        dialog.error("目的地不能超过30位，请重新输入！");
    }
});
$("#goods_name").blur(function () {
    if ($("#goods_name").val().length>20) {
        dialog.error("商品名不能超过20位，请重新输入！");
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
    if ($("#pick_time").val().length>16) {
        dialog.error("提货时间不能超过16位，请重新输入！");
    }
});
$("#company").blur(function () {
    if ($("#company").val().length>20) {
        dialog.error("结算单位不能超过20位，请重新输入！");
    }
});
// 按订单状态管理，ajax无法跳转页面，除非有window.location.href
$('#select').click(function () {
    // jquery获取select选中的值
    var status=$(".select option:selected").val();
    // 字符串连接符"+"，通过"?"连接参数
    window.location.href="/admin.php/Order/selectOrder?status="+status;
});
// 按时间段管理
$('#search').click(function () {
    // jquery获取select选中的值
    var startTime=$("#startTime").val();
    var endTime=$("#endTime").val();
    if (startTime.length==0) {
        dialog.error("搜索时间不能为空，请重新输入！");
    }else if (endTime.length==0) {
        dialog.error("搜索时间不能为空，请重新输入！");
    }else {
        // 字符串连接符"+"，通过"/"连接参数
        window.location.href="/admin.php/Order/searchOrder/startTime/"+startTime+"/endTime/"+endTime;
    }
});
//生成excel文件
$('#excel').click(function () {
    var startTime=$("#startTime").val();
    //alert(startTime);
    var endTime=$("#endTime").val();
    window.location.href="/admin.php/Order/getExcel?startTime="+startTime+"&endTime="+endTime;
});