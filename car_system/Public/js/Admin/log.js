// 全选
$('#all').click(function() {
    if($(this).is(':checked')) {
        // attr方法会存在重置后，无法重选等问题，用prop方法代替
        $(':checkbox').prop('checked', true);
    } else {
        $(':checkbox').removeAttr('checked');
    }
});

$('.ck').click(function(){
    //checked属性在页面初始化的时候已经初始化好了，不会随着状态的改变而改变。
    //alert($(this).attr("checked")=="checked");
/*  1. 使用is()
    例句: $(this).is(":checked");// 注意是':checked'，有冒号的！
    2. 使用prop()方法，JQ1.6之后，可以通过attr方法去获得属性，通过prop方法去获得特性，属性指的是“name，id”等等，特性指的是“selectedIndex, tagName, nodeName”等等。
    例句: $(this).prop('checked');*/
    if($(this).is(':checked')){
        var len=0;
        // alert(len);
        $(".ck").each(function(){
            if($(this).is(':checked')){
                len++;
            }
        });
        if(len==$('.ck').length){
            $("#all").prop("checked","checked");
        }
    }else{
        $("#all").prop("checked",null);
    }
});
