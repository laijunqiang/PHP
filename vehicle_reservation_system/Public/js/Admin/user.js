/**
 * 用户业务类
 */
var user = {
    back: function () {
        window.location.href = "../User/index";
    },
    updateBack:function(){
        window.location.href = "../../../User/index";
    },
    update: function () {
        var id=$('input[name="id"]').val();
        var account=$.trim($('input[name="account"]').val());
        var password=$.trim($('input[name="password"]').val());
        var name=$.trim($('input[name="name"]').val());
        var role=$('select[name="role"] option:selected').val();
        if (!name||!password||!account) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空，请重新输入！');
        } else if (account.length>11){
            dialog.error('用户账号不能超过11位，请重新输入！');
        } else if (password.length==0){
            dialog.error('用户密码不能为空，请重新输入！');
        } else if (name.length>20){
            dialog.error('用户名不能超过20位，请重新输入！');
        } else {
            var url = "../../../User/updateUser";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'id': id,
                'account':account,
                'password':password,
                'name':name,
                'role_id':role
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '../../../User/index');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    },
    add: function () {
        var account=$.trim($('input[name="account"]').val());
        var password=$.trim($('input[name="password"]').val());
        var name=$.trim($('input[name="name"]').val());
        var role=$('select[name="role"] option:selected').val();
        if (!name||!password||!account) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空，请重新输入！');
        } else if (account.length>11){
            dialog.error('用户账号不能超过11位，请重新输入！');
        } else if (password.length==0){
            dialog.error('用户密码不能为空，请重新输入！');
        } else if (name.length>20){
            dialog.error('用户名不能超过20位，请重新输入！');
        } else {
            var url = "../User/addUser";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'account':account,
                'password':password,
                'name':name,
                'role_id':role
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '../User/index');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};
$("#account").blur(function () {
    if ($.trim($("#account").val()).length>11) {
        dialog.error("用户账号不能超过11位，请重新输入！");
    }
});
$("#password").blur(function () {
    if ($("#password").val().length==0) {
        dialog.error("用户密码不能为空，请重新输入！");
    }
});
$("#name").blur(function () {
    if ($.trim($("#name").val()).length>20) {
        dialog.error("用户名不能超过20位，请重新输入！");
    }
});