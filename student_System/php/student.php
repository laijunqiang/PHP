<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../html/index.html'</script>";
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
<form enctype="multipart/form-data" action="upload.php" method="post">
    <table align="center">
        <tr>
            <td><input type="file" name="myfile"></td>
            <td><input type="submit" value="上传文件" /></td>
        </tr>
    </table>
</form>
<h3 align="center"><a href="../html/stuLuru.html" >录入</a></h3>
<div align="center">
    <form action="stuSelect.php" method="post">
        <input type="text" name="chaxun" /><button type="submit" >查询</button>
    </form>
</div>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>sex</td>
        <td>age</td>
        <td>create_time</td>
        <td>update_time</td>
        <td>管理</td>
    </tr>
    <?php
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    !mysqli_connect_error() or die("连接失败！");
    $query="select id,number,name,sex,age,create_time,update_time from t_student where delete_time='0' order by id desc ";
    $result=$mysqli->query($query);
    while(list($id,$number,$name,$sex,$age,$create_time,$update_time)=$result->fetch_row())
    {
        echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$name</td>
                <td>$sex</td>
                <td>$age</td>
                <td>$create_time</td>
                <td>$update_time</td>
                <td>
                <a href='stuBianji.php?id=$id' >编辑</a>
                <a href=stuDele.php?id=$id onclick=\"if (confirm('确实要删除数据吗？')) return true; else return false;\">删除 </a>
                </td>
            </tr>";
    }
    ?>
</table>
</body>
</html>