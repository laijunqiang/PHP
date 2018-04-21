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
        var driver_id = $('input[name="driver_id"]').val();
        var driver_name = $('input[name="driver_name"]').val();
        var role={
            order_manage:"0",
            driver_manage:"0",
            car_manage:"0",
            role_manage:"0",
            log_manage:"0"
        };
        $("input:checkbox[name='role']:checked").each(function() { // 遍历name=test的多选框
            //判断选中的是哪种权限
            if($(this).val() == "order_manage") {
                role.order_manage = 1;
            }else if ($(this).val() == "driver_manage"){
                role.driver_manage =1;
            }else if ($(this).val() == "car_manage"){
                role.car_manage=1;
            }else if ($(this).val() == "role_manage"){
                role.role_manage=1;
            }else{
                role.log_manage=1;
            }
        });
        //console.log(role);

        var url = "/admin.php/Role/updateRole";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id': id,
                'driver_id': driver_id,
                'driver_name': driver_name,
                'order_manage':role.order_manage,
                'driver_manage':role.driver_manage,
                'car_manage':role.car_manage,
                'role_manage':role.role_manage,
                'log_manage':role.log_manage
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
    },
    add: function () {
        // 获取录入车辆页面中的信息
        var driver_name = $('select').val();
        var role={
            order_manage:"0",
            driver_manage:"0",
            car_manage:"0",
            role_manage:"0",
            log_manage:"0"
        };
        $("input:checkbox[name='role']:checked").each(function() { // 遍历name=test的多选框
            //判断选中的是哪种权限
            if($(this).val() == "order_manage") {
                role.order_manage = 1;
            }else if ($(this).val() == "driver_manage"){
                role.driver_manage =1;
            }else if ($(this).val() == "car_manage"){
                role.car_manage=1;
            }else if ($(this).val() == "role_manage"){
                role.role_manage=1;
            }else{
                role.log_manage=1;
            }
        });
        //console.log(role);
        var url = "/admin.php/Role/addRole";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {
            'driver_name': driver_name,
            'order_manage':role.order_manage,
            'driver_manage':role.driver_manage,
            'car_manage':role.car_manage,
            'role_manage':role.role_manage,
            'log_manage':role.log_manage
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
};