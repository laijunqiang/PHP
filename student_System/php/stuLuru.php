<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/31
 * Time: 9:09
 */
include "class.php";
//  session每次用之前都要启用！
session_start();
header("content-type:text/html;charset=utf-8");
$admin=new admin();
//  $_POST 变量用于收集来自 method="post"的表单中的值
$number=$_POST["number"];
$name=$_POST["name"];
$sex=$_POST["sex"];
$age=$_POST["age"];
function number($sex,$age){
    //date('Ymd') +性别+出生年月+5位随机数
/*    mt_rand(1, 99999) 随机取个1~99999之间的数
    str_pad(param1, param2, param3, param4）
    param1是要改变的值，param2是要想定param1位数，param3是如果param1位数不够param2位要补充的数，param4是在左边补还是右边补还是左右两侧*/
    $number = date('Ymd') .$sex.$age. str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    return $number;
}
echo number($sex,$age);

/*//  判断输入不能为空，否则不跳转
if ($number==null||$name==null||$sex==null||$age==null){
    echo "<script>alert('输入不能为空');window.location.href='../html/stuLuru.html'</script>";
}else{
    $admin->stuLuru($number,$name,$sex,$age);
    //针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。
    //针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。
    if ($admin->result!=false){
        echo "<script>alert('录入成功');window.location.href='student.php'</script>";
    }else {
        echo "<script>alert('录入失败，请重新录入');window.location.href='../html/stuLuru.html'</script>";
    }
}
*/

