/**
 * 前端登录业务类
 * @author singwa
 */
//定义login对象，check属性是一个函数function
var login = {
    check : function() {
        // 获取登录页面中的用户名 和 密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();

        if(!username) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('用户名不能为空');
        }
        if(!password) {
            dialog.error('密码不能为空');
        }

        var url = "/admin.php?c=login&a=check";
        var data = {'username':username,'password':password};//JSON格式
        // 执行异步请求  $.post
        $.post(url,data,function(result){
            //result接受后台返回的数据
            if(result.status == 0) {
                //后台重新判断，多一层弹层
                return dialog.error(result.message);
            }
            if(result.status == 1) {
                return dialog.success(result.message, '/admin.php?c=index');
            }
            //dataType规定预期的服务器响应的数据类型。
        },'JSON');

    }
};