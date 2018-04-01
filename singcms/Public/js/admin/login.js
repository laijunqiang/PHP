/*
前端登录业务端
 */
var login ={
    check:function () {
        //获取登录页面的用户名和密码
        var username=$('input[name="username"]').val();
        var password=$('input[name="password"]').val();
//在login.js中怎么调用dialog.js的函数的？？？？？
        if (!username){
            dialog.error('用户名不能为空');
        }
        if (!password){
            dialog.error('密码不能为空');
        }
        //执行异步处理
        var url="/admin/login/check";
        var data={'username':username,'password':password};
        $.post(url,data,function (result) {
            if (result.status==0){
                return dialog.error(result.message);
            }
        },"json")
    }
};