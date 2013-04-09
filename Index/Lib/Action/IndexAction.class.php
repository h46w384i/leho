<?php
class IndexAction extends CommonAction
{
    public function index(){
    	$this->_share();
    	
    	$album = D('Album');
    	$albumdata = $album->getDataAll('',12);
    	$this->assign('albumdata',$albumdata);
		$this->display();
    }
    
    public function invite(){
    	$data = Init_GP(array('inviteid'));
		$config = C('sysconfig');
    	cookie('inviteid',$data['inviteid'],GetNum($config['site_mb_invitetime'])*60);
    	$this->redirect("User/register");
    }
    
    public function terms(){
    	$article = D('Article');
    	$articledata = $article->getOne(2);
    	$this->assign('articledata',$articledata);
    	$this->display();
    }
    
    public function novice(){
    	$article = D('Article');
    	$articledata = $article->getOne(3);
    	$this->assign('articledata',$articledata);
    	$this->display();
    }
	public function visit_location(){
		//获取用户的位置
		$this->display();
	}
	public function setvisit_location(){
		$data = Init_GP(array('address','longitude','latitude'));
		if(empty($data['address']))$this->error (L('visit_location_address_empty'));
		if(empty($data['longitude']) || empty($data['latitude']))$this->error (L('visit_location_latlng_empty'));
		$latlng["lat"] = floatval($data["latitude"]);
		$latlng["lng"] = floatval($data["longitude"]);
		$latlng["address"] = $data["address"];
		//dump($latlng);
		setCrrLatlng($latlng);
		$this->success (L('visit_location_set_success'));
	}
	
	public function switchRegion(){
		$id = intval($_REQUEST['id']);
		$city_url = S('city_url');
		if(empty($city_url)){
			$city_url = U('Index/city');
		}
		$this->assign('jumpUrl',$city_url);
		if($id){
			$arr['id'] = $id;
	        $region = D('Region');
		    $arr = $region->field('id,name,spelling')->find($arr['id']);
			$arr = setDefaultRegion($arr);
			if(empty($arr)){
				$this->error(L('operational_error'));
			}else{
				$this->success(L('operational_success'));
			}
		}else{
			$this->error(L('operational_error'));
		}
	}
	public function setBDLatlng(){
		$address = IP($ip);
		if(empty($address) || $address == '本机地址' || $address == '局域网对方和您在同一内部网'){
			$address = '河南省郑州市';
		}
		$this->assign('address',$address);
		$this->display();
	}

	public function city(){
		//if(C('sysconfig.is_switch_region')){
			$city_url = S('city_url');
			if(empty($ciry_url)){
				$city_url = $_SERVER['HTTP_REFERER'];
				S('city_url',$city_url);
			}
			$region = D('Region');
			$map['level'] = array('eq',1);
			$data['default'] = $region->getDefault($map);
			$data['all'] = $region->getData($map,'','`letter` asc');
			$map['level'] = array('eq',0);
			$data['top'] = $region->getData($map);
			$this->assign('citydata',$data);
			$this->display();
		//}
    }
    
    public function cityChild(){
    	$id = intval($_REQUEST['pid']);
    	if($id){
    		$region = D('Region');
    		$map['pid'] = array('eq',$id);
    		$child = $region->getData($map);
    		$this->success($child);
    	}else{
    		$this->error(L('operational_error'));
    	}
    }
    
    public function language(){
        header('Content-Type: application/x-javascript;');
    	$language = L();
    	echo 'var L = '.json_encode($language);
    }
    
    public function maps(){
    	$gid = intval($_REQUEST['gid']);
    	if($gid){
    		$model = D('Goods');
    		$data = $model->find($gid);
    	}
    	
    	$bid = intval($_REQUEST['bid']);
    	if($bid){
    		$model = D('Businesses');
    		$data = $model->find($bid);
    		$data['short_title'] = $data['name'];
    	}
    	
    	$uid = intval($_REQUEST['uid']);
    	if($uid){
    		$model = D('Member');
    		$memberdata = $model->find($uid);
    		$member_location = D('Member_location');
    		$member_locationmap['uid'] = array('eq',$uid);
    		$member_locationmap['type'] = array('eq',1);
    		$member_locationdata = $member_location->where($member_locationmap)->find();
    		$data['latitude'] = $member_locationdata['lat'];
    		$data['longitude'] = $member_locationdata['lng'];
    		$data['address'] = $memberdata['address'];
    		$data['short_title'] = $memberdata['name'];
    		$data['tel'] = $memberdata['phone'];
    		$data['id'] = $memberdata['id'];
    		$data['zoom'] = 10;
    	}
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function getUser(){
    	$uid = intval($_REQUEST['uid']);
    	$member = D('Member');
    	$data = $member->getUser($uid);
    	$this->assign('data',$data);
    	$this->display();
    }
    
    
}
?>