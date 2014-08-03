<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>撞大运</title>
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-1.7.min.js"></script>
</head>
<body>
<?php 
$user=$this->cache->get_user();
?>
<div id="closen" style="display:none">
<div class="toum"></div>
<div class="mydiv">
</div>
</div>

<div class="top">
<div class="topn">
 <div class="logo"><img src="images/logo.png" /></div>
 <div class="chj">
 <ul>
 <?php 
  if(isset($user)&&$user){
 ?>
  <li><a href="<?php echo site_url('login/out')?>"><?php echo $user['nick_name']?></a></li> 
  <li><a href="<?php echo site_url('login/out')?>">退出</a></li> 	
 <?php   	
  }else{
   ?>	
 <li><a href="<?php echo site_url('login')?>">登录</a></li>
 <li><a href="<?php echo site_url('reg')?>">注册</a></li>   
  <?php   	
  }
 ?>

 <li class="cjw"><a href="#">我的抽奖</a></li>
 <li class="cjc"><a href="#">抽奖规则</a></li>
 </ul>
 </div>
</div>
</div>

<div class="hao">
 <div class="haon">
 <div class="haonl"><img src="images/luckNumber.png" /></div>
 <div class="haonc">
 <span>95331690</span>
 </div>
 <div class="haonr">
 <ul>
     <li>幸运数从何而来？</li>
     <li>幸运数如何决定谁获奖？</li>
 </ul>
 </div>
 </div>
</div>
<?php 
$prize1=$this->prize->getPrizeBySort(1);
?>
<div class="center">
 <div class="tsw">
 <div class="tswl"><img src="<?php echo $prize1['photo_url']?>" width="526" height="466" />
 <div class="cjn"></div>
 <div class="cjnn">
 <ul>
     <li class="xcj">距离下一次抽奖还差：</li>
     <li class="cjs"><span><?php echo $prize1['num_now']?></span>/<?php echo $prize1['num']?></li>
     <li class="cjt">
     <a isend="<?php echo $prize1['num_now']>=$prize1['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize1['id']?>" href="javascript:void(0)"><img src="images/btn_coujiang_big.png" /></a>
     </li>
 </ul>
 </div>
 </div>
 <div class="tswc">
 <?php 
$prize2=$this->prize->getPrizeBySort(2);
$prize3=$this->prize->getPrizeBySort(3);
?>
 <ul>
     <li><img src="<?php echo $prize2['photo_url']?>" width="251" height="221" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize2['num_now']?></span>/<?php echo $prize2['num']?></div>
         <div class="cjdt">
         <a isend="<?php echo $prize2['num_now']>=$prize2['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize2['id']?>" href="javascript:void(0)"><img src="images/cuojiang.png" /></a>
         </div>
     </div>
     </li>
     
     <li><img src="<?php echo $prize3['photo_url']?>" width="251" height="221" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize3['num_now']?></span>/<?php echo $prize3['num']?></div>
         <div class="cjdt">
         <a isend="<?php echo $prize3['num_now']>=$prize3['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize3['id']?>" href="javascript:void(0)"><img src="images/cuojiang.png" /></a>
         </div>
     </div>
     </li>     
 </ul>
 </div>
  <?php 
$prize4=$this->prize->getPrizeBySort(4);
?>
 <div class="tswr"><img src="<?php echo $prize4['photo_url']?>" width="251" height="466" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize4['num_now']?></span>/<?php echo $prize4['num']?></div>
         <div class="cjdt">
         <a isend="<?php echo $prize4['num_now']>=$prize4['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize4['id']?>" href="javascript:void(0)"><img src="images/cuojiang.png" /></a>
         </div>
     </div> 

 </div>
 </div>
   <?php 
$prize5=$this->prize->getPrizeBySort(5);
$prize6=$this->prize->getPrizeBySort(6);
$prize7=$this->prize->getPrizeBySort(7);
?>
 <div class="xtp">
  <ul>
     <li><img src="<?php echo $prize5['photo_url']?>" width="251" height="221" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize5['num_now']?></span>/<?php echo $prize5['num']?></div>
         <div class="cjdt">
         <a isend="<?php echo $prize5['num_now']>=$prize5['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize5['id']?>" href="javascript:void(0)"><img src="images/cuojiang.png" /></a>
         </div>
     </div> 
     </li>
     <li><img src="<?php echo $prize6['photo_url']?>" width="251" height="221" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize6['num_now']?></span>/<?php echo $prize6['num']?></div>
         <div class="cjdt">
         <a isend="<?php echo $prize6['num_now']>=$prize6['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize6['id']?>" href="javascript:void(0)"><img src="images/cuojiang.png" /></a>
         </div>
     </div> 
     </li>
     <li class="xtplr"><img src="<?php echo $prize7['photo_url']?>" width="526" height="221" />
     <div class="tswf" style="width:526px;"></div>
     <div class="tswfn" style="width:526px;">
         <div class="tswfndiv"><span><?php echo $prize7['num_now']?></span>/<?php echo $prize7['num']?></div>
         <div class="cjdt">
         <a isend="<?php echo $prize7['num_now']>=$prize7['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize7['id']?>" href="javascript:void(0)"><img src="images/cuojiang.png" /></a>
         </div>
     </div> 
     </li>
  </ul>
 </div>
 <div class="clear"></div>
</div>

<div class="ad"><img src="images/gg.jpg" width="1080" height="145"/></div>

<div class="footer">
 <div class="foot">
 <div class="footl"><img src="images/logo_bottom.png" /></div>
 <div class="footr">
  <a href="#">撞大运规则说明</a>｜<a href="#">关于我们</a>｜<a href="#">招贤纳士</a>｜<a href="#">版本说明</a>｜<a href="#">第三方数据说明</a><br />
  <span class="banc">狗屎运公司版权所有 Copyright@2014</span>
 </div>
 </div>
</div>
</body>
</html>
<script type="text/javascript">
$(".btn_cj").bind("click",function(){
	var islogin=$(this).attr("islogin");
	if(islogin=="false"){
		document.location.href="<?php echo site_url("login")?>";
		return false;
	}
    var id=$(this).attr("dataid"); 
	$.post("/prize",{id:id},function(result){		
		 $('.mydiv',$("#closen")[0]).html(result);
		 $("#closen").show();
	    //$("span").html(result);
	  });

	});
</script>
