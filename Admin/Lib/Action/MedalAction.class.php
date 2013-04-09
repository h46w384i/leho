<?php
class MedalAction extends CommonAction {
	
	public function edit() {
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