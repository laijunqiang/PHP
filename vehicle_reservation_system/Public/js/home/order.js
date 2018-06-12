/**
 * 订单业务类
 */
var order = {
    commit:function () {
        // 获取修改订单页面中的信息，都是字符串数据
        var name=$('input[name="name"]').val();
        var phone=$('input[name="phone"]').val();
        var oil_type=$('select[name="oil_type"]').val();
        var oil_name=$('select[name="oil_name"]').val();
        var province=$('select[name="province"]').val();
        var city=$('select[name="city"]').val();
        var plate = $('input[name="plate"]').val();
        var company = $.trim($('input[name="company"]').val());

        if (!name||!phone||!oil_type||!oil_name||!province||!city||!plate||!company){
            dialog.error("输入不能为空，请重新输入！");
        } else if (name.length > 20) {
            dialog.error("真实姓名不能超过20位，请重新输入！");
        } else if (phone.length != 11) {
            dialog.error("联系方式为11位，请重新输入！");
        } else if (plate.length !=5) {
            dialog.error("车牌号为5位，请重新输入！");
        } else if (company.length > 20) {
            dialog.error("公司名称不能超过20位，请重新输入！");
        } else {
            var url = "../Order/addOrder";
            // 发送给服务端的数据，相当于POST过去的数据
            var data = {
                'name':name,
                'phone':phone,
                'oil_type': oil_type,
                'oil_name': oil_name,
                'province': province,
                'city': city,
                'plate': plate,
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
                    return dialog.success(result.message, '../Order/record');
                }
                //dataType规定预期的服务器响应的数据类型。
            }, 'JSON');
        }
    }
};
//油品类型
$('select[name="oil_type"]').change(function () {
    var type = $('select[name="oil_type"] option:selected').val();
    //不需要重新渲染，直接AJAX操作

    //empty()是只移除了 指定元素中的所有子节点
    $('select[name="oil_name"]').empty();
    var url = "./Order/getOilName";
    // 发送给服务端的数据，相当于POST过去的数据
    var data = {
        'type': type
    };//JSON格式
    // 执行异步请求  $.post
    $.post(url, data, function (result) {
        //console.log(result);
        $.each(result, function (key, val) {
            //console.log(key);  0
            //console.log(val);  二甲苯
            //需要用到 +连接符（解析val）
            $('select[name="oil_name"]').append("<option value=" + val + ">" + val + "</option>");
        })
        //dataType规定预期的服务器响应的数据类型。
    }, 'JSON');
});

//车牌号
var vm = new Vue({
    el: '#app',
    data:{
        provinces:['京', '津', '沪', '渝','冀', '豫','滇','辽','黑','湘','皖','鲁','新','苏','浙','赣','鄂','桂','甘','晋','蒙','陕','吉','闽','黔','粤','青','藏','蜀','宁','琼','台','港','澳'],
        citys:[],
        selectProvince:'京',
        selectCity:'A',
        selectPlate:""
    },
    created: function () {
/*        在vm这种情况下表示viewmodel。
        这是一个捷径，所以不要写作，this.someMethod()你可以使用vm.someMethod()。
        当你使用Controller As语法时很常见，所以你不要使用$scope“意外”。
        此外，该this关键字可能会混乱使用，因为它可能会根据使用的地方引用不同的东西。*/
        var vm = this;
        // `this` 指向 vm 实例
        for (var i=0;i<26;i++){
            var letter=String.fromCharCode(65+i);
            this.citys.push(letter);
        }
        var url = "../Order/driverInfo";
        // 发送给服务端的数据，相当于POST过去的数据
        var data = {};//JSON格式
        // 执行异步请求  $.post
        $.post(url, data, function (result) {
            //判断车牌号是否为空
            if (result.data[0]!=""&&result.data[1]!=""&&result.data[2]!=""){
                vm.selectProvince = result.data[0];
                vm.selectCity = result.data[1];
                vm.selectPlate = result.data[2];
            }
            //dataType规定预期的服务器响应的数据类型。
        }, 'JSON');
        console.log(vm.selectPlate);
        console.log(this.selectPlate);
    }
});

