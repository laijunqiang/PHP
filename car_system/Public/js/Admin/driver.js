/**
 * 司机业务类
 */
var driver = {
    back: function () {
        window.location.href="/admin.php/Driver";
    },
    update:function () {
        // 获取修改订单页面中的信息
        var id=$('input[name="id"]').val();
        var number=$('input[name="number"]').val();
        var account = $('input[name="account"]').val();
        var password=$('input[name="password"]').val();
        var name=$('input[name="name"]').val();
        var image = $('input[name="image"]').val();

        if (number.length >8) {
            dialog.error("司机编号不能超过8位，请重新输入！");
        } else if(account.length>11){
            dialog.error("司机账号不能超过11位，请重新输入！");
        } else if (password.length==0) {
            dialog.error("司机密码不能为空，请重新输入！");
        } else if (name.length > 20) {
            dialog.error("司机姓名不能超过20位，请重新输入！");
        } else {
            var url = "/admin.php/Driver/updateDriver";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id':id,
                'number':number,
                'account':account,
                'password':password,
                'name':name,
                'image':image
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Driver');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    add: function () {
        // 获取录入车辆页面中的信息
        var account = $('input[name="account"]').val();
        var password = $('input[name="password"]').val();
        var name = $('input[name="name"]').val();
        var image = $('input[name="image"]').val();

        if (!account || !password || !name) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空');
        } else if (account.length > 11) {
            dialog.error("司机账号不能超过11位，请重新输入！");
        } else if (name.length >20) {
            dialog.error("真实姓名不能超过20位，请重新输入！");
        }  else {
            var url = "/admin.php/Driver/addDriver";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'account': account,
                'password': password,
                'name': name,
                'image':image
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Driver');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};
$("#number").blur(function () {
    if ($("#number").val().length>8) {
        dialog.error("司机编号不能超过8位，请重新输入！");
    }
});
$("#account").blur(function () {
    if ($("#account").val().length>11) {
        dialog.error("司机账号不能超过11位，请重新输入！");
    }
});
$("#password").blur(function () {
    //input的type="datetime-local"填写完整时长度为16，其他情况都是0
    if ($("#password").val().length==0) {
        dialog.error("司机密码不能为空，请重新输入！");
    }
});
$("#name").blur(function () {
    if ($("#name").val().length>20) {
        dialog.error("司机姓名不能超过20位，请重新输入！");
    }
});