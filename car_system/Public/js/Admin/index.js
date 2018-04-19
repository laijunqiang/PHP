/**
 * 后端登录业务类
 */
//定义index对象
var index = {
    delete : function(id) {
        // alert(id);
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
};