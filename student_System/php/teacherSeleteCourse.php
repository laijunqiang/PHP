<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../index.html'</script>";
}
$name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>任课老师选课</title>
</head>
<body>
<h2 align="center">任课老师选课</h2>
<h4 align="center">欢迎<?php echo $_SESSION['name'];?>!</h4>
<form action="../php/courseInput.php" method="post">
    <table align="center">
        <tr>
            <td>剩余课程：</td>
            <td>
                <select name="course">
                    <option value="">请选择</option>
                    <?php
                    include "class.php";
                    $sql=new Sql();
                    $sql->teacherSeleteCourse();
                    $result=$sql->result;
                    var_dump($result);
                    while(list($name)=$result->fetch_row())
                    {
                        echo "<option value='$name'>$name</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" value="选课" /><a href="/php/course.php"><input type="button" value="返回"/></a></td>
        </tr>
    </table>
</form>
</body>
</html>