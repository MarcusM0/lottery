<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_method {
	public function __construct($params = array()){
		$this->CI =& get_instance();
		$this->domain = '';	
	}
	/**
	 * 产品列表
	 * @param unknown_type $sort
	 * @param unknown_type $limit
	 * @param unknown_type $key
	 */
	function getProducts($sort,$limit,$key){
		$sql= "SELECT * FROM products where 1=1";
		
		if(isset($key)&&$key){
			$sql=$sql." and  title like '%".$key."%'";
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
	/**
	 * 案例列表
	 * @param unknown_type $sort
	 * @param unknown_type $limit
	 * @param unknown_type $key
	 */
	function getCases($sort,$limit,$key){
		$sql= "SELECT * FROM cases where 1=1";
		
		if(isset($key)&&$key){
			$sql=$sql." and  title like '%".$key."%'";
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
	
	/**
	 * 得到单条产品
	 * @param unknown_type $id
	 */
	function getProductById($id){
		$object=null;
		$sql= "SELECT * FROM products where id=".$id;
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if(isset($list)&&$list){
			$object=$list[0];
		}
        return  $object;
	}		
	/**
	 * 得到单条案例
	 * @param unknown_type $id
	 */	
	function getCaseById($id){
		$object=null;
		$sql= "SELECT * FROM CASES where id=".$id;
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if(isset($list)&&$list){
			$object=$list[0];
		}
        return  $object;
	}		
	/**
	 * 产品数
	 * @param unknown_type $key
	 */
	function getProductsCount($key){
		$sql= "SELECT * FROM products where 1=1";
		if(isset($key)&&$key){
			$sql=$sql." and  title like '%".$key."%'";
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
	/**
	 * 案例数
	 * @param unknown_type $key
	 */			
	function getCasesCount($key){
		$sql= "SELECT * FROM cases where 1=1";
		if(isset($key)&&$key){
			$sql=$sql." and  title like '%".$key."%'";
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
		
	/**
	 * 新增产品
	 * @param unknown_type $title
	 * @param unknown_type $img_url
	 * @param unknown_type $category
	 * @param unknown_type $uid
	 */
	function addProduct($title,$img_url,$category,$uid){
       $test['TITLE']=$title;	
       $test['IMG_URL']=$img_url;	 
       $test['CATEGORY']=$category;	     	
       $test['UID']=$uid;
       $test['ADD_TIME']= date("Y-m-d H:i:s");
       $this->CI->db->insert("PRODUCTS",$test);
       $id=$this->CI->db->insert_id();   
       return  $id;
	}	  
	/**
	 * 新增案例
	 * @param $title
	 * @param $img_url
	 * @param $category
	 * @param $uid
	 */
	function addCase($title,$img_url,$category,$uid){
       $test['TITLE']=$title;	
       $test['IMG_URL']=$img_url;	 
       $test['CATEGORY']=$category;	     	
       $test['UID']=$uid;
       $test['ADD_TIME']= date("Y-m-d H:i:s");
       $this->CI->db->insert("CASES",$test);
       $id=$this->CI->db->insert_id();   
       return  $id;
	}		
	
	/**
	 * 修改产品
	 * @param unknown_type $id
	 * @param unknown_type $title
	 * @param unknown_type $img_url
	 */
	function updateProduct($id,$title,$img_url){

		$data = array(
		'ADD_TIME'=>date("Y-m-d H:i:s"),
		'TITLE'=>$title,
		'IMG_URL'=>$img_url
		);
		$where = array(
		'ID'=>$id,
		);
		$this->CI->db->update('PRODUCTS',$data,$where); 	
	}		
	/**
	 * 修改案例
	 * @param unknown_type $id
	 * @param unknown_type $title
	 * @param unknown_type $img_url
	 */
	function updateCase($id,$title,$img_url){

		$data = array(
		'ADD_TIME'=>date("Y-m-d H:i:s"),
		'TITLE'=>$title,
		'IMG_URL'=>$img_url
		);
		$where = array(
		'ID'=>$id,
		);
		$this->CI->db->update('CASES',$data,$where); 	
	}		
		
	
	
	
	function delProduct($id){
       $test['ID']=$id;	
       $this->CI->db->delete("PRODUCTS",$test);
       return  $id;
	}	  
	
	function delCase($id){
       $test['ID']=$id;	
       $this->CI->db->delete("CASES",$test);
       return  $id;
	}	
	
	
	
	
	function getNews($sort,$limit,$key){
		$sql= "SELECT * FROM news where 1=1";
		
		if(isset($key)&&$key){
			$sql=$sql." and  title like '%".$key."%'";
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
		
	function getNewsCount($key){
		$sql= "SELECT * FROM news where 1=1";
		if(isset($key)&&$key){
			$sql=$sql." and  title like '%".$key."%'";
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
			
	function getNewById($id){
		$object=null;
		$sql= "SELECT * FROM NEWS where id=".$id;
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if(isset($list)&&$list){
			$object=$list[0];
		}
        return  $object;
	}		
	
	function delNew($id){
       $test['ID']=$id;	
       $this->CI->db->delete("NEWS",$test);
       return  $id;
	}		
	
	/**
	 * 添加新闻
	 */
	function addNew($title,$summary,$content,$category,$uid){
       $test['TITLE']=$title;	
       $test['SUMMARY']=$summary;	
       $test['CONTENT']=$content;	 
       $test['CATEGORY']=$category;	     	
       $test['ADD_TIME']= date("Y-m-d H:i:s");
       $test['UID']=$uid;       
       $this->CI->db->insert("NEWS",$test);
       $id=$this->CI->db->insert_id();   
       return  $id;
	}	
	
	function updateNew($id,$title,$summary,$content,$category){

		$data = array(
		'TITLE'=>$title,
		'SUMMARY'=>$summary,
		'CONTENT'=>$content,
		'CATEGORY'=>$category,
		'ADD_TIME'=>date("Y-m-d H:i:s"),
		);
		$where = array(
		'ID'=>$id,
		);
		$this->CI->db->update('NEWS',$data,$where); 	
	}		
	
	/**
	 * 添加职位
	 */
	
	function addJob($job){
    	
       $job['ADD_TIME']= date("Y-m-d H:i:s");

       $this->CI->db->insert("JOBS",$job);
       $id=$this->CI->db->insert_id();   
       return  $id;
	}		
	
	function updateJob($id,$job){


		$where = array(
		'ID'=>$id,
		);
		$this->CI->db->update('JOBS',$job,$where); 	
	}	
	
	
	function getJobs($sort,$limit,$key){
		$sql= "SELECT * FROM jobs where 1=1";
		
		if(isset($key)&&$key){
			$sql=$sql." and  name like '%".$key."%'";
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
		
	function getJobsCount($key){
		$sql= "SELECT * FROM jobs where 1=1";
		if(isset($key)&&$key){
			$sql=$sql." and  name like '%".$key."%'";
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
	
	function getJobById($id){
		$object=null;
		$sql= "SELECT * FROM JOBS where id=".$id;
		$rs = $this->CI->db->query ( $sql);
		$list = $rs->result_array ();
		if(isset($list)&&$list){
			$object=$list[0];
		}
        return  $object;
	}		
	
	function delJob($id){
       $test['ID']=$id;	
       $this->CI->db->delete("JOBS",$test);
       return  $id;
	}	
		
	
    function http_request($url,$timeout=30,$header=array()){  
            if (!function_exists('curl_init')) {  
                throw new Exception('server not install curl');  
            }  
            $ch = curl_init();  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
            curl_setopt($ch, CURLOPT_HEADER, true);  
            curl_setopt($ch, CURLOPT_URL, $url);  
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);  
            if (!empty($header)) {  
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);  
            }  
            $data = curl_exec($ch);  
            list($header, $data) = explode("\r\n\r\n", $data);  
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
            if ($http_code == 301 || $http_code == 302) {  
                $matches = array();  
                preg_match('/Location:(.*?)\n/', $header, $matches);  
                $url = trim(array_pop($matches));  
                curl_setopt($ch, CURLOPT_URL, $url);  
                curl_setopt($ch, CURLOPT_HEADER, false);  
                $data = curl_exec($ch);  
            }  
      
            if ($data == false) {  
                curl_close($ch);  
            }  
            @curl_close($ch);  
            return $data;  
    }  
		
	
	
}


