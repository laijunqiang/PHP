/*
前端登录业务端
 */
var login ={
    check:function () {
        //获取登录页面的用户名和密码
        var username=$('input[name="username"]').val();
        var password=$('input[name="password"]').val();
/*在login.js中怎么调用dialog.js的函数的？？？？？
因为在index.html中嵌入了login.js和dialog.js，相当于在同一文件中
如果删除其中一个，会有not defined错误*/
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
            if (result.status==1){
                return dialog.success(result.message,'/admin/index');
            }
        },"json")
    }
};