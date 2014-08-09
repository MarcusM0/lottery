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
<?php $this->load->view('include/top',array()); ?>	

<div class="center" style="padding-top:80px;background:#fff">
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
							
							<div id="div_myprize" class="clearfix" style="margin-top: -30px;">
								<ul class="myprizes">
									<?php foreach($myPrizeNoList as $myPrizeNos): ?>
										<?php $topPrizeNo = $myPrizeNos[0]; ?>
										<li class="item">
											<div class="contents clearfix">
												<div class="prize-thumb">
													<img src="<?php echo $topPrizeNo['photo_url_s']; ?>" />
												</div>
												
												<div class="prize-info">
													<h2 class="prize-title"><?php echo $topPrizeNo['prizename']; ?></h2>
													
													<div class="lottery-pieces-wrap">
														<div class="lottery-list clearfix">
															<?php foreach($myPrizeNos as $myPrizeNo): ?>
															<div class="lottery-piece">
																<h4 class="lottery-title">
																	奖券
																	<small style="font-weight: normal;">
																		第<span><?php echo $myPrizeNo['issue_num']; ?></span>期
																	</small>
																</h4>
																<p class="lottery-info">
																	<strong>奖券号码: </strong>
																	<span><?php echo $myPrizeNo['action_code']; ?></span>	
																</p>
																<p class="lottery-info">
																	<strong>状态: </strong>
																	<?php if($myPrizeNo['issue_result'] == CI_prize::ISSUE_PENDING): ?>
																		<span>待开奖...</span>
																	<?php elseif($myPrizeNo['action_code'] == $myPrizeNo['issue_result']): ?>
																		<strong style="color: #FF0;">恭喜中奖</strong>
																	<?php else: ?>
																		<span style="color: #A5B0A2;">
																			未中奖
																			(开奖号码: <?php echo $myPrizeNo['issue_result']; ?>)	
																		</span>
																	<?php endif; ?>
																</p>
																<p class="lottery-info">
																	<strong>抽奖时间.</strong>
																	<em>
																		<?php echo date('Y-m-d H:i:s', strtotime($myPrizeNo['created_time'])); ?>
																	</em>	
																</p>
															</div>
															<?php endforeach; ?>
														</div>
													</div>
												</div>
											</div>
										</li>
									<?php endforeach; ?>
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

<script>
	$(document).ready(function(){
		$('.lottery-list').each(function(k, list){
			var width = 0;
			$(list).find('.lottery-piece').each(function(k, piece){
				width += $(piece).outerWidth() * 1 + 5;
			});
			$(list).width(width);
		});
	});
</script>
</html>
