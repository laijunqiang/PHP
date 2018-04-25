/**
 * 个人中心业务类
 */
var personalCenter = {
    back: function () {
        window.location.href = "/index.php/Home/PersonalCenter";
    },
    setPassword : function() {
        // 获取登录页面中的用户名 和 密码
        var account = $('input[name="account"]').val();
        var password = $('input[name="password"]').val();

        if(!password) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('密码不能为空，请重新输入！');
        }else {
            var url = "/index.php/Home/PersonalCenter/setPassword";
            var data = {'account': account, 'password': password};//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/index.php/Home/PersonalCenter');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};

$("#password").blur(function () {
    if ($("#password").val()=='') {
        dialog.error("密码不能为空，请重新输入！");
    }
});

