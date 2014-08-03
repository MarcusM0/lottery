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
	   $taskID=$this->input->post("taskID");
	   $url=$task_domain."/sunyardEngine/refresh?refreshTaskID=".$taskID.'&refreshTaskType=2';
       $ff=file_get_contents($url);
//       $ff='[{"result":"","taskType":"1","image":["http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37317/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37317_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37318/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37318_1.JPG"],"enterWay":"1","taskID":"PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_PA_152_9"},{"result":"","taskType":"1","image":["http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37319/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37319_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37320/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37320_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37321/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37321_1.JPG","http://localhost:88/imageWeb/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37326/PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_37326_1.JPG"],"enterWay":"1","taskID":"PA_hppqqqpoq_003_F69343A34F3A4171AE044A0369F1934EC_7700047169113_900004_4_3_PA_152_10"},{"result":"18924671673","taskType":"2","image":["http://localhost:88/imageWeb/PA_hppqqphdh_003_F694955C0D7756B62E044A0369F1934EC_7700047169348_900004_6_5_37228/PA_hppqqphdh_003_F694955C0D7756B62E044A0369F1934EC_7700047169348_900004_6_5_37228_1.JPG"],"enterWay":"0","taskID":"PA_hppqqphdh_003_F694955C0D7756B62E044A0369F1934EC_7700047169348_900004_6_5_PA_155_1"}]';	   
       $obj = json_decode($ff);
       if(isset($obj[0]->result)&&$obj[0]->result){
         $this->cache->set_verify($obj[0]->result);       	
       }
	   $placehtml = json_encode ( $ff);	
	   echo   $placehtml;
	}	
	
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */