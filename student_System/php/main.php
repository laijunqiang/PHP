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
    <title>欢迎来到主界面</title>
</head>
<body>
    <h2 align="center">学生管理系统</h2>
    <h4 align="center">欢迎<?php echo $_SESSION['name'];?>!</h4>
    <table align="center">
        <tr>
            <td><a href="setPassw.php"><input type="button" value="修改密码"/></a></td>
            <td><a href="../html/index.html"><input type="button" value="退出登陆"/></a></td>
        </tr>
    </table>
    <form action="select.php" method="post">
        <table align="center">
            <tr>
                <td>
                    <input type="text" name="number" placeholder="请输入您要查询的学号"/><button type="submit" >学号查询</button>
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