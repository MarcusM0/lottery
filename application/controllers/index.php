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
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */