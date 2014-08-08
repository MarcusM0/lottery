<?php 
$images=$refresh->image;
?>

<ul>
    <li taskID="<?php $refresh->taskID?>" class="yzn5 ">      
      <?php 
         foreach ($images as $image) {
         ?>   
       <img src="<?php echo $image?>" class="reimg" style="margin-left:5px;float:left;"> 	           	
   <?php 
         }
      ?> 
      <img src="/images/refresh.png" class="refresh_btn" style="margin-left:5px;float:left;"> 	
    </li>    
    <li class="yzn3">     	
    <input placeholder="填写以上信息" id="result">         
    </li>
</ul>