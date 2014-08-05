























<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>撞大运</title>
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link href="/css/setting.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/js/jquery.validate.js"></script>
</head>
<body>
<?php $user=$this->cache->get_user(); ?>
<div id="closen" style="display:none">
	<div class="toum"></div>
	<div class="mydiv"></div>
</div>


<?php $this->load->view('include/top',array()); ?>	

<div class="center" style="height:600px;padding-top:80px;background:#fff">
	<div class="wrap">
		<div class="wrap_bg">
			<div class="frame_content">
				<div class="path">
					<a href="<?php echo site_url()?>" target="_blank">个人中心</a>
					&gt; <b>我的奖券</b>
				</div>
				
				<div class="layout clearfix"><!--right-->
					<div class="layout_right">
						<div class="m_address_admin">
							<div class="tt">
								<i class="ico_address"></i>
								<div class="txt">
									<strong>我的奖券</strong>
									<p class="texte" style="height:50px;"></p>
								</div>
							</div>
							
							<div id="div_myprize" style="margin-top: -30px;">
								<ul class="myprizes">
									<li class="item">
										<div class="contents clearfix">
											<div class="prize-thumb">
												<img src="/images/st1.jpg" />
											</div>
										</div>
									</li>
									<li class="item">
										<div class="contents clearfix">
											<div class="prize-thumb">
												<img src="/images/st1.jpg" />
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="layout_left per_left">
						<?php $this->load->view('setting/elements/navbar'); ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php $this->load->view('include/footer',array()); ?>	
</body>
</html>
