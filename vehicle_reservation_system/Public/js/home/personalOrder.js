/**
 * 个人订单业务类
 */
var personalOrder = {
    back: function () {
        window.location.href = "/index.php/Home/personalOrder";
    },
    update:function () {
        // 获取修改订单页面中的信息
        var id=$('input[name="id"]').val();
        var order_status=$('select[name="order_status"]').val();
        var pick_quantity=$('input[name="pick_quantity"]').val();
        var real_quantity=$.trim($('input[name="real_quantity"]').val());
         console.log(typeof real_quantity);//不输入也是字符串数据
        if (real_quantity==""){
            dialog.error("输入不能为空，请重新输入！");
        } else if (real_quantity.length > 10) {
            dialog.error("商品实际数量不能超过10位，请重新输入！");
        } else if (real_quantity>pick_quantity) {
            dialog.error("商品实际数量不能超过提货数量，请重新输入！");
        } else {
            var url = "/index.php/Home/PersonalOrder/updateOrder";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id':id,
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
    }
};

$("#real_quantity").blur(function () {
    if ($("#real_quantity").val().length>10) {
        dialog.error("商品实际数量不能超过10位，请重新输入！");
    }
});

//清空
$('input[name="empty"]').click(function () {
    /*当调用.attr("value")在文本框中，它将返回在标记中设置的值
    value属性描述默认值对于元素，而不是当前值。当前值是通过value属性(JQuery)可以访问的内容。val()。*/
    $('input[name="searchTime"]').val("");
});
//以月为单位，进行订单查询
$('.search').click(function () {
    var searchTime=$('input[name="searchTime"]').val();
    //console.log(searchTime.length);//2018-05 - 2018-05
    if ($(".search").val().length>17) {
        dialog.error("搜索时间不能超过17位，请重新输入！");
    }
    window.location.href = "/index.php/Home/PersonalOrder/select?searchTime="+searchTime;
});