<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class index extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
   
		if(isset($_COOKIE['autoLogin'])&&$_COOKIE['autoLogin']){
			        $rd_cookie=$_COOKIE['autoLogin'];
					$this->user->getUserByRd($rd_cookie);
		}


	}
	public function index() {
		$this->load->view ( 'index',  array());
	}
	
	public function fetch_lottery_num(){
		$ret = true;
		$errors = array();
		
		if(empty($_POST['posted_nums'])){
			$ret = false;
			$errors[] = 'post_nums cannot be empty';
		}else{
			$postedNums = $_POST['posted_nums'];
			$postedNums = json_decode($postedNums, true);
			$data = array();
			foreach($this->db->query("SELECT * FROM lottery_num_code")->result_array() as $record){
				$data[$record['code']] = $record;
			}
			
			foreach($postedNums as $k => $postedNum){
				if(empty($postedNum['code']) || empty($postedNum['name']) || empty($postedNum['value'])){
					$ret = false;
					$errors[] = "fields required in line {$k}";
				}else{
					$num_seq = $k + 1;
					$data[$postedNum['code']] = array(
						'code' => $postedNum['code'],
						'name' => $postedNum['name'],
						'num_value' => $postedNum['value'],
						'num_position' => 1,
						'num_seq' => $num_seq
					);
				}
			}
			
			$this->db->query(" DELETE FROM lottery_num_code ");
			if(!empty($data)){
				$dataSql = '';
				foreach($data as $record){
					$dataSql[] = " ('{$record['code']}', '{$record['name']}', '{$record['num_value']}', '{$record['num_position']}', '{$record['num_seq']}') ";
				}
				
				$sql = ' INSERT INTO lottery_num_code(`code`, `name`, `num_value`, `num_position`, `num_seq`) VALUES ' . implode(', ', $dataSql);
				$result = $this->db->query($sql);
			}
		}
		
		$this->_returnAjax(array(
			'ret' => $ret,
			'errors' => $errors
		));
	}
	
	public function generateLotteryNum()
	{
		$lotteryNum = $this->prize->generateLotteryNum();
		
		$this->_returnAjax(array(
			'result' => true,
			'lottery_num' => $lotteryNum
		));
	}

	protected function _returnAjax($msg = '', $byJson = true)
	{
		if($byJson){
			$msg = json_encode($msg);
		}
		echo $msg;
		$this->_end();
	}
    
	protected function _end($status=0, $exit=true)
	{
		if($exit)
			exit($status);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */