<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>撞大运</title>
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/js/tip/src/jquery.poshytip.js"></script>



<link rel="stylesheet" href="/js/tip/src/tip-yellow/tip-yellow.css" type="text/css" />
<link rel="stylesheet" href="/js/tip/src/tip-violet/tip-violet.css" type="text/css" />
<link rel="stylesheet" href="/js/tip/src/tip-darkgray/tip-darkgray.css" type="text/css" />
<link rel="stylesheet" href="/js/tip/src/tip-skyblue/tip-skyblue.css" type="text/css" />
<link rel="stylesheet" href="/js/tip/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />

<link rel="stylesheet" href="/js/tip/src/tip-green/tip-green.css" type="text/css" />
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

<?php
		 $this->load->view('include/top',array());
?>	


<div class="hao">
 <div class="haon">
 <div class="haonl"><img src="images/luckNumber.png" /></div>
 <div class="haonc">
 	<span id="lottery_num">95331690</span>
 </div>
 <div class="haonr">
 <ul>
     <li><a id="where" >幸运数从何而来？</a></li>
     <li><a id="who">幸运数如何决定谁获奖？</a></li>
 </ul>
 </div>
 </div>
</div>
<?php 
$prize1=$this->prize->getPrizeBySort(1);
?>
<div class="center">
 <div class="tsw">
 <div class="tswl"><img src="<?php echo $prize1['photo_url']?>" width="350" height="310" />
 <div class="cjn"></div>
 <div class="cjnn">
 <ul>
     <li class="xcj">距离下一次抽奖还差：</li>
     <li class="cjs"><span><?php echo $prize1['num_now']?></span>/<?php echo $prize1['num']?></li>
     <li class="cjt">
     
         <?php 
           if($prize1['num_now']>=$prize1['num']){
             ?>
          <a    href="javascript:void(0)"><img src="/images/btn_finish_big.png" /></a>
          <?php   	
           }else{
         ?>
     <a isend="<?php echo $prize1['num_now']>=$prize1['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize1['id']?>" href="javascript:void(0)"><img src="/images/btn_coujiang_big.png" /></a>         <?php 
           }
         ?>     
     

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
     <li><img src="<?php echo $prize2['photo_url']?>" width="167" height="147" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize2['num_now']?></span>/<?php echo $prize2['num']?></div>
         <div class="cjdt">
         <?php 
           if($prize2['num_now']>=$prize2['num']){
             ?>
          <a    href="javascript:void(0)"><img src="/images/btn_finish_small.png" /></a>
          <?php   	
           }else{
         ?>
         <a isend="<?php echo $prize2['num_now']>=$prize2['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize2['id']?>" href="javascript:void(0)"><img src="/images/cuojiang.png" /></a>
         <?php 
           }
         ?>
         
         </div>
     </div>
     </li>
     
     <li><img src="<?php echo $prize3['photo_url']?>" width="167" height="147" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize3['num_now']?></span>/<?php echo $prize3['num']?></div>
         <div class="cjdt">
         <?php 
           if($prize3['num_now']>=$prize3['num']){
             ?>
          <a    href="javascript:void(0)"><img src="/images/btn_finish_small.png" /></a>
          <?php   	
           }else{
         ?>
         <a isend="<?php echo $prize3['num_now']>=$prize3['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize3['id']?>" href="javascript:void(0)"><img src="/images/cuojiang.png" /></a>
         <?php 
           }
         ?>
         
         </div>
     </div>
     </li>     
 </ul>
 </div>
  <?php 
$prize4=$this->prize->getPrizeBySort(4);
?>
 <div class="tswr"><img src="<?php echo $prize4['photo_url']?>" width="167" height="310" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize4['num_now']?></span>/<?php echo $prize4['num']?></div>
         <div class="cjdt">
         <?php 
           if($prize4['num_now']>=$prize4['num']){
             ?>
          <a    href="javascript:void(0)"><img src="/images/btn_finish_small.png" /></a>
          <?php   	
           }else{
         ?>
         <a isend="<?php echo $prize4['num_now']>=$prize4['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize4['id']?>" href="javascript:void(0)"><img src="/images/cuojiang.png" /></a>
         <?php 
           }
         ?>
         
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
     <li><img src="<?php echo $prize5['photo_url']?>" width="167" height="147" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize5['num_now']?></span>/<?php echo $prize5['num']?></div>
         <div class="cjdt">
         <?php 
           if($prize5['num_now']>=$prize5['num']){
             ?>
          <a    href="javascript:void(0)"><img src="/images/btn_finish_small.png" /></a>
          <?php   	
           }else{
         ?>
         <a isend="<?php echo $prize5['num_now']>=$prize5['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize5['id']?>" href="javascript:void(0)"><img src="/images/cuojiang.png" /></a>
         <?php 
           }
         ?>
         
         </div>
     </div> 
     </li>
     <li><img src="<?php echo $prize6['photo_url']?>" width="167" height="147" />
     <div class="tswf"></div>
     <div class="tswfn">
         <div class="tswfndiv"><span><?php echo $prize6['num_now']?></span>/<?php echo $prize6['num']?></div>
         <div class="cjdt">
         <?php 
           if($prize6['num_now']>=$prize6['num']){
             ?>
          <a    href="javascript:void(0)"><img src="/images/btn_finish_small.png" /></a>
          <?php   	
           }else{
         ?>
         <a isend="<?php echo $prize6['num_now']>=$prize6['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize6['id']?>" href="javascript:void(0)"><img src="/images/cuojiang.png" /></a>
         <?php 
           }
         ?>
         
         </div>
     </div> 
     </li>
     <li class="xtplr"><img src="<?php echo $prize7['photo_url']?>" width="348" height="147" />
     <div class="tswf" style="width:350px;"></div>
     <div class="tswfn" style="width:350px;">
         <div class="tswfndiv"><span><?php echo $prize7['num_now']?></span>/<?php echo $prize7['num']?></div>
         <div class="cjdt">
         <?php 
           if($prize7['num_now']>=$prize7['num']){
             ?>
          <a    href="javascript:void(0)"><img src="/images/btn_finish_small.png" /></a>
          <?php   	
           }else{
         ?>
         <a isend="<?php echo $prize7['num_now']>=$prize7['num']?"true":"false"?>" islogin="<?php echo (isset($user)&&$user)?"":"false"?>" class="btn_cj" dataid="<?php echo $prize7['id']?>" href="javascript:void(0)"><img src="/images/cuojiang.png" /></a>
         <?php 
           }
         ?>
         
         </div>
     </div> 
     </li>
  </ul>
 </div>
 <div class="clear"></div>
</div>

<div class="ad"><img src="images/gg.jpg" width="720" height="96"/></div>

<?php
		 $this->load->view('include/footer',array());
?>	


</body>
</html>
<script type="text/javascript">
//$('.where').poshytip();



$('#where').poshytip({

	content: '幸运数字从何而来？幸运数字从何而来？幸运数字从何而来？幸运数字从何而来？幸运数字从何而来？',
	alignTo: 'target',
	alignX: 'left',
	alignY: 'center',
	offsetX: 30,
	showTimeout: 100
});

$('#who').poshytip({

	content: '幸运数如何决定谁获奖？幸运数如何决定谁获奖？幸运数如何决定谁获奖？幸运数如何决定谁获奖？幸运数如何决定谁获奖？',
	alignTo: 'target',
	alignX: 'left',
	alignY: 'center',
	offsetX: 30,
	showTimeout: 100
});

$('#role').poshytip({
	className: 'tip-yellowsimple',
	content: '抽奖规则抽奖规则抽奖规则抽奖规则抽奖规则抽奖规则抽奖规则抽奖规则抽奖规则抽奖规则',

	alignTo: 'target',
	alignX: 'center',
	alignY: 'bottom',
	offsetX: 0,
	offsetY: 15,
	showTimeout: 100
});
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


setInterval(function(){
	fetchLotteryNum();
}, 3000);
function fetchLotteryNum()
{
	$.ajax({
		url: '<?php echo site_url('generate_lottery_num'); ?>',
		type: 'get',
		success: function(ret){
			if(ret.result){
				$('#lottery_num').text(ret.lottery_num);
			}
		},
		dataType: 'json' 
	});
}
</script>
