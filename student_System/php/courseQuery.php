<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程信息</title>
</head>
<body>
<h2 align="center">课程信息</h2>
<?php
    include "class.php";
    $sql=new Sql();
    //  $_POST 变量用于收集来自 method="post"的表单中的值
    $query=$_POST["query"];

    //  判断输入不能为空，否则不跳转
    if ($query==null){
        echo "<script>alert('输入不能为空，请重新输入！');window.location.href='course.php'</script>";
    }elseif (strlen($query)>20){
        echo "<script>alert('输入不能超过20位，请重新输入！');window.location.href='course.php'</script>";
    }else{
$sql->courseQuery($query);
$result = $sql->result;
if ($result->num_rows < 1){
    echo "<script>alert('查询为空，请重新查询');window.location.href='course.php'</script>";
}else{
?>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>credit</td>
        <td>time</td>
        <td>create_time</td>
        <td>update_time</td>
    </tr>
    <?php
    while (list($id, $number, $name, $credit, $time, $create_time, $update_time) = $result->fetch_row()) {
        echo "<tr>
               <td>$id</td>
               <td>$number</td>
               <td>$name</td>
               <td>$credit</td>
               <td>$time</td>
               <td>$create_time</td>
               <td>$update_time</td>
            </tr>";
    }
    }
    }
    ?>
</table>
<br />
<div align="center">
    <a href="course.php"><input type="button" value="返回"/></a>
</div>
</body>
</html>


