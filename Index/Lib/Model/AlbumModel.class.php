<?php
class AlbumModel extends CommonModel {
	public function getDataAll($map,$limit){
		$data = $this->getData($map,$limit);
		$accessory = D('Accessory');
		foreach($data as &$value){
			$value['accessory'] = $accessory->getOne($value['logo']);
			$value['enlarge_accessory'] = $accessory->getOne($value['enlarge']);
		}
		return $data;
	}
	
	public function getOne($map){
		$value = parent::getOne($map);
		$accessory = D('Accessory');
		$value['accessory'] = $accessory->getOne($value['logo']);
		$value['enlarge_accessory'] = $accessory->getOne($value['enlarge']);
		return $value;
	}
}
?>