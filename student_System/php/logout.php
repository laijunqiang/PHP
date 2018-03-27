<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/17
 * Time: 16:08
 */
session_start();
header('Content-type:text/html;charset=utf-8');
$name=$_GET['name'];
/*var_dump($name);echo "<br />";
var_dump($_SESSION['name']);*/
if(isset($_SESSION['name']) && $_SESSION['name']==="$name"){
    session_unset();//free all session variable
    session_destroy();//销毁一个会话中的全部数据
    setcookie(session_name(),'',time()-3600);//销毁与客户端的卡号 PHPSESSID的key值为session_name()
    echo "<script>alert('退出成功！');window.location.href='../index.html'</script>";
}else {
    include "class.php";
    $sql = new Sql();
    //  $mysqli_query()返回一个对象，即使查询为空
    /*针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。
    针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。*/
    $sql->logout($name);
    $result = $sql->result;

    /*mysql_num_rows()或者$result->num_rows
    返回结果集中行的数目。此命令仅对 SELECT 语句有效。
    要取得被 INSERT，UPDATE 或者 DELETE 查询所影响到的行的数目，用mysql_affected_rows()。*/
    if ($result->num_rows < 1) {
        echo "<script>alert('注销失败，请稍后重试！');window.location.href='teacherSeleteCourse.php'</script>";
    } else {
        echo "<script>alert('注销失败，请稍后重试！');window.location.href='main.php'</script>";
    }
}
