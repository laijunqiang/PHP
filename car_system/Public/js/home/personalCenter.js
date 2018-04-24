/**
 * 个人中心业务类
 */
var personalCenter = {
    back: function () {
        window.location.href = "/index.php/Home/personalOrder";
    },
    update:function () {
        // 获取修改订单页面中的信息
        var id=$('input[name="id"]').val();
        var goods_id=$('input[name="goods_id"]').val();
        var order_status=$('select[name="order_status"]').val();
        var real_quantity=$('input[name="real_quantity"]').val();
        if (real_quantity.length > 10) {
            dialog.error("商品实际数量不能超过10位，请重新输入！");
        } else {
            var url = "/index.php/Home/PersonalOrder/updateOrder";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id':id,
                'goods_id':goods_id,
                'order_status':order_status,
                'real_quantity':real_quantity
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
    },
    setPassword : function() {
        // 获取登录页面中的用户名 和 密码
        var account = $('input[name="account"]').val();
        var password = $('input[name="password"]').val();

        if(!password) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('密码不能为空');
        }else {
            var url = "/admin.php/Admin/update";
            var data = {'account': account, 'password': password};//JSON格式
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

$("#real_quantity").blur(function () {
    if ($("#real_quantity").val().length>10) {
        dialog.error("商品实际数量不能超过10位，请重新输入！");
    }
});
//以月为单位，进行订单查询
$('#select').click(function () {
    var startTime=$("#startTime").val();
    var endTime=$("#endTime").val();
    if (startTime==""||endTime==""){
        dialog.error("搜索时间不能为空，请重新输入！");
    }else {
        window.location.href = "/index.php/Home/PersonalOrder/select?startTime=" + startTime + "&endTime=" + endTime;
    }
});
