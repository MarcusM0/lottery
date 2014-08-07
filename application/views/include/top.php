<?php 
$user=$this->cache->get_user();
?>
<div class="top">
<div class="topn">
 <div class="logo"><a href="<?php echo site_url()?>"><img src="/images/logo.png" /></a ></div>
 <div class="chj">
 <ul>
  <li><a href="<?php echo site_url()?>">首页</a></li>
 <?php 
  if(isset($user)&&$user){
 ?>
  <li><a href="<?php echo site_url('setting')?>"><?php echo $user['nick_name']?></a></li> 
  <li><a href="<?php echo site_url('login/out')?>">退出</a></li> 	
 <?php   	
  }else{
   ?>	
 <li><a href="<?php echo site_url('login')?>">登录</a></li>
 <li><a href="<?php echo site_url('reg')?>">注册</a></li>   
  <?php   	
  }
 ?>

 <li class="cjw"><a href="<?php echo site_url('setting/myprize')?>">我的抽奖</a></li>
 <li class="cjc"><a href="#">抽奖规则</a></li>
 </ul>
 </div>
</div>
</div>
