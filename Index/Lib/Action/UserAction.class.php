<?php
// 本文档自动生成，仅供测试运行
class UserAction extends CommonAction
{
	//登陆页面
    public function signin(){
	    if($this->isAjax()){
	    	$this->display('ajaxsignin');
	    }else{
    		$this->display();
	    }
    }
	//登陆操作
	public function login(){
		$data = Init_GP(array('email','password','remember_me'));
		$id = 0;
		$json = null;
		$status = 0;
		
		$state = $this->_checkLogin($data['email'],$data['password']);
		
	    if ($state===true){
	        if ($data['remember_me']) {
				setAutoLogin($data);
			}
			$member = D('Member');
			$map['mail'] = array('eq',$data['email']);
			$memberdata = $member->where($map)->find();
			$id = $memberdata['id'];
			$json = L('login_success');
			$status = 1; 
		}else {
		    if($state==4){
				$member = D('Member');
				$map['mail'] = array('eq',$data['email']);
				$memberdata = $member->where($map)->find();
				$id = $memberdata['id'];
				$json = L('email_not_verified');
				$status = 2; //电子邮件未验证！
			}else{
				$id = 0;
				if($state==1) {
					$json = L('email_not_exist');
				}elseif($state==2){
					$json = L('passwords_invalid');
				}elseif($state==3){
					$json = L('account_disabled');
				}
				$status = 0;
			}
		}
		$this->ajaxReturn($id,$json,$status);
	}
	//验证登陆
	public function _checkLogin($mail,$password){
	    $config = C('sysconfig');
		$member = D('Member');
		$map = array(
			'mail' =>array('eq',$mail),
		);
		
		$memberdata = $member->where($map)->find();
		if (empty($memberdata) || $memberdata===false){
			return 1;//"电子邮件不存在！"
		}else {
		    if(md5($password)==$memberdata['password']){
			    if($memberdata['status']==0){
				    return 3;//"账户被禁用！"
				}else{
					setMemberLogin($memberdata['id']);
				    if($config['site_mb_autoreg']==1 && $memberdata['mailstatus']==0){
					    return 4;//"电子邮件未验证！"
					}
					return true;
				}
			}else{
			    return 2;//"密码无效！"
			}
		}
	}
	
	//退出
	public function logout(){
		loginClear($this->memberinfo['id']);
		$this->redirect('Index/index');
	}
	//找回密码页面
    public function forgot_password(){
    	$this->display();
    }
	public function ajaxforgot_password(){
	    $data = Init_GP(array('email'));
		$this->assign('email',$data['email']);
    	$this->display();
    }
	//找回密码
	public function getpwd(){
		$data = Init_GP(array('email'));
		$json = null;
		if ($this->_isMember($data['email'])){
			$member = D('Member');
			$map['mail'] = array('eq',$data['email']);
			$memberdata = $member->where($map)->find();
			
			$verification = D('Verification');
			$count = $verification->getCount($data['email'],'getpwd');
			if ($count < 5){
				$verification->delCode($data['email'],'getpwd');
				$code = $verification->setCode($data['email'],'getpwd',$count+1);
				$url = HOST.__URL__.'/setpwd/code/'.$code;
				
				$config = C('sysconfig');
				
				$header = L('user_getpwd_heder');
				$header = $config['site_name'].$header;
				
				$message_tpl = D('Message_tpl');
				$body = $message_tpl->getBody('getpwd'); //选择模板
				$body = str_replace('[webname]',$config['site_name'], $body);
				$body = str_replace('[website]',$config['site_url'], $body);
				$body = str_replace('[user]',$memberdata['name'], $body);
				$body = str_replace('[url]',$url, $body);

				$info = sendMail($data['email'],$header,$body);
		        if($info)$this->success(L('user_getpwd_success'));
				else $this->error(L('user_getpwd_error'));
			}else {
				$this->error(L('user_getpwd_bout_error'));
			}
		}else {
			$this->error(L('email_not_exist'));
		}
	}
	//是否是会员邮箱
	public function _isMember($mail){
		$member = D('Member');
		$map['mail'] = array('eq',$mail);
		$memberdata = $member->where($map)->find();
		if (empty($memberdata)){
			return false;
		}else {
			return true;
		}
	}	
	//重设密码
	public function setpwd(){
		$data = Init_GP(array('code'));
		
		$verification = D('Verification');

		$map = array(
			'code'=>array('eq',$data['code']),
			'type'=>array('eq','getpwd')
		);
		$verificationdata = $verification->where($map)->find();
		if(empty($verificationdata)){
			$this->assign("jumpUrl",U("User/signin"));
			$this->error(L('user_setpwd_error'));
		}
		$this->assign('verificationdata',$verificationdata);
		$this->display();
	}
	//重设密码结果
	public function setpassword(){
		$data = Init_GP(array('code','email','password','password_confirmation'));
		
        $verification = D('Verification');
		$member = D('Member');
		
		$verificationmap = array(
			'code'=>array('eq',$data['code']),
			'type'=>array('eq','getpwd')
		);
		$verificationdata = $verification->where($verificationmap)->find();
		
		$map['mail'] = array('eq',$data['email']);
		$memberdata = $member->where($map)->find();
		
		if (!empty($memberdata)){
			if($data['password']==$data['password_confirmation']){
				if (!empty($verificationdata)){
					if($memberdata['password']==md5($data['password'])){
						$verification->delCode($verificationdata['mail'],'getpwd');
						$this->success(L('user_setpassword_success'));
					}else{
						$info = $member->where($map)->setField('password',md5($data['password']));
						if($info){
							$verification->delCode($verificationdata['mail'],'getpwd');
							$this->success(L('user_setpassword_success'));
						}else $this->error(L('user_setpassword_error'));
					}
				}else $this->error(L('user_setpassword_link_error'));
			}else{
			   $this->error(L('passwords_not_equal'));
			}
		}else $this->error(L('account_not_exist'));
		
	}
    //注册页面
    public function register(){
		$config = C('sysconfig');
		if($config['site_mb_allowreg']==0){
			$this->assign("jumpUrl",U("Index/index"));
			$this->error(L('user_register_allowreg'));
		}
		$login_port = D ('Login_port');
		$map['status'] = array('eq',1);
		$login_portdata = $login_port->getDataAll($map);
		if(isset($_COOKIE['inviteid'])){
		    $inviteid = intval($_COOKIE['inviteid']);
			$this->assign('inviteid',$inviteid);
		}
		$this->assign('login_portdata',$login_portdata);
    	$this->display();
    }
    //保密协议
    public function privacy(){
    	$this->display();
    }
    //使用条款
    public function agreement(){
    	$article = D('Article');
    	$articledata = $article->getOne(1);
    	$this->assign('articledata',$articledata);
    	$this->display();
    }
	//提交注册
	public function signup(){
	    $data = Init_GP(array('name','email','password','password_confirmation','inviteid','realname'));
		$id = 0;
		$json = null;
		$status = 0;
		$email = $data['email'];
		$member = D('Member');
		if($this->_checkName($data['name'])){//注册时验证用户名是否可用
			$_checkEmail = $this->_checkEmail($data['email']);
			if($_checkEmail === true){//注册时验证邮箱是否可用
				if($data['password']==$data['password_confirmation']){
				    $data = $member->create($data);
				    if(empty($data) || $data === false) {
						$json = L('register_error');
					}else {
						$data = $member->create($data,1);
						$id = $member->add($data);
						if($id) { //注册成功
							setMemberLogin($id);
							$config = C('sysconfig');
							if($config['site_mb_autoreg']==1){
								$info = $this->sendconfirm_mail($email);
								if($info){
									$json = L('register_success_auto_verification');
									$status = 2;
								}else{
								    $json = L('register_success_manual_verification');
									$status = 3;
								}
							}else{
							    $this->sendregistered_mail($email);
								$json = L('register_success');
								$status = 1;
							}
						}else $json = L('register_error');
					}
				}else $json = L('passwords_not_equal');
			}elseif($_checkEmail === 0){
				$json = L('release_validate_email');
			} else $json = L('email_used');
		}else $json = L('username_used');
	
		$this->ajaxReturn($id,$json,$status);
	}
   //注册时验证邮箱是否已使用
	public function emailcheck(){
	    $data = Init_GP(array('email'));
		$info = $this->_checkEmail($data['email']);
		if ($info) {
			echo 'true';
		}else {
			echo 'false';
		}
	}
	//注册时验证用户名是否可用
	public function namecheck(){
		$data = Init_GP(array('name'));
	
		$info = $this->_checkName($data['name']);
		if ($info) {
			echo 'true';
		}else {
			echo 'false';
		}
	}
	//验证邮箱
	public function _checkEmail($email){
		if(empty($email)) {
			return false;
		}else {
			$info = preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$email);
			if ($info === 1){
				return !$this->_isMember($email);
			}else {
				return 0;
			}
		}
	}
	//验证昵称
	public function _checkName($name){
		$member = D('Member');
		if(empty($name)) {
			return false;
		}else {
			$map['name'] = array('eq',$name);
			$memberdata = $member->where($map)->findAll();
			if (empty($memberdata)){
				return true;
			}else {
				return false;
			}
		}
	}	
	//发送邮箱验证邮件
	public function sendconfirm_mail($email){
		$verification = D('Verification');
		if ($this->_isMember($email)){
	        $member = D('Member');
			$map['mail'] = array('eq',$email);
			$memberdata = $member->where($map)->find();
			if($memberdata['mailstatus']==0){
				$verification->delCode($email,'verification');
				$code = $verification->setCode($email,'verification');
				$url = HOST.__URL__.'/confirmemail/code/'.$code;
				
				$config = C('sysconfig');
						
				$header = L('user_sendconfirm_mail_header');
				$header = $config['site_name'].$header;
	
				$message_tpl = D('Message_tpl');
				$body = $message_tpl->getBody('verification'); //选择模板
				$body = str_replace('[webname]',$config['site_name'], $body);
				$body = str_replace('[website]',$config['site_url'], $body);
				$body = str_replace('[user]',$memberdata['name'], $body);
				$body = str_replace('[mail]',$email, $body);
				$body = str_replace('[url]',$url, $body);
	
				$info = sendMail($email,$header,$body);
				if ($info){
					return true;
				}else{
					return false;
				}
			}else{
			    return false;
			}
		}else {
			return false;
		}
	}
	//再次发送邮件
	public function resendmail(){
	    $data = Init_GP(array('email'));
		$info = $this->sendconfirm_mail($data['email']);
		if($info){
			$this->success(L('send_success'));
		}else{
			$this->error(L('send_error'));
		}
	}	

	//邮箱验证
	public function verifymail(){
		$data = Init_GP(array('id'));
		$id = GetNum($data['id']);
		
		$member = D('Member');
		$config = C('sysconfig');
		
		$memberdata = $member->getOne($id);
		
		if(empty($memberdata)){
			$this->assign("jumpUrl",U("User/signin"));
			$this->error(L('account_not_exist'));
		}else{
			if($memberdata['status']==0){
				$this->assign("jumpUrl",U("User/signin"));
			    $this->error(L('account_disabled'));
			}else{
				$verification = D('Verification');
				$map = array(
					'mail'=>array('eq',$memberdata['mail']),
					'type'=>array('eq','verification')
				);
				$verificationdata = $verification->where($map)->find();
				
				$gocheck_url = getMailUrl($memberdata['mail']);
				
				$this->assign('gocheck_url',$gocheck_url);
				$this->assign('memberdata',$memberdata);
				$this->assign('verificationdata',$verificationdata);
				$this->display();
			}
		}
	}	
	//邮箱未验证
	public function noverifymail(){		
		$member = D('Member');
		$config = C('sysconfig');
		
		if(empty($this->memberinfo)){
			$this->assign("jumpUrl",U("User/signin"));
			$this->error(L('account_not_exist'));
		}else{
			if($this->memberinfo['status']==0){
				$this->assign("jumpUrl",U("User/signin"));
			    $this->error(L('account_disabled'));
			}else{
				if($config['site_mb_autoreg']==1 && $this->memberinfo['mailstatus']==0){
					$verification = D('Verification');
					$map = array(
						'mail'=>array('eq',$this->memberinfo['mail']),
						'type'=>array('eq','verification')
					);
					$verificationdata = $verification->where($map)->find();
					$gocheck_url = getMailUrl($this->memberinfo['mail']);
					$this->assign('gocheck_url',$gocheck_url);
					$this->assign('verificationdata',$verificationdata);
					
						$this->display();
				}else{
					$this->redirect('Member/index');
				}
			}
		}
	}
	//邮箱验证激活
	public function confirmemail(){
		$data = Init_GP(array('code'));
		$verification = D('Verification');
		$codemap = array(
			'code'=>array('eq',$data['code']),
			'type'=>array('eq','verification')
		);
		$verificationdata = $verification->where($codemap)->find();
		if(!empty($verificationdata)){
            $member = D('Member');
			$map['mail'] = array('eq',$verificationdata['mail']);
			$memberdata = $member->where($map)->find();
			$info = $member->where($map)->setField('mailstatus',1);
            
			$verification->delCode($verificationdata['mail'],'verification');
			if($info){
				if($memberdata['phonestatus']==1){
				    $config = C('sysconfig');
					$value_log = D('Value_log');
					$v_lmap['uid'] = array('eq',$memberdata['id']);
					$v_lmap['content'] = array('eq',"[reg_verify]");
					$v_lmap['rel_id'] = array('eq',$memberdata['id']);
					$v_lmap['rel_module'] = array('eq',"verify");
					$value_logdata = $value_log->getDataAll($v_lmap);
					if(empty($value_logdata)){
						$tip = $member->addVal($memberdata['id'],$config['site_mb_verifycredits'],"[reg_verify]",$memberdata['id'],"verify");
						if(!empty($memberdata['inviteid'])){
							$iv_lmap['uid'] = array('eq',$memberdata['inviteid']);
							$iv_lmap['content'] = array('eq',"[invite]");
							$iv_lmap['rel_id'] = array('eq',$memberdata['id']);
							$iv_lmap['rel_module'] = array('eq',"invite");
							$ivalue_logdata = $value_log->getDataAll($iv_lmap);
							if(empty($ivalue_logdata)){
								$itip = $member->addVal($memberdata['inviteid'],$config['site_mb_verifycredits'],"[invite]",$memberdata['id'],"invite");
							}
						
						}
					}
				}
			    $this->sendregistered_mail($memberdata['mail']);
				$this->assign("jumpUrl",U('Member/index'));
			    $this->success(L('verification_success_jump'));
			}else{
				$this->assign("jumpUrl",U("User/signin"));
				$this->error(L('verification_error'));
			}
		}else{
			$this->assign("jumpUrl",U("User/signin"));
			$this->error(L('verification_link_error'));
		}
	}
    //发送注册成功邮件
	public function sendregistered_mail($email){
		if ($this->_isMember($email)){
	        $member = D('Member');
			$map['mail'] = array('eq',$email);
			$memberdata = $member->where($map)->find();
			if(!empty($memberdata) && $memberdata['status']>0){
				$config = C('sysconfig');
						
				$header = L('user_sendregistered_mail_header');
				$header = $config['site_name'].$header;
	
				$message_tpl = D('Message_tpl');
				$body = $message_tpl->getBody('success'); //选择模板
				$body = str_replace('[webname]',$config['site_name'], $body);
				$body = str_replace('[website]',$config['site_url'], $body);
				$body = str_replace('[user]',$memberdata['name'], $body);
				$body = str_replace('[mail]',$email, $body);
	
				$info = sendMail($email,$header,$body);
				if ($info){
					return true;
				}else{
					return false;
				}
			}else{
			    return false;
			}
		}else {
			return false;
		}
	}

	//个人空间
	public function space(){
	    $this->share();
	    $userdata = $this->get('userdata');
	    $timeaxis = D('Timeaxis');
	    $timeaxismap['uid'] = array('eq',$userdata['id']);
	    $timeaxisdata = $timeaxis->getData($timeaxismap,'','time desc');
	    foreach($timeaxisdata as $key=>$value){
	    	$value['year'] = date('Y',$value['time']);
	    	$value['month'] = date('m',$value['time']);
	    	$axis[$value['year']][$value['month']] = date('Y-m-1',$value['time']);
	    	$axised[date('Y-m-1',$value['time'])] = date('Y年m月',$value['time']);
	    	if($key == 0){
	    		$first = date('Y-m-1',$value['time']);
	    	}
	    }
	    
	    $member_feed = D('Member_feed');
	   	$member_feedmap['uid'] = array('eq',$userdata['id']);
	    $member_feeddata = $member_feed->getDataAll($member_feedmap,10);
	    
	    $this->assign('member_feeddata',$member_feeddata);
	    $this->assign('axis',$axis);
	    $this->assign('first',$first);
	    $this->assign('axised',$axised);
	    $this->display();
	}
	
	public function axis_item(){
		$data = Init_GP(array('month','uid'));
		$month = strtotime($data['month']);
		if($month){
			$talk_about = D('Talk_about');
			$prefix = C('DB_PREFIX');
			$sql = "SELECT TA.*,T.`time` FROM `{$prefix}timeaxis` as T left join `{$prefix}talk_about` as TA on T.tid = TA.id where T.uid = {$data['uid']} and T.month = {$month} order by T.time desc";
			$talk_aboutdata = $talk_about->query($sql);
			foreach ($talk_aboutdata as &$value){
				$value['accessory'] = $talk_about->getAccessory($value['id']);
				$value['content'] = contentFilter($value['content']);
				/*if($value['gid']){
				 $value['goods_accessory'] = $this->getGoodsAccessory($value['gid']);
				}*/
				if($value['tid']){
					$value['source'] = $talk_about->getOne($value['tid']);
				}
			}
			$this->assign('talk_aboutdata',$talk_aboutdata);
			$html = $this->fetch();
			$this->success($html);
		}else{
			$this->error('操作错误');
		}
	}
	
	public function attention(){
		$this->share();
		$userdata = $this->get('userdata');
		$model = D('Member');
		$prefix = C('DB_PREFIX');
		$sql = "SELECT count(*) as jvf_count FROM `{$prefix}attention` where main = {$userdata['id']}";
		$countarr = $model->query($sql);
		$count = $countarr[0]['jvf_count'];
		$limit = $this->page($count);
		$sql = "SELECT M.*,if(ISNULL(A.thumbnail),'".__ROOT__.C('sysconfig.site_mb_smallavatar')."',CONCAT('".__ROOT__."',A.thumbnail)) as thumbnail FROM `{$prefix}attention` as ATT left join `{$prefix}member` as M on ATT.was = M.id left join `{$prefix}accessory` as A on M.header = A.id where ATT.main = {$userdata['id']} order by ATT.id desc limit {$limit}";
		$mdata = $model->query($sql);
		foreach($mdata as &$value){
			$sql = "SELECT * FROM `{$prefix}talk_about` where uid = {$value['id']} limit 0,1";
			$last = $model->query($sql);
			$value['last'] = $last[0];
			$value['wasAttentionNum']=$model->getWasAttentionNum($value['id']);
			$value['wasLikeNum']=$model->getWasLikeNum($value['id']);
			unset($last,$sql);
		}
		
		$this->assign('mdata',$mdata);
		$this->display();
	}
	
	public function wasAttention(){
		$this->share();
		$userdata = $this->get('userdata');
		$model = D('Member');
		$prefix = C('DB_PREFIX');
		$sql = "SELECT count(*) as jvf_count FROM `{$prefix}attention` where was = {$userdata['id']}";
		$countarr = $model->query($sql);
		$count = $countarr[0]['jvf_count'];
		$limit = $this->page($count);
		$sql = "SELECT M.*,if(ISNULL(A.thumbnail),'".__ROOT__.C('sysconfig.site_mb_smallavatar')."',CONCAT('".__ROOT__."',A.thumbnail)) as thumbnail FROM `{$prefix}attention` as ATT left join `{$prefix}member` as M on ATT.was = M.id left join `{$prefix}accessory` as A on M.header = A.id where ATT.was = {$userdata['id']} order by ATT.id desc limit {$limit}";
		$mdata = $model->query($sql);
		foreach($mdata as &$value){
			$sql = "SELECT * FROM `{$prefix}talk_about` where uid = {$value['id']} limit 0,1";
			$last = $model->query($sql);
			$value['last'] = $last[0];
			$value['wasAttentionNum']=$model->getWasAttentionNum($value['id']);
			$value['wasLikeNum']=$model->getWasLikeNum($value['id']);
			unset($last,$sql);
		}
		
		$this->assign('mdata',$mdata);
		$this->display();
	}
	
	public function friends(){
		$this->share();
	}
	
	public function info(){
		$uid = intval($_REQUEST['id']);
		$member_label = D('Member_label');
		$map['uid'] = array('eq',$uid);
		
		$circle = D('Circle');
		$circlestr = $circle->getGather('','lids');
		//获取所有属于圈子的我的标签
		$map['lid'] = array('in',$circlestr);
		$mycircle = $member_label->getUserLabel($map,20);
		$this->assign('mycircle',$mycircle);
		//获取所有 不属于圈子的我的标签
		$map['lid'] = array('not in',$circlestr);
		$mylabel = $member_label->getUserLabel($map,20);
		$this->assign('mylabel',$mylabel);
		
		//扩展信息
		$attachment = D ('Attachment');
		$mattlist=$attachment->getExpand($uid);
		foreach($mattlist as &$v){
			if(!empty($v['enum']))$v['enum'] = explode(",",$v['enum']);
			if($v['type']==4)$v['val'] = explode(",",$v['val']);
		}
		$this->assign('mattlist',$mattlist);
		
		$this->share();
	}
	
	public function evaluate(){
		$this->share();
	}
	
	public function recommend(){
		$this->share();
	}
	
	protected function share(){
		$data = Init_GP(array('id','spelling'));
		$id = GetNum($data['id']);
		if(empty($id) && !empty($data['spelling'])){
			$domain = D('Domain');
			$domainmap['domain'] = array('eq',$data['spelling']);
			$domaindata = $domain->getOne($domainmap);
			if(!empty($domaindata)){
				$id = $domaindata['uid'];
			}
		}
		if($id){
			$this->right($id);
		}else{
			$this->error(L('operational_error'));
		}
	}
	
	protected function right($id){
		$member = D('Member');
		$userdata = $member->getOne($id);
		$userdata['talk_about'] = $member->getTalk_aboutNum($id);
		$userdata['was_attention']=$member->getWasAttentionNum($id);
		$userdata['attention']=$member->getAttentionNum($id);
		$userdata['like']=$member->getLikeNum($id);

		$front_cover = D('Front_cover');
		$front_cover_relation = D('Front_cover_relation');
		$front_cover_relationmap['uid'] = array('eq',$id);
		$front_cover_relationdata = $front_cover_relation->getOne($front_cover_relationmap);
		if(empty($front_cover_relationdata)){
			$tmp['isdefault'] = array('eq',1);
			$front_coverdata = $front_cover->getOne($tmp);
		}else{
			$tmp['id'] = array('eq',$front_cover_relationdata['fid']);
			$front_coverdata = $front_cover->getOne($tmp);
		}
		$accessory = D('Accessory');
		$front_coverdata['logo'] = $accessory->getOne($front_coverdata['logo']);
		
		$coverdata = $front_cover->getData();
		foreach($coverdata as &$value){
			$value['logo'] = $accessory->getOne($value['logo']);
		}
		
		$this->assign('coverdata',$coverdata);
		$this->assign('front_coverdata',$front_coverdata);
		$this->assign('userdata',$userdata);
	}
	
	public function like(){
		$this->share();
		$this->display();
	}
}
?>