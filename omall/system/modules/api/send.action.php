<?php
 ignore_user_abort(TRUE);
 set_time_limit(0); 
 System::load_sys_fun("send");
 System::load_sys_fun("user");
 class send extends SystemAction {
	public function init(){
	}
	/*
		@type  1 邮件
		@type  2 手机
		@type  3 邮件,手机
		@type  4 微信
		@type  5 邮件，微信
		@type  6 短信，微信
		@type  7 邮件，手机，微信
	*/
	public function send_shop_code(){
		if(!isset($_POST['send']) && !isset($_POST['uid']) && !isset($_POST['gid'])){
			exit(0);
		}
		$uid = abs($_POST['uid']);
		$gid = abs($_POST['gid']);
		$db = System::load_sys_class("model");
		$sendinfo = $db->GetOne("SELECT id,send_type FROM `@#_send` WHERE `gid` = '$gid' and `uid` = '$uid'");		
		if($sendinfo)exit(0);
		$member = $db->GetOne("SELECT * FROM `@#_member` WHERE `uid` = '$uid'");
		if(!$member)exit(0);
		$info = $db->GetOne("SELECT id,q_user_code,q_end_time,title,q_user FROM `@#_shoplist` WHERE `id` = '$gid' and `q_uid` = '$uid'");
		if(!$info)exit(0);
		$member_band = $db->GetOne("SELECT * FROM `@#_member_band` WHERE `b_uid` = '$uid' AND `b_type` = 'weixin'");
		$type = System::load_sys_config("send","type");
		if(!$type)exit(0);
		$q_time = abs(substr($info['q_end_time'],0,10));
		while(time() < $q_time){
			sleep(5);	
		}
		$username = get_user_name($member,'username','all');
		$ret_send = false;
		if($type=='1'){
			if(!empty($member['email'])){
				send_email_code($member['email'],$username,$uid,$info['q_user_code'],$info['title']);
				$ret_send = true;
			}		
		}
		if($type=='2'){
			if(!empty($member['mobile'])){
				send_mobile_shop_code($member['mobile'],$uid,$info['q_user_code']);
				$ret_send = true;
			}
	
		}
		if($type=='3'){
			if(!empty($member['email'])){
				send_email_code($member['email'],$username,$uid,$info['q_user_code'],$info['title']);
				$ret_send = true;
			}
			if(!empty($member['mobile'])){
				send_mobile_shop_code($member['mobile'],$uid,$info['q_user_code']);
				$ret_send = true;
			}			
		}
		//只发送微信
		if($type=='4'){
			//发送微信通知
			if(!empty($member_band['b_code'])){
				$data = send_wx_shop_code($member_band['b_code'],$uid,$gid);//查询
				$wechat= $db->GetOne("select * from `@#_wechat_config` where id = 1");// 获取token
				$access_token= $this->getToken($wechat['appid'],$wechat['appsecret']);
				$postUrl = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
				$this->https_request($postUrl,$data);
				$ret_send = true;
			}			
		}
		//只发送微信&&邮件
		if($type=='5'){
			if(!empty($member['email'])){
				send_email_code($member['email'],$username,$uid,$info['q_user_code'],$info['title']);
				$ret_send = true;
			}
			//发送微信通知
			if(!empty($member_band['b_code'])){
				$data = send_wx_shop_code($member_band['b_code'],$uid,$gid);//查询
				$wechat= $db->GetOne("select * from `@#_wechat_config` where id = 1");// 获取token
				$access_token= $this->getToken($wechat['appid'],$wechat['appsecret']);
				$postUrl = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
				$this->https_request($postUrl,$data);
				$ret_send = true;
			}			
		}
		//短信&&微信
		if($type=='6'){
			if(!empty($member['mobile'])){
				send_mobile_shop_code($member['mobile'],$uid,$info['q_user_code']);
				$ret_send = true;
			}
			//发送微信通知
			if(!empty($member_band['b_code'])){
				$data = send_wx_shop_code($member_band['b_code'],$uid,$gid);//查询
				$wechat= $db->GetOne("select * from `@#_wechat_config` where id = 1");// 获取token
				$access_token= $this->getToken($wechat['appid'],$wechat['appsecret']);
				$postUrl = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
				$this->https_request($postUrl,$data);
				$ret_send = true;
			}			
		}
		//短信&&微信&&邮件
		if($type=='7'){
			if(!empty($member['mobile'])){
				send_mobile_shop_code($member['mobile'],$uid,$info['q_user_code']);
				$ret_send = true;
			}
			//发送微信通知
			if(!empty($member_band['b_code'])){
				$data = send_wx_shop_code($member_band['b_code'],$uid,$gid);//查询
				$wechat= $db->GetOne("select * from `@#_wechat_config` where id = 1");// 获取token
				$access_token= $this->getToken($wechat['appid'],$wechat['appsecret']);
				$postUrl = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
				$this->https_request($postUrl,$data);
				$ret_send = true;
			}
			if(!empty($member['email'])){
				send_email_code($member['email'],$username,$uid,$info['q_user_code'],$info['title']);
				$ret_send = true;
			}			
		}
		if($ret_send){			
			$this->send_insert($uid,$gid,$username,$info['title'],$type);
		}
		exit(0);
	}
	public function send_shop_reg(){
		
		
	}
	private function send_insert($uid,$gid,$username,$shoptitle,$send_type){
		$db = System::load_sys_class("model");$time=time();
		$sql = "INSERT INTO `@#_send` (`uid`,`gid`,`username`,`shoptitle`,`send_type`,`send_time`) VALUES ";
		$sql.= "('$uid','$gid','$username','$shoptitle','$send_type','$time')";
		$db->Query($sql);
	}
	//私有方法保存菜单
	private function https_request($url,$data = null){
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	    if (!empty($data)){
	        curl_setopt($curl, CURLOPT_POST, 1);
	        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	    }
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    $output = curl_exec($curl);
	    curl_close($curl);
	    return json_decode($output);
	}
	private function getToken($appid,$appsecret){
		$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
		$json=$this->get_Curl($url);
		$arr=json_decode($json,true);
		return $arr['access_token'];
	}
	private function get_Curl($url){//get https的内容
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL,$url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//不输出内容
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	 $result= curl_exec($ch);
	 curl_close($ch);
	 return $result;     
	 }
 }