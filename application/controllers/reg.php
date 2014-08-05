<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class reg extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
			
	}
	public function index() {
			$this->load->view ( 'reg',  array());
	}
	
	public function doreg() {
    	$nick_name=$this->input->post('nick_name');			
    	$email=$this->input->post('email');	
    	$mobile=$this->input->post('mobile');    	
    	$password=$this->input->post('password');
    	$user['nick_name']=$nick_name;    		  
    	$user['email']=$email;
    	$user['mobile']=$mobile;
    	$user['password']=md5($password);
		$id=$this->user->regUserByEmail($user);
		$uid=$this->func->urlsafe_b64encode($id);
		$regurl=site_url("reg/confirm/".$uid);	
		$email_html = $this->load->view('include/emailreghtml',array('nick'=>$nick_name,'regurl'=>$regurl),true);   
		$this->email->send($email,"账号激活",$email_html);	
	    echo true;
	}		
	
	public function confirm() {
	   $parameter = $this->uri->uri_to_assoc(2);
	   $uid=$this->func->urlsafe_b64decode($parameter['confirm']);	   
	   $this->user->userConfirm($uid);
	   $user=$this->cache->get_user();
	   if(isset($user)&&$user){
	    	header("Location:".site_url('index'));   
	   }else{
	    	header("Location:".site_url('reg'));   
	   }
	}	
	
    public function isexsit(){
    	$email=$this->input->post('email');	
    	$rs='true';
    	$result=$this->user->isAccountExist($email);
    	if(isset($result)&&$result){
      		$rs='false';
    	}
    	echo $rs;
 	}		
    public function iscode(){
		if(!isset($_SESSION)){
            session_start();
		}	    	
    	$code=$this->input->post('code');	
    	$rs='false';
    	if($code==$_SESSION["lottery_num"]){
          $rs ='true';
        }
    	echo $rs;
 	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */