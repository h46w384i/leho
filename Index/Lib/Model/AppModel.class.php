<?php
class AppModel extends CommonModel {
	function getData($map='',$limit='',$order=''){
		$data = parent::getData($map,$limit,$order);
		$accessory = D('Accessory');
		foreach ($data as &$value){
			$value['accessory'] = $accessory->getOne($value['logo']);
		}
		return $data;
	}
	
	public function getOne($id){
		$data = parent::getOne($id);
		if(!empty($data)){
			$accessory = D('Accessory');
			$data['accessory'] = $accessory->getOne($value['logo']);
			$data['width'] = $data['width']?$data['width'].'px':'730px';
			$data['height'] = $data['height']?$data['height'].'px':'600px';
		}
		return $data;
	}
}
?>