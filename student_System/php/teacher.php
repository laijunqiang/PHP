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
    <title>任课老师信息</title>
</head>
<body>
<h2 align="center">任课老师信息管理</h2>
<h3 align="center"><a href="../html/teaLuru.html" >录入</a></h3>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>password</td>
        <td>name</td>
        <td>create_time</td>
        <td>update_time</td>
        <td>管理</td>
    </tr>
    <?php
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    !mysqli_connect_error() or die("连接失败！");
    $query="select id,number,password,name,create_time,update_time from t_teacher where delete_time='0'order by id desc";
    $result=$mysqli->query($query);
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
                <a href=\"teaBianji.php?id=$id\" >编辑</a>
                <a href=teaDele.php?id=$id onclick=\"if (confirm('确实要删除数据吗？')) return true; else return false;\">删除 </a>
                </td>
            </tr>";
    }
    ?>
</table>
</body>
</html>