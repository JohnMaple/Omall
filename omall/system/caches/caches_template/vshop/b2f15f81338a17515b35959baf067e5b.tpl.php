<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>我的活动</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/activity.css">


</head>
<body ontouchstart="" onmouseover="">
	<ul id="navBox" class="a-myact-navs">
	    <li class="a-nav-item" data-state="-1"><a href="javascript:;" >全部</a></li>
	    <li class="a-nav-item" data-state="1"><a href="javascript:;" >等待中</a></li>
	    <li class="a-nav-item" data-state="2"><a href="javascript:;" >进行中</a></li>
	    <li class="a-nav-item" data-state="3"><a href="javascript:;" >已结束</a></li>
	    <li class="a-nav-item" data-state="4"><a href="javascript:;" >已关闭</a></li>

	    <input type="hidden" class="state" value="">
		<input type="hidden" class="pageNum" value="">
	</ul>
	<div style="height: 44px;"></div>
	<section class="a-myact-wrap">
		<ul class="a-myact-list myact-load">
			<!--<li>
				<a class='a-myact-content clearfix' href="#" >
					<div class="a-myact-left fl">
						<img src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/45.png" alt="actimg">
						<span class="state-tip">等待中</span>
					</div>
					<div class="a-myact-right fl">
						<p class="a-myact-title">公益瑜伽—哈他基础</p>
						<p class="a-myact-time">2017-01-07 15:00开始</p>
						<p class="a-myact-cost">费用：<span>免费</span></p>


					</div>
				</a>
				<div class="a-myact-state clearfix">
					<a href="<?php echo WEB_PATH; ?>/mobile/activity/refundrequest" class="refund">申请退款</a>
				</div>
			</li>
			<li>
				<a class='a-myact-content clearfix' href="#" >
					<div class="a-myact-left fl">
						<img src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/45.png" alt="actimg">
						<span class="state-tip">进行中</span>
					</div>
					<div class="a-myact-right fl">
						<p class="a-myact-title">公益瑜伽—哈他基础</p>
						<p class="a-myact-time">2017-01-07 15:00开始</p>
						<p class="a-myact-cost">费用：<span>免费</span></p>


					</div>
				</a>
				<div class="a-myact-state clearfix">
					<a href="#" class="refund refund-disable">申请退款</a>
				</div>
			</li>

			<li>
				<a class='a-myact-content clearfix' href="#" >
					<div class="a-myact-left fl">
						<img src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/45.png" alt="actimg">
						<span class="state-tip">已关闭</span>
					</div>
					<div class="a-myact-right fl">
						<p class="a-myact-title">公益瑜伽—哈他基础</p>
						<p class="a-myact-time">2017-01-07 15:00开始</p>
						<p class="a-myact-cost">费用：<span>免费</span></p>


					</div>
				</a>
				<div class="a-myact-state clearfix">
					<a href="<?php echo WEB_PATH; ?>/mobile/activity/refund" class="refund-check">查看进度</a>
				</div>
			</li>
			<li>
				<a class='a-myact-content clearfix' href="#" >
					<div class="a-myact-left fl">
						<img src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/45.png" alt="actimg">
						<span class="state-tip">已结束</span>
					</div>
					<div class="a-myact-right fl">
						<p class="a-myact-title">公益瑜伽—哈他基础</p>
						<p class="a-myact-time">2017-01-07 15:00开始</p>
						<p class="a-myact-cost">费用：<span>免费</span></p>


					</div>
				</a>
				<div class="a-myact-state clearfix">
					<a href="#" class="refund refund-disable">申请退款</a>
				</div>
			</li>-->

			
		</ul>
		<div class="loader-gif">
			<div class="a-loader"></div>
		</div>
		<div class="a-nomore">&nbsp;END&nbsp;</div>

		
	</section>
	<div class="no-content" hidden><s></s><p>神马都没有</p></div>
	<p class="copyright"><?php echo _cfg('web_copyright'); ?></p>
		
	<!--S 底部导航 -->
	 <ul class="a-main-menu">
	   <li >
	     <a href="<?php echo WEB_PATH; ?>/mobile/activity/activityhome">
	       <span class="a-index"></span>
	       <b>首页</b>
	     </a>
	   </li>
	   <li class="a-menu-this">
	     <a href="<?php echo WEB_PATH; ?>/mobile/activity/myactivities">
	       <span class="a-my-activity"></span>
	       <b>我的活动</b>
	     </a>
	   </li>

	   <li >
	     <a href="<?php echo WEB_PATH; ?>/mobile/home">
	       <span class="c-home"></span>
	       <b>个人中心</b>
	     </a>
	   </li>
	 </ul> 
	 <!--E 底部导航 -->


	<div class="a-empty-space"></div>

	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
	<!--<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/activity.js" type="text/javascript"></script>-->
	<script type="text/javascript">
		$(function () {
			var state = <?php echo $state; ?>;
			var pageNum = 1;
			getOrder(state,pageNum,10);

			//我的活动页导航栏
			$('#navBox li').each(function(index, el) {
			    if($(this).data('state')==state){
                    $(this).addClass('a-active'); //从个人中心过来，判断是选择哪种订单
				}
				$(this).click(function(event) {
					var state = $(this).data('state');
					var pageNum = 1;
					$('.myact-load').empty();
					if($(this).hasClass('a-active')){
						getOrder(state,pageNum,10);
					}else{
						$(this).addClass('a-active');
						$(this).siblings().removeClass('a-active');
						getOrder(state,pageNum,10);
					}
				});
			});
			//滑动加载
			$(window).scroll(function() {
				if ($(document).height() - $(this).scrollTop() - $(this).height() < 1 && $('.loader-gif').css('display') != 'none') {
					$('.loader-gif').show();
					var state = $('.state').val();
					var pageNum = $('.pageNum').val();
					getOrder(state,pageNum,10);
				}
			});

			/**
			 * 我的活动页加载数据
			 * @param state
			 * @param pageNum
			 * @param pageRow
			 */
			function getOrder(state,pageNum,pageRow) {
				$(".pageNum").val(''); //先清除之前的页数
				$.ajax({
					type:"POST",
					url:"<?php echo WEB_PATH; ?>/mobile/activity/ajaxGetOrder",
					data:{state:state,pageNum:pageNum,pageRow:pageRow},
					dataType:"json",
					success:function (data) {
						//console.log(data);
						if(data[0].pageSum) {
							$('.state').val(state);
							$(".pageNum").val(data[0].pageNum); //重新赋值要加载的分页
							for (var i = 0; i < data.length; i++) {
								var item = '<li>';
								item += '<a class="a-myact-content clearfix" href="<?php echo G_WEB_PATH; ?>/mobile/activity/activity/' + data[i].act_id + '">';
								item += '<div class="a-myact-left fl">';
								item += '<img src="<?php echo G_UPLOAD_PATH; ?>/' + data[i].act_poster + '" alt="actimg">';
								item += '<span class="state-tip">'+data[i].tag+'</span>';
								item += '</div>';
								item += '<div class="a-myact-right fl">';
								item += '<p class="a-myact-title">'+data[i].o_act_title+'</p>';
								item += '<p class="a-myact-time">'+data[i].start_time+'</p>';
								item += '<p class="a-myact-cost">费用：<span>'+data[i].charge+'</span></p>';
								item += '</div></a>';
								item += '<div class="a-myact-state clearfix">';
								if(data[i].flag == 1){
                                    if(data[i].invalid == 1){
                                        item += '<a href="<?php echo WEB_PATH; ?>/mobile/activity/refundrequest/'+data[i].o_id+'" class="refund">申请退款</a>';
                                    }else if(data[i].invalid == 2){
										item += '<a href="<?php echo WEB_PATH; ?>/mobile/activity/refund/'+data[i].o_id+'" class="refund-check">查看进度</a>';
                                    }else{
										item += '<a href="#" class="refund refund-disable">申请退款</a>';
									}
								}else if(data[i].flag == 2){
									item += '<a href="#" class="refund refund-disable">申请退款</a>';
								}else{
									item += '<a href="<?php echo WEB_PATH; ?>/mobile/activity/refund/'+data[i].o_id+'" class="refund-check">查看进度</a>';
								}
								item += '</div></li>';
								$('.myact-load').append(item);
							}
							if(data[0].pageNum <= data[0].pageSum){
								$(".loader-gif").css('display','block');
								$(".no-content").css('display','none');
								$(".a-nomore").css('display','none');
							}else if(data[0].pageNum > data[0].pageSum){
								$(".loader-gif").css('display','none');
								$(".no-content").css('display','none');
								$(".a-nomore").css('display','flex');
							}
						}else{
							$(".loader-gif").css('display','none');
							$(".no-content").css('display','block'); //没有数据了
							$(".a-nomore").css('display','none');
						}
					}
				})
			}

		})
	</script>

</body>
</html>
