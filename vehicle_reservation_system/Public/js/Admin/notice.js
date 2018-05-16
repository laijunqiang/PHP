/**
 * 公告业务类
 */
var notice = {
    back: function () {
        window.location.href = "/admin.php/Notice";
    },
    update: function () {
        // 获取修改订单页面中的信息
        var id = $('input[name="id"]').val();
        var number = $('input[name="number"]').val();
        var content=$.trim($('textarea[name="content"]').val());

        if (!content) {
            dialog.error("公告内容不能为空，请重新输入！");
        }else {
            var url = "/admin.php/Notice/updateNotice";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id': id,
                'number': number,
                'content':content
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Notice');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    add: function () {
        // 获取录入车辆页面中的信息
        var content=$.trim($('textarea[name="content"]').val());

        if (!content) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空，请重新输入！');
        } else {
            var url = "/admin.php/Notice/addNotice";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'content':content
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Notice');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    // 置顶功能
    top: function (id) {
        //console.log(id);
        var url = "/admin.php/Notice/top";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {
            'id': id
        };//JSON格式
        // 执行异步请求  $.post
        $.post(url, data, function (result) {
            //result接受后台返回的数据
            if (result.status == 0) {
                //后台重新判断，多一层弹层
                return dialog.error(result.message);
            }
            if (result.status == 1) {
                return dialog.success(result.message, '/admin.php/Notice');
            }
            //dataType规定预期的服务器响应的数据类型。
        }, 'JSON');
    },
    //取消置顶
    untop: function (id) {
        //console.log(id);
        var url = "/admin.php/Notice/untop";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {
            'id': id
        };//JSON格式
        // 执行异步请求  $.post
        $.post(url, data, function (result) {
            //result接受后台返回的数据
            if (result.status == 0) {
                //后台重新判断，多一层弹层
                return dialog.error(result.message);
            }
            if (result.status == 1) {
                return dialog.success(result.message, '/admin.php/Notice');
            }
            //dataType规定预期的服务器响应的数据类型。
        }, 'JSON');
    }
};