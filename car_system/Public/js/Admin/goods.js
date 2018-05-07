/**
 * 商品业务类
 */
var goods = {
    back: function () {
        window.location.href = "/admin.php/Goods";
    },
    update: function () {
        // 获取修改订单页面中的信息
        var id = $('input[name="id"]').val();
        var number = $('input[name="number"]').val();
        var name=$('input[name="name"]').val();
        if (!name) {
            dialog.error("商品名不能为空，请重新输入！");
        } else if (name.length>20){
            dialog.error('商品名不能超过20位，请重新输入！');
        } else {
            var url = "/admin.php/Goods/updateGoods";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id': id,
                'number': number,
                'name':name
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Goods');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    add: function () {
        // 获取录入车辆页面中的信息
        var name=$('input[name="name"]').val();

        if (!name) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空，请重新输入！');
        } else if (name.length>20){
            dialog.error('商品名不能超过20位，请重新输入！');
        } else {
            var url = "/admin.php/Goods/addGoods";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'name':name
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Goods');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};
$("#name").blur(function () {
    if ($("#name").val()=='') {
        dialog.error("输入不能为空，请重新输入！");
    }
});