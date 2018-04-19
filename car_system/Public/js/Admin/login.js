/**
 * 后端登录业务类
 */
//定义login对象，check属性是一个函数function
var login = {
    hideShowPsw :function () {
        //console.log($('#input').attr("type"));
        //jq的attr()获取并修改属性值
        if ($('#input').attr("type")== "password") {
            $('input[type="password"]').attr('type','text');
            $('#img').attr('src','/Public/image/invisible.png');
        }else {
            $('#input').attr('type','password');
            $('#img').attr('src','/Public/image/visible.png');
        }
    },
    check : function() {
        // 获取登录页面中的用户名 和 密码
        var account = $('input[name="account"]').val();
        var password = $('input[name="password"]').val();

        if(!account||!password) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('账号或密码不能为空');
        }else {
            var url = "/admin.php/Login/check";
            var data = {'account': account, 'password': password};//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Index');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};