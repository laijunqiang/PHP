<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>录入司机</title>
</head>
<body>
<div align="center">
    <h4>录入司机功能</h4>
<!--    <form action="/admin.php/Driver/upload" enctype="multipart/form-data" method="post" >
        <table>
            <tr>
                <td>司机账号：</td>
                <td><input type="text" placeholder="请输入司机账号" name="account" id="account"></td>
            </tr>
            <tr>
                <td>司机密码：</td>
                <td><input type="password" placeholder="请输入司机密码" name="password" id="password"></td>
            </tr>
            <tr>
                <td>真实姓名：</td>
                <td><input type="text" placeholder="请输入真实姓名" name="name" id="name"></td>
            </tr>
            <tr>
                <td>头像上传：</td>
                <td>
                    <input type="file" name="photo" />
                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="录入" ><input type="button" value="返回" onclick="driver.back()"/></td>
            </tr>
        </table>
    </form>-->
    <form id="art_form" action="/admin.php/Driver/upload" method="post" enctype="multipart/form-data">
        <input type="text" size="50" name="art_thumb" id="art_thumb">
        <input id="file_upload" name="file_upload" type="file">
        <p><img id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
        <input type="submit" value="提交">
    </form>
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/Admin/driver.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript">
        $("#file_upload").change(function () {
            uploadImage();
        });
        function uploadImage() {
//  判断是否有选择上传文件
            var imgPath = $("#file_upload").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
            // FormData对象，可以把所有表单元素的name与value组成一个queryString，提交到后台。只需要把 form 表单作为参数传入 FormData 构造函数即可
            var formData =new FormData($('#art_form')[0]);
            //console.log(formData);
            $.post({
                url: "/admin.php/Driver/upload",
                data: formData,
                cache: false,//上传文件不需要缓存
                contentType: false,// jQuery不要去设置Content-Type请求头
                processData: false,// jQuery不要去处理发送的数据
                success: function(data) {
                    $('#img1').attr('src',data);
                    $('#art_thumb').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    </script>
</div>
</body>
</html>