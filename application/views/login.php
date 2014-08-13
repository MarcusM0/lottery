<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>撞大运</title>
<link href="css/style002.css" rel="stylesheet" type="text/css" />
 <script src="/js/jquery-1.7.min.js"></script>   
 <script src="/js/jquery.validate.js"></script>
 <script src="/js/login.js"></script>
</head>
<style>
.toum{
	background-color: #173d00;
}
.error{
   float:left;
	margin-left:40px;
    color:red;
}
</style>
<body>
<form url="<?php echo site_url('login/dologin')?>" method="post" id="formLogin" name="formLogin">
<div >
<div class="toum"></div>
<div class="mydiv">
<div class="yzn">
<style>
.labelCheckbox {
    color: #333;
    float: left;
    font-size: 12px;
    font-weight: normal;
    line-height: 27px;
}
</style>
<ul>
    <li class="dl1">
        <div style="float:left">登录</div>
<!--        <div style="float:right;padding-right:20px;"><a href="<?php echo site_url("index")?>"><img src="/images/logo_bottom.png"/></a></div>   -->
    </li>
    <li class="login loginfont">邮  箱：<input  placeholder="帐 号" id="email" name="email"/></li>
    <li class="login loginfont">密  码：<input  type="password" placeholder="密 码" id="password" name="password"/></li>
    <label style="font-weight:bold;padding-left:30px;color:red;" id="msg"> </label>

    <li class="login loginfont">
	<a  href="<?php echo site_url("pwd")?>" style="color:black;float:right;padding-right:20px;">忘记密码</a>
	<label >
	<input type="checkbox" id="remember" name="remember" style="width:12px;height:12px;float:left;vertical-align: -2px;" id="login_form_savestate" checked="checked"  class="W_checkbox"/>下次自动登录</label>	                    		
		                    		
    </li>
    <li class="submit">
    <input type="submit" id="submit" value="登 录">

    <input type="button" style="margin-top:10px;" id="submit" onclick="location.href='<?php echo site_url()?>'" value="返 回">        
    <li class="login loginfont"><a style="margin-top:3px;float:right;padding-right:20px;color:black" href="<?php echo site_url("reg")?>">立即注册</a></li>

    </li>
</ul>
</div>
</div>
</div>
</form>





</body>
</html>
