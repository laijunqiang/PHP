<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<title>预约装车</title>
	<script type="text/javascript" src="/Public/js/home/js/flexible.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/css/home/yuyuezhuangche.css">


	<link rel="stylesheet" type="text/css" href="/Public/css/home/jquery-weui.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/home/weui.min.css">

</head>
<style>
	.weui-mask.weui-mask--visible{
		opacity: 0.2;
	}
</style>
<body>
		<div id="main">
			<div class="con">
				<div class="line">
					<div class="null">
						<span class="yuan"></span>
					</div>

					<span class="Txt">真实姓名</span>
					<input type="text" class="weui-input" placeholder="请输入真实姓名" >
				</div>
				<div class="line">
					<div class="null">
					</div>
					<span class="Txt">联系电话</span>
					<input type="tel" class="weui-input" placeholder="请输入联系电话">
				</div>

			</div>
			<div class="con">
				<div class="line ">
					<div class="null">
						<span class="yuan"></span>
					</div>
					<span class="Txt">油品类型</span>
					<div class="selLine weui-cell__bd">
						<select class="weui-select " name="oil_type">
							<option value="芳香烃">芳香烃</option>
							<option value="烷烃">烷烃</option>
							<option value="烯烃">烯烃</option>
							<option value="炔烃">炔烃</option>
						</select>
					</div>
					<div class="selLine weui-cell__bd">
						<select  class="weui-select weui-cell__bd" name="oil_name" >
							<?php if(is_array($name)): foreach($name as $key=>$vo): ?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<!-- <div class="line weui-cell__bd">
					<div class="null">
					</div>
					<span class="Txt">预约时间</span>
					<input type="date" class="weui-input" placeholder="请输入联系电话" v-model="time">
				</div> -->
				<div class="line">
					<div class="null">
					</div>
					<span class="Txt">车牌号</span>
					<div class="lineC-left" id="app">
						<div v-if="chepai != ''">
							<span class="pz" >粤</span>
                            <span class="pz" >A</span>
						</div>
						<div v-else>
                            <select class="weui-select" style="width: 0.5rem;">
                                <option v-for="option in options" v-bind:value="option">{{option}}</option>
                            </select>
                            <select class="weui-select" style="width: 0.5rem;">
                                <option v-for="option in options" v-bind:value="option">{{option}}</option>
                            </select>
						</div>
							<input type="text" class="weui-input" placeholder="请输入车牌号" v-model="car">
					</div>
				</div>
				<div class="line">
					<div class="null">
					</div>
					<span class="Txt">公司名称</span>
					<input type="text" class="weui-input" placeholder="请输入公司名称">
				</div>
			</div>
			<div class="subBtn"  v-show="subDp">提交预约</div>
			<!-- <div class="boTxt" >
				<div class="gou">
					<span class="icon-ok"></span>

				</div>
				<p>您已提交预约信息，可在“排队查询”查看</p>
			</div> -->
				<div id="footer">
				<a href="/index.php/Home/Index" >
					<img src="/Public/images/paiduichaxun.png" alt="">
					<p>排队查询</p>
				</a>
				<a href="/index.php/Home/Order" class="on">
					<img src="/Public/images/yuyue2.png" alt="">
					<p>预约装车</p>
				</a>
				<a href="/index.php/Home/PersonalCenter">
					<img src="/Public/images/gerenzhongxin.png" alt="">
					<p>个人中心</p>
				</a>
			</div>
			<!-- <div class="pzCon" :style="{display:pzConDp}">
				<div class="pzCon-txt">
					<span >{{item}}</span>
					<p class="okBtn" @click="pzOk">
						完成
					</p>
				</div>
			</div> -->


		</div>
</body>
	<script src="/Public/js/home/vue.min.js"></script>
	<script src="/Public/js/home/jquery.min weui.js"></script>
	<script src="/Public/js/home/jquery-weui.min.js"></script>
	<script src="/Public/js/home/order.js"></script>

</html>