<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>撞大运</title>
<link href="css/style002.css" rel="stylesheet" type="text/css" />
 <script src="/js/jquery-1.7.min.js"></script>   
 <script src="/js/jquery.validate.js"></script>  
 <script src="/js/reg.js"></script>
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
.yzm .error{	
	margin-left:0px;
}
</style>
<body>
<form action="<?php echo site_url('reg/doreg')?>" method="post" id="formReg"  name="formReg">
<div >
<div class="toum"></div>
<div class="mydiv">
<div class="yzn">
<ul>
    <li class="dl1">
   
        <div style="float:left"> 3秒完成注册</div>
 
        <div style="float:right;padding-right:20px;"><a href="<?php echo site_url("index")?>"><img src="/images/logo_bottom.png"/></a></div>    
    </li>
    <li class="login loginfont" >昵  称：<input value="" placeholder="昵 称" id="nick_name" name="nick_name"  /></li>
    <li class="login loginfont">邮  箱：<input value="" placeholder="邮 箱" id="email" name="email" /></li>
    <li class="login loginfont">手  机：<input value="" placeholder="手 机" id="mobile" name="mobile" /></li>
    <li class="login loginfont">密  码：<input value="" type="password"  placeholder="密 码"  id="password" name="password"  /></li>
    <li class="yzm loginfont">
    <span style="float:left;margin-right:5px;"><img id="chgimg" src="src/code/code_num.php" width="100" height="44" /></span>

    <input value="" placeholder="验证码"  id="code" name="code" />
     
    </li>
    <li class="miz" style="padding-right:20px;"><div style="margin-left:30px;float:left"><a href="<?php echo site_url("agree")?>" target="_blank">使用协议</a></div>   已有账号请<a href="<?php echo site_url("login")?>">登录</a></li>
    <li class="submit">
    <input type="submit" id="submit" value="立即注册">
    </li>
</ul>
</div>
</div>
</div>
</form>





</body>
</html>
