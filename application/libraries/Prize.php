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
	
	function resetPrizeNumNow($id_prize)
	{
		$sql = " UPDATE prize SET num_now = 0 WHERE id = {$id_prize} ";
		return $this->CI->db->query($sql);
	}
	
	function getToRunLotteryPrizes()
	{
		$sql = " SELECT * FROM prize WHERE num_now >= num "; 
		$result = $this->CI->db->query($sql);
		
		return $result->result_array();
	}
	
	const ISSUE_PENDING = 'pending';
	const ISSUE_NUM_BEGINING = 1;
	function createNewLotteryIssueOfPrize($id_prize)
	{
		$sql = " SELECT MAX(issue_num) max_issue_num FROM lottery_issue WHERE id_prize = '{$id_prize}' ";
		$result = $this->CI->db->query($sql);
		$row = $result->row_array();
		if(empty($row)){
			$newmaxIssueNum = self::ISSUE_NUM_BEGINING;
		}else{
			$newmaxIssueNum = $row['max_issue_num'] + 1;
		}
		
		$sql = " INSERT INTO lottery_issue SET id_prize = {$id_prize}, issue_num = {$newmaxIssueNum}, issue_result = '".self::ISSUE_PENDING."' ";
		return $this->CI->db->query($sql);  
	}
	
	function getCurrentLotteryIssueOfPrize($id_prize, $createIfNull = false)
	{
		$sql = " SELECT * FROM lottery_issue WHERE id_prize = {$id_prize} AND issue_result = '".self::ISSUE_PENDING."' ";
		$result = $this->CI->db->query($sql);
		$issue = $result->row_array();
		if(empty($issue) && $createIfNull){
			$this->createNewLotteryIssueOfPrize($id_prize);
			$sql = " SELECT * FROM lottery_issue WHERE id_prize = {$id_prize} AND issue_result = '".self::ISSUE_PENDING."' ";
			$result = $this->CI->db->query($sql);   
			$issue = $result->row_array();
		}
		
		return $issue;
	}
	
	function setLotteryResult($id_lottery_issue, $result)
	{
		$sql= "UPDATE lottery_issue SET issue_result = '{$result}' WHERE id_lottery_issue = {$id_lottery_issue}";
		return $this->CI->db->query($sql); 
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
 		        $currentIssue = $this->getCurrentLotteryIssueOfPrize($id, true);
	            $this->CI->db->insert("user_lottery_action", array(
	            	'id_user' => $user['id'],
	            	'action_code' => $num,
	            	'id_lottery_issue' => $currentIssue['id_lottery_issue'],
	            	'created_time' => $now
	            ));  
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
		$sql= "
		SELECT  p.name prizename, p.photo_url_s, p.num, p.num_now, 
				ula.*, 
				u.nick_name username, 
				li.issue_result, li.issue_num, li.id_prize
		FROM prize p
		LEFT JOIN lottery_issue li ON p.id = li.id_prize 
		LEFT JOIN user_lottery_action ula ON li.id_lottery_issue = ula.id_lottery_issue 
		LEFT JOIN user u ON ula.id_user = u.id
		";
		
		$conditions = array();
		if(isset($parameter['userid'])&&$parameter['userid']){
			$conditions[] = 'ula.id_user = "'. $parameter['userid'] .'"';
		}
		if(!empty($conditions)){
			$sql .= ' WHERE ' . implode(' AND ', $conditions);
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
				$listMerged[$item['id_prize']]['prize_details'] = array(
					'prizename' => $item['prizename'],
					'photo_url_s' => $item['photo_url_s'],
					'id_prize' => $item['id_prize'],
					'num' => $item['num'],
					'num_now' => $item['num_now'],
					'username' => $item['username'],
				);
				$listMerged[$item['id_prize']]['lottery_actions'][$item['issue_num']][] = array(
					'id_user_lottery_actioin' => $item['id_user_lottery_actioin'],
					'id_user' => $item['id_user'],
					'action_code' => $item['action_code'],
					'id_lottery_issue' => $item['id_lottery_issue'],
					'created_time' => $item['created_time'],
					'issue_result' => $item['issue_result'],
					'issue_num' => $item['issue_num'],
				);
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


