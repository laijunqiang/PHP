/**
 * 个人中心业务类
 */
var personalCenter = {
    update : function() {
        // 获取登录页面中的用户名 和 密码
        var name = $.trim($('input[name="name"]').val());
        var phone =$.trim($('input[name="phone"]').val());
        var plate =$.trim($('input[name="plate"]').val());
        var company =$.trim($('input[name="company"]').val());

        if(!name||!phone||!plate||!company) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空，请重新输入！');
        }else if (name.length > 20) {
            dialog.error("真实姓名不能超过20位，请重新输入！");
        } else if (phone.length != 11) {
            dialog.error("联系方式为11位，请重新输入！");
        } else if (plate.length !=7) {
            dialog.error("车牌号为7位，请重新输入！");
        } else if (company.length > 20) {
            dialog.error("公司名称不能超过20位，请重新输入！");
        } else {
            var url = "../PersonalCenter/update";
            var data = {
                'name': name,
                'phone': phone,
                'plate':plate,
                'company':company
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '../PersonalCenter/index');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};


