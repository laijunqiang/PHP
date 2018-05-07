/**
 * 权限业务类
 */
var role = {
    back: function () {
        window.location.href = "/admin.php/Role";
    },
    update: function () {
        // 获取修改订单页面中的信息
        var id = $('input[name="id"]').val();
        var name = $('input[name="name"]').val();
        var role = {
            order_manage: "0",
            driver_manage: "0",
            car_manage: "0",
            goods_manage: "0",
            user_manage: "0",
            role_manage: "0",
            log_manage: "0"
        };
        if($("input:checkbox[name='role']:checked").length==0){
            dialog.error("权限不能为空，请重新选择！");
        }else {
            $("input:checkbox[name='role']:checked").each(function () { // 遍历name=test的多选框
                //判断选中的是哪种权限
                if ($(this).val() == "order_manage") {
                    role.order_manage = 1;
                } else if ($(this).val() == "driver_manage") {
                    role.driver_manage = 1;
                } else if ($(this).val() == "car_manage") {
                    role.car_manage = 1;
                } else if ($(this).val() == "goods_manage") {
                    role.goods_manage = 1;
                } else if ($(this).val() == "user_manage") {
                    role.user_manage = 1;
                } else if ($(this).val() == "role_manage") {
                    role.role_manage = 1;
                } else {
                    role.log_manage = 1;
                }
            });
            //console.log(role);
            var url = "/admin.php/Role/updateRole";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id': id,
                'name': name,
                'order_manage': role.order_manage,
                'driver_manage': role.driver_manage,
                'car_manage': role.car_manage,
                'goods_manage': role.goods_manage,
                'user_manage': role.user_manage,
                'role_manage': role.role_manage,
                'log_manage': role.log_manage
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Role');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    add: function () {
        // 获取录入车辆页面中的信息
        var name = $('input[name="name"]').val();
        var role = {
            order_manage: "0",
            driver_manage: "0",
            car_manage: "0",
            goods_manage: "0",
            user_manage: "0",
            role_manage: "0",
            log_manage: "0"
        };
        if($("input:checkbox[name='role']:checked").length==0){
            dialog.error("权限不能为空，请重新选择！");
        }else {
            $("input:checkbox[name='role']:checked").each(function () { // 遍历name=test的多选框
                //判断选中的是哪种权限
                if ($(this).val() == "order_manage") {
                    role.order_manage = 1;
                } else if ($(this).val() == "driver_manage") {
                    role.driver_manage = 1;
                } else if ($(this).val() == "car_manage") {
                    role.car_manage = 1;
                } else if ($(this).val() == "goods_manage") {
                    role.goods_manage = 1;
                } else if ($(this).val() == "user_manage") {
                    role.user_manage = 1;
                } else if ($(this).val() == "role_manage") {
                    role.role_manage = 1;
                } else {
                    role.log_manage = 1;
                }
            });
            //console.log(role);
            if (!name) {
                dialog.error("角色名不能为空，请重新选择！");
            } else if (name.length > 20) {
                dialog.error("角色名不能超过20位，请重新输入！");
            } else {
                var url = "/admin.php/Role/addRole";
                // 发送给服务端的数据，相当于POST过去的数据
                var data = {
                    'name': name,
                    'order_manage': role.order_manage,
                    'driver_manage': role.driver_manage,
                    'car_manage': role.car_manage,
                    'goods_manage': role.goods_manage,
                    'user_manage': role.user_manage,
                    'role_manage': role.role_manage,
                    'log_manage': role.log_manage
                };//JSON格式
                // 执行异步请求  $.post
                $.post(url, data, function (result) {
                    //result接受后台返回的数据
                    if (result.status == 0) {
                        //后台重新判断，多一层弹层
                        return dialog.error(result.message);
                    }
                    if (result.status == 1) {
                        return dialog.success(result.message, '/admin.php/Role');
                    }
                    //dataType规定预期的服务器响应的数据类型。
                }, 'JSON');
            }
        }
    }
};
$("#name").blur(function () {
    if ($("#name").val().length>20) {
        dialog.error("角色名不能超过20位，请重新输入！");
    }
});
