var dialog = {
    // 错误弹出层
    //定义dialog对象，error属性是一个函数function
    error: function(message) {
        layer.open({
            content:message,
            icon:2,
            title : '错误提示'
        });
    },

    //成功弹出层
    success : function(message,url) {
        layer.open({
            content : message,
            icon : 1,
            yes : function(){
                location.href=url;
            }

        });
    },

    // 确认弹出层
    confirmCar : function(message, id) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                var url = "/admin.php/Car/deleteCar";
                var data = {'id': id};//JSON格式
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
        });
    },
    // 确认弹出层
    confirmOrder : function(message, id) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                var url = "/admin.php/Order/deleteOrder";
                var data = {'id': id};//JSON格式
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
        });
    },
    // 确认弹出层
    confirmDriver : function(message, id) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                var url = "/admin.php/Driver/deleteDriver";
                var data = {'id': id};//JSON格式
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
        });
    },
    // 确认接单弹出层
    confirm : function(message, url) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                location.href=url;
            }
        });
    }
};

