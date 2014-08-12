<?php 
	$pagesNum = ceil($recordSum / $pageSize);
?>

<?php if($pagesNum > 1): ?>
	<div class="flickrpager">
		<?php if($pagesNum >= 3 && $currPage > 1): ?>
			<a href="<?php echo $baseUrl; ?>?page=1">首页</a>
		<?php endif; ?>
		<?php if($currPage > 1): ?>
			<a href="<?php echo $baseUrl; ?>?page=<?php echo $currPage - 1; ?>">上一页</a>
		<?php endif; ?>
		
		<?php for($i = 1; $i <= $pagesNum; $i++): ?>
			<?php if($i == $currPage): ?>
				<span class="current"><?php echo $i; ?></span>
			<?php else: ?>
				<a href="<?php echo $baseUrl; ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php endif; ?>
		<?php endfor; ?>
		
		<?php if($currPage < $pagesNum): ?>
			<a href="<?php echo $baseUrl; ?>?page=<?php echo $currPage + 1; ?>">下一页</a>
		<?php endif; ?>
		<?php if($pagesNum >= 3 && $currPage < $pagesNum): ?>
			<a href="<?php echo $baseUrl; ?>?page=<?php echo $pagesNum; ?>">末页</a>
		<?php endif; ?>
	</div>
<?php endif; ?>