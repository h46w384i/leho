<?php
class AppAction extends CommonAction {
	public function _before_add(){
		$app_category = D('App_category');
		$list = $app_category->findAll();
		$this->assign('list',$list);
	}
	
	public function _before_edit(){
		$app_category = D('App_category');
		$list = $app_category->findAll();
		$this->assign('list',$list);
	}
	
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