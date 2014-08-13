<?php 
$images=$refresh->image;
?>

<ul class="inputul" taskID="<?php echo $refresh->taskID?>" >
    <li taskID="<?php echo $refresh->taskID?>" class="<?php echo $xh?>">      
      <?php 
         foreach ($images as $image) {
         ?>   
       <img src="<?php echo $image?>" class="reimg" style="margin-left:5px;float:left;"> 	           	
   <?php 
         }
      ?> 
       <a style="margin-left:5px;float:left;margin-top:40px;" class="refresh_btn"  > 	刷新</a>
    </li>    
    <li class="yzn3">     	
    <input placeholder="填写以上信息" id="result">         
    </li>
</ul>