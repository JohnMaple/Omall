<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>购物车</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/cartList.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/main.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
	<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/Cartindex.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile"  class="goHome"></a>
        <h2>购物车</h2>

    </header>

    <input name="hidLogined" type="hidden" id="hidLogined" value="1" />
    <div class="empty-space"></div>
    <section class="clearfix g-Cart">
	    <?php if($shop!=0): ?>
	        <article class="clearfix g-Cart-list">
	            <ul id="cartBody">
				<?php 
				$buyshopmoney=0;
				 ?>
	            <?php $ln=1; if(is_array($shoplist)) foreach($shoplist AS $key => $val): ?>
				<?php 
            	   $num = count($shoplist);
				   $buyshopmoney+=$Mcartlist[$key]['money']*$Mcartlist [$key]['num'];
					if(empty($val['flag'])){
						$spec = explode(' ',$val['key_name']);
					//var_dump($spec);exit;
						$spec_name = $spec_value = array();
						foreach($spec as $v){
							$spec_arr = explode(':',$v);

							$spec_name[] = $spec_arr[0].':';
							$spec_value[] = $spec_arr[1];
						}
					}else{
						$spec_name[] = '颜色分类:';
						$spec_value[] = _strcut($val['title'],25);
					}
					//var_dump($spec_name);

                 ?>
					<li>		            
						<a class="fl u-Cart-img" href="<?php echo WEB_PATH; ?>/mobile/mobile/goodsdesc/<?php echo $val['goods_id']; ?>">
							<img src="<?php echo G_TEMPLATES_IMAGE; ?>/loading.gif" src2="<?php echo G_UPLOAD_PATH; ?>/<?php echo $val['goods_img']; ?>" border="0" alt=""/>
						</a>
						<div class="u-Cart-r">
							<p class="z-Cart-tt"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/goodsdesc/<?php echo $val['goods_id']; ?>" class="gray6"><?php echo $val['title']; ?></a></p>
							<ins class="z-promo">
								<?php $ln=1; if(is_array($spec_name)) foreach($spec_name AS $k => $v): ?>
								<?php echo $v; ?><em class=""><?php echo $spec_value[$k]; ?></em>
								<?php  endforeach; $ln++; unset($ln); ?>
							</ins>
							<p class="totalPrice">￥<em ><?php echo $val['price']; ?></em><span class="totalNum">x<b><?php echo $Mcartlist[$key]['num']; ?></b></span></p>
							
							<a href="javascript:;" class=" z-edit" name="editLink" gid="<?php echo $val['goods_id']; ?>" cartkey="<?php echo $key; ?>">编辑</a>
							<a href="javascript:;" class=" z-del" name="delLink" cartkey="<?php echo $key; ?>">删除</a>
								
	
						</div>
					</li>
				<?php  endforeach; $ln++; unset($ln); ?>
				
	            </ul>
	        </article>
	       
	    <div id="divBtmMoney" class="g-Total-bt"><p>合计：
	    <span class="all-price">￥<?php echo $buyshopmoney; ?><b>元</b></span></p>
			<a href="javascript:;" class="orgBtn">结算(<?php echo $num; ?>)</a>
		</div>
	<?php endif; ?>
	    <div id="divNone" class="haveNot z-minheight" style="display:none"><s></s><p>购物车空空如也！</p>
	    	<a href="<?php echo WEB_PATH; ?>/mobile/mobile">去逛逛</a>
		</div>
		
    </section>
    <div class="empty-space"></div>



<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_TEMPLATES_STYLE; ?>";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  Path.Uploadpath="<?php echo G_UPLOAD_PATH; ?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js');
</script>

</div>
</body>
</html>