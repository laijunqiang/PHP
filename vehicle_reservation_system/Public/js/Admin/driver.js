/**
 * 司机业务类
 */
var driver = {
    back: function () {
        window.location.href = "/admin.php/Driver";
    },
    update: function () {
        // 获取修改订单页面中的信息
        var id = $('input[name="id"]').val();
        var number = $('input[name="number"]').val();
        var account = $('input[name="account"]').val();
        var password = $('input[name="password"]').val();
        var name = $('input[name="name"]').val();

        if (!account || !password || !name) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空,请重新输入！');
        } else if (account.length > 11) {
            dialog.error("司机账号不能超过11位，请重新输入！");
        } else if (name.length > 20) {
            dialog.error("司机姓名不能超过20位，请重新输入！");
        } else {
            var formdata = new FormData();
            //$('#file')[0].files[0] 第一个上传图片
            formdata.append("file", $('#file')[0].files[0]);
            formdata.append('id',id);
            formdata.append('number',number);
            formdata.append('account', account);
            formdata.append('password', password);
            formdata.append('name', name);
            $.ajax({
                url: '/admin.php/Driver/updateDriver',
                type: 'POST',
                // 其中设置 dataType:"json",使得返回来的数据格式为json。如果不添加该条属性，则返回来的为字符串。
                // 字符串对象可以通过eval("("+data+")")方法转成json对象，但该方法不推荐使用。
                // 如果指定的是json，响应结果作为一个对象，在传递给成功处理函数之前使用jQuery.parseJSON进行解析。
                // 解析后的JSON对象可以通过该jqXHR对象的responseJSON属性获得的。
                dataType: "json",
                cache: false,
                data: formdata,
                timeout: 5000,
                //必须false才会避开jQuery对 formdata 的默认处理
                // XMLHttpRequest会对 formdata 进行正确的处理
                processData: false,
                //必须false才会自动加上正确的Content-Type
                contentType: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (result) {
                    if (result.status == 0) {
                        //后台重新判断，多一层弹层
                        return dialog.error(result.message);
                    }
                    if (result.status == 1) {
                        return dialog.success(result.message, '/admin.php/Driver');
                    }
                }
            })
        }
    },
    add: function () {
        // 获取录入司机页面中的信息
        var formdata = new FormData();
        var account = $("#account").val();
        var password = $("#password").val();
        var name = $("#name").val();
        if (!account || !password || !name) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空');
        } else if (account.length > 11) {
            dialog.error("司机账号不能超过11位，请重新输入！");
        } else if (name.length > 20) {
            dialog.error("真实姓名不能超过20位，请重新输入！");
        } else {
            //$('#file')[0].files[0] 第一个上传图片
            formdata.append("file", $('#file')[0].files[0]);
            formdata.append('account', account);
            formdata.append('password', password);
            formdata.append('name', name);
            $.ajax({
                url: '/admin.php/Driver/upload',
                type: 'POST',
                // 其中设置 dataType:"json",使得返回来的数据格式为json。如果不添加该条属性，则返回来的为字符串。
                // 字符串对象可以通过eval("("+data+")")方法转成json对象，但该方法不推荐使用。
                // 如果指定的是json，响应结果作为一个对象，在传递给成功处理函数之前使用jQuery.parseJSON进行解析。
                // 解析后的JSON对象可以通过该jqXHR对象的responseJSON属性获得的。
                dataType:"json",
                cache: false,
                data: formdata,
                timeout: 5000,
                //必须false才会避开jQuery对 formdata 的默认处理
                // XMLHttpRequest会对 formdata 进行正确的处理
                processData: false,
                //必须false才会自动加上正确的Content-Type
                contentType: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (result) {
                    console.log(result);
                    console.log(result.status);
                    console.log(result.message);
                    if (result.status == 0) {
                        //后台重新判断，多一层弹层
                        return dialog.error(result.message);
                    }
                    if (result.status == 1) {
                        return dialog.success(result.message, '/admin.php/Driver');
                    }
                }
            })
        }
    }
};

        /*if (!account || !password || !name) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('输入不能为空');
        } else if (account.length > 11) {
            dialog.error("司机账号不能超过11位，请重新输入！");
        } else if (name.length >20) {
            dialog.error("真实姓名不能超过20位，请重新输入！");
        }  else {
            var url = "/admin.php/Driver/addDriver";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'account': account,
                'password': password,
                'name': name,
                'images':images
            };//JSON格式
            // 执行异步请求  $.post
            $.post(url, data, function (result) {
                //result接受后台返回的数据
                if (result.status == 0) {
                    //后台重新判断，多一层弹层
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/admin.php/Driver');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};*/
$("#number").blur(function () {
    if ($("#number").val().length>8) {
        dialog.error("司机编号不能超过8位，请重新输入！");
    }
});
$("#account").blur(function () {
    if ($("#account").val().length>11) {
        dialog.error("司机账号不能超过11位，请重新输入！");
    }
});
$("#password").blur(function () {
    //input的type="datetime-local"填写完整时长度为16，其他情况都是0
    if ($("#password").val().length==0) {
        dialog.error("司机密码不能为空，请重新输入！");
    }
});
$("#name").blur(function () {
    if ($("#name").val().length>20) {
        dialog.error("司机姓名不能超过20位，请重新输入！");
    }
});
// 图片上传后预览功能
$("#file").change(function () {
    var objUrl = getObjectURL(this.files[0]);
    if (objUrl) {
        // 在这里修改图片的地址属性
        $("#img0").attr("src", objUrl);
    }

    //建立一個可存取到該file的url
    function getObjectURL(file) {
        var url = null;
        // 下面函数执行的效果是一样的，只是需要针对不同的浏览器执行不同的 js 函数而已
        if (window.createObjectURL != undefined) { // basic
            url = window.createObjectURL(file);
        } else if (window.URL != undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file);
        } else if (window.webkitURL != undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file);
        }
        return url;
    }
});