<?php
class BusinessesModel extends CommonModel {
	public function getData($map,$limit='',$order=''){
		if(empty($order)){
			$order = '`sort` desc,`id` desc';
		}
		$data = parent::getData($map,$limit,$order);
		$accessory = D('Accessory');
		foreach($data as &$value){
			$value['accessory'] = $accessory->getOne($value['header']);
		}
		return $data;
	}
	
	public function getOne($map){
		$data = parent::getOne($map);
		if(!empty($data)){
			$accessory = D('Accessory');
			$data['accessory'] = $accessory->getOne($data['header']);
		}
		return $data;
	}
}
?>