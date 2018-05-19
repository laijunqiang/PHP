//油品类型
$('select[name="oil_type"]').change(function () {
    var type=$('select[name="oil_type"] option:selected').val();

    if (type=="") {
        dialog.error("油品类型不能为空，请重新选择！")
    }else{
        window.location.href = "/index.php/Home/Index/selectType?type=" + type;
    }
});
//油品名称
$('select[name="oil_name"]').change(function () {
    var name=$('select[name="oil_name"] option:selected').val();
    var type=$('select[name="oil_type"] option:selected').val();
    window.location.href = "/index.php/Home/Index/selectName?name=" + name+"&type="+type;
});