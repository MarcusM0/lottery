<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_thirdpart {
	public function __construct($params = array()){
		$this->CI =& get_instance();
	}	
	function getThirdPartData($data){		
 			$rs=$this->CI->db->query("select *  from thirdpart_new");
			$list=$rs->result_array(); 		
			$now=date("Y-m-d H:i:s");		
			if(isset($list)&&$list){	
				foreach ($data as $item) {
					$item->add_time=$now;
					$where = array(
					'key'=>$item->key,
					);
					$this->CI->db->update('thirdpart_new',$item,$where); 	
				}											
			}else{
				foreach ($data as $item) { 
					$item->add_time=$now;					           
		            $this->CI->db->insert("thirdpart_new",$item);  					
				}
			}
			foreach ($data as $item) { 
					$item->add_time=$now;					           
		            $this->CI->db->insert("thirdpart_his",$item);  					
			}						
	}
	
	
}


