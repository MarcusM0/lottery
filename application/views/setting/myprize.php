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
							
							<table class="myprizes" style="margin-top: -30px;">
								<tr>
									<th>奖品图片</th>
									<th>奖品名称</th>
									<th>期数</th>
									<th>您获得的奖券数</th>
									<th>开奖结果</th>
								</tr>
								<?php foreach($myPrizeNoList as $myPrize): ?>
									<?php $prize = $myPrize['prize_details']; ?>
									<?php 
										$issue = $myPrize['lottery_actions'][0];
										$issue_num = $issue['issue_num'];
										$issueSum = count($myPrize['lottery_actions']); 
									?>
									<?php $rate = $issueSum / $prize['num']; ?>
									<tr>
										<td class="thumb"><img src="<?php echo $prize['photo_url_s']; ?>" height="60" /></td>
										<td><?php echo $prize['prizename']; ?></td>
										<td>第<?php echo $issue_num; ?>期</td>
										<td>
											<?php echo $issueSum; ?>张(<?php echo $rate*1000; ?>‰)
										</td>
										<td>
											<?php if($issue['issue_result'] == CI_prize::ISSUE_PENDING): ?>
												<?php if($prize['num_now'] >= $prize['num']): ?>
													<span>等待开奖...</span>
												<?php else: ?>
													<a class="btn_cj" dataid="<?php echo $prize['id_prize']; ?>" href="javascript: {};">获得更多奖券</a>
												<?php endif; ?>
											<?php else: ?>
												<?php $win = false; ?>
												<?php foreach($myPrize['lottery_actions'] as $issue_details): ?>
													<?php if($issue_details['action_code'] == $issue_details['issue_result']): ?>
														<?php $win = true; break; ?>
													<?php endif; ?>
												<?php endforeach; ?>
												
												<?php if($win): ?>
													<span style="color: #F00;">
														恭喜您中奖 <br />
														您的奖券号码是：<?php echo str_pad($issue['issue_result'], 8, '0', STR_PAD_LEFT); ?>
													</span>
												<?php else: ?>
													<span style="color: #CCC;">很遗憾，您未中奖，请再接再厉。</span>
												<?php endif; ?>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
							
							<?php $this->load->view('elements/paginations', array(
								'baseUrl' => site_url('/setting/myprize'),
								'pageSize' => $pageSize,
								'currPage' => $currPage,
								'recordSum' => $recordSum
							)); ?>
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
