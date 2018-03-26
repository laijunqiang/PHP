<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../Index.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息</title>
</head>
<body>
<h2 align="center">学生信息管理</h2>
<!--multipart/form-data:不对字符编码。 在使用包含文件上传控件的表单时，必须使用该值。-->
<!--上传之后的文件类型 string(24) "application/octet-stream"-->
<form enctype="multipart/form-data" action="upload.php" method="post">
    <table align="center">
        <tr>
            <td><input type="file" name="myfile"></td>
            <td><input type="submit" value="上传表格" /></td>
        </tr>
    </table>
</form>
<h3 align="center">
    <a href="../html/studentInput.html" >录入</a>
</h3>
<div align="center">
    <form action="studentQuery.php" method="post">
        <input type="text" name="query" size="25" placeholder="请输入您要查询的学号或姓名"/><button type="submit" >查询</button>
    </form>
</div>
<table border="1" align="center">
    <tr>
        <td>ID</td>
        <td>学号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>年龄</td>
        <td>创建时间</td>
        <td>更改时间</td>
        <td>管理</td>
    </tr>
    <?php
    include "class.php";
    $sql=new Sql();
    $sql->studentSelect();
    $result=$sql->result;
    while(list($id,$number,$name,$sex,$age,$create_time,$update_time)=$result->fetch_row())
    {
        $sex=$sql->sexChange($sex);
        $age=$sql->ageChange($age);
        echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$name</td>
                <td>$sex</td>
                <td>$age</td>
                <td>$create_time</td>
                <td>$update_time</td>
                <td>
                <a href='studentEditPage.php?id=$id' >编辑</a>
                <a href=studentDelete.php?id=$id onclick=\"if (confirm('确实要删除数据吗？')) return true; else return false;\">删除 </a>
                </td>
            </tr>";
    }
    ?>
</table>
<br />
<div align="center">
    <a href="main.php"><input type="button" value="返回主功能页面"/></a>
</div>
</body>
</html>