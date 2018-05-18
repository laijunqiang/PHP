//油品类型
$('select[name="oil_type"]').change(function () {
    var type=$('select[name="oil_type"] option:selected').val();
    //不需要重新渲染，直接AJAX操作
    if (type=="") {
        dialog.error("油品类型不能为空，请重新选择！")
    }else{
        window.location.href = "/index.php/Home/Index/select?status=" + status;
    }
});