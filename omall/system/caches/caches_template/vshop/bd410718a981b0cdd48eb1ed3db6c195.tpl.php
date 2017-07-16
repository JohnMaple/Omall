<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>活动详情</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/main.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/activity.css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/activity.css">
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/swiper.min.css">


</head>
<body ontouchstart="" onmouseover="">
	<header class="activity-bg">
		<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $activity['act_poster']; ?>">
	</header>
	<section class="activity-infos">
		<ul>
			<li class="activity-info-items">
				<i class="theme-icon"></i>
				<h3 >主题</h3>
				<p class='activity-info-theme'><?php echo $activity['act_title']; ?></p>
			</li>
			<li class="activity-info-items ">
				<i class="time-icon"></i>
				<h3 >时间</h3>
				<p class='activity-info-time'><?php echo date('m-d H:i',$activity['act_start_time']); ?>至<?php echo date('m-d H:i',$activity['act_end_time']); ?></p>
			</li>
			<li class="activity-info-items right-arrow activity-info-items-a">
				<a href="http://apis.map.qq.com/tools/poimarker?type=0&marker=coord:<?php echo $activity['act_latlng']; ?>;title:<?php echo $activity['act_address']; ?>;addr:<?php echo $activity['act_address']; ?>&key=<?php echo $appInfo['key']; ?>&referer=<?php echo $appInfo['app_name']; ?>">
				<i class="location-icon"></i>
				<h3 >地点</h3>
				<p class='activity-info-location'><?php echo $activity['act_address']; ?></p>
				</a>
			</li>

			<li class="activity-info-items  activity-info-items-counts ">
				<i class="peoplecount-icon"></i>
				<h3 >报名人数 <span class="already-num"><?php echo $activity['act_num_signed']; ?></span >/<span class='last-num'><?php if(empty($activity['act_num_limit'])): ?>不限制名额<?php  else: ?><?php echo $activity['act_num_limit']; ?><?php endif; ?></span></h3>
				<div class='activity-info-peoplecount'>
					<?php if(empty($signNum)): ?>
					暂无
					<?php  else: ?>
					<?php $ln=1;if(is_array($signNum)) foreach($signNum AS $item): ?>
					<img src="<?php echo $item['o_photo']; ?>">
					<?php  endforeach; $ln++; unset($ln); ?>
					<?php endif; ?>
				</div>
			</li>
			<li class="activity-info-items ">
				<i class="cost-icon"></i>
				<h3 >费用</h3>
				<p class='activity-info-cost'><?php if($activity['act_charge']=='0.00'): ?>免费<?php  else: ?><span class="money-symbol">￥</span><span><?php echo $activity['act_charge']; ?>元</span><?php endif; ?></p>
			</li>
		</ul>
	</section>
	<section class="activity-detail">
		<h3 class='detail-header'><i></i>详情</h3>
		<?php echo $content; ?>
		

<!-- 展开详情 start -->

		
		<div class="detail-cover">
			<i></i>
			<i></i>
			<span>展开详情</span>
		</div>
		
<!-- 展开详情 end -->

	</section>
	<section class="activity-rules">
		<h3>活动须知</h3>
		<?php $ln=1; if(is_array($notice)) foreach($notice AS $key => $item): ?>
        <p><?php echo $key+1; ?>.<?php echo $item['n_notice']; ?></p>
		<?php  endforeach; $ln++; unset($ln); ?>

	</section>

	<!--<section class="activity-suit clearfix">
		<h3>装备推荐</h3>
		<div class="activity-suit-content swiper-container">
			<a class="suit-list-prev" href="javascript:;"></a>
			<ul class="activity-suit-list clearfix swiper-wrapper" id="mainWrap">
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
				<li class="suit-list-item swiper-slide">
					<a href="#">
						<img class='suit-img' src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/suit.png">
						<p class="suit-title">	 探索者户外男女通用30升双肩登山徒步背包
						</p>
					</a>
					<div class="suit-price clearfix">
						<p class="suit-price-group">团购价:
							<span class="money-symbol">￥</span>
							<span class="suit-price-now">359</span>
						</p>
						<p class="suit-price-single">
						单买价:<span class="money-symbol">￥</span><span class="suit-price-old">399</span>
						</p>
						<button class="suit-buy">去拼团</button>
					</div>
				</li>
			</ul>
			<a class="suit-list-next" href="javascript:;"></a>
		</div>
	</section>-->
	<div class="btn-group clearfix">
		<a class="phone" href="tel:<?php echo $activity['act_consult']; ?>">电话</a>

		<a class="chatBtn" href="javascript:;"  onclick="_MEIQIA('showPanel')">聊天</a>
		<button class="apply-btn">立即报名</button>
	</div>


	<!-- 报名弹出层 start-->
	<div class="apply-bar">
		<div class="apply-form">
		<a class="activity-close apply-bar-close" href="javascript:;"></a>
			<h3>填写报名信息</h3>
			<form id='applyInfo' >
				<ul>
					<li class="apply-form-items"><span>姓名:</span><input id="userName" type="text" name="userName" value="<?php echo $signInfo['userName']; ?>" maxlength="20"></li>
					<li class="apply-form-items"><span>手机号:</span><input id="userTel" type="tel" name="userTel" value="<?php echo $signInfo['userTel']; ?>" maxlength="11"></li>
					<li class="apply-form-items"><span>身份证号:</span><input id="idCard" type="text" name="userId" value="<?php echo $signInfo['userId']; ?>" maxlength="18"></li>
					<li class="apply-form-items lastli"><i></i>我同意<a href="javascript:void(0);" onclick="showDeals('duty')">&lt;&lt;免责协议&gt;&gt;</a></li>
				</ul>
				<input type="hidden" name="actId" value="<?php echo $activity['act_id']; ?>">
				<input type="hidden" name="shareUid" value="<?php echo $shareUid; ?>">
				<!--<input type="hidden" name="cId" value="$charge['c_id']}">-->
				<input type="button" value="提交报名" class="apply-submit" onclick="applySubmit()">

			</form>
		</div>
	</div>
	<!-- 报名弹出层 end-->

	<!-- 免责协议弹出层 start-->
	<div class="activity-deal-wrap">
	<div class="activity-deal-bar">
		<h3>免责协议</h3>
		<div class="deal-content">
			<p>1.活动有风险，请谨慎报名，可以自行购买保险。</p>
			<p>2.参与者须对自己的行为及后果负责，不建议患有高血压、心脏病及其他不适宜参与剧烈运动的疾病的患者参加高强度高风险的户外活动。</p>
			<p>3.代他人报名者，代报名者有义务把活动情况详细告知被代报名者，被代报名者由代报名者承担责任。</p>
			<p>4.凡参与者均视为具有完全民事行为能力人。如在活动中发生非人为主观故意造成的人身损害后果，领队及活动召集者会全力组织救助，但不承担赔偿及相关的责任。</p>
			<p>【特别提示】当您按照报名页面提示填写信息、阅读并同意协议且完成全部报名内容后，即表示您已充分阅读、理解并接受协议的全部内容。</p>

		</div>
		<div class="deal-conform"><a class="agreed" href="javascript:void(0);" onclick="hideDeals('duty')">同意</a></div>
		<div class="white-cover"></div>
	</div>
	</div>



	<!-- 免责协议弹出层 end-->
	


	<!-- 支付弹出层 start-->

	<div class="activity-payment-bar">
		<div class="activity-payment-wrap">
			<a class="activity-close payment-bar-close" href="javascript:;"></a>
			<h3>支付活动费用</h3>
			<div class="activity-payment-content">
				<div class="content-left"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $activity['act_poster']; ?>"></div>
				<div class="content-right">
					<ul>
						<li class="content-items content-items-t"><?php echo $activity['act_title']; ?></li>
						<li class="content-items"><?php echo date('m-d H:i',$activity['act_start_time']); ?>至<?php echo date('m-d H:i',$activity['act_end_time']); ?></li>
						<li class="content-items"><?php echo $activity['act_address']; ?></li>
						<li class="content-items">人均 <?php echo $activity['act_charge']; ?>元</li>
					</ul>
				</div>
			</div>
			<?php if($activity['act_is_group'] == 1): ?>
			<div class="activity-progress-bar">
				<div class="activity-progress">
					<div class="runner">
						<div class="tips-num"><span class="signed-num"><?php echo $activity['act_num_signed']; ?>人</span></div>
					</div>
					<div class="point-group">
						<?php $ln=1; if(is_array($price_step)) foreach($price_step AS $k => $item): ?>
						<div class="point-item">
							<?php if($k == 0): ?>
							<span class="point arrive"><?php echo $item['money']; ?>元</span>
							<span class="point-desc"><i hidden>0</i>开团</span>
							<?php  else: ?>
							<span class="point"><?php echo $item['money']; ?>元</span>
							<span class="point-desc"><i><?php echo $item['num']; ?></i>人团</span>
							<?php endif; ?>
						</div>
						<?php  endforeach; $ln++; unset($ln); ?>
						<!--<div class="point-item">
							<span class="point">10元</span>
							<span class="point-desc"><i>30</i>人团</span>	
						</div>
						<div class="point-item">
							<span class="point">8元</span>
							<span class="point-desc"><i>50</i>人团</span>	
						</div>
						<div class="point-item">
							<span class="point ">6元</span>
							<span class="point-desc"><i>100</i>人团</span>	
						</div>-->
					</div>
				</div>
<!-- 				<div class="activity-progress-desc">
					<span><i>30</i>人团</span>
					<span><i>50</i>人团</span>
					<span><i>100</i>人团</span>
				</div> -->
			</div>
			<?php endif; ?>
			<div class="group-deal"><i></i>我同意<?php if($activity['act_is_group'] == 1): ?><a href="javascript:void(0);" onclick="showDeals('group')">&lt;&lt;拼团说明&gt;&gt;</a><?php  else: ?><a href="javascript:void(0);" onclick="showDeals('duty')">&lt;&lt;免责说明&gt;&gt;</a><?php endif; ?></div>
			<div class="pay-bottom clearfix">
				<div class="payment-count">总计：<span class="money-symbol">￥</span><span class="total-cost"><?php echo $activity['act_charge']; ?>元</span> </div>
				<button class="activity-pay">支付</button>
			</div>
		</div>
		
	</div>

	<!-- 支付弹出层 end-->

	<!-- 支付失败 start-->
	<div class="pay-result-wrap pay-failed" >
		<div class="pay-result-bar">
			<h3>支付失败</h3>
			<p>支付遇到问题，请尝试重新支付</p>
			<div class='pay-result-btns'>
				<a href="javascript:;" id="pay-cancel">取消</a>
				<a href="javascript:;" id="pay-refresh">重新支付</a>
			</div>
		</div>
	</div>

	<!-- 支付失败 end-->

	<!-- 支付成功 start-->
	<div class="pay-result-wrap pay-successed">
		<div class="pay-result-bar">
			<h3>支付成功</h3>
			<p>恭喜您报名成功，记得准时参加活动哦！</p>
			<div class='pay-result-btns'>
				<a href="javascript:;" id="pay-sure">确定</a>
				<a href="<?php echo WEB_PATH; ?>/mobile/activity/activitylists">继续看看</a>
			</div>
		</div>
	</div>

	<!-- 支付成功 end-->
	

	



	<div class="empty-space"></div>

	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/activity.js" type="text/javascript"></script>
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/swiper.min.js"></script>
	<script>
		$(function () {
			var act_flag = "<?php echo $actInfo['flag']; ?>";
			if(act_flag == 'ok'){
				$('.pay-successed').show();
			}else if(act_flag == 'failed'){
				$('.pay-failed').show();
			}else{

			}
			$('#pay-cancel').click(function () {
				$(this).parent().parent().parent().hide();
			});
			$('#pay-refresh').click(function () {
				$('.apply-btn').trigger('click');
			});
			$('#pay-sure').click(function () {
				$('.pay-successed').hide();
			});
			//已报名处理
			var flag = <?php echo $flag; ?>;
			//var invalid = <?php echo $activity['act_sign_flag']; ?>;
			var act_start_time = <?php echo $activity['act_start_time']; ?>;
			var act_end_time = <?php echo $activity['act_end_time']; ?>;
			var time = <?php echo $time; ?>;
			if(flag == 1){
				$('.apply-btn').text('已报名').attr('disabled','disabled').addClass('btn-disabled');
			}else if(flag == 2) {
				$('.apply-btn').text('已截止报名').attr('disabled','disabled').addClass('btn-disabled');
			}else if(act_start_time < time){
				$('.apply-btn').text('活动进行中').attr('disabled','disabled').addClass('btn-disabled');
			}else if(act_end_time < time){
				$('.apply-btn').text('活动已结束').attr('disabled','disabled').addClass('btn-disabled');
			}else{
				return;
			}

			// 美恰客服

		});
		// 美恰客服
		(function(m, ei, q, i, a, j, s) {
		    m[i] = m[i] || function() {
		        (m[i].a = m[i].a || []).push(arguments)
		    };
		    j = ei.createElement(q),
		        s = ei.getElementsByTagName(q)[0];
		    j.async = true;
		    j.charset = 'UTF-8';
		    j.src = '//static.meiqia.com/dist/meiqia.js';
		    s.parentNode.insertBefore(j, s);
		})(window, document, 'script', '_MEIQIA');
		_MEIQIA('entId', 31216);
		_MEIQIA('withoutBtn');
		//装备推荐
		$(function(){
			var mySwiper = new Swiper('.swiper-container',{
				loop:false,
				slidesPerView : 2,
				slidesPerGroup : 2,
				spaceBetween: '4%',
				prevButton:'.suit-list-prev',
				nextButton:'.suit-list-next',

			})
		});




	</script>
	<!-- 微信分享 -->
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jweixin.js"  language="javascript"  type="text/javascript"></script>
	<script type="text/javascript">

	  wx.config({
	    debug: false,
	    appId: "<?php  echo $wechat['appid']; ?>",
	    timestamp: <?php  echo $signPackage["timestamp"]; ?>,
	    nonceStr: '<?php  echo $signPackage["nonceStr"]; ?>',
	    signature: '<?php  echo $signPackage["signature"]; ?>',
	    jsApiList: ["checkJsApi", "onMenuShareAppMessage", "onMenuShareTimeline", "onMenuShareWeibo", "onMenuShareQQ"]
	  });
	wx.ready(function () {
	var n = window.location.href+"/<?php echo $uid; ?>";
	var shareTitle = "<?php echo $shareInfo['title']; ?>" || "<?php echo $activity['act_title']; ?>";
	var shareDesc = "<?php echo $shareInfo['description']; ?>" || $('.activity-detail p').text();
	var shareIconUrl = "<?php echo G_UPLOAD_PATH; ?>/<?php echo $shareInfo['icon']; ?>" || "<?php echo G_UPLOAD_PATH; ?>/<?php echo $activity['act_poster']; ?>" || "<?php echo G_TEMPLATES_IMAGE; ?>/shop/shareIcon.png";
	// var shareSuccess = function(){
	//   alert('分享成功');
	// };

	// var shareCancel = function(){
	//   alert('已取消');
	// }
	    wx.onMenuShareTimeline({
	        title: shareTitle, // 分享标题
	        link: n, // 分享链接
	        imgUrl: shareIconUrl, // 分享图标
	        // success: shareSuccess,
	        // cancel: shareCancel
	    });
	    wx.onMenuShareAppMessage({
	        title: shareTitle, // 分享标题
	        desc: shareDesc, // 分享描述
	        link: n, // 分享链接
	        imgUrl: shareIconUrl, // 分享图标
	        type: '', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	         // success: shareSuccess,

	        // cancel: shareCancel
	    });
	    wx.onMenuShareQQ({
	        title: shareTitle, // 分享标题
	        desc: shareDesc, // 分享描述
	        link: n, // 分享链接
	        imgUrl: shareIconUrl, // 分享图标
	        type: '', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	         // success: shareSuccess,

	        // cancel: shareCancel
	    });
	    wx.onMenuShareWeibo({
	        title: shareTitle, // 分享标题
	        desc: shareDesc, // 分享描述
	        link: n, // 分享链接
	        imgUrl: shareIconUrl, // 分享图标
	        type: '', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	         // success: shareSuccess,

	        // cancel: shareCancel
	    });

	});
	</script>
</body>
</html>
