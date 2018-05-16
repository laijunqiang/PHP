<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改公告信息</title>
</head>
<body>
<div align="center">
    <table>
        <tr>
            <td>公告ID：</td>
            <td><input type="text" value="<?php echo ($ret["id"]); ?>" name="id" disabled="disabled"></td>
        </tr>
        <tr>
            <td>公告编号：</td>
            <td><input type="text" value="<?php echo ($ret["number"]); ?>" name="number" id="number" disabled="disabled"></td>
        </tr>
        <tr>
            <td>公告内容：</td>
            <td>
                <textarea name="content" rows="10" cols="30" placeholder="请输入公告内容"><?php echo ($ret["content"]); ?></textarea>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <button onclick="notice.update()">修改</button>
                <button onclick="notice.back()">返回</button>
            </td>
        </tr>
    </table>
</div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Admin/notice.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>