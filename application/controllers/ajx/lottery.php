<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class lottery extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		$user=$this->cache->get_user();
		if(!isset($user)||!$user){
		   $return=array(
		     'res'=>false,
		     'msg'=>"请登录"
		   );
		   $placehtml = json_encode ( $return);	 
		   echo   $placehtml;               
			exit;
		}				
	}


	public function dosubmit() {	
		   $user=$this->cache->get_user();	
           $jsonString=$this->input->post("jsonString");
           $prizecode=$this->input->post("code");
           $input = json_decode($jsonString);           
		   $v=$this->cache->get_verify();
           $obj = json_decode($v);
		   $return=array();
		   $rs=false;
           $msg="验证不通过!";   
           $code=-1;   
           $task_html="";	   
           $task_title="";
                      
           foreach ($obj as $item) {
           	  if($item->taskType=='2'){
           	  	    $taskId=$item->taskID;
	           	    foreach ($input as $o) {
	                	if($item->taskID==$o->taskID){
	                		if($item->result==$o->result){
	                				$rs=true;
	                		}
	                	}
	                }          	  	
           	  }
           }
           
           $rs = true;
           if($rs==true){
			       foreach ($obj as $item) {
			       	  foreach ($input as $o) {
				         if($item->taskID==$o->taskID){
			                $item->result=$o->result;
			           	 }		       	  	 
			       	  }
		           }        
		           $jsonString = json_encode($obj);
                   //$this->prize->taskSubmit($jsonString);           	
           	  	   $result=$this->prize->getPrizeNo($prizecode);
            	   $msg=$result['msg'];
            	   $code=$result['code'];
                   $task_html = $this->load->view('include/yzm',array("id"=>$prizecode,"msg"=>$msg),true);   
            }           
       
           $return['v']=$rs;
           $return['msg']=$msg;
           $return['code']=$code;
           $return['task_html']=$task_html;
           $return['task_title']=$task_title;
		   $placehtml = json_encode ( $return);	 
		   echo   $placehtml;           
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */