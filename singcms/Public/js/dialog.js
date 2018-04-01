var dialog = {
    //错误弹出层
    error: function (message) {
        layer.open({
            content: message,
/*类型：Number，默认：-1（信息框）/0（加载层）
信息框默认不显示图标。当你想显示图标时，默认皮肤可以传入0-6*/
            icon: 2,
            title: '错误提示'
        });
    },
    //成功弹出层
    success:function (message,url) {
        layer.open({
            content:message,
            icon:1,
            yes:function () {
                location.href=url;
            }
        });
    },
    //确认弹出层
    confirm:function (message,url) {
        layer.open({
            content:message,
            icon:3,
// 信息框模式时，btn默认是一个确认按钮，其它层类型则默认不显示，加载层和tips层则无效。
            bin:['是','否'],
            yes:function () {
                location.href=url;
            }
        });
    },
    //无需跳转到指定页面的确认弹出层
    toconfirm:function (message) {
        layer.open({
            content:message,
            icon:3,
            bin:['确定']
        })
    }
};