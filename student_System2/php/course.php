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
    <title>课程信息</title>
</head>
<body>
<h2 align="center">课程信息管理</h2>
<h3 align="center"><a href="../html/courseInput.html" >录入</a></h3>
<div align="center">
    <form action="courseQuery.php" method="post">
        <input type="text" name="query" size="30" placeholder="请输入您要查询的课程号或课程名" /><button type="submit" >查询</button>
    </form>
</div>
<table border="1" align="center">
    <tr>
        <td>ID</td>
        <td>课程号</td>
        <td>课程名</td>
        <td>学分</td>
        <td>开课时间</td>
        <td>创建时间</td>
        <td>更改时间</td>
        <td>管理</td>
    </tr>
    <?php
    include "class.php";
    $sql=new Sql();
    $sql->courseSelect();
    $result=$sql->result;
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
                <a href=\"courseEditPage.php?id=$id\" >编辑</a>
                <a href=courseDelete.php?id=$id onclick=\"if (confirm('确实要删除数据吗？')) return true; else return false;\">删除 </a>
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