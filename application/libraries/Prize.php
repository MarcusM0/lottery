<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_prize {
	public function __construct($params = array()){
		$this->CI =& get_instance();
	}
	
	function taskSubmit($taskString){
	   //submit
	   	$task_domain=$this->CI->config->item('task_domain');
		$post_data = array();
		$post_data['submitTasks'] = $taskString;
		$url=$task_domain.'/sunyardEngine/submit';
		$o="";
		foreach ($post_data as $k=>$v)
		{
		    $o.= "$k=".urlencode($v)."&";
		}
		$post_data=substr($o,0,-1);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL,$url);
		//为了支持cookie
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		//$result = curl_exec($ch);		
		ob_start();   
		curl_exec($ch);   
		$result = ob_get_contents() ;   
		ob_end_clean();   
        curl_close($ch);   		
	
	
	}
	

	function getPrizeBySort($sort){
		$object=null;
		$sql= "SELECT * FROM prize where sort=".$sort;
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if(isset($list)&&$list){
			$object=$list[0];
		}
        return  $object;
	}			
	
	
	function getPrizeByCategory($sort,$limit,$category){
		$sql= "SELECT * FROM prize where category=".$category;
		if(isset($sort)&&$sort){
			$sql=$sql.' order by  '.$sort;
		}	
		if(isset($limit)&&$limit){
			$sql=$sql.' '.$limit;
		}	
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
        return  $list;
	}
	
	
	
	function getPrizeNo($id){
		    $result=array();		
		    $user=$this->CI->cache->get_user();
            if(!isset($user)||!$user){
	            $result['code']=3;	    
	            $result['msg']="请登录"; 
	            $result['prizeno']=-1;  
	            return  $result;           	
            } 
	        $now=date("Y-m-d H:i:s");		    
 	    	$sql= "SELECT * FROM prize where id=".$id; 	
	    	$rs = $this->CI->db->query ( $sql);      		
            $list=$rs->result_array();   
            $num=0;	
            $total=0;	
            $result=array();
			if(isset($list)&&$list){
			   $num=intval($list[0]['num_now']);
			   $total=intval($list[0]['num']);
		    }	    		 
		    if($num<$total){
		    	$num=$num+1;
		    	$this->CI->db->trans_start();   	
        	    $sql= "update prize set num_now= ".$num." where id=".$id;
 		        $rs = $this->CI->db->query ( $sql);  		    	
		        $prize['userid']=$user['id'];
		        $prize['prizecode']=$id;       
		        $prize['prizeno']=$num;
		        $prize['add_time']=$now;                
	            $this->CI->db->insert("prizenolog",$prize);  
	            if($num==$total){
	        	    $sql= "update prize set status= 2 where id=".$id;
	 		        $rs = $this->CI->db->query ( $sql);  	            	
	            }
	            $this->CI->db->trans_complete(); 	
	            $result['code']=1;	    
	            $result['msg']="恭喜您又获得1张奖券,号码为:".$num;    
			    $result['num']=$num;
			    $result['total']=$total;
	            
		    }else{
	            $result['code']=2;	    
	            $result['msg']="抽奖已结束，请等待开奖"; 	
			    $result['num']=$num;
			    $result['total']=$total;	            	    
		    }   
            return  $result;
	}	
		
	
	
	
	
	
	
	function getPrizeNoList($sort,$limit,$parameter, $mergeSamePrize = false){
		$sql= "SELECT a.*,b.name as prizename,b.photo_url_s,  c.nick_name as username FROM prizenolog a, prize b ,user c WHERE a.prizecode=b.id AND a.userid=c.id";		
		if(isset($parameter['userid'])&&$parameter['userid']){
			$sql=$sql." and  a.userid = ".$parameter['userid'];
		}				
		if(isset($sort)&&$sort){
			$sql=$sql.' order by  '.$sort;
		}	
		if(isset($limit)&&$limit){
			$sql=$sql.' '.$limit;
		}	
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if($mergeSamePrize && !empty($list)){
			$listMerged = array();
			foreach($list as $item){
				$listMerged[$item['prizecode']][] = $item;
			}
			return $listMerged;
		}
        return  $list;
	}	
		
	function getPrizeNoCount($parameter){
		$sql= "SELECT a.* FROM prizenolog a, prize b ,user c WHERE a.prizecode=b.id AND a.userid=c.id";
		if(isset($parameter['userid'])&&$parameter['userid']){
			$sql=$sql." and  a.userid = ".$parameter['userid'];
		}			
        $sql="select count(*) AS COUNT  from (".$sql.") as t";
		$rs = $this->CI->db->query ( $sql);
		$count = $rs->result_array ();
		$num=0;
		if($count){
			$num=$count[0]['COUNT'];
		}
        return  $num;
	}		
	
	
	function getWinNoList($sort,$limit,$parameter){
		$sql= "SELECT a.*,b.name as prizename,b.photo_url_s,c.nick_name as username FROM winnerlog a, prize b ,user c WHERE a.prizecode=b.id AND a.userid=c.id";		
		if(isset($parameter['userid'])&&$parameter['userid']){
			$sql=$sql." and  a.userid = ".$parameter['userid'];
		}				
		if(isset($sort)&&$sort){
			$sql=$sql.' order by  '.$sort;
		}	
		if(isset($limit)&&$limit){
			$sql=$sql.' '.$limit;
		}	
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
        return  $list;
	}	
		
	function getWinNoCount($parameter){
		$sql= "SELECT a.* FROM winnerlog a, prize b ,user c WHERE a.prizecode=b.id AND a.userid=c.id";
		if(isset($parameter['userid'])&&$parameter['userid']){
			$sql=$sql." and  a.userid = ".$parameter['userid'];
		}			
        $sql="select count(*) AS COUNT  from (".$sql.") as t";
		$rs = $this->CI->db->query ( $sql);
		$count = $rs->result_array ();
		$num=0;
		if($count){
			$num=$count[0]['COUNT'];
		}
        return  $num;
	}		
		
	
	
	
	function getPrizeById($id){
		$object=null;
		$sql= "SELECT * FROM prize where id=".$id;
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if(isset($list)&&$list){
			$object=$list[0];
		}
        return  $object;
	}		
	
}


