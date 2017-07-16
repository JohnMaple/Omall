<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>后台地图</title>
<style>
body{color:#444; height:100%}a{text-decoration:none; color:#444; margin:20px;}
.pad-6{padding:6px; overflow:hidden}.pad-10{padding:10px; overflow:hidden}.pad_10,.pad-lr-10{padding:0 10px}.pad-lr-6{padding:0 6px}
.div1{color:#fff;background:#4C8CCF;width:67%;height:35px;line-height:35px;font-size:0.5cm;}
.div2{height:35px;line-height:35px;float:right;padding-right:10px;}

.map-menu ul{ margin:5px;width:130px;border:1px solid #CCC;}
.map-menu ul li.title{display:block;height:30px;background:#222;font:bold 14px/40px "宋体"; color:#fff;padding-left:25px; line-height: 30px;}
.map-menu ul li.title2{display:block;height:30px;background:#222;font:bold 14px/40px "宋体"; color:#fff;padding-left:25px; line-height: 30px;}
.map-menu ul li{display:block;height:30px;background:#f9f9f9;border-bottom:2px solid #eee;border-top:1px solid #fff;border-right:1px solid #eee;font:normal 12px/33px Georgia "宋体"; color:#666;padding-left:10px; line-height: 30px;}
.map-menu ul li a:hover{color:#C40000;}

body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,ol,li,pre,form,fieldset,legend,button,input,textarea,th,td{margin:0;padding:0;word-wrap:break-word}
body,html,input{font:12px/1.5 tahoma,arial,\5b8b\4f53,sans-serif;}
ul,ol,li{list-style:none;}
a{text-decoration:none;}
a:hover{text-decoration:underline;}
/*通用样式*/
.lf{float: left}.rt{float: right}.pr{ position:relative}.pa{ position:absolute}
	</style>
</head>
<body>
    <div class="map-menu lf">
        <ul>
        <li class="title">系统设置</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/setting/webcfg">seo设置</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/setting/config">基本设置</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/setting/upload">上传设置</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/setting/watermark">水印设置</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/setting/email">邮箱设置</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/setting/mobile">短信设置</a></li>
        <li><a href="<?php echo WEB_PATH; ?>/pay/pay/pay_list">支付设置</a></li>
        <li class="title2">管理员管理</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/user/lists">管理员管理</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/user/reg">添加管理员</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/user/edit/<?php echo $info['uid']; ?>">修改密码</a></li>
	</div><div class="map-menu lf"><ul>
        <li class="title2">站长运营</li>
		<li><a href="<?php echo G_ADMIN_PATH; ?>/yunwei/websubmit">网站提交</a></li>
		<li><a href="<?php echo G_ADMIN_PATH; ?>/yunwei/webtongji">站长统计</a></li>
        <li class="title2">后台首页</li>
        <li><a href="<?php echo G_ADMIN_PATH; ?>/index/Tdefault">后台首页</a></li>
        </ul>
    </div>

    <div class="map-menu lf">
        <ul>
        <li class="title">商品管理</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/content/goods_add">添加新商品</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/content/goods_list">商品列表</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/category/lists/goods">商品分类</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/brand/lists">品牌管理</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/brand/insert">添加品牌</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/content/goods_del_list">商品回收站</a></li>
	 </div><div class="map-menu lf"><ul> 
        <li class="title2">订单管理</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/dingdan/lists">订单列表</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/dingdan/select">订单查询</a></li>
		<li><a href="<?php echo G_MODULE_PATH; ?>/dingdan/lists/gaisend">未发货订单</a></li>
        </ul>    
    </div>
    
    
<div class="map-menu lf"><ul>
<li class="title">用户管理</li>
        <li><a href="<?php echo WEB_PATH; ?>/member/member/lists">会员列表</a></li> 	
		<li><a href="<?php echo WEB_PATH; ?>/member/member/select">查找会员</a></li> 	
        <li><a href="<?php echo WEB_PATH; ?>/member/member/insert">添加会员</a></li> 	
        <li><a href="<?php echo WEB_PATH; ?>/member/member/config">会员配置</a></li>
</ul>
</div><div class="map-menu lf"><ul>
<li class="title">界面管理</li>
<li><a href="<?php echo G_MODULE_PATH; ?>/wap">手机幻灯管理</a></li>
<li><a href="<?php echo WEB_PATH; ?>/api/qqlogin/qq_set_config">登陆设置</a></li>
            <li class="title2">模板风格</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/template/">模板设置</a></li>
		<li><a href="<?php echo G_MODULE_PATH; ?>/template/see">查看模板</a></li>
</ul>
</div><div class="map-menu lf"><ul>
<li class="title2">文章管理</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/content/article_add">添加文章</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/content/article_list">文章列表</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/category/lists/article">文章分类</a></li>
<li class="title2">单页管理</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/category/addcate/danweb">添加单页</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/category/lists/single">单页列表</a></li>
<li class="title2">附件管理</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/upload/lists">上传文件管理</a></li>
        </div><div class="map-menu lf"><ul>
<li class="title2">其他</li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/content/model">内容模型</a></li>
        <li><a href="<?php echo G_MODULE_PATH; ?>/category/lists">栏目管理</a></li>

</ul>
</div><div class="map-menu lf">

</div>


</body>
</html>