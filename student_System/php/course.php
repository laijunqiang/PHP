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
    <title>课程信息</title>
</head>
<body>
<h2 align="center">课程信息管理</h2>
<h3 align="center"><a href="../html/couLuru.html" >录入</a></h3>
<div align="center">
    <form action="couSelect.php" method="post">
        <input type="text" name="chaxun" /><button type="submit" >查询</button>
    </form>
</div>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>credit</td>
        <td>time</td>
        <td>create_time</td>
        <td>update_time</td>
        <td>管理</td>
    </tr>
    <?php
    $mysqli=new mysqli("localhost","root","root","db_student_system");
    $query="select id,number,name,credit,time,create_time,update_time from t_course where delete_time=0";
    $result=$mysqli->query($query);
    while(list($id,$number,$name,$credit,$time,$create_time,$update_time)=$result->fetch_row())
    {
        echo "<tr>
                <td>$id</td>
                <td>$number</td>
                <td>$name</td>
                <td>$credit</td>
                <td>$time</td>
                <td>$create_time</td>
                <td>$update_time</td>
                <td>
                <a href=\"../html/couBianji.html?id=$id\" >编辑</a>
                <a href=\"couDele.php?id=$id\" >删除</a>
                </td>
            </tr>";
    }
    ?>
</table>
</body>
</html>