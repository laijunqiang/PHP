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

if(isset($_SESSION['name']) && $_SESSION['name']==="$name"){
    session_unset();//free all session variable
    session_destroy();//销毁一个会话中的全部数据
    setcookie(session_name(),'',time()-3600);//销毁与客户端的卡号
    echo "<script>alert('退出成功！');window.location.href='/index.html'</script>";
}else{
    echo "<script>alert('注销失败，请稍后重试！');window.location.href='main.php'</script>";
}