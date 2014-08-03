<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class thirdpart extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
			
	}
	public function index() {
		$data= $this->input->post("data");	
		if(isset($data)&&$data){
			try{ 
				    $this->thirdpart->getThirdPartData(json_decode($data));
					$placehtml = json_encode ( array('code'=>1,'msg'=>'成功'));	
					 echo   $placehtml;	
			}
		    catch(Exception $e){			    	
					$placehtml = json_encode ( array('code'=>0,'msg'=>$e));	
					 echo   $placehtml;		
		    }				
		}else{			
			$placehtml = json_encode ( array('code'=>0,'msg'=>'data参数为空'));	
			 echo   $placehtml;			
		}		    
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */