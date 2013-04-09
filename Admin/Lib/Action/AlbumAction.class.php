<?php
class AlbumAction extends CommonAction {
		
	public function _filter(&$map){
  		if(!empty($map['title'])){
  			$map['title'] = array('like',"%{$map['title']}%");
  		}
  	}
  	
  	function edit() {
  		$name=$this->getActionName();
  		$model = D ( $name );
  		$id = $_REQUEST [$model->getPk ()];
  		$vo = $model->getById ( $id );
  		 
  		$accessory = D('Accessory');
  		$accdata = $accessory->where('id='.$vo['logo'])->find();
  		$vo['logopath']=$accdata['thumbnail'];
  		
  		$accdata = $accessory->where('id='.$vo['enlarge'])->find();
  		$vo['enlargepath']=$accdata['thumbnail'];
  		$this->assign ( 'vo', $vo );
  		$this->display ();
  	}
}
?>