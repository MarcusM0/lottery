<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );



class remote extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		$this->pagesize=15;				
	}
	public function index() {
	    $placehtml = json_encode ( $avatarUrl);	 
	    echo   $placehtml;
	}
	
	public function gettask() {
		
	}	
	public function refresh() {
		//refresh
		
	   $task_domain=$this->config->item('task_domain');
	   $xh=$this->input->post("xh");	   
	   $taskID=$this->input->post("taskID");
	   $sign=$this->input->post("sign");
	   $v=$this->func->encrypt($sign,'D','lottery123');	   	
       $objsign = json_decode($v);       
       $enterWay="";
       $OID="";
       $refreshTaskType="";
       foreach ($objsign as $key => $s) {
           if($s->taskID==$taskID){
           	$enterWay=$s->enterWay;
           	$OID=$s->OID;
           	$refreshTaskType=$s->taskType;
       	  	unset($objsign[$key]);
       	  }
       }
	   $url=$task_domain."/sunyardEngine/refresh?refreshTaskID=".$taskID.'&refreshTaskType='.$refreshTaskType.'&OID='.$OID.'&enterWay='.$enterWay;
       //$ff=file_get_contents($url);
       $ff='[{"result":"2","OID":"1","taskType":"2","image":["http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37318/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37318_1.JPG"],"enterWay":"1","taskID":"PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_PA_152_9"}]';
       $obj = json_decode($ff);       
       $objsign=array_merge($objsign,$obj);       
       $stringsignout=json_encode ( $objsign);	
       $signout=$this->func->encrypt($stringsignout,'E','lottery123');	 
       $refresh_html = $this->load->view('include/yzm_refresh',array("refresh"=>$obj[0],'xh'=>$xh),true); 
       $return['signout']=$signout;
       $return['current']=$refresh_html;
       $placehtml = json_encode ( $return);	 
	   echo   $placehtml;  

	}	
	
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */