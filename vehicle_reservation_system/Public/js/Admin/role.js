/**
 * 权限业务类
 */
var role = {
    back: function () {
        window.location.href = "../Role/index";
    },
    updateBack:function(){
        window.location.href = "../../../Role/index";
    },
    update: function () {
        var id =$('input[name=id]').val();
        var name = $('input[name="name"]').val();
        var permission=new Array();
        var i=0;
        if($("input:checkbox[name='role']:checked").length==0){
            dialog.error("权限不能为空，请重新选择！");
        }else {
            $("input:checkbox[name='role']:checked").each(function () {
                permission[i++]=$(this).val();
            });
            if (!name) {
                dialog.error("角色名不能为空，请重新选择！");
            } else if (name.length > 20) {
                dialog.error("角色名不能超过20位，请重新输入！");
            } else {
                var url = "../../../Role/updateRole";
                // 发送给服务端的数据，相当于POST过去的数据
                var data = {
                    'id':id,
                    'name': name,
                    'permission': permission
                };//JSON格式
                // 执行异步请求  $.post
                $.post(url, data, function (result) {
                    //result接受后台返回的数据
                    if (result.status == 0) {
                        //后台重新判断，多一层弹层
                        return dialog.error(result.message);
                    }
                    if (result.status == 1) {
                        return dialog.success(result.message, '../../../Role/index');
                    }
                    //dataType规定预期的服务器响应的数据类型。
                }, 'JSON');
            }
        }
    },
    add: function () {

        var name = $('input[name="name"]').val();
        var permission=new Array();
        var i=0;
        if($("input:checkbox[name='role']:checked").length==0){
            dialog.error("权限不能为空，请重新选择！");
        }else {
            $("input:checkbox[name='role']:checked").each(function () {
                permission[i++]=$(this).val();
            });
            if (!name) {
                dialog.error("角色名不能为空，请重新选择！");
            } else if (name.length > 20) {
                dialog.error("角色名不能超过20位，请重新输入！");
            } else {
                var url = "../Role/addRole";
                // 发送给服务端的数据，相当于POST过去的数据
                var data = {
                    'name': name,
                    'permission': permission
                };//JSON格式
                // 执行异步请求  $.post
                $.post(url, data, function (result) {
                    //result接受后台返回的数据
                    if (result.status == 0) {
                        //后台重新判断，多一层弹层
                        return dialog.error(result.message);
                    }
                    if (result.status == 1) {
                        return dialog.success(result.message, '../Role/index');
                    }
                    //dataType规定预期的服务器响应的数据类型。
                }, 'JSON');
            }
        }
    }
};
$("#name").blur(function () {
    if ($("#name").val().length>20) {
        dialog.error("角色名不能超过20位，请重新输入！");
    }
});
