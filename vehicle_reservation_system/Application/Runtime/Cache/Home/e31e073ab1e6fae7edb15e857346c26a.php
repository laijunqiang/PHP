<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<title>联系我们</title>
	<script type="text/javascript" src="/Public/js/home/js/flexible.js"></script>
	<script type="text/javascript" src="/Public/js/home/jquery.min weui.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/css/home/about.css">


	<link rel="stylesheet" type="text/css" href="/Public/css/home/jquery-weui.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/home/weui.min.css">

</head>
<body>
	<img src="/Public/images/ab.jpg" class="ab">
	<div class="topTxt">
		<p>联系我们</p>
		<p class="today">今天是<span class="time"></span></p>
	</div>
	<div class="Con">
		<p class="title">惠州大亚湾美誉化工仓储贸易有限公司</p>
		<p>公司地址：惠州市惠州学院</p>
		<p>电话：123456</p>
		<p>传真：1210321-1013</p>
		<p>邮箱：123456@qq.com</p>
	</div>

</body>
<script type="text/javascript">
		$(function(){
			var myDate = new Date();//获取系统当前时间
			var str = myDate.getFullYear()+"年"+(myDate.getMonth()+1)+"月"+myDate.getDate()+"日";
			$('.time').html(str)
		})

</script>
</html>