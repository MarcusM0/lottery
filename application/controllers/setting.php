<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class setting extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		$user=$this->cache->get_user();
		if(!isset($user)||!$user){
			header("Location:".site_url('reg'));  
			exit;
		}			
	}
	public function index() {
			$this->load->view ( 'setting/index',  array());
	}
	
	
	public function avatar() {
			$this->load->view ( 'setting/setting_avatar',  array());
	}	
	
	public function pwd() {
			$this->load->view ( 'setting/setting_pwd',  array());
	}
	
	public function myprize() {
		$user=$this->cache->get_user();
		$myPrizeNoList = $this->prize->getPrizeNoList(' created_time DESC ', array(
			'userid' => $user['id']
		));
		
		$currPage = $this->getQuery('page', 1);
		$pageSize = 10;
		$recordSum = count($myPrizeNoList);
		$sliceStart = $currPage*$pageSize - $pageSize;
		$myPrizeNoList = array_slice($myPrizeNoList, $sliceStart, $pageSize);
		
		$this->load->view ('setting/myprize', array(
			'user' => $user,
			'myPrizeNoList' => $myPrizeNoList,
		
			'pageSize' => $pageSize,
			'currPage' => $currPage,
			'recordSum' => $recordSum
		));
	}
	
	public function updateInfo() {
	   $user=$this->cache->get_user();   
	   $mobile=$this->input->post("mobile");			   
	   $userinfo['mobile']=$mobile;	   	   
	   $this->user->updateInfo($userinfo,$user['id']);
	   //header("Location:".site_url('setting'));  	
	   echo true;
	}	
	
	public function isPassword(){
		$user=$this->cache->get_user();
		$password=$this->input->post("password_old");
		if(md5($password)==$user['password']){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	public function updatePassword(){
		$user=$this->cache->get_user();
        $password=$this->input->post('password_new1'); 
        $usr['uid']=$user['id'];		
        $usr['password']=$password;
		$this->user->updatePassword($usr);
        //header("Location:".site_url('setting/pwd'));
        echo true;
	}	
	
	
	
	public function getParam($name,$defaultValue=null)
	{
		return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : $defaultValue);
	}

	public function getQuery($name,$defaultValue=null)
	{
		return isset($_GET[$name]) ? $_GET[$name] : $defaultValue;
	}

	public function getPost($name,$defaultValue=null)
	{
		return isset($_POST[$name]) ? $_POST[$name] : $defaultValue;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */