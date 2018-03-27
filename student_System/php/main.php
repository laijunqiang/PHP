<?php
    session_start();
    if(!isset($_SESSION['name'])){
        echo "<script>alert('您正查看的此页已过期,请重新登录');window.location.href='../Index.html'</script>";
    }
    $name=$_SESSION['name'];
    $SID=session_id();
    //查询管理员在数据库中的session_id，并与当前的session_id比较
    include "class.php";
    $sql=new Sql();
    $sql->adminSelectSession($name);
    $result=$sql->result;
    while (list($sessionID) = $result->fetch_row()) {
        $sid=$sessionID;
    }
    if ($sid!==$SID){
        echo "<script>alert('您的账号已被登陆,请重新登录');window.location.href='/Index.html'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎来到主界面</title>
</head>
<body>
    <h2 align="center">学生管理系统</h2>
    <h4 align="center">欢迎<?php echo $_SESSION['name'];?>!</h4>
    <table align="center">
        <tr>
            <td><a href="adminSetPassword.php"><input type="button" value="修改密码"/></a></td>
            <?php echo "<td><a href='logout.php?name=$name'><input type='button' value='退出登陆'/></a></td>"?>
        </tr>
    </table>
    <form action="scoreSelect.php" method="post">
        <table align="center">
            <tr>
                <td>
                    <!--placeholder 属性提供可描述输入字段预期值的提示信息（hint）。
                    该提示会在输入字段为空时显示，并会在字段获得焦点时消失。-->
                    <input type="text" name="number" placeholder="请输入您要查询的学号"/><button type="submit" >成绩查询</button>
                </td>
            </tr>
        </table>
    </form>
    <div align="center">
        <a href="student.php" ><h1>学生信息管理</h1></a>
    </div>
    <div align="center">
    <a href="course.php" ><h1>课程信息管理</h1></a>
    </div>
    <div align="center">
        <a href="score.php" ><h1>成绩信息管理</h1></a>
    </div>
    <div align="center">
        <a href="teacher.php" ><h1>任课老师信息管理</h1></a>
    </div>
</body>
</html>