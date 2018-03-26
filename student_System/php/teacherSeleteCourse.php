<?php
session_start();
if(!isset($_SESSION['name'])){
    echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../Index.html'</script>";
}
$number=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>任课老师选课</title>
</head>
<body>
<h2 align="center">任课老师选课</h2>
<h4 align="center">欢迎<?php echo $number;?>!</h4>
<form action="teacherInputCourse.php" method="post">
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
                    while(list($id,$name)=$result->fetch_row())
                    {
                        echo "<option value='$id'>$name</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="选课" />
                <?php
                $sql->teacherCourse($number);
                $result=$sql->result;
                if ($result->num_rows<1) {
                    echo "<a href='logout.php?name=$number'><input type='button' value='退出登陆'/></a>";
                }else
                    echo "<a href='teacherCourse.php'><input type='button' value='返回'/></a>";
                ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>