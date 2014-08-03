<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Uploadhead extends CI_Controller {
	function __construct(){
	    parent::__construct();
	}	
	public function index(){
		$contents = file_get_contents("php://input");
		$user=$this->cache->get_user();
		$imgname=md5($user['id'].mt_rand());		 
		$rs=$this->func->getAvatarUrl($imgname,'user','jpg');
		file_put_contents($rs['put_url'],$contents);
		$userinfo['avatar_url']=$rs['get_url'];
		$this->user->updateAvatar($userinfo,$user['id']);   		 
        echo true;
	}
}

