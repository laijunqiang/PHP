<?php
include "class.php";
header("content-type:text/html;charset=utf-8");
$id=$_GET["id"];
$sql=new Sql();
$sql->courseId($id);
$result=$sql->result;
if ($result->num_rows!=1) {
    echo "<script>alert('编辑出错，请重新编辑');window.location.href='course.php'</script>";
}else{
while(list($number,$name,$credit,$time)=$result->fetch_row()){
    $number1=$number;
    $name1=$name;
    $credit1=$credit;
    $time1=$time;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程信息编辑</title>
</head>
<body>
<h2 align="center">课程信息编辑</h2>
<form action="courseEdit.php" method="post">
    <table align="center">
        <tr>
            <td>ID：</td>
            <!--表单元素在使用了disabled后，当我们将表单以POST或GET的方式提交的话，这个元素的值不会被传递出去，
            而readonly会将该值传递出去（这种情况出现在我们将某个表单中的textarea元素设置为disabled或readonly，但是submit button却是可以使用的）。-->
            <td><input type="text" name="id" <?php echo "value='$id'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>课程号：</td>
            <td><input type="text" name="number" <?php echo "value='$number1'"?>/></td>
        </tr>
        <tr>
            <td>课程名：</td>
            <td><input type="text" name="name" <?php echo "value='$name1'"?>/></td>
        </tr>
        <tr>
            <td>学分：</td>
            <td>
                <select name="credit">
                    <option value="">请选择</option>
                    <option <?php if($credit1=='1.0'){ echo "selected='selected'";} ?> value="1.0">1.0</option>
                    <option <?php if($credit1=='1.5'){ echo "selected='selected'";} ?> value="1.5">1.5</option>
                    <option <?php if($credit1=='2.0'){ echo "selected='selected'";} ?> value="2.0">2.0</option>
                    <option <?php if($credit1=='2.5'){ echo "selected='selected'";} ?> value="2.5">2.5</option>
                    <option <?php if($credit1=='3.0'){ echo "selected='selected'";} ?> value="3.0">3.0</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>开课时间：</td>
            <td><input type="datetime-local" name="time" <?php echo "value='$time1'"?>/></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="修改" />
                <a href="course.php"><input type="button" value="返回"/></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php } ?>