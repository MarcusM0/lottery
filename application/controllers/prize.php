<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class prize extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
			
	}
	public function index() {
		$id=$this->input->post("id");
		
		$yzm_html = $this->load->view('include/yzm',array("id"=>$id),true);   
        echo $yzm_html;
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */