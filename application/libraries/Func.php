<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('LOCAL_TIME_OFFSET',		0);
/// 经过较准的，本地时间戳　所有使用APP_LOCAL_TIMESTAMP　的地方用这个常替代，防止，无法更改服务器时间导致的问题　
define('APP_LOCAL_TIMESTAMP',	time() + LOCAL_TIME_OFFSET);
class CI_func {
	public function __construct($params = array()){
		$this->CI =& get_instance();
		$this->domain = 'http://test.caixiaoer.com/images';	
	}

	function getDomain(){
	  return $this->domain;
	}
    function  getRdCard(){
	    $randStr = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
	    $rand = substr($randStr,0,6);	
	    return $rand; 
	}		
	
	function mjz_format_time($time) {
		if (empty ( $time )) {
			return $time;
		}
		if (! is_numeric ( $time ) && PHP_VERSION < 5) {
			$matchs = array ();
			preg_match_all ( '/(\S+)/', $time, $matchs );
			if ($matchs [0]) {
				$Mtom = array ('Jan' => '01', 'Feb' => '02', 'Mar' => '03', 'Apr' => '04', 'May' => '05', 'Jun' => '06', 'Jul' => '07', 'Aug' => '08', 'Sep' => '09', 'Oct' => '10', 'Nov' => '11', 'Dec' => '12' );
				$time = $matchs [0] [5] . $Mtom [$matchs [0] [1]] . $matchs [0] [2] . ' ' . $matchs [0] [3];
			}
		}
		if (! is_numeric ( $time )) {
			$t = strtotime ( $time );
		} else {
			$t = $time;
		}
		//echo date('Y-m-d H:i',$t);
		$differ = APP_LOCAL_TIMESTAMP - $t;
		
		$year = date ( 'Y', APP_LOCAL_TIMESTAMP );
		
		if (($year % 4) == 0 && ($year % 100) > 0) {
			//闰年
			$days = 366;
		} elseif (($year % 100) == 0 && ($year % 400) == 0) {
			//闰年
			$days = 366;
		} else {
			$days = 365;
		}
		
		if ($differ <= 60) {
			//小于1分钟
			if ($differ <= 5) {
				$differ = 5;
			}
			$format_time = sprintf ( '%d秒前', $differ );
		} elseif ($differ > 60 && $differ <= 60 * 60) {
			//大于1分钟小于1小时
			$min = floor ( $differ / 60 );
			$format_time = sprintf ( '%d分钟前', $min );
		} elseif ($differ > 60 * 60 && $differ <= 60 * 60 * 24) {
			if (date ( 'Y-m-d', APP_LOCAL_TIMESTAMP ) == date ( 'Y-m-d', $t )) {
				//大于1小时小于当天
				$format_time = sprintf ( '今天 %s', date ( 'H:i', $t ) );
			} else {
				//大于1小时小于24小时
				$format_time = sprintf ( '%s月%s日 %s', date ( 'n', $t ), date ( 'j', $t ), date ( 'H:i', $t ) );
			}
		} elseif ($differ > 60 * 60 * 24 && $differ <= 60 * 60 * 24 * $days) {
			if (date ( 'Y', APP_LOCAL_TIMESTAMP ) == date ( 'Y', $t )) {
				//大于当天小于当年
				$format_time = sprintf ( '%s月%s日 %s', date ( 'n', $t ), date ( 'j', $t ), date ( 'H:i', $t ) );
			} else {
				//大于当天不是当年
				$format_time = sprintf ( '%s年%s月%s日 %s', date ( 'Y', $t ), date ( 'n', $t ), date ( 'j', $t ), date ( 'H:i', $t ) );
			}
		} else {
			//大于今年
			$format_time = sprintf ( '%s年%s月%s日 %s', date ( 'Y', $t ), date ( 'n', $t ), date ( 'j', $t ), date ( 'H:i', $t ) );
		}
		return $format_time;
	}	
	
	function str_replace_limit($search, $replace, $subject, $limit=-1) {  
	    if (is_array($search)) {
	        foreach ($search as $k=>$v) {
	            $search[$k] = '`' . preg_quote($search[$k],'`') . '`';
	        }
	        unset($k,$v);
	    }else {
	        $search = '`' . preg_quote($search,'`') . '`';
	    } 
	    // replacement    
	    return preg_replace($search, $replace, $subject, $limit);
	}	
	
	function getAvatarUrl($filename,$type,$extension) {
		$base="/usr/local/apache2/htdocs/lottery/images";
		//$base="D:/workspace/lottery/images";
		
		$rs=array();
		$dir='/'.$type.'/'.date('Y').'/'.date('m').'/'.date('d');
		if(isset($type)&&$type){
			$this->mkdirs($base.$dir);
		    $put_url=$base.$dir.'/'.$filename.".".$extension;
	    	$get_url=$this->domain.$dir.'/'.$filename.".".$extension;
		
			$rs=array('put_url'=>$put_url,'get_url'=>$get_url);
		}
		return $rs;
	}	
	
	function mkdirs($dir){  
		if(!is_dir($dir))  {  
			if(!$this->mkdirs(dirname($dir))){  
			  return false;  
			}  
			if(!mkdir($dir,0777,true)){  
			  return false;  
			}else{
		       chmod($dir,0777);  					
			}  
		
		}  
		return true;  
	} 	
	
	//url base64编码
	function urlsafe_b64encode($string) {
	    $data = base64_encode($string);
	    $data = str_replace(array('+','/','='),array('-','_',''),$data);
	    return $data;
	}
	//url base64解码
	function urlsafe_b64decode($string) {
	    $data = str_replace(array('-','_'),array('+','/'),$string);
	    $mod4 = strlen($data) % 4;
	    if ($mod4) {
	        $data .= substr('====', $mod4);
	    }
	    return base64_decode($data);
	}

	
	
}


