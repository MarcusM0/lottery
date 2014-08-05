<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>撞大运</title>
	<link href="/css/style.css" rel="stylesheet" type="text/css" />
	<link href="/css/setting.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
</head>
<body>
<?php $user=$this->cache->get_user(); ?>
<div id="closen" style="display:none">
	<div class="toum"></div>
	<div class="mydiv"></div>
</div>


<?php $this->load->view('include/top',array()); ?>	


<div class="center" style="height:600px;padding-top:80px;background:#fff">
<div class="wrap">
<div class="wrap_bg">
<div class="frame_content">
<div class="path"><a target="_blank" href="http://localhost/">个人中心</a>
&gt; <b>修改手机</b></div>
<div class="layout clearfix"><!--right-->
<div class="layout_right">
<div class="m_address_admin">
<div class="tt"><i class="ico_address"></i>
<div class="txt"><strong>修改手机</strong>
<p style="height:50px;" class="texte"></p>
</div>
</div>
<style>
.inputs{
 border-radius: 3px;
    height: 25px;
    line-height: 25px;
    margin-right: 7px;
    padding: 7px 10px;
    width: 200px;	
    border: 1px solid #bdc7d8;
    padding: 0.4ex;
    width: 500px;
}
.bind_sucess, .sucess_icon, .failure_icon {
    background: url("/images/sucess_btn.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    display: inline-block;
    height: 84px;
    width: 84px;
}


.bind_result span {
    color: #616161;
    display: inline-block;
    font-size: 18px;
    margin-left: 20px;
    margin-top: 40px;
    vertical-align: top;
}
</style>
<div class="email_area ml30 h250" id="msg_content" style="display:none">
<div class="bind_result" style="padding-left:150px;"><em class="bind_sucess"></em><span style="margin-bottom:30px;">手机号修改成功!</span></div>
</div>

<div id="div_pwd">

<form id="settingform"  method="post" novalidate="novalidate">
<style>
.tab .js_name{	
	width:200px;
}
.tab .js_address{	
	width:500px;
}
.error{
	padding:5px 10px;
	margin:0px 10px 0px 10px;
	background-color: #fff9df;
	border: 1px solid #f1e5b3;
	
}
</style>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tab">
	<tbody>
		<tr data-aid="15330712" class="js_del_con">
			<td class="js_name">昵称：</td>
			<td class="js_address"><?php echo $user['nick_name']?></td>

		</tr>		
	
		
		<tr data-aid="15330712" class="js_del_con">
			<td class="js_name">当前邮箱：</td>
			<td class="js_address"><?php echo $user['email']?></td>

		</tr>			
			
		<tr data-aid="15330712" class="js_del_con">
			<td class="js_name">手机：</td>
			<td class="js_address"><input type="text" value="<?php echo $user['mobile']?>" style="width:200px;" class="inputs" id="mobile" name="mobile"></td>

		</tr>	
		
			
	</tbody>
</table>
<div class="fun"><input id="btn_info" type="submit" href="javascript:void(0)" class="btn_auto js_add_address" value="保存"></div>
</form>
</div>


</div>
</div>
<!--/right--> <!--left-->
<div class="layout_left per_left"><!--用户信息-->
 <script src="/js/jquery.validate.js"></script>
		


<div class="theme-popover-mask"></div>

<script>
$(document).ready(function($) {

	jQuery.validator.addMethod("isMobile", function(value, element) {  
	    var length = value.length;  
	    var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;  
	    return this.optional(element) || (length == 11 && mobile.test(value));  
	}, "");  

	
	$("#settingform").validate({
		submitHandler: function() {
	       $("#btn_info").val("保存中...");
	       var mobile=$("#mobile").val();	       
	       $.post("<?php echo site_url('setting/updateInfo')?>",{mobile:mobile},function(result){
                $("#div_pwd").html($("#msg_content").html());
	        });		
		},		
		rules: {
		   mobile: { 
				required: true,
				isMobile : true			
	       }
		},
		messages: {
			mobile: {
				required: "手机号码不能为空",
				isMobile: "请正确填写您的手机号码"		
    	    }  
		}
	});

	

})
</script>
<!--用户信息-->
  
<?php $this->load->view('setting/elements/navbar'); ?>
</div>
<!--left--> <!--/left--></div>
</div>
</div>
</div>
 <div class="clear"></div>
</div>

<?php $this->load->view('include/footer',array()); ?>	
</body>
</html>
