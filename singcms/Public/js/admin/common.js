/**
 * 添加按钮操作
 */
$("#button-add").click(function(){
    var url = SCOPE.add_url;
    window.location.href=url;
});

/**
 * 提交form表单操作
 */
$("#singcms-button-submit").click(function(){
/*序列化表格元素 (类似 '.serialize()' 方法) 返回 JSON 数据结构数据。
'''注意'''，此方法返回的是JSON对象而非JSON字符串。
返回的JSON对象是由一个对象数组组成的，其中每个对象包含一个或两个名值对——name参数和value参数（如果value不为空的话）。*/
    var data = $("#singcms-form").serializeArray();
    postData = {};  //创建一个数组
    //$(data).each(function(i))与$.each(data,function(i))功能相同
    $.each(data,function(i){
       postData[this.name] = this.value;
    });

    // 将获取到的数据post给服务器
    url = SCOPE.save_url;
    jump_url = SCOPE.jump_url;
    $.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            return dialog.success(result.message,jump_url);
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message);
        }
    },"JSON");
});
/*
编辑模型
 */
$('.singcms-table #singcms-edit').on('click',function(){
    // 获取attr-id的属性值
    var id = $(this).attr('attr-id');
    var url = SCOPE.edit_url + '&id='+id;
    window.location.href=url;
});


/**
 * 删除操作JS
 */
$('.singcms-table #singcms-delete').on('click',function(){
    var id = $(this).attr('attr-id');
    var a = $(this).attr("attr-a");
    var message = $(this).attr("attr-message");
    var url = SCOPE.set_status_url;

    data = {};
    data['id'] = id;
    data['status'] = -1;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定"+message,
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },

    });

});
function todelete(url, data) {
    $.post(
        url,
        data,
        function(s){
            if(s.status == 1) {
                return dialog.success(s.message,'');
                // 跳转到相关页面
            }else {
                return dialog.error(s.message);
            }
        }
    ,"JSON");
}

/**
 * 排序操作 
 */
$('#button-listorder').click(function() {
    // 获取 listorder内容
    var data = $("#singcms-listorder").serializeArray();
    postData = {};
    $(data).each(function(i){
       postData[this.name] = this.value;
    });
    console.log(data);
    var url = SCOPE.listorder_url;
    $.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            return dialog.success(result.message,result['data']['jump_url']);
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message,result['data']['jump_url']);
        }
    },"JSON");
});

/**
 * 修改状态
 */
$('.singcms-table #singcms-on-off').on('click', function(){

    var id = $(this).attr('attr-id');
    var status = $(this).attr("attr-status");
    var url = SCOPE.set_status_url;

    data = {};
    data['id'] = id;
    data['status'] = status;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定更改状态",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },

    });

});

/**
 * 推送JS相关
 */
$("#singcms-push").click(function(){
    var id = $("#select-push").val();
    if(id==0) {
        return dialog.error("请选择推荐位");
    }
    push = {};
    postData = {};
    $("input[name='pushcheck']:checked").each(function(i){
        push[i] = $(this).val();
    });

    postData['push'] = push;
    postData['position_id']  =  id;
    //console.log(postData);return;
    var url = SCOPE.push_url;
    $.post(url, postData, function(result){
        if(result.status == 1) {
            // TODO
            return dialog.success(result.message,result['data']['jump_url']);
        }
        if(result.status == 0) {
            // TODO
            return dialog.error(result.message);
        }
    },"json");

});