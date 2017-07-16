<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>活动商城</title>
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
	<!-- <header class="header-t home-t">活动商城</header> -->
	<div class="swiper-container swiper-container-home" id="swiper-ad">
	    <div class="swiper-wrapper">
			<?php $ln=1;if(is_array($banner)) foreach($banner AS $item): ?>
	        <div class="swiper-slide">
	        	<a href="<?php echo $item['link']; ?>">
	        		<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['img']; ?>">
	        	</a>
	        </div>
			<?php  endforeach; $ln++; unset($ln); ?>
	    </div>
	    <div class="swiper-pagination"></div>
	</div>
	<div class="swiper-selecter-bar swiper-container " id="swiper-selecter">
		<div class="swiper-wrapper">
			<?php $ln=1;if(is_array($act_category)) foreach($act_category AS $value): ?>
			<div class="swiper-slide cate-div">
				<ul class="activity-selecter-item">
					<?php $ln=1;if(is_array($value)) foreach($value AS $val): ?>
					<li><a href="<?php echo G_WEB_PATH; ?>/mobile/activity/activitylists/<?php echo $val['c_id']; ?>"><i class=""><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $val['c_icon']; ?>" alt="<?php echo $val['c_name']; ?>"></i><?php echo $val['c_name']; ?></a></li>
					<?php  endforeach; $ln++; unset($ln); ?>
				</ul>
			</div>
			<?php  endforeach; $ln++; unset($ln); ?>
			
		</div>
	   	<div class="swiper-pagination"></div>
	
	</div>
	<section class="activities-wrap clearfix">
		<!--<?php $ln=1; if(is_array($activities)) foreach($activities AS $k => $v): ?>
		<div class="activities-item">
			<a class="activities-detail" href="<?php echo G_WEB_PATH; ?>/mobile/activity/activity/<?php echo $v['act_id']; ?>">
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
						<?php echo $title_tag; ?><?php echo $v['act_title']; ?>
					</h4>
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
		<!--<div class="activities-item">
			<a class="activities-detail" href="<?php echo G_WEB_PATH; ?>/mobile/mobile/activity/<?php echo $v['act_id']; ?>">
				<div class="activities-top clearfix">
					<h4>AI天团首秀 大数据‘技’情直播</h4>
					<span>1月16日</span>
				</div>
				<img src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/s.png">
				<p class="activities-desc">1.16-1.19，美女CTO讲师独家直播，看大数据怎样助人工智能跨越“智障区”！</p>
			</a>
			<a href="#" class="activities-btn">立即报名<span class="activities-cost">120</span><span class="money-symbol">￥</span></a>	
		</div>
		<div class="activities-item">
			<a class="activities-detail" href="<?php echo G_WEB_PATH; ?>/mobile/mobile/activity/<?php echo $v['act_id']; ?>">
				<div class="activities-top clearfix">
					<h4>AI天团首秀 大数据‘技’情直播</h4>
					<span>1月16日</span>
				</div>
				<img src="<?php echo G_TEMPLATES_IMAGE; ?>/activity/s.png">
				<p class="activities-desc">1.16-1.19，美女CTO讲师独家直播，看大数据怎样助人工智能跨越“智障区”！</p>
			</a>
			<a href="#" class="activities-btn">立即报名<span class="activities-cost">120</span><span class="money-symbol">￥</span></a>	
		</div>-->
		<div class="loader-gif" id="loading">
			<div class="a-loader"></div>
		</div>
		<div class="a-nomore">&nbsp;END&nbsp;</div>
	</section>
	<div class="no-content" hidden><s></s><p>神马都没有</p></div>
    <input id="pagenum" value="" type="hidden" /> <!--当前需要加载到第几页了-->
	<p class="copyright"><?php echo _cfg('web_copyright'); ?></p>
	<div style="height: 50px;"></div>
	<!--S 底部导航 -->
	 <ul class="a-main-menu">
	   <li class="a-menu-this">
	     <a href="<?php echo WEB_PATH; ?>/mobile/activity/activityhome">
	       <span class="a-index"></span>
	       <b>首页</b>
	     </a>
	   </li>
	   <li>
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

	


	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery-2.1.4.min.js"></script>
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/swiper.min.js"></script>
	
	<script type="text/javascript">
        //打开页面加载数据
        window.onload=function(){
            getActList('',10);
        }
        //轮播图
		var myswiper = new Swiper('#swiper-ad',{
			direction: 'horizontal',
			loop:true,
			pagination: '#swiper-ad > .swiper-pagination',
			paginationClickable: true,
			autoplay:3000,
			lazyLoading : true,
			lazyLoadingInPrevNext : true,
		})
        //分类列表
		var myswiper = new Swiper('#swiper-selecter',{
			direction: 'horizontal',
			loop:false,
			pagination: '#swiper-selecter > .swiper-pagination',
			paginationClickable: true,

		})

		/*$(function () {
			//条件装备租赁
			var len = $('.cate-div').length;
			var li_len = $($('.cate-div')[len-1]).find('li').length; //最后一个分类中的li为8个
			if(li_len<8){
				var li = "<li><a href='<?php echo G_WEB_PATH; ?>/mobile/activity/activityhome/'><i class=''><img src='<?php echo G_TEMPLATES_IMAGE; ?>/activity/acicon/rent.png}' alt='装备推荐'></i>装备推荐</a></li>";
				$($('.cate-div')[len-1]).find('ul').append(li);
			}else{
			}
			console.log($($('.cate-div')[len-1]).find('li').length);
		});
		*/
        /**
         * 获取活动分页
         * @param pageNum
         * @param pageRow
         */
        function getActList(pageNum,pageRow) {
            $("#pagenum").val(''); //先清除之前的页数
            $.ajax({
                type:"POST",
                url:"<?php echo WEB_PATH; ?>/mobile/activity/ajaxGetActList",
                data:{pageNum:pageNum,pageRow:pageRow},
                dataType:"json",
                success:function (data) {
                    if(data[0].pageSum) {
                        $("#pagenum").val(data[0].pageNum); //重新赋值要加载的分页
                        for (var i = 0; i < data.length; i++) {
                            var item = '<div class="activities-item">';
                            item += '<a class="activities-detail" href="<?php echo G_WEB_PATH; ?>/mobile/activity/activity/' + data[i].act_id + '">';
                            item += '<div class="activities-top clearfix">';
                            item += '<h4>' + data[i].act_title + '</h4>';
                            item += '<span>' + data[i].start_time + '</span>';
                            item += '</div>';
                            item += '<div class="activities-box"><img src="<?php echo G_UPLOAD_PATH; ?>/' + data[i].act_home_poster + '"></div>';
                            item += '<p class="activities-desc">' + data[i].act_desc + '</p>';
                            item += '</a>';
                            item += '<a href="<?php echo G_WEB_PATH; ?>/mobile/activity/activity/' + data[i].act_id + '" class="activities-btn">立即报名<span class="activities-cost">' + data[i].charge + '</span><span class="money-symbol">￥</span></a>';
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
                        //$(".no-content").css('display','block'); //没有数据了
                        $(".a-nomore").css('display','none');
                    }
                }
            });
        }

		$(function () {
            //加载更多
            $(window).scroll(function() {
                if ($(document).height() - $(this).scrollTop() - $(this).height() < 1 && $('.loader-gif').css('display') != 'none') {
                    var pageNum = $('#pagenum').val();
                    getActList(pageNum,10);
                }
            });
        });

	//在除微信外其他浏览器打开时

	var otherBrowser = false;//后台是否开启
	if(otherBrowser){
        var wx=false;
        var ua = navigator.userAgent.toLowerCase();
        if(ua.match(/MicroMessenger/i)=="micromessenger"){
            wx = true;
        }
        if(!wx){
        	var cont = "<div style='margin:0 auto;padding-top:20%;text-align:center;box-sizing:border-box;'><img src='<?php echo G_TEMPLATES_IMAGE; ?>/weixin.png'/><p style='color:#333;font-size:16px;'>请扫码关注公众号,在公众号内进行操作！</p></div>"
            $('body').empty().append(cont);
        }
    }
   



	</script>


</body>
</html>