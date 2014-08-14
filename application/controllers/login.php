<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class login extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		if(isset($_COOKIE['autoLogin'])&&$_COOKIE['autoLogin']){
			        $rd_cookie=$_COOKIE['autoLogin'];
					$this->user->getUserByRd($rd_cookie);

		}		
		$user=$this->cache->get_user();
		if(isset($user)&&$user){
	    	header("Location:".site_url('index'));  			
		}		
	}
	public function index() {
			$this->load->view ( 'login',  array());
	}
	
	public function out() {
		
		    $this->cache->clean_user();
		    delete_cookie("autoLogin");		

	    	header("Location:".site_url('index'));  
	}
	
	public function dologin() {
		    $remember=$this->input->post('remember');	
	    	$email=$this->input->post('email');	

	    	$password=$this->input->post('password');	 	    	   	
	    	$result=$this->user->doLogin($email,md5($password),$remember);	    	
			$placehtml = json_encode ( array('code'=>$result,'url'=>site_url("index")));


			 echo   $placehtml;	
//	    	if(isset($result)&&$result){
//	    		  	header("Location:".site_url('index'));  
//	    	}else{
//	    	        header("Location:".site_url('login'));  
//	    	}	  
	}	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */