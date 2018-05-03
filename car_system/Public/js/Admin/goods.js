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
        var plate = $('input[name="plate"]').val();
        var frame = $('input[name="frame"]').val();
        var province=$('select[name="province"]').val();
        var city=$('select[name="city"]').val();
        //不会显示输入不能为空，无法进行判断
        //浏览器浏览数据问题
        if (!plate || !frame) {
            dialog.error("输入不能为空，请重新输入！");
        } else if (plate.length!=5) {
            dialog.error("车牌号不能超过7位，请重新输入！");
        } else if (frame.length!=17) {
            dialog.error("车架号不能超过17位，请重新输入！");
        } else {
            var url = "/admin.php/Car/updateCar";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id': id,
                'number': number,
                'plate': plate,
                'frame': frame,
                'province':province,
                'city':city
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Car');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    add: function () {
        // 获取录入车辆页面中的信息
        var name=$('select[name="name"]').val();

        if (!name) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空，请重新输入！');
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
    if (!$("#name").val()) {
        dialog.error("输入不能为空，请重新输入！");
    }
});