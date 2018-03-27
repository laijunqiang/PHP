<?php
session_start();
header("content-type:text/html;charset=utf-8");
$courseName=$_GET['name'];
$courseId=$_GET['id'];
$number=$_SESSION['name'];
$SID=session_id();
//查询管理员在数据库中的session_id，并与当前的session_id比较
include "class.php";
$sql=new Sql();
$sql->teacherSelectSession($number);
$result=$sql->result;
while (list($sessionID) = $result->fetch_row()) {
    $sid=$sessionID;
}
if ($sid!==$SID){
    echo "<script>alert('您的账号已被登陆,请重新登录');window.location.href='/Index.html'</script>";
}

$sql->teacherSeleteStudent($courseId);
$result=$sql->result;
if ($result->num_rows<1){
    echo "<script>alert('全部学生已录入');window.location.href='teacherScore.php?name=$courseName&&id=$courseId'</script>";
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成绩信息录入</title>
</head>
<body>
<h2 align="center">成绩信息录入</h2>
<form action="teacherInputScore.php" method="post">
    <table align="center"  >
        <tr>
            <td>课程ID：</td>
            <td><input type="text" name="id" size="20" <?php echo "value='$courseId'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>课程：</td>
            <td><input type="text" name="course" size="20" <?php echo "value='$courseName'"?> readonly="readonly"/></td>
        </tr>
        <tr>
            <td>学生：</td>
            <td>
                <select name="student">
                    <option value="">请选择</option>
                    <?php
                    while(list($id,$name)=$result->fetch_row())
                    {
                        echo "<option value='$id'>$name</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>成绩：</td>
            <td><input type="number" step="0.1"name="score"  placeholder="精确到小数点后一位"/></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="录入" />
                <?php echo "<a href='teacherScore.php?name=$courseName&id=$courseId'><input type='button' value='返回'/></a>";?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php }?>