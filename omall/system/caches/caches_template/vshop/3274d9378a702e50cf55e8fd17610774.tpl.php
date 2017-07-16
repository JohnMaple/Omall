<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单管理</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/header_footer.css">
    <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
	<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/userbuylist.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->



    <div id="navBox" class="g-snav m_listNav">
        <div class="g-snav-lst z-sgl-crt" state="-1"><a href="javascript:;" class="gray9">全部</a></div>
        <div class="g-snav-lst" state="1"><a href="javascript:;" class="gray9">待付款</a></div>
        <div class="g-snav-lst" state="2"><a href="javascript:;" class="gray9">待发货</a></div>
        <div class="g-snav-lst" state="3"><a href="javascript:;" class="gray9">待收货</a></div>
        <input type="hidden" class="state" data-state="<?php echo $state; ?>">
    </div>
    <div class="empty-space"></div>
    <section class="clearfix g-Record-lst">
        <ul class="z-minheight">
	        <div id="divGoodsLoading" class="loading" style="display:none;"></div>
	        <a id="btnLoadMore" class="loading" href="javascript:;" style="display:none;"><img id="bk" alt="loading" src="<?php echo G_TEMPLATES_IMAGE; ?>/mobile/loading2.gif" style="height:30px"></a>
        </ul>
    </section>
	<div class="empty-space"></div>
    
<!--S 底部导航 -->
    <ul id="c_main_menu">
      <li id="nav_index" >
        <a href="<?php echo WEB_PATH; ?>/mobile/mobile">
          <span class="c_index"></span>
          <b>首页</b>
        </a>
      </li>
      <li id="nav_goods" class="c_menu_this">
        <a href="<?php echo WEB_PATH; ?>/mobile/home/userbuylist">
          <span class="c_all_good"></span>
          <b>订单</b>
        </a>
      </li>

      <li id="nav_member">
        <a href="<?php echo WEB_PATH; ?>/mobile/home">
          <span class="c_new_know"></span>
          <b>个人中心</b>
        </a>
      </li>
    </ul> 
    <!--E 底部导航 -->
<style>
#pageDialogBG{-webkit-border-radius:5px; width:255px;height:45px;color:#fff;font-size:16px;text-align:center;line-height:45px;}
</style>
<div id="pageDialogBG" class="pageDialogBG">
<div class="Prompt"></div>
</div>
<script>

</script>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_TEMPLATES_STYLE; ?>";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  Path.imgpath = "<?php echo G_WEB_PATH; ?>/statics";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js?v='+GetVerNum());
</script>
 
</div>
</body>
</html>
