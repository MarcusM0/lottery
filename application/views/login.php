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

<ul>
    <li class="dl1">
        <div style="float:left">登录</div>
        <div style="float:right;padding-right:20px;"><a href="<?php echo site_url("index")?>"><img src="/images/logo_bottom.png"/></a></div>   
    </li>
    <li class="login loginfont">邮  箱：<input  placeholder="帐 号" id="email" name="email"/></li>
    <li class="login loginfont">密  码：<input  type="password" placeholder="密 码" id="password" name="password"/></li>
    <label style="font-weight:bold;padding-left:30px;color:red;" id="msg"> </label>

    <li class="miz" style="padding-right:20px;"><a href="<?php echo site_url("pwd")?>">忘记密码</a>?<a href="<?php echo site_url("reg")?>">立即注册</a></li>
    <li class="submit">
    <input type="submit" id="submit" value="登 录">

    
    </li>
</ul>
</div>
</div>
</div>
</form>





</body>
</html>
