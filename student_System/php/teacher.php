<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../index.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>任课老师信息</title>
</head>
<body>
<h2 align="center">任课老师信息管理</h2>
<h3 align="center"><a href="../html/teacherInput.html" >录入</a></h3>
<table border="1" align="center">
    <tr>
        <td>ID</td>
        <td>账号</td>
        <td>密码</td>
        <td>姓名</td>
        <td>创建时间</td>
        <td>更改时间</td>
        <td>管理</td>
    </tr>
    <?php
    include "class.php";
    $sql=new Sql();
    $sql->teacherSelect();
    $result=$sql->result;
    while(list($id,$number,$password,$name,$create_time,$update_time)=$result->fetch_row())
    {
        echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$password</td>
                <td>$name</td>
                <td>$create_time</td>
                <td>$update_time</td>
                <td>
                <a href=\"teacherEditPage.php?id=$id\" >编辑</a>
                <a href=teacherDelete.php?id=$id onclick=\"if (confirm('确实要删除数据吗？')) return true; else return false;\">删除 </a>
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