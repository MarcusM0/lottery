<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_split {
	public function __construct($params = array()){
		$this->CI =& get_instance();
	}
	
	function getLimit($page,$pagesize) {
		 $limit='LIMIT '.($page - 1) * $pagesize.','.$pagesize;
         return $limit;  
	}
	
	
	

}


