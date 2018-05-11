/**
 * 前端登录业务类
 * @author singwa
 */
//定义login对象，check属性是一个函数function
var login = {
    check : function() {
        // 获取登录页面中的用户名 和 密码
        var account = $.trim($('input[name="account"]').val());
        var password = $.trim($('input[name="password"]').val());
        //console.log(typeof(password));  使用 typeof 属性，可以返回变量的类型，typeof 语法中的圆括号是可选项。
        //var password=$.trim(password);   $.trim() 函数用于去除字符串两端的空白字符。
        // 在JS的世界里， 0、-0、null、""、false、undefined 或 NaN，这些都可以自动转化为布尔的 false
        if(!account||!password) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('账号或密码不能为空');
        }else if(account.length>11){
            dialog.error("司机账号不能超过11位，请重新输入！")
        }else{
            var url = "/index.php/Home/Login/check";
            var data = {'account': account, 'password': password};//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/index.php/Home/Index');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};
$('#img').click(function () {
    if ($('#input').attr("type")== "password") {
        $('#input').attr('type','text');
        $('#img').attr('src','/Public/image/invisible.png');
    }else {
        $('#input').attr('type','password');
        $('#img').attr('src','/Public/image/visible.png');
    }
});
$('#account').blur(function () {
    if ($('#account').val().length>11){
        dialog.error("司机账号不能超过11位，请重新输入！")
    }
});