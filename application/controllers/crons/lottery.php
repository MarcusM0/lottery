<?php 

/**
 * 
 * Usage: 
 * 		run command - "php SITE_ROOT/index.php crons lottery run"
 * 
 * @author Marcus M.
 *
 */
class Lottery extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		// this controller can only be called from the command line
		if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
	}
	
	function run()
	{
		$toRunPrizes = $this->prize->getToRunLotteryPrizes();
		if(empty($toRunPrizes)){
			$this->gbLine('当前没有可开奖商品');
			exit;
		}
		
		foreach($toRunPrizes as $toRunPrize){
			$currentIssue = $this->prize->getCurrentLotteryIssueOfPrize($toRunPrize['id']);
			if(empty($currentIssue)){
				$this->prize->createNewLotteryIssueOfPrize($toRunPrize['id']);
				$currentIssue = $newIssue = $this->prize->getCurrentLotteryIssueOfPrize($toRunPrize['id']);
				
//				$this->gbLine('奖品【' . $toRunPrize['name'] . '】尚无进行中的奖励活动');
//				$this->gbLine('奖品【' . $toRunPrize['name'] . '】已创建新活动，期号: ' . $newIssue['issue_num']);
//				$this->gbLine('请等待下次开奖...');
//				exit;
			}
			
			$issueResult = $this->createPrizeLotteryResult($toRunPrize);
			if($this->prize->setLotteryResult($currentIssue['id_lottery_issue'], $issueResult)){
//				$this->prize->resetPrizeNumNow($toRunPrize['id']);

				$winner = $this->prize->getLotteryIssueWinner($currentIssue['id_lottery_issue']);
				if(!empty($winner)){
					$this->prize->addLotteryWinnerLog($winner['id'], $toRunPrize['id'], $currentIssue['issue_num'], $issueResult);
				}
				
				$this->gbLine('奖品【' . $toRunPrize['name'] . '】当前开奖期号: ' . $currentIssue['issue_num']);
				$this->gbLine('开奖号码: ' . $issueResult);
				
				/*
				$this->prize->createNewLotteryIssueOfPrize($toRunPrize['id']);
				$newIssue = $this->prize->getCurrentLotteryIssueOfPrize($toRunPrize['id']);
				$this->gbLine('奖品【' . $toRunPrize['name'] . '】已创建新活动，期号: ' . $newIssue['issue_num']);
				$this->gbLine('请等待下次开奖...');
				*/
			}else{
				$this->gbLine('开奖失败');
			}
			
			$this->gbLine(self::BLOCK_LINE);
		}
	}
	
	protected function createPrizeLotteryResult($prize)
	{
		$lotteryNum = $this->prize->generateLotteryNum();
		$result = substr($lotteryNum, (strlen($prize['num'] - 1) * -1));
		
		return $result;
	}
	
	const BLOCK_LINE = '--------------------';
	protected function gbEcho($str = '')
	{
		echo iconv('utf-8', 'gbk', $str);
	}
	
	protected function gbLine($str = '')
	{
		$this->gbEcho($str . "\n");
	}
}