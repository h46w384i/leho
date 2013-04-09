<?php
class LabelAction extends CommonAction {
		
	public function _filter(&$map){
  		if(!empty($map['name'])){
  			$map['name'] = array('like',"%{$map['name']}%");
  		}
  	}
  	
  	function edit() {
  		$name=$this->getActionName();
  		$model = D ( $name );
  		$id = $_REQUEST [$model->getPk ()];
  		$vo = $model->getById ( $id );
  	
  		$accessory = D('Accessory');
  		$accdata = $accessory->where('id='.$vo['logo'])->find();
  		$vo['logopath']=$accdata['origin'];
  		$this->assign ( 'vo', $vo );
  		$this->display ();
  	}
}
?>