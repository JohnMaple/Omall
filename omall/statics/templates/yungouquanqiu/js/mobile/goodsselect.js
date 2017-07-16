$(function(){
	var close=$('#selectBar-close');
	var sectionWrap=$('.selectBar-wrap');
	var section=$('.selectBar');
	var classChose=$('.goodsClass-list li'),
		price = $('.detail-price span');
		last=$('.detail-last span'),
		selected=$('.detail-selected');
	var lastNum=last.text();
	var more=$('#More');
	var less=$('#Less');
	var currentN=$('#nums');
	var goodsImg = $('.goodsInfo-img img');
	var goodsWrap=$('.goodsInfo-img');
 	var w=($(document).width()-30)*(goodsWrap.width()/100);
	goodsWrap.css('height',w); 

	
	//关闭
	close.click(function(){
		sectionWrap.slideUp(function(){
			$(this).remove();
		});

	});
	
	//分类
	classChose.click(function(){
		var attr_src = $(this).attr('attr-src');
		var pro_info = $(this).attr('pro-info');
		var pro_price = $(this).attr('pro-price');
		//alert(pro_info);
		var cur=$(this);
		var cont=cur.text();
		cur.addClass('classSel');
		cur.siblings().removeClass('classSel');
		goodsImg.attr('src',Gobal.Uploadpath+'/'+attr_src);
		price.text(pro_price);
		last.text(pro_info);
		selected.html('已选:"<span>'+cont+'<span>"');
	})

	//购买数量
	more.click(function(){
		var i=currentN.text();
		i++;
		if(i>lastNum){
			currentN.text(lastNum);
		}
		else{
			currentN.text(i);
		}
	});
	less.click(function(){
		var i=currentN.text();
		i--;
		if(i<=1){
			currentN.text(1);
		}
		else{
			currentN.text(i);
		}
	});
	
	//加入购物车
	$('#addBtn').click(function(){
		var id=$('.shopId').val() || $("#hidCodeID").val();
		var num=$('#nums').text();
		var proid = $('.classSel').attr('pro-id');
		var g_aid = $('.classSel').attr('attr-data');
		var pro_price = $('.classSel').attr('pro-price');
		var pro_info = $('.classSel').attr('pro-info');
		//alert(pro_info);
		if(classChose.hasClass('classSel')){
			$.getJSON(Gobal.Webpath+'/mobile/ajax/addShopCart/'+id+'/'+num+'/'+proid+'/'+pro_price+'/'+pro_info+'/'+g_aid+'/cart',function(data){
			if(data.code==1){
				addsuccess('添加失败');
			}else if(data.code==0){
				addsuccess('添加成功');	
			}return false;
			});
		}else{
			showerror("请选择商品属性");
		}
		
	});
	//修改购物车
	$('#editBtn').click(function(){
		var id=$('.shopId').val() || $("#hidCodeID").val();
		var num=$('#nums').text();
		var proid = $('.classSel').attr('pro-id');
		var g_aid = $('.classSel').attr('attr-data');
		var pro_price = $('.classSel').attr('pro-price');
		var pro_info = $('.classSel').attr('pro-info');
		var ckey = $('.ckey').val();
		//alert(pro_info);
		if(classChose.hasClass('classSel')){
			$.getJSON(Gobal.Webpath+'/mobile/ajax/editShopCart/'+id+'/'+num+'/'+proid+'/'+pro_price+'/'+pro_info+'/'+g_aid+'/cart'+'/'+ckey,function(data){
				if(data.code==1){
					addsuccess('修改失败');
				}else if(data.code==0){
					sectionWrap.slideUp(function(){
						$(this).remove();
					});
					addsuccess('修改成功');
					window.location.replace(Gobal.Webpath+'/mobile/cart/cartlist');
					
				}return false;
			});
		}else{
			showerror("请选择商品属性");
		}

	})
	
	function showerror(dat){
		$("#pageDialogBG .Prompt").text("");
		var w=($(window).width()-200)/2,
			h=($(window).height()-100);
			//h=100;
		$("#pageDialogBG").css({top:h,left:w,opacity:0.8});
		$("#pageDialogBG").stop().fadeIn(1000);
		$("#pageDialogBG .Prompt").append(dat);
		$("#pageDialogBG").fadeOut(1000);

	}

	function addsuccess(dat){
		$("#pageDialogBG .Prompt").text("");
		var w=($(window).width()-200)/2,
			h=($(window).height()-45)/2;
		$("#pageDialogBG").css({top:h,left:w,opacity:0.8});
		$("#pageDialogBG").stop().fadeIn(1000);
		$("#pageDialogBG .Prompt").append('<s></s>'+dat);
		$("#pageDialogBG").fadeOut(1000);
		//购物车数量
		$.getJSON(Gobal.Webpath+'/mobile/ajax/cartnum',function(data){
			$("#btnCart").append('<em>'+data.num+'</em>');
		});
	}

	//立即购买：
	$('#parchaseBtn').click(function(){
		var id=$('.shopId').val() || $("#hidCodeID").val();
		var num=$('#nums').text();
		var proid = $('.classSel').attr('pro-id');
		var g_aid = $('.classSel').attr('attr-data');
		var pro_price = $('.classSel').attr('pro-price');
		var pro_info = $('.classSel').attr('pro-info');
		if(classChose.hasClass('classSel')){
			$.getJSON(Gobal.Webpath+'/mobile/ajax/addShopCart/'+id+'/'+num+'/'+proid+'/'+pro_price+'/'+pro_info+'/'+g_aid+'/shopping',function(data){
				if(data.code==0){
					location.href = Gobal.Webpath+'/mobile/cart/pay';
				}else if(data.code==1){
					showerror("请选择商品属性");
				}return false;
			});
		}else{
			showerror("请选择商品属性");
		}
	});
	



})