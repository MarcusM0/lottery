<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class upload extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		$this->pagesize=15;				
	}
	public function index() {
		 $tempFile = $_FILES['Filedata']['tmp_name'];
		 $fileTypes = array('jpg','jpeg','gif','png','MP4','flv'); // File extensions
		 $fileParts = pathinfo($_FILES['Filedata']['name']);
         $productid=$this->input->post("productid");
		$avatarUrl=$this->func->getAvatarUrl(0,'picture',$fileParts['extension']);		 		
		 if (in_array($fileParts['extension'],$fileTypes)) {
		    if(isset($avatarUrl)&&$avatarUrl){
		 		 move_uploaded_file($tempFile,$avatarUrl['put_url']);
		 		 $rid=$this->product->addProductImage($productid,$avatarUrl['get_url']);
		 		 $avatarUrl['data_id']=$rid;
		    }			
		 } 			
		

	   $placehtml = json_encode ( $avatarUrl);	 
	   echo   $placehtml;

	}
	
	
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */