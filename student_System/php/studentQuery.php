<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息</title>
</head>
<body>
    <h2 align="center">学生信息</h2>
<?php
    include "class.php";
    $sql=new Sql();
    //  $_POST 变量用于收集来自 method="post"的表单中的值
    $query=$_POST["query"];

    //  判断输入不能为空和不能超过20位，否则不跳转
    if ($query==null){
        echo "<script>alert('输入不能为空，请重新输入');window.location.href='student.php'</script>";
    }elseif (strlen($query)>20){
        echo "<script>alert('输入不能超过20位，请重新输入');window.location.href='student.php'</script>";
    }else{
$sql->studentQuery($query);
$result = $sql->result;
if ($result->num_rows < 1){
    echo "<script>alert('查询为空，请重新查询');window.location.href='student.php'</script>";
}else{
?>
<table border="1" align="center">
    <tr>
        <td>id</td>
        <td>number</td>
        <td>name</td>
        <td>sex</td>
        <td>age</td>
        <td>create_time</td>
        <td>update_time</td>
    </tr>
    <?php
    while (list($id, $number, $name, $sex, $age, $create_time, $update_time) = $result->fetch_row())
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
        </tr>";
    }
    }
    }
?>
</table>
    <br />
    <div align="center">
        <a href="student.php"><input type="button" value="返回"/></a>
    </div>
</body>
</html>


