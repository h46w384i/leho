<?php
class BusinessesAction extends CommonAction {

	public function _before_add() {
		$model	=	D("Businesses_category");
		$list	=	$model->order('`path` asc')->select();
		$this->assign('list',$list);
		
		$region	= D("Region");
		$regionlist	= $region->order('`path` asc')->select();
		$this->assign('region',$regionlist);
	}
	
	public function _before_edit() {
		$model	=	D("Businesses_category");
		$list	=	$model->order('`path` asc')->select();
		$this->assign('list',$list);
		
		$region	=	D("Region");
		$regionlist	=	$region->order('`path` asc')->select();
		$this->assign('region',$regionlist);
	}
	
    public function _filter(&$map){
  		if(!empty($map['name'])){
  			$map['name'] = array('like',"%{$map['name']}%");
  		}
    	$data = Init_GP(array('mintime','maxtime'));
		$mintime = strtotime($data['mintime']);
		$maxtime = strtotime($data['maxtime']);
		if ($mintime && $maxtime) {
			$map ['addtime'] = array('between',"{$mintime},{$maxtime}");
		}
  	}
  	
  	public function edit() {
  		$name=$this->getActionName();
  		$model = D ( $name );
  		$id = $_REQUEST [$model->getPk ()];
  		$vo = $model->getById ( $id );
  		$accessory = D('Accessory');
  		$accdata = $accessory->where('id='.$vo['header'])->find();
  		$vo['headerpath']=$accdata['origin'];
  		$this->assign ( 'vo', $vo );
  		$this->display ();
  	}

}
?>