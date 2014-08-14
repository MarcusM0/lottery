<?php

?>
<input type="hidden" id="code" value="<?php echo $id?>"/>
<div class="yzn">
<div class="close" onclick="document.getElementById('closen').style.display=(document.getElementById('closen').style.display=='none')?'':'none';document.location.reload();" ><img src="images/close.png" /></div>
<ul>
    <li class="yzn1"><img src="images/yzm.png" /></li>
   <?php 
$task_domain=$this->config->item('task_domain');
//$ff=$this->method->http_request($task_domain."/sunyardEngine/getTasks?enterTaskNum=2");
//if(!$ff){
//	echo "<b style='color:red;'>远程服务器请求异常!</b>";
//	exit;
//}
$ff='[{"result":"","OID":"1","taskType":"1","image":["http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37317/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37317_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37318/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37318_1.JPG"],"enterWay":"1","taskID":"PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_PA_152_9"},{"result":"","OID":"2","taskType":"1","image":["http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37319/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37319_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37320/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37320_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37321/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37321_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37326/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37326_1.JPG"],"enterWay":"1","taskID":"PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_PA_152_10"},{"result":"18924671673","OID":"3","taskType":"2","image":["http://localhost:88/imageWeb/PA_hppqqphdh_003_F694955C0D7756B62E044A0369F1934EC_7700047169348_900004_6_5_37228/PA_hppqqphdh_003_F694955C0D7756B62E044A0369F1934EC_7700047169348_900004_6_5_37228_1.JPG"],"enterWay":"0","taskID":"PA_hppqqphdh_003_F694955C0D7756B62E044A0369F1934EC_7700047169348_900004_6_5_PA_155_1"}]';
$task_sign=$this->func->encrypt($ff,'E','lottery123');
$obj = json_decode($ff);
?> 
<?php 
if(isset($obj)&&$obj){
	foreach ($obj as $key => $item) {
		$class="";
		if($key==0){
			$class="yzn2";
		}else if($key==1){
			$class="yzn4";			
		}else if($key==2){
			$class="yzn5";
		}
?>	    
<li class="inputimg" xh="<?php echo $class;?>"  enterWay="<?php echo $item->enterWay?>"  >
<ul class="inputul" taskID="<?php echo $item->taskID?>">
    <li class="<?php echo $class?> " taskID="<?php echo $item->taskID?>">
    <?php 
       $images=$item->image;
       foreach ($images as $image) {  
       	      if($item->enterWay==0){	
      ?>   
      <img style="margin-left:5px;float:left;" class="reimg" src=<?php echo $image?> /> 	
   <?php
       	      }else{
      ?>   	
     <div style="margin-left:3px;float:left;text-align:center;width:60px;"> <img style="float:left;width:60px;height:60px;" class="reimg" src=<?php echo $image?> /> 	</div>      	
      <?php   	      	
       	      }
       }
    ?>
      
       <a style="margin-left:5px;float:left;margin-top:40px;" class="refresh_btn" href="javascript:void(0)" > 	刷新</a>
    </li>    
    <li class="yzn3">
    <?php 
      if($item->enterWay==0){
     ?> 	
    <input id="result" placeholder="填写以上信息" />         
     <?php  	
      }else{
      	foreach ($images as $check) {
    ?>
  <div style="margin-left:3px;float:left;text-align:center;width:60px;"><input name="box" type="checkbox" id="result" style="width:30px;" /> </div>       		
  <?php  
      	}      	
      }
    ?>
    </li>    
</ul>
</li>
<?php
	}
}
?>    
    <li class="lq"><a href="javascript:void(0)" id="btn_submit" ><img src="images/lq.png"/></a></li>
</ul>
<div id="message" class="houj" style="display:block;font-weight:bold" >
<?php echo (isset($msg)&&$msg)? $msg:'';?>
</div>
</div>

<input type="hidden" id="sign" value="<?php echo $task_sign?>"/>

<script type="text/javascript">
$(".inputimg").each(function(){
    var content=this; 
    function bindRefresh(){
    	$('.refresh_btn',content).click(function(){
    		  var li=this; 
    		  var sign=  $("#sign").val();
    	      var taskID=  $('.inputul',content).attr("taskID");
    	      var xh=  $(content).attr("xh");
    	      $.post('<?php echo site_url("ajx/remote/refresh")?>',{xh:xh,taskID:taskID,sign:sign},function(result){
                   $("#sign").val(result['signout']);
                   $(content).html(result['current']);
                   bindRefresh();
    	      },'json');
    	});	 
    }
    bindRefresh();
});	

$('#btn_submit').click(function(){
	 var code =$("#code").val();
	 var sign =$("#sign").val();
	  var json=Array();
	  $(".inputimg").each(function(){
		  var li=this;
          var enterWay=$(this).attr("enterWay");  
          if(enterWay=="0"){
              var taskID=$('.inputul',this).attr("taskID");  
              var result=$("#result",this).val();
              if(result==null||result==""){
    				//inputErrorStyleWaver($("#result",this).get(0));
              }
              var item={};
              item.taskID=taskID;   
              item.result=result;
              json.push(item);              
          }else{
              var taskID=$('.inputul',this).attr("taskID");  
              var result="";              
              $("input[name='box']",li).each(function(){
                  if ($(this).attr('checked') =='checked') {
                	  result+="1";
                  }else{
                	  result+="0";
                  }
             });                            
              if(result==null||result==""){
    				//inputErrorStyleWaver($("#result",this).get(0));
              }
              var item={};   
              item.taskID=taskID;  
              item.result=result;
              json.push(item);                
          }
       
	 });
		 
	 var jsonString= JSON.stringify(json);
    $.post('<?php echo site_url("ajx/lottery/dosubmit")?>',{jsonString:jsonString,code:code,sign:sign},function(result){
          var msg=result.msg;      
   
          $("#message").html(msg);
          if(result.task_html){
 
              $(".mydiv").html(result.task_html);          
          }
          if(result.code==2||result.code=="2"){
              console.log($("#btn_submit"));
              $("#btn_submit").remove();
          }            
       
    },'json');

});	
</script>