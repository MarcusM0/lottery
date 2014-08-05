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
<div class="path"><a href="<?php echo site_url()?>" target="_blank">个人中心</a>
&gt; <b>修改密码</b></div>
<div class="layout clearfix"><!--right-->
<div class="layout_right">
<div class="m_address_admin">
<div class="tt"><i class="ico_address"></i>
<div class="txt"><strong>修改密码</strong>
<p class="texte" style="height:50px;"></p>
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

</style>
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
<div class="bind_result" style="padding-left:150px;"><em class="bind_sucess"></em><span style="margin-bottom:30px;">密码修改成功!</span></div>
</div>


<div id="div_pwd">

<form method="post" id="pwd_form">
<table class="tab" border="0" cellpadding="0" cellspacing="0"
	width="100%">
	<tbody>

		<tr class="js_del_con" data-aid="15330712">
			<td class="js_name">原密码：</td>
			<td class="js_address"><input class="inputs" id="password_old" name="password_old" type="password" style="width:200px;"/></td>
			<td class="lst">

			</td>
		</tr>
		
		<tr class="js_del_con" data-aid="15330712">
			<td class="js_name">新密码：</td>
			<td class="js_address"><input class="inputs" id="password_new1" name="password_new1" type="password" style="width:200px;"/></td>
			<td class="lst">

			</td>
		</tr>	
		
		<tr class="js_del_con" data-aid="15330712">
			<td class="js_name">再次输入：</td>
			<td class="js_address"><input class="inputs" id="password_new2"  name="password_new2" type="password" style="width:200px;"/></td>
			<td class="lst">

			</td>
		</tr>			
	</tbody>
</table>
<div class="fun">
<input id="btn_pwd" value="保存" type="submit" class="btn_auto js_add_address" href="javascript:void(0)"></input>
</div>
</div>
</div>

</form>

</div>

<!--/right--> <!--left-->
<div class="layout_left per_left"><!--用户信息-->

 
<!--用户信息-->
  <?php 
$method=$this->router->method;
  ?>

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
<script>
$.validator.setDefaults({
	ignore: "",
	submitHandler: function() { 
	       $("#btn_pwd").val("保存中...");
	       var password_new1=$("#password_new1").val();
	       $.post("<?php echo site_url('setting/updatePassword')?>",{password_new1:password_new1},function(result){
                $("#div_pwd").html($("#msg_content").html());
	        });
           //document.getElementById("pwd_form").submit();
           
	}
});
$().ready(function() {
	$("#pwd_form").validate({
		rules: {
	    	password_old: {
		       required: true,
		       remote:{
			 	　　 type:"post",
				　　 url:"/index.php/setting/isPassword",
				    dataType: "json",     
				　　 data:{
				　　     password_old:function(){return $("#password_old").val();}
				　　 }	       
	           }
	        },
	        password_new1: "required",
	        password_new2: {
				required: true,
				equalTo:"#password_new1"
		    }
		},
		messages: {
			password_old: {
			    required: "密码不能为空",
			    remote: "密码不正确"
    	    },
    	    password_new1: "密码不能为空",
    	    password_new2: {
				required: "密码不能为空",
				equalTo: "密码不一致"
	    	}


		}
	});

});
</script>	