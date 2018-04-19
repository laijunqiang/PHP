/**
 * 车辆业务类
 */
var car = {
    back: function () {
        window.location.href = "/admin.php/Car";
    },
    update: function () {
        // 获取修改订单页面中的信息
        var id = $('input[name="id"]').val();
        var number = $('input[name="number"]').val();
        var plate = $('input[name="plate"]').val();
        var frame = $('input[name="frame"]').val();

        if (number.length > 20) {
            dialog.error("车辆编号不能超过20位，请重新输入！");
        } else if (plate.length > 7) {
            dialog.error("车牌号不能超过7位，请重新输入！");
        } else if (frame.length > 17) {
            dialog.error("车架号不能超过17位，请重新输入！");
        } else {
            var url = "/admin.php/Car/updateCar";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id': id,
                'number': number,
                'plate': plate,
                'frame': frame
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
    }
};
$("#number").blur(function () {
    if ($("#number").val().length>20) {
        dialog.error("车辆编号不能超过20位，请重新输入！");
    }
});
$("#plate").blur(function () {
    if ($("#plate").val().length>7) {
        dialog.error("车牌号不能超过7位，请重新输入！");
    }
});
$("#frame").blur(function () {
    //input的type="datetime-local"填写完整时长度为16，其他情况都是0
    if ($("#frame").val().length>17) {
        dialog.error("车架号不能超过17位，请重新输入！");
    }
});