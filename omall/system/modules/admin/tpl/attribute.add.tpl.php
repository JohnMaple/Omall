<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo G_PLUGIN_PATH; ?>/uploadify/api-uploadify.js" type="text/javascript"></script> 
<style>
	.bg{background:#fff url(<?php echo G_GLOBAL_STYLE; ?>/global/image/ruler.gif) repeat-x scroll 0 9px }
	.color_window_td a{ float:left; margin:0px 10px;}
</style>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table_form lr10">
<form method="post" action="">
	<table width="100%"  cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" style="width:120px"><font color="red">*</font>所属商品分类：</td>
			<td>
            <select id="category" name="cateid">           
                <?php echo $categoryshtml; ?>                
             </select> 
            </td>
		</tr>
        <tr>
			<td align="right" style="width:120px"><font color="red">*</font>属性名称：</td>
			<td>
            <input  type="text" id="attr_name"  name="attr_name" class="input-text bg">
            </td>
		</tr>
		<tr style="background-color:#FFC">
			<td style="width:120px"></td>
			<td>
				<b>提示：</b> <font color="red">属性类型是前台页面的显示效果，唯一属性表示商品的属性描述，用户只能才看，单选属性表示商品的属性可以选择<br>　　　（只能添加一个单选属性作为前台属性选择，唯一属性可以不选）</font><br />
			</td>
		</tr>
		<tr>
            <td align="right" style="width:120px">属性类型：</td>
            <td>
                <label><input type="radio" name="attr_type" value="0" checked="checked" /> 唯一属性&nbsp;&nbsp;</label>
                <label><input type="radio" name="attr_type" value="1" /> 单选属性&nbsp;&nbsp;</label>
            </td>
		</tr>
		<tr>
            <td align="right" style="width:120px">属性值录入方式：</td>
            <td>
                <label><input type="radio" name="attr_input_type" value="0" checked="checked" /> 手工录入&nbsp;&nbsp;</label>
                <label><input type="radio" name="attr_input_type" value="1"/> 列表选择&nbsp;&nbsp;</label>
            </td>
		</tr>
		<tr style="background-color:#FFC">
			<td style="width:120px"></td>
			<td>
				<b>提示：</b> <font color="red">商品多个属性值请用英文逗号隔开，属性录入方式：手工录入，请不要填写属性值列表；列表选择，请从下面列表中选择</font><br />
			</td>
		</tr>
        <tr>
			<td align="right" style="width:120px">属性值列表：</td>
			<td><textarea name="attr_value" class="wid400" onKeyUp="gbcount(this,250,'textdescription');" style="height:60px"></textarea><br><span>还能输入<b id="textdescription">250</b>个字符</span>
            </td>
		</tr> 
        <tr height="60px">
			<td align="right" style="width:120px"></td>
			<td>
			    <input type="submit" name="dosubmit" class="button" value="添加属性" />&nbsp;&nbsp;
                <input type="reset" class="button" id="resetbtn" value="属性重置"/>
			</td>
		</tr>
	</table>
</form>
</div>
<script type="text/javascript">
	var info=new Array();
    function gbcount(message,maxlen,id){
		
		if(!info[id]){
			info[id]=document.getElementById(id);
		}			
        var lenE = message.value.length;
        var lenC = 0;
        var enter = message.value.match(/\r/g);
        var CJK = message.value.match(/[^\x00-\xff]/g);//计算中文
        if (CJK != null) lenC += CJK.length;
        if (enter != null) lenC -= enter.length;		
		var lenZ=lenE+lenC;		
		if(lenZ > maxlen){
			info[id].innerHTML=''+0+'';
			return false;
		}
		info[id].innerHTML=''+(maxlen-lenZ)+'';
    }
    //当页面加载完成后
	$(function(){
		$('#resetbtn').bind('click',function(){
			$('textarea[name=attr_value]').val('').attr('disabled',true).css('background','#EBEBE4');
		});
        //获取属性录入方式对象
        $("textarea[name=attr_value]").attr('disabled',true).css('background','#EBEBE4');
        //为录入方式绑定事件
        $('input[name=attr_input_type]').change(function(){
        if($(this).val() == 1){
        	$('textarea[name=attr_value]').attr('disabled',false).css('background','#fff');
        }else{
			$('textarea[name=attr_value]').val('').attr('disabled',true).css('background','#EBEBE4');
        }
        });
    });
</script>
</body>
</html> 