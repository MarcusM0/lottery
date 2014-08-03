<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_cache {
	public function __construct($params = array()){
		$this->CI =& get_instance();
	}
	
	
	
	public function set_verify($verify){
		if(!isset($_SESSION)){
            session_start();
		}		
		$_SESSION['lottery_verify']=$verify;		

	}	
	public function get_verify(){
		if(!isset($_SESSION)){
            session_start();
		}
		$verify=null;
		if(isset($_SESSION['lottery_verify'])&&$_SESSION['lottery_verify']){
			$verify=$_SESSION['lottery_verify'];
		}
        return  $verify;
	}	
		
	
	
	public function set_user($user){
		if(!isset($_SESSION)){
            session_start();
		}		
		$_SESSION['lottery_user']=$user;		

	}	
	public function get_user(){
		if(!isset($_SESSION)){
            session_start();
		}
		$user=null;
		if(isset($_SESSION['lottery_user'])&&$_SESSION['lottery_user']){
			$user=$_SESSION['lottery_user'];
		}
        return  $user;
	}	
	
	
	public function clean_user(){
		if(!isset($_SESSION)){
            session_start();
		}	
		unset( $_SESSION['lottery_user'] ); 

	}		
	
	public function user_reflesh(){
		if(!isset($_SESSION)){
            session_start();
		}			
		$user=$_SESSION['lottery_user'];
		$rs=$this->CI->db->query("SELECT   * FROM user  WHERE STATUS=1 and USER_ID = '".$user['USER_ID']."'");
		$userList=$rs->result_array();
		$u=$userList[0];
		$_SESSION['lottery_user']=$u;		
		return $_SESSION['lottery_user'];
	}		
	

}


