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

<div id="closen" style="display:none">
	<div class="toum"></div>
	<div class="mydiv"></div>
</div>

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
							
							<div class="clearfix" style="margin-top: -30px;">
								<table class="myprizes">
									<tr>
										<th>奖品图片</th>
										<th>奖品名</th>
										<th>期数</th>
										<th>奖券数</th>
										<th>中奖概率</th>
										<th>当前状态</th>
									</tr>
									<?php foreach($myPrizeNoList as $myPrize): ?>
										<?php $prize = $myPrize['prize_details']; ?>
										<?php foreach($myPrize['lottery_actions'] as $issue_num => $issues): ?>
											<?php $issueSum = count($issues); ?>
											<?php $rate = $issueSum / $prize['num']; ?>
											<tr>
												<td><img src="<?php echo $prize['photo_url_s']; ?>" width="100" height="70" /></td>
												<td><?php echo $prize['prizename']; ?></td>
												<td><?php echo $issue_num; ?></td>
												<td><?php echo $issueSum; ?></td>
												<td><?php echo $rate*1000; ?> / 1000</td>
												<td>
													<?php if($issues[0]['issue_result'] == CI_prize::ISSUE_PENDING): ?>
														<?php if($prize['num_now'] >= $prize['num']): ?>
															<span>等待开奖...</span>
														<?php else: ?>
															<a class="btn_cj" dataid="<?php echo $prize['id_prize']; ?>" href="javascript: {};">继续抽奖</a>
														<?php endif; ?>
													<?php else: ?>
														<?php $win = false; ?>
														<?php foreach($issues as $issue_details): ?>
															<?php if($issue_details['action_code'] == $issue_details['issue_result']): ?>
																<?php $win = true; ?>
															<?php endif; ?>
														<?php endforeach; ?>
														
														<?php if($win): ?>
															<span style="color: #F00;">恭喜中奖（中奖号码：<?php echo $issues[0]['issue_result']; ?>）</span>
														<?php else: ?>
															<span style="color: #CCC;">再接再厉</span>
														<?php endif; ?>
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php endforeach; ?>
								</table>
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

	$(".btn_cj").bind("click",function(){
	    var id=$(this).attr("dataid"); 
		$.post("/prize",{id:id},function(result){		
			 $('.mydiv',$("#closen")[0]).html(result);
			 $("#closen").show();
		    //$("span").html(result);
		  });

	});
</script>
</html>
