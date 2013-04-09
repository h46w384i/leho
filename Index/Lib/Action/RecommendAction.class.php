<?php
class RecommendAction extends CommonAction
{
    public function ajaxRecommend(){
    //获取查询条件
    	$data = Init_GP(array('gid','uid'));
    	$gid = intval($data['gid']);
    	if(!empty($gid)){
    		$map['gid'] = array('eq',$gid);
    	}
    	//获取的评论
    	$recommend = D('Recommend');
    	$recommend_count = $recommend->getCount($map);
    	$limit = $this->page($recommend_count);
    	$recommenddata = $recommend->getDataAll($map,$limit);
		$this->assign('recommenddata',$recommenddata);
		$this->display();
    }
    public function ajaxreferencesRecommend(){
    //获取查询条件
    	$data = Init_GP(('uid'));
    	$uid = intval($data['uid']);
		if(empty($uid))$uid = $this->memberinfo['id'];
    	$goods = D('Goods');
    	if(!empty($uid)){
			$businesses = D('Businesses');
			$businessesmap['uid'] = array('eq',$uid);
			$businessesdata = $businesses->getOne($businessesmap);
    		$goodsmap['promulgator'] = array('eq',$businessesdata['id']);
    		$promulgator = $uid;
    		$ids = $goods->getGather($goodsmap);
    		$map['gid'] = array('in',$ids);
    	}
    	
    	if(empty($map['gid'])){
    		$this->error(L('parameter_error'));
    	}

    	//获取的评论
    	$recommend = D('Recommend');
    	$recommend_count = $recommend->getCount($map);
    	$limit = $this->page($recommend_count);
    	$recommenddata = $recommend->getDataAll($map,$limit);
		$this->assign('recommenddata',$recommenddata);
		$result['recommenddata'] = $this->fetch('referenceslist');
		$result['page'] = $this->get('page');
		$result['model'] = 'recommend';
		$this->ajaxReturn($result);
    }
	public function ajaxreleasedRecommend(){
    //获取查询条件
    	$data = Init_GP(('uid'));
    	$uid = intval($data['uid']);
		if(empty($uid))$uid = $this->memberinfo['id'];
    	if(!empty($uid)){
    		$map['reviewer'] = array('eq',$uid) ;
    	}
    	if(empty($map['reviewer'])){
    		$this->error(L('parameter_error'));
    	}
		$now = time();
        $this->assign('now',$now);
    	//获取的评论
    	$recommend = D('Recommend');
    	$recommend_count = $recommend->getCount($map);
    	$limit = $this->page($recommend_count);
    	$recommenddata = $recommend->getDataAll($map,$limit);
		$this->assign('recommenddata',$recommenddata);
		$result['recommenddata'] = $this->fetch('releasedlist');
		$result['page'] = $this->get('page');
		$result['model'] = 'releasedrecommend';
		$this->ajaxReturn($result);
    }
	public function ajaxSpaceRecommends(){
    //获取查询条件
    	$data = Init_GP(array('uid','limit'));
    	$uid = intval($data['uid']);
		$limit = intval($data['limit']);
		$limit =$limit.",10";
		$allshownum = $limit+10;
    	$goods = D('Goods');
		$businesses = D('Businesses');
			$businessesmap['uid'] = array('eq',$uid);
			$businessesdata = $businesses->getOne($businessesmap);
		$goodmap['promulgator'] = array('eq',$businessesdata['id']);
		$goodmap['status'] = array('eq',1);
		$goodids = $goods->getIds($goodmap);
		
		$recommend = D('Recommend');
		$recommendmap['gid'] = array('in',$goodids);
		$recommenddata = $recommend->getDataAll($recommendmap,$limit);
		$recommenddatanum = $recommend->getCount($recommendmap);

		$this->assign('recommenddata',$recommenddata);
		$this->assign('allshownum',$allshownum);
		$this->assign('recommenddatanum',$recommenddatanum);
		$result = $this->fetch('spacelist');
		$this->ajaxReturn($result,'',1);
    }
    
}
?>