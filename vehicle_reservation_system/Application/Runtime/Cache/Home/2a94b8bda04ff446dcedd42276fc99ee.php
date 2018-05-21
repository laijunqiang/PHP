<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--<meta http-equiv="refresh" content="0; url="> -->
    <!--页面定期刷新，如果加url的，则会重新定向到指定的网页，content后面跟的是时间（单位秒）-->
	<meta http-equiv="refresh" content="60">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<title>车辆运货预约</title>
	<script type="text/javascript" src="/Public/js/home/js/flexible.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/css/home/index.css">


	<link rel="stylesheet" type="text/css" href="/Public/css/home/jquery-weui.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/home/weui.min.css">

</head>
<!-- <style>
	#top{
		height:6rem;
	}
</style> -->
<body>
		<div id="main">
			<div id="box" class="box" v-show="boxDp">
			    <div id="wrap" class="wrap">
			        <div id="start" class="start">
			            <span>告示：</span><?php echo ($content); ?>
			        </div>
			    </div>
			</div>
			<div id="top">
				<img src="/Public/images/banner.png" class="topImg">
				<?php if(($oilName) != ""): ?><p style="text-align: center;color: #333;height: 0.7rem;line-height: 0.7rem;font-size: .4rem; background-color: #fff;width: 90%;margin: 0 auto;padding: .1rem .2rem;"><?php echo ($oilName); ?>装车排队情况</p>
                    <?php else: ?>
                    <p style="text-align: center;color: #333;height: 0.7rem;line-height: 0.7rem;font-size: .4rem; background-color: #fff;width: 90%;margin: 0 auto;padding: .1rem .2rem;"><?php echo ($name[0]); ?>装车排队情况</p><?php endif; ?>
				<div class="search">
					<div class="searchCon">
						<!-- <span class="sx" @click="sxBtn">筛选</span> -->
						<input type="text" placeholder="请输入你想搜索的内容" class="weui-input">
						<span class="icon-search"></span>
						<div class="refresh">
							<span class="icon-refresh" ></span>
						</div>
					</div>
				</div>

				<div class="search" >
					<div class="searchCon-right">
						<select id="sel" name="oil_type">
                            <option value="">请选择</option>
                            <?php if(($type) == "芳香烃"): ?><option value="芳香烃" selected="selected">芳香烃</option>
							    <?php else: ?><option value="芳香烃">芳香烃</option><?php endif; ?>
                            <?php if(($type) == "烷烃"): ?><option value="烷烃" selected="selected">烷烃</option>
                                <?php else: ?><option value="烷烃">烷烃</option><?php endif; ?>
                            <?php if(($type) == "烯烃"): ?><option value="烯烃" selected="selected">烯烃</option>
                                <?php else: ?><option value="烯烃">烯烃</option><?php endif; ?>
                            <?php if(($type) == "炔烃"): ?><option value="炔烃" selected="selected">炔烃</option>
                                <?php else: ?><option value="炔烃">炔烃</option><?php endif; ?>
						</select>
					</div>
					<div class="searchCon-right">
						<select id="sel"  v-model="proName" name="oil_name" >
							<?php if(($name) == ""): ?><option>请选择类型</option>
                            <?php else: ?>
                                <?php if(is_array($name)): foreach($name as $key=>$vo): if(($vo) == $oilName): ?><option value="<?php echo ($vo); ?>" selected="selected"><?php echo ($vo); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; endif; ?>
						</select>
					</div>
				</div>


			</div>
			<div class="list" style="height:6.5rem">
				<?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["order_number"]) == "1"): ?><div class="line">
                            <span class="num numIng" >1</span>
                                <span class="chepai"><?php echo ($vo["plate"]); ?></span>
                                <span class="statu ing" >装车中</span>
                        </div>
                        <?php else: ?>
                        <?php if(($vo["order_number"]) == "2"): ?><div class="line">
                                <span class="num numCq" >2</span>
                                    <span class="chepai"><?php echo ($vo["plate"]); ?></span>
                                    <span class="statu cq" >厂区待装</span>
                            </div>
                            <?php else: ?>
                            <div class="line">
                                <span class="num" ><?php echo ($vo["order_number"]); ?></span>
                                    <span class="chepai"><?php echo ($vo["plate"]); ?></span>
                                    <span class="statu" >厂外待装</span>
                            </div><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>


			<!-- <div class="list" v-else>
					<div class="nothing">
						<img src="/Public/Home/icon/nothing.png" alt="" />
						<p>暂无更多数据</p>
					</div>
			</div> -->
			<div id="footer">
				<a href="/index.php/Home/Index" class="on">
					<img src="/Public/images/paiduichaxun2.png" alt="">
					<p>排队查询</p>
				</a>
				<a href="/index.php/Home/Order">
					<img src="/Public/images/yuyue.png" alt="">
					<p>预约装车</p>
				</a>
				<a href="/index.php/Home/PersonalCenter">
					<img src="/Public/images/gerenzhongxin.png" alt="">
					<p>个人中心</p>
				</a>
			</div>

</div>
</body>
	<script src="/Public/js/home/vue.min.js"></script>
	<script src="/Public/js/home/jquery.min weui.js"></script>
    <script src="/Public/js/home/jquery-weui.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script src="/Public/js/home/index.js"></script>
</html>