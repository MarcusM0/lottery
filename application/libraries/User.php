<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_user {
	public function __construct($params = array()){
		$this->CI =& get_instance();
	}
	
	public function isAccountExist($email){
			$rs=$this->CI->db->query("select *  from login where category='email' and account='".$email."'");
			$accounts=$rs->result_array();	
			$result=array();	
			if(isset($accounts)&&$accounts){
				$account=$accounts[0];
				$result['UID']=$account['userid'];
				$result['ACCOUNT']=$account['account'];

			}		
			return $result;
	}		
	
	public function doLogin($email,$password){
			$rs=$this->CI->db->query("select *  from login where  password='".$password."' and account='".$email."'");
			$accounts=$rs->result_array();	
			$result=array();	
			if(isset($accounts)&&$accounts){
				$account=$accounts[0];
				$uid=$account['userid'];
				$user=$this->getUserById($uid);
				$this->CI->cache->set_user($user);
				return true;
			}else{
				return false;			
			}		

	}	
	
	
	function regUserByEmail($user){
	   $now=date("Y-m-d H:i:s");
       $this->CI->db->trans_start();
       $user['add_time']= $now; 
       $user['status']= 0;              
       $this->CI->db->insert("user",$user);
       $id=$this->CI->db->insert_id();          
       $login['userid']=$id;
       $login['account']=$user['email'];
       $login['password']=$user['password'];
       $login['category']='email';  
       $login['add_time']= $now;             
       $this->CI->db->insert("login",$login);      
       $this->CI->db->trans_complete();       
       
       return  $id;
	}	
	
	
	function userConfirm($uid){
		$data = array(
		'status'=>1
		);
		$where = array(
		'id'=>$uid,
		);
		$this->CI->db->update('user',$data,$where); 	
		$user=$this->getUserById($uid);		
		$this->CI->cache->set_user($user);	
	}
	
	function getUserById($id){
		$object=null;
		$sql= "SELECT * FROM user where status=1 and id=".$id;
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if(isset($list)&&$list){
			$object=$list[0];
		}
        return  $object;
	}	
	
	
	function updateInfo($userinfo,$uid){
		$where = array(
		'id'=>$uid,
		);
		$this->CI->db->update('user',$userinfo,$where); 	
		$user=$this->getUserById($uid);		
		$this->CI->cache->set_user($user);	
	}	
	
	function updateAvatar($userinfo,$uid){
		$where = array(
		'id'=>$uid,
		);
		$this->CI->db->update('user',$userinfo,$where); 	
		$user=$this->getUserById($uid);		
		$this->CI->cache->set_user($user);	
	}		
	
	
	function updatePassword($user){
		$data = array(
		'password'=>md5($user['password']),
		);
		$where = array('id'=>$user['uid']);
		$where_login = array('userid'=>$user['uid']);
		$this->CI->db->trans_start();
		$this->CI->db->update('user',$data,$where); 
		$this->CI->db->update('login',$data,$where_login); 		
		$this->CI->db->trans_complete();
        $rs=$this->CI->db->get_where('user',array("id"=>$user['uid']));
        $users = $rs->result_array ();
        $u=null;
        if(isset($users)&&$users){
        	$u=$users[0];
        	$rs=$this->CI->cache->set_user($u);
        }
        return  $u;
	}		

}


