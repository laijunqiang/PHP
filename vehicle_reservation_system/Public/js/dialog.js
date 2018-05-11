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
            // yes - 确定按钮回调方法
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
    confirmGoods : function(message, id) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                var url = "/admin.php/Goods/deleteGoods";
                var data = {'id': id};//JSON格式
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
        });
    },
    // 用户确认弹出层
    confirmUser : function(message, id) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                var url = "/admin.php/User/deleteUser";
                var data = {'id': id};//JSON格式
                // 执行异步请求  $.post
                $.post(url, data, function (result) {
                    //result接受后台返回的数据
                    if (result.status == 0) {
                        //后台重新判断，多一层弹层
                        return dialog.error(result.message);
                    }
                    if (result.status == 1) {
                        return dialog.success(result.message, '/admin.php/User');
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
    },
    // 确认弹出层
    confirmRole : function(message, id) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                var url = "/admin.php/Role/deleteRole";
                var data = {'id': id};//JSON格式
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
        });
    },
    confirmLog : function(message, id) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                var url = "/admin.php/Log/deleteLog";
                var data = {'id': id};//JSON格式
                // 执行异步请求  $.post
                $.post(url, data, function (result) {
                    //result接受后台返回的数据
                    if (result.status == 0) {
                        //后台重新判断，多一层弹层
                        return dialog.error(result.message);
                    }
                    if (result.status == 1) {
                        return dialog.success(result.message, '/admin.php/Log');
                    }
                    //dataType规定预期的服务器响应的数据类型。
                }, 'JSON');
            }
        });
    },
    confirmDeleteLog : function(message, id) {
        if($(':checked').size() > 0) {
            var arr=[],i=0;
            $(".ck").each(function(){
                if($(this).is(':checked')){
                    arr[i]=$(this).val();
                    i++;
                }
            });
            //console.log(arr);
            layer.open({
                content : '是否确定删除？',
                icon:3,
                btn : ['是','否'],
                yes : function(){
                    var url = "/admin.php/Log/deleteAllLog";
                    var data = {'arr': arr};//JSON格式
                    // 执行异步请求  $.post
                    $.post(url, data, function (result) {
                        //result接受后台返回的数据
                        if (result.status == 0) {
                            //后台重新判断，多一层弹层
                            return dialog.error(result.message);
                        }
                        if (result.status == 1) {
                            return dialog.success(result.message, '/admin.php/Log');
                        }
                        //dataType规定预期的服务器响应的数据类型。
                    }, 'JSON');
                }
            });
    }else{
            return dialog.error('没有选择！');
        }
    }
};
