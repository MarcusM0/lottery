<?php $method=$this->router->method; ?>
						
<ul class="per_menu">
	<li <?php echo $method=='myprize'?'class="cur"':''?>><a href="<?php echo site_url('setting/myprize'); ?>">我的奖券</a></li>
	<li <?php echo $method=='index'?'class="cur"':''?>><a href="<?php echo site_url('setting/index')?>">修改手机</a></li>
<!--	<li <?php echo $method=='avatar'?'class="cur"':''?> ><a href="<?php echo site_url('setting/avatar')?>">头像设置</a></li>-->
	<li <?php echo $method=='pwd'?'class="cur"':''?> ><a href="<?php echo site_url('setting/pwd')?>">修改密码</a></li>
</ul>