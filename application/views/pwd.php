<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>撞大运</title>
<link href="css/style002.css" rel="stylesheet" type="text/css" />
 <script src="/js/jquery-1.7.min.js"></script>   
 <script src="/js/jquery.validate.js"></script>  
 <script src="/js/pwd.js"></script>
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
<form action="<?php echo site_url("pwd/send")?>" method="post" id="formPwd"  name="formPwd">
<div >
<div class="toum"></div>
<div class="mydiv">
<div class="yzn">
<ul>
    <li class="dl1">
   
        <div style="float:left"> 找回密码</div>
 
        <div style="float:right;padding-right:20px;"><a href="<?php echo site_url("index")?>"><img src="/images/logo_bottom.png"/></a></div>    
    </li>
    <li class="login loginfont">邮  箱：<input value="" placeholder="邮 箱" id="email" name="email" /></li>

    <li class="miz" style="padding-right:20px;">想起密码了<a href="<?php echo site_url("login")?>">登录</a></li>
    

  
    <li class="submit">
    <input type="submit" id="submit" value="取回密码">
    </li>
    <li class="submit" style="padding-top:50px;">
      <label style="font-weight:bold;color:red;" id="msg"> </label>   

    </li>


</ul>


</div>


</div>
   
</div>
</form>





</body>
</html>
