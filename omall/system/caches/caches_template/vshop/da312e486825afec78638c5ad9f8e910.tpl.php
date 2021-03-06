<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>活动列表</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg('web_key'); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg('web_des'); ?><?php endif; ?>" />
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/activity.css">
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/swiper.min.css">
</head>
<body>
	<section class="nav-bar">
		<div class="swiper-container">
			<ul class="swiper-nav swiper-wrapper">
				<li class="swiper-slide <?php if($cid == 0): ?>active<?php endif; ?>" data-cid="0">
					<a href="<?php echo G_WEB_PATH; ?>/mobile/activity/activitylists/0"><i class=""><img src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/acicon/all.png" alt=""></i>全部</a>
				</li>
				<?php $ln=1;if(is_array($act_category)) foreach($act_category AS $item): ?>
				<li class="swiper-slide <?php if($cid == $item['c_id']): ?>active<?php endif; ?>" data-cid="<?php echo $item['c_id']; ?>">
					<a href="<?php echo G_WEB_PATH; ?>/mobile/activity/activitylists/<?php echo $item['c_id']; ?>"><i class=""><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['c_icon']; ?>" alt=""></i><?php echo $item['c_name']; ?></a>
				</li>
				<?php  endforeach; $ln++; unset($ln); ?>
			</ul>
		</div>
		<ul class="nav-lists">
			<li class="nav-lists-item">
				<span class="" data-state="location" data-id="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></span>
				<section class="second-list-bar">
					<ul class="second-list location-list">
						<?php $ln=1;if(is_array($location['value'])) foreach($location['value'] AS $val): ?>
						<li><?php echo $val; ?></li>
						<?php  endforeach; $ln++; unset($ln); ?>
					</ul>
				</section>
			</li>
			<li class="nav-lists-item">
				<span class="" data-state="strength" data-id="<?php echo $strength['id']; ?>"><?php echo $strength['name']; ?></span>
				<section class="second-list-bar">
					<ul class="second-list strength-list">
						<?php $ln=1;if(is_array($strength['value'])) foreach($strength['value'] AS $v): ?>
						<li><?php echo $v; ?></li>
						<?php  endforeach; $ln++; unset($ln); ?>
					</ul>
				</section>
			</li>
			<li class="nav-lists-item">
			<input type="text" id='data-ele' >
			<span data-state="time">时间</span>
			</li>
			<li class="nav-lists-item item-price"><span data-state="price">价格</span></li>
		</ul>
	</section>

	<div style="height: 120px;"></div> 
	<section class="activities-wrap" id="activity-info">
		<!--<?php $ln=1; if(is_array($activities)) foreach($activities AS $k => $v): ?>
		<div class="activities-item">
			<a class="activities-detail"  href="<?php echo G_WEB_PATH; ?>/mobile/activity/activity/<?php echo $v['act_id']; ?>">
				<div class="activities-top clearfix">
					<h4><?php 
						$title_tag = '';
						switch(date('w',$v['act_start_time'])){
						case 0:
						$title_tag = '【周日】';
						break;
						case 1:
						$title_tag = '【周一】';
						break;
						case 2:
						$title_tag = '【周二】';
						break;
						case 3:
						$title_tag = '【周三】';
						break;
						case 4:
						$title_tag = '【周四】';
						break;
						case 5:
						$title_tag = '【周五】';
						break;
						case 6:
						$title_tag = '【周六】';
						break;
						}
						 ?>
						<?php echo $title_tag; ?><?php echo $v['act_title']; ?></h4>
					<span>
						<?php 
						$date = date('m',$v['act_start_time']).'月'.date('d',$v['act_start_time']).'日';
						 ?>
						<?php echo $date; ?>
					</span>
				</div>
				<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $v['act_poster']; ?>">
				<p class="activities-desc"><?php echo $v['act_desc']; ?></p>
			</a>
			<a href="#" class="activities-btn">立即报名<span class="activities-cost"><?php if($v['act_charge']=='0.00'): ?>免费<?php  else: ?><?php echo $v['act_charge']; ?><?php endif; ?></span><span class="money-symbol">￥</span></a>
		</div>
		<?php  endforeach; $ln++; unset($ln); ?>-->

		<div class="loader-gif" id="loading">
			<div class="a-loader"></div>
		</div>
		<div class="a-nomore">&nbsp;END&nbsp;</div>
	</section>
	<div class="no-content" hidden><s></s><p>神马都没有</p></div>
	<input id="pagenum" value="" type="hidden" /> <!--当前需要加载到第几页了-->
	<input id="nav-state" value="" type="hidden" /> <!--筛选类型-->
	<input id="nav-filter" value="" type="hidden" /> <!--筛选值-->
	<input id="nav-filter1" value="" type="hidden" /> <!--可选筛选值-->
	<p class="copyright"><?php echo _cfg('web_copyright'); ?></p>

<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>

<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/swiper.min.js"></script>
<script src="<?php echo G_TEMPLATES_JS; ?>/laydate/laydate.js"></script>
<script type="text/javascript">
	//打开页面加载数据
	window.onload=function(){
		var cid = <?php echo $cid; ?>;
		var pageNum = 1;
		var type = $("#nav-state").val();
		var filter = $("#nav-filter").val();
		var filter1 = $("#nav-filter1").val();
		getAct(pageNum,10,cid,type,filter,filter1);
	}
	/**
	 * ajax活动筛选
	 * @param pageNum 需要加载第几页
	 * @param pageRow 需要加载的行数
	 * @param cid 分类id
	 * @param type 筛选类别
	 * @param filter 筛选条件
	 * @param filter1 可选筛选条件
	 */
	function getAct(pageNum,pageRow,cid,type,filter,filter1){
		$("#pagenum").val(''); //先清除之前的页数
		$("#nav-state").val('');
		$("#nav-filter").val('');
		$("#nav-filter1").val('');
		//console.log(filter);
		$.ajax({
			type:"POST",
			url:"<?php echo WEB_PATH; ?>/mobile/activity/ajaxGetAct",
			data:{pageNum:pageNum,pageRow:pageRow,cid:cid,type:type,filter:filter,filter1:filter1},
			dataType:"json",
			success:function (data) {
				if(data[0].pageSum) {
					$("#nav-state").val(type);
					$("#nav-filter").val(filter);
					$("#nav-filter1").val(filter1);
					$("#pagenum").val(data[0].pageNum); //重新赋值要加载的分页
					for (var i = 0; i < data.length; i++) {
						var item = '<div class="activities-item">';
						item += '<a class="activities-detail" href="<?php echo G_WEB_PATH; ?>/mobile/activity/activity/' + data[i].act_id + '">';
						item += '<div class="activities-top clearfix">';
						item += '<h4>' + data[i].act_title + '</h4>';
						item += '<span>' + data[i].start_time + '</span>';
						item += '</div>';
						item += '<img src="<?php echo G_UPLOAD_PATH; ?>/' + data[i].act_home_poster + '">';
						item += '<p class="activities-desc">' + data[i].act_desc + '</p>';
						item += '</a>';
						item += '<a href="#" class="activities-btn">立即报名<span class="activities-cost">' + data[i].charge + '</span><span class="money-symbol">￥</span></a>';
						item += '</div>';
						$('#loading').before(item);
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
	$(function(){
		var myswiper = new Swiper('.swiper-container',{
			slidesPerView: 6,
			loop:false,
		});
		var cid = 0;
		//滑动菜单点击效果
		$('.swiper-nav').find('li').each(function(index){
			if ($(this).hasClass('active')) {
				cid = $(this).data('cid');
				myswiper.slideTo(index,1500,false);
			}
			var cur = $(this);
			cur.click(function(){
				if (cur.hasClass('active')) {
					return false;
				}else{
					cur.siblings().removeClass('active');
					cur.addClass('active');
				}
			})
		})
		//页面加载后加载数据
		var pageNum = $('#pagenum').val();
		var type = $("#nav-state").val();
		var filter = $("#nav-filter").val();
		var filter1 = $("#nav-filter1").val();
		//getAct(pageNum,10,cid,type,filter,filter1);

		var ele = $('.nav-lists');
		ele.find('li.nav-lists-item').each(function(){
			var self = $(this);
			var nav_span = self.find('span');
			var state = '<?php echo $state; ?>';
			var nav_state = nav_span.data('state');
			var act_obj = $('#activity-info');
			/*var cid = 0;
			$('.swiper-nav').find('li').each(function(){
				if ($(this).hasClass('active')) {
					cid = $(this).data('cid');
				}
			})*/
			self.on('click',function(event){
				if(nav_state == 'price'){
					if(self.hasClass('nav-price-up')){
						self.removeClass('nav-price-up');
						$('#loading').prevAll().remove()
						var pageNum = 1;
						var filter = 0; //价格递减
						getAct(pageNum,10,cid,nav_state,filter);
					}
					else{
						$('#loading').prevAll().remove()
						self.addClass('nav-price-up');
						var pageNum = 1;
						var filter = 1; //价格递增
						getAct(pageNum,10,cid,nav_state,filter);
					}
					self.siblings().removeClass('hasopen');
				}
				if(nav_state == 'time'){
						var date = laydate({
							elem:'#data-ele',
							format:'YYYY-MM-DD',
							isclear: false, //是否显示清空
							istoday: false, //是否显示今天
							issure: false, //是否显示确认
							fixed: true,
							min:laydate.now(-15),
							choose:function(data){
								self.removeClass('hasopen');
								$('#loading').prevAll().remove()
								var filter = data;
								var pageNum = 1;
								getAct(pageNum,10,cid,nav_state,filter);
							}

						});

					self.addClass('hasopen');
					self.siblings().removeClass('hasopen');

				}
				/*if(nav_state != 0){
					if(self.hasClass('hasopen')){
						self.removeClass('hasopen');
					}else{
						self.addClass('hasopen');
						self.siblings().removeClass('hasopen');
					}
				}*/
				if(nav_state == 'location' || nav_state == 'strength'){
					if(self.hasClass('hasopen')){
						self.removeClass('hasopen');
					}else{
						self.addClass('hasopen');
						self.siblings().removeClass('hasopen');
					}
					self.find('.second-list li').unbind('click').click(function(event) {
						$('#loading').prevAll().remove()
						var pageNum = 1;
						var filter = $(this).text();
						var filter_id = nav_span.data('id');
						getAct(pageNum,10,cid,nav_state,filter,filter_id);
						//console.log($(this).text());
					});
				}

				// if(nav_span.hasClass('active')){
				// 	return false;
				// }
				// else{
				// 	self.addClass('active-nav');
				// 	self.siblings().find('span').removeClass('active');
				// 	//条件筛选
				// 	var state = nav_span.data('state');
				// 	// location.href = '<?php echo WEB_PATH; ?>/mobile/mobile/activitylists/'+state;
				// }
			})

		})
		// $('.second-list li').each(function(){
		// 	$(this).click(function(){
		// 		var nav_state = $(this).parent().parent().siblings('span').data('state');
		// 		console.log(nav_state)
		// 		console.log($(this).text());
		// 	})
		// });
		//加载更多
		$(window).scroll(function() {
			if ($(document).height() - $(this).scrollTop() - $(this).height() < 1 && $('.loader-gif').css('display') != 'none') {
				var pageNum = $('#pagenum').val();
				var type = $("#nav-state").val();
				var filter = $("#nav-filter").val();
				var filter1 = $("#nav-filter1").val();
				getAct(pageNum,10,cid,type,filter,filter1);
			}
		});
	})
</script>
<script type="text/javascript">  
// 反广告嵌入
 if (window!=top) // 判断当前的window对象是否是top对象  
 top.location.href =window.location.href; // 如果不是，将top对象的网址自动导向被嵌入网页的网址  
</script> 
	
</body>
</html>