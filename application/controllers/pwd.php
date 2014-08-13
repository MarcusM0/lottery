<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class pwd extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
			
	}
	public function index() {
			$this->load->view ( 'pwd',  array());
	}
	
	public function send() {
    	$email=$this->input->post('email');			    	
    	$rd=$this->func->getRdCard();
    	$this->email->send($email,"找回密码",'新密码:('.$rd.'),请妥善保管!<a href='.site_url('pwd/email/'.$this->func->urlsafe_b64encode($email).'/p/'.$rd).'>点击生效</a>');	    	  	
		$this->load->view ( 'pwd',  array());
	}
	
	public function email() {
   		$input = $this->uri->uri_to_assoc ( 2 );
   		
        $usr['email']=$this->func->urlsafe_b64decode($input['email']);		
        $usr['password']=$input['p'];
		$this->user->updatePasswordByEmail($usr);   		
	    header("Location:".site_url('login'));  
	}	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */