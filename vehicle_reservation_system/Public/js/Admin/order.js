/**
 * 订单业务类
 */
var order = {
    add: function () {
        // 获取生成订单页面中的信息
        var oil_type = $('select[name="oil_type"] option:selected').val();
        var oil_name = $('select[name="oil_name"] option:selected').val();
        var driver_name =$('select[name="driver_name"] option:selected').val();
        /*console.log(oil_type);
        console.log(oil_name);*/
        if (!oil_type || !oil_name || !driver_name) {
            //在本文件中虽然没有调用，但是在index.html中将dialog.js和login.js加载在一起
            dialog.error('选择不能为空，请重新输入！');
        } else {
            var url = "/admin.php/Order/addOrder";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'oil_type': oil_type,
                'oil_name': oil_name,
                'driver_name':driver_name
            };//JSON格式
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
    },
    back: function () {
        window.location.href="/admin.php/Order";
    },
    //下移功能
    down:function (id) {
        //alert(id);
        var url = "/admin.php/Order/down";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {
            'id': id
        };//JSON格式
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
    },
    //上移功能
    up:function (id) {
        //alert(id);
        var url = "/admin.php/Order/up";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {
            'id': id
        };//JSON格式
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
    },
    //装车完成功能
    over:function (id) {
        //alert(id);
        var url = "/admin.php/Order/over";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {
            'id': id
        };//JSON格式
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

//清空
$('input[name="empty"]').click(function () {
    /*当调用.attr("value")在文本框中，它将返回在标记中设置的值
    value属性描述默认值对于元素，而不是当前值。当前值是通过value属性(JQuery)可以访问的内容。val()。*/
    $('input[name="searchTime"]').val("");
    //将状态下拉框清空，选择第一个option
    $(".select").val("");
});

// 订单状态查询，ajax无法跳转页面，除非有window.location.href
$('.select').change(function () {
    // jquery获取select选中的值
    var status=$(".select option:selected").val();
    //console.log(status);//value为空串，value!=null
    window.location.href = "/admin.php/Order/select?status=" + status;
});
//复合查询
$('.search').click(function () {
    var status=$(".select option:selected").val();
    var searchTime=$('input[name="searchTime"]').val();
    window.location.href = "/admin.php/Order/search?status=" + status+"&searchTime="+searchTime;
});

//生成excel文件
$('#excel').click(function () {
    var status=$(".select option:selected").val();
    var searchTime=$("#searchTime").val();
    //数据量大，不能直接生成
    if (status==""&&searchTime==""){
        dialog.error("条件不能为空，请重新输入！");
    }else {
        window.location.href = "/admin.php/Order/getExcel?status=" + status + "&searchTime=" + searchTime;
    }
});

//油品类型
$('select[name="oil_type"]').change(function () {
    var type=$('select[name="oil_type"] option:selected').val();
    //不需要重新渲染，直接AJAX操作
    if (type=="") {
        dialog.error("油品类型不能为空，请重新选择！")
    }else{
        //empty()是只移除了 指定元素中的所有子节点
        $('select[name="oil_name"]').empty();
        var url = "/admin.php/Order/getOilName";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {
            'type':type
        };//JSON格式
        // 执行异步请求  $.post
        $.post(url, data, function (result) {
            //console.log(result);
            $.each(result,function (key, val) {
                //console.log(key);  0
                //console.log(val);  二甲苯
                //需要用到 +连接符（解析val）
                $('select[name="oil_name"]').append("<option value="+val+">" + val + "</option>");
            })
            //dataType规定预期的服务器响应的数据类型。
        }, 'JSON');
    }
});

//暂停全部车辆排队
$('#stop').click(function () {
    //alert($(this).html());//html() 方法设置或返回被选元素的文本内容（包括html标记）
    var content=$(this).html();
    if (content=="暂停全部车辆排队"){
        window.location.href = "/admin.php/Order/stop";
    }else {
        window.location.href="/admin.php/Order/start"
    }

});
