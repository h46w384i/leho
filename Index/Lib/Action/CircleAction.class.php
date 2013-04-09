<?php
class CircleAction extends CommonAction
{
	public function index(){
		$data = Init_GP(array('search_key','lid','cid'));
		$this->_share();
		$cid = intval($data['cid']);
		$circle = D('Circle');
		if($cid){
			$labels = $circle->getLabel($cid);
			$this->assign('labels',$labels);
		}
		$lid = intval($data['lid']);
		if($lid){
			$circledata = $circle->getCricle($lid);
			if($circledata){
				$labels = $circle->getLabel($circledata['id']);
			}else{
				$label = D('Label');
				$labels = $label->where("id={$lid}")->findAll();
			}
			$this->assign('labels',$labels);
		}
		$this->display();
	}
	
	public function detection(){
		$this->_share();
		$album = D('Album');
		$albumdata = $album->getDataAll('',10);
		$this->assign('albumdata',$albumdata);
		$this->display();
	}
	
	public function album(){
		$id = intval($_REQUEST['aid']);
		$album = D('Album');
		$count = $album->getCount();
		$count = $count - 5;
		$limit = mt_rand(0,$count).',5';
		$val = $album->getOne($id);
		$albumdata = $album->getData('',$limit);
		$this->assign('albumdata',$albumdata);
		$this->assign('val',$val);
		$this->display();
	}
	
	public function philosopher(){
		$daren_show = D('Daren_show');
		$circledata = $this->get('circledata');
		$num = 10;
		foreach($circledata as $val){
			$circledata['darens'] = $daren_show->circleDaren($val['id'],$num);
		}
		$this->assign('daren_showdata',$circledata);
		$this->display();
	}
	
	public function ajaxCircle(){
		$data = Init_GP(array('search_key','lid','uid','attention','wasAttention','friends','at','like','interest','cid','aid','myoriginal','myforwarding','liked','likeuid','periphery','pid'));
		$map = $this->_filters($data);
		$talk_about = D('Talk_about');
		$talk_about_count = $talk_about->getCount($map);
		$limit = $this->page($talk_about_count,'',$data);
		$talk_aboutdata = $talk_about->getDataAll($map,$limit);
		$this->assign('talk_aboutdata',$talk_aboutdata);
		$result['html'] = $this->fetch('list');
		$result['page'] = $this->get('page');
		$this->success($result);
	}
	
	protected function _filters($data){
		$search_key = $data['search_key'];
		$map = array();
		if(!empty($search_key) && $search_key != L('search_input_tip')){
			$key_array = preg_split('/[\s|\,|\+|\-]/i', $search_key);
			foreach($key_array as &$value){
				$value = "LOCATE('{$value}',`content`)>0";
			}
			$map['_string'] = implode(' and ', $key_array);
		}
		$lid = intval($data['lid']);
		if($lid){
			$label_relation = D('Label_relation');
			$label_relationmap['lid'] = array('eq',$lid);
			$ids = $label_relation->getGather($label_relationmap,'tid');
			$map['id'] = array('in',$ids);
		}
		$uid = intval($data['uid']);
		if($uid){
			$map['uid'] = array('eq',$uid);
		}
		
		$attention = intval($data['attention']);
		if($attention){
			$attentionmodel = D('Attention');
			$attentionmap['was'] = array('eq',$attention);
			$map['uid'] = array('in',$attentionmodel->getGather($attentionmap,'main'));
		}
		
		$wasAttention = intval($data['wasAttention']);
		if($wasAttention){
			$attentionmodel = D('Attention');
			$attentionmap['main'] = array('eq',$wasAttention);
			$map['uid'] = array('in',$attentionmodel->getGather($attentionmap,'was'));
		}
		
		$friends = intval($data['friends']);
		if($friends){
			$friendsmodel = D('Friends');
			$friendsmap['main'] = array('eq',$friends);
			$map['uid'] = array('in',$friendsmodel->getGather($friendsmap,'friend'));
		}
		//感兴趣的
		$iuid = intval($data['interest']);
		if($iuid){
			$interest = D('Interest');
			$interestmap['uid'] = array('eq',$iuid);
			$label_relation = D('Label_relation');
			$label_relationmap['lid'] = array('in',$interest->getGather($interestmap,'lid'));
			$ids = $label_relation->getGather($label_relationmap,'tid');
			$map['id'] = array('in',$ids);
		}

        /*周边*/
        $puid = intval($data['periphery']);
        if($puid){
            $periphery = D('Periphery');
            $peripherymap['uid'] = array('eq',$puid);
            $businesses_circlemap['id'] = array('in',$periphery->getGather($peripherymap,'lid'));
            $businesses_circle = D('Businesses_circle');
            $label_relation = D('Label_relation');
            $label_relationmap['lid'] = array('in',$businesses_circle->getField('lids',$businesses_circlemap));
            $ids = $label_relation->getGather($label_relationmap,'tid');
            $map['id'] = array('in',$ids);
        }
        /*某一周边*/
        $pid = intval($data['pid']);
        if($pid){
            $businesses_circlemap['id'] = array('eq',$pid);
            $businesses_circle = D('Businesses_circle');
            $label_relation = D('Label_relation');
            $label_relationmap['lid'] = array('in',$businesses_circle->getField('lids',$businesses_circlemap));
            $ids = $label_relation->getGather($label_relationmap,'tid');
            $map['id'] = array('in',$ids);
        }
		//圈子里的
		$cid = intval($data['cid']);
		if($cid){
			$circle = D('Circle');
			$circledata = $circle->getOne($cid);
			$label_relation = D('Label_relation');
			$label_relationmap['lid'] = array('in',$circledata['lids']);
			$map['id'] = array('in',$label_relation->getGather($label_relationmap,'tid'));
		}
		
		//专题里的
		$aid = intval($data['aid']);
		if($aid){
			$album = D('Album');
			$albumdata = $album->getOne($aid);
			$label_relation = D('Label_relation');
			$label_relationmap['lid'] = array('in',$albumdata['lids']);
			$map['id'] = array('in',$label_relation->getGather($label_relationmap,'tid'));
		}
		
		//提到我的
		if($data['at']){
			$talk_about_relation = D('Talk_about_relation');
			$talk_about_relationmap['uid'] = array('eq',$this->memberinfo['id']);
			$map['id'] = array('in',$talk_about_relation->getGather($talk_about_relationmap,'tid'));
		}
		
		//我喜欢的
		if($data['like']){
			$talk_about_like = D('Talk_about_like');
			$talk_about_likemap['uid'] = array('eq',$this->memberinfo['id']);
			$map['id'] = array('in',$talk_about_like->getGather($talk_about_likemap,'tid'));
		}
		
		if($data['likeuid']){
			$talk_about_like = D('Talk_about_like');
			$talk_about_likemap['uid'] = array('eq',$data['likeuid']);
			$map['id'] = array('in',$talk_about_like->getGather($talk_about_likemap,'tid'));
		}
		
		//喜欢我的
		if($data['liked']){
			$map['uid'] = array('eq',$this->memberinfo['id']);
			$map['likes'] = array('gt',0);
		}
		
		//我的原创
		if($data['myoriginal'] == 1){
			$map['uid'] = array('eq',$this->memberinfo['id']);
			$map['tid'] = array('eq',0);
		}
		
		//我转发的
		if($data['myforwarding'] == 1){
			$map['uid'] = array('eq',$this->memberinfo['id']);
			$map['tid'] = array('neq',0);
		}
		
		return $map;
	}
	
	public function randomSys(){
		$circle = D('Circle');
		$lids = $circle->getGather('','lids');
		$lids_arr = explode(',', $lids);
		$lids_arr = array_flip(array_unique($lids_arr));
		if(count($lids_arr) > 15){
			$lids_arr = array_rand($lids_arr,15);
		}
		$label = D('Label');
		$labelmap['id'] = array('in',$lids_arr);
		$labeldata = $label->getData($labelmap);
		shuffle($labeldata);
		$this->assign('labeldata',$labeldata);
		$this->display();
	}
	
	public function randomLabel(){
		$circle = D('Circle');
		$lids = $circle->getGather('','lids');
		$lids_arr = explode(',', $lids);
		$lids_arr = array_unique($lids_arr);
		$label = D('Label');
		$labelmap['id'] = array('not in',$lids_arr);
		$labeldata = $label->getData($labelmap,15,'rand()');
		$this->assign('labeldata',$labeldata);
		$this->display();
	}
	
	public function app(){
		$app_category = D('App_category');
		$app_categorydata = $app_category->getData();
		$app = D('App');
		$appmap['status'] = array('eq',1);
		foreach ($app_categorydata as &$value){
			$appmap['cid'] = array('eq',$value['id']);
			$value['apps'] = $app->getData($appmap);
		}
		unset($appmap['cid']);
		$hot = $app->getData($appmap,'','traffic desc');
		$new = $app->getData($appmap,'','addtime desc');
		$this->assign('all',$app_categorydata);
		$this->assign('hot',$hot);
		$this->assign('new',$new);
		$this->display();
	}
	
	public function play(){
		$id = intval($_REQUEST['id']);
		if($id){
			$app = D('App');
			$appdata = $app->getOne($id);
			if(!empty($appdata) && $appdata['status'] == 1){
				$appmap['status'] = array('eq',1);
				$hot = $app->getData($appmap,'','traffic desc');
				$new = $app->getData($appmap,'','addtime desc');
				$this->assign('hot',$hot);
				$this->assign('new',$new);
				$this->assign('appdata',$appdata);
			}else{
				$this->error("操作错误");
			}
		}else{
			$this->error("操作错误");
		}
		$this->display();
	}
	
	public function randomDaren(){
		$num = intval($_REQUEST['num']);
		if($num){
			$member = D('Member');
			$darendata = $member->randomDaren($num);
			$this->assign('darendata',$darendata);
			$this->success($this->fetch());
		}else{
			$this->error('操作错误');
		}
	}

}
?>