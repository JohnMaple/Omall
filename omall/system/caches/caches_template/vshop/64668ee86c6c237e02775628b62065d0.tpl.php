<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>收货地址管理</title>
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css?v=130715" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css?v=130726" rel="stylesheet" type="text/css" />
<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>


<script src="<?php echo G_TEMPLATES_JS; ?>/jquery.Validform.min.js" language="javascript" type="text/javascript"></script>

<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/OrderList.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">
    <header class="g-header">
        <div class="head-l">
            <a href="javascript:void(0);" onclick="history.go(-1);" class="z-HReturn"></a>
        </div>
        <h2>收货地址管理</h2>

    </header>

    <input name="hidTotalCount" type="hidden" id="hidTotalCount" />
    <input name="hidPageMax" type="hidden" id="hidPageMax" />
    <section class="clearfix  g-goods">
        <article class="">
            <script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/mobile/area.js"></script>
            <script type="text/javascript">

            $(function(){       

                var demo=$(".registerform").Validform({
                    tiptype:1,
                    datatype:{
                        //"tel":/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/,
                        "username":/^[a-zA-Z\u4e00-\u9fa5][a-zA-Z0-9_\u4E00-\u9FA5]{0,15}$/,
                    },
                    //ajaxPost:true
                    // callback:function(data){
                    // if(data.status=="y"){
                    // setTimeout(function(){
                    //     $.Hidemsg(); 
                    // },1000);
                    // }
                    // }
                }); 
               // demo.tipmsg.w["tel"]="请正确输入电话号码(区号、号码必填，用“-”隔开)";
                demo.addRule([
                {
                    // ele:"#txt_ship_tel",
                    // datatype:"tel",
                    // nullmsg:demo.tipmsg.w["tel"],
                    // errormsg:demo.tipmsg.w["tel"],
                }]);


            });
            $(function(){

                var otitle=$('.g-header').find('h2');
             
                $("#btnAddnewAddr").click(function(){
                    $("#div_consignee").show();
                    
                    otitle.text('添加新地址');
                    $("#btnAddnewAddr").hide();
                });
                $("#btn_consignee_cancle").click(function(){
                    $("#div_consignee").hide();
                    $("#btnAddnewAddr").show();
                    otitle.text('管理收货地址');

                });
 
 
            });
            $(function(){
                $(".xiugai").click(function(){
                    $("#btnAddnewAddr").hide();
                    $("#div_consignee").hide();
                });
                $("#btn_consignee_cancle2").click(function(){
                    $("#div_consignee2").hide();
                    $("#btnAddnewAddr").show();
                });
            });
            function update(id){  
            var otitle=$('.g-header').find('h2');
              otitle.text('编辑地址');
                $("#div_consignee2").show();
                setup3();
                $("#registerform3").attr("data-id",id);
                var str=$("#dizh_"+id).find('b').html();
                var spl=str.split(",");
                $("#province3").append('<option selected value="'+spl[0]+'">'+spl[0]+'</option>');
                $("#city3").append('<option selected value="'+spl[1]+'">'+spl[1]+'</option>');
                $("#county3").append('<option selected value="'+spl[1]+'">'+spl[1]+'</option>');
                $("#dizh2").val(spl[3]);
                $("#qqnb2").val($("#item_"+id).attr("qqnb"));
                if($("#sffh_"+id).html()==1){
                    $("#sffh21").attr("checked",'checked');
                }else if($("#sffh_"+id).html()==0){
                    $("#sffh22").attr("checked",'checked');
                }
                $("#mob2").val($("#item_"+id).attr("mob"));
                $("#yb2").val($("#item_"+id).attr("yb"));
                $("#shr2").val($("#item_"+id).attr("shr"));
                $("#div_consignee2").show();
            };
            function dell(id){
                // if (confirm("您确认要删除该条信息吗？")){
                //     
                // }
                myconfirm('confirm','确认要删除该地址吗？',function(){
                    //window.location.href="<?php echo WEB_PATH; ?>/mobile/home/deladdress/"+id;
                    $.ajax({
                        url:"<?php echo WEB_PATH; ?>/mobile/home/deladdress",
                        type:'get',
                        data:{id:id},
                        datatype:'json',
                        success:function(msg){
                            window.location.reload();
                        },
                        error:function(msg){
                            myconfirm('alert','删除地址失败！',function(){return false;});
                        }
                    })
                });
               
            }

            function setdf(id){
              var ele=$('#item_'+id).find('.addr_default');
              if(ele.find('a b').hasClass('all_checked')){
                return false;
              }
              else{

              //  myconfirm('confirm','您确认设置为默认地址吗？',function(){
                    $.ajax({
                        url:"<?php echo WEB_PATH; ?>/mobile/home/setaddress",
                        type:'get',
                        data:{id:id},
                        datatype:'json',
                        success:function(msg){
                            
                            ele.find('a b').addClass('all_checked');
                            ele.find('em').text('默认地址');  
                            var other=$('#item_'+id+'').siblings().find('.addr_default');
                            other.find('a b').removeClass('all_checked');
                            other.find('em').text('设为默认');  
                            window.location.reload();

                        }

                    });
               // });
            }
                
            }
            
            /**
             * pageDialog
             */
            function showmsg(dat){
                $("#pageDialogBG .Prompt").text("");
                var w=($(window).width()-200)/2,
                        h=($(window).height()-100)/2;
                //h=100;
                $("#pageDialogBG").css({top:h,left:w,opacity:0.8});
                $("#pageDialogBG").stop().fadeIn(1000);
                $("#pageDialogBG .Prompt").append(dat);
                $("#pageDialogBG").fadeOut(1000);

            }
            
            $(function(){
                //添加收货地址
                $('#btn_consignee_add').click(function(){
                    //获取表单值
                    $.ajax({
                        url:"<?php echo WEB_PATH; ?>/mobile/home/useraddress",
                        type:'post',
                        data:$('#addrform').serialize(),
                        datatype:'json',
                        success:function(data){
                            var data = eval('('+data+')');
                            if(data.code){
                                showmsg(data.msg);
                                $("#div_consignee").hide();
                                document.location.reload();
                            }else{
                                showmsg(data.msg);
                            }
                        }

                    });
                });
                
                //修改收货地址
                $('#btn_consignee_save').click(function(){
                    var id = $('#registerform3').attr('data-id');
                    //获取表单值
                    $.ajax({
                        url:"<?php echo WEB_PATH; ?>/mobile/home/updateddress/"+id,
                        type:'post',
                        data:$('#registerform3').serialize(),
                        datatype:'json',
                        success:function(data){
                            var data = eval('('+data+')');
                            if(data.code){
                                showmsg(data.msg);
                                $("#div_consignee2").hide();
                                document.location.reload();
                            }else{
                                showmsg(data.msg);
                            }
                        }

                    });
                });
            });

            </script>
            <div class="empty-space"></div>
            <div class="R-content">
            <div id="addressListDiv" class="list-tab detailAddress gray01" style="">
                    <ul class="m-useraddresslst ">
                        <!-- <li class="pad"><span>详细地址</span><span>收货人</span><span>是否默认</span><span>操作</span></li> -->
                                 <?php $ln=1;if(is_array($dizhi)) foreach($dizhi AS $dz): ?>
                               <li class="pad" id="item_<?php echo $dz['id']; ?>" qqnb="<?php echo $dz['qq']; ?>" shr="<?php echo $dz['shouhuoren']; ?>" yb="<?php echo $dz['youbian']; ?>" mob="<?php echo $dz['mobile']; ?>">
                               <div class="address_infomation">
                                   <span><b>收货人：</b><?php echo $dz['shouhuoren']; ?></span>
                                 <span><?php echo $dz['mobile']; ?></span>
                                 <span  id="dizh_<?php echo $dz['id']; ?>">收货地址：<b><?php echo $dz['sheng']; ?>,<?php echo $dz['shi']; ?>,<?php echo $dz['xian']; ?>,<?php echo $dz['jiedao']; ?></b></span>
                                </div>
                                <div class="address_default">
                                 <span class="addr_default">  <?php if($dz['default'] == 'Y'): ?>
                                 <a class="  " href="javascript:;"  title="设为默认"  onclick="setdf(<?php echo $dz['id']; ?>)"><b class="all_checked"></b><em>默认地址</em> </a> 
                                 
                                 <?php  else: ?>
                                 <a class=" " href="javascript:;"   onclick="setdf(<?php echo $dz['id']; ?>)" title="设为默认"><b></b><em>设为默认</em></a> 
                                 
                                 <?php endif; ?> 
                                 </span>
                                   <span>
                                      <a class="xiugai" href="javascript:;"   onclick="update(<?php echo $dz['id']; ?>)" title="编辑">编辑</a>
                                      <a class="delAdr" href="javascript:;"   onclick="dell(<?php echo $dz['id']; ?>)" title="删除">删除</a>
                                   </span>
                               </div>
                                 
                                       
                                 
                             
                             </li>
                             <?php  endforeach; $ln++; unset($ln); ?>  
                            
                                      
                    </ul>     
                </div>
                                
            </div> 
        </article>
    </section>
        <section class="clearfix newAddr">
        <div class="add"><a  id="btnAddnewAddr" href="javascript:;" type="button" class="orangebut orgBtn"  style="display: block;">添加新地址</a></div>
        <div id="div_consignee" class="addAddress" style="display:none;">
         <article >
            
                
                 
                   <!--  <dl>添加收货地址</dl> method="post" action="<?php echo WEB_PATH; ?>/mobile/home/useraddress"-->
                    <form class="registerform" id="addrform">
                    <table border="0" cellpadding="0" cellspacing="0" width="99%">
                    <script>var s2=["province2","city2","county2"];</script>
                    <tbody>
                    <tr> 
                        <td><label>收货人</label></td>
                        <td>
                            <input  class="input"  datatype="username" nullmsg="收货人不能为空" errormsg="请不要以数字或下划线开头" name="shouhuoren" type="text" maxlength="15" id="txt_ship_name" class="inputTxt" value="">
                        </td>
                        <td><div class="Validform_checktip"></div></td>
                    </tr>
                    <tr>
                        <td><label>手机号码</label></td>
                        <td>
                            <input  class="input"  datatype="m" nullmsg="手机号不能为空" errormsg="手机号格式有误" name="mobile" type="text"  class="inputTxt" maxlength="11">
                        </td>
                    </tr>
                    <tr>
                    
                        <td width="20%"><label>省份</label></td>
                        <td  width="80%">
                            <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province2" runat="server" name="sheng"></select>
 
                        </td>
                    </tr>
                    <tr>
                        <td width="20%"><label>城市</label></td>
                        <td  width="80%">
<!--                             <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province2" runat="server" name="sheng"></select> -->
                            <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="city2" runat="server" name="shi"></select>
<!--                             <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="county2" runat="server" name="xian"></select>
                             <em id="ship_address_valid_msg" class="red">*</em>   --> 
                        </td>
                    </tr>
                    <tr>
                        <td width="20%"><label>地区</label></td>
                        <td  width="80%">
                           <!--  <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province2" runat="server" name="sheng"></select>
                            <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="city2" runat="server" name="shi"></select> -->
                            <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="county2" runat="server" name="xian"></select>
                            <!-- <em id="ship_address_valid_msg" class="red">*</em>   -->
                            <script type="text/javascript">setup2()</script>
                        </td>

                    </tr>
                    <tr>
                        <td><label>街道地址</label></td>
                        <td>
                            <input datatype="*1-100" class="input" nullmsg="请填街道地址！" errormsg="范围在100之间！" name="jiedao" type="text" class="street" maxlength="100" />
                            <!-- <em id="ship_address_valid_msg" class="red">*</em>           -->
                        </td>
                    </tr>

 

                    <tr>
                        <td colspan="2">
                            <input  name="button" type="button" class="orangebut" id="btn_consignee_add" value="保存" title="保存"> 
                            <input type="button" class="cancelBtn" value="取消" id="btn_consignee_cancle" title="取消">
                        </td>
                    </tr>
                    </tbody>
                    </table>
                    </form>
                
               
            </article>
            </div>
    </section>
         <section class="clearfix ">
        <article >
            <div id="div_consignee2" class="addAddress" style="display:none;">
                
                <script>var s3=["province3","city3","county3"];</script>    
                 
                <form id="registerform3" class="registerform" >
                <table border="0" cellpadding="0" cellspacing="0" width="99%">
                <tbody>
                <tr>
                    <td><label>收货人：</label></td>
                    <td>
                        <input id="shr2" class="input" datatype="username" nullmsg="收货人不能为空" errormsg="请不要以数字或下划线开头" name="shouhuoren" type="text" maxlength="15" class="inputTxt" value="">
                    </td>
                </tr>
                <tr>
                    <td><label>手机号码：</label></td>
                    <td>
                        <input  id="mob2" class="input" datatype="m" nullmsg="手机号不能为空" errormsg="手机号不对" name="mobile" type="text" value="" class="inputTxt" maxlength="11">
                    </td>
                </tr>
                <tr>        
                    <td><label>省份：</label></td>
                    <td>
                        <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province3" runat="server" name="sheng"></select>
                      <!--   <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="city3" runat="server" name="shi"></select>
                        <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="county3" runat="server" name="xian" style="display:none;"></select> -->
                    </td>
                </tr>
                <tr>        
                    <td><label>城市：</label></td>
                    <td>
                        <!-- <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province3" runat="server" name="sheng"></select> -->
                        <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="city3" runat="server" name="shi"></select>
                        <!-- <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="county3" runat="server" name="xian" style="display:none;"></select> -->
                    </td>
                </tr>
                <tr>        
                    <td><label>地区：</label></td>
                    <td>
                       <!--  <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province3" runat="server" name="sheng"></select>
                        <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="city3" runat="server" name="shi"></select> -->
                        <select datatype="*" nullmsg="请选择有效的省市区" class="select" id="county3" runat="server" name="xian" ></select>
                    </td>
                </tr>
                <tr>
                    <td><label>街道地址：</label></td>
                    <td>
                        <input  class="input" id="dizh2" datatype="*1-100" nullmsg="请填街道地址！" errormsg="范围在100之间！" name="jiedao" type="text" class="street" maxlength="100" />
                    </td>
                </tr>
 



                <tr>
                    <td colspan="2">
                        <input  name="button" type="button" class="orangebut" id="btn_consignee_save" value="保存" title="保存"> 
                        <input type="button" class="cancelBtn" value="取消" id="btn_consignee_cancle2" title="取消">
                    </td>
                </tr>
                </tbody>
                </table>
                </form>
                 
            </div>
        </article>
    </section>

<style>
        #pageDialogBG{-webkit-border-radius:5px; width:200px;height:45px;color:#fff;font-size:16px;text-align:center;line-height:45px;}
    </style>
    <div id="pageDialogBG" class="pageDialogBG">
        <div class="Prompt"></div>
    </div>


<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_TEMPLATES_STYLE; ?>";
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js?v='+GetVerNum());
</script>

</div>
</body>
</html>
