<?php
class CircleModel extends CommonModel {
	public function getLabel($map,$limit){
		$prefix = C('DB_PREFIX');
		if(!empty($map)){
			if(!is_array($map)){
				$circle_map[$this->getPk()] = array('eq',$map);
			}else{
				$circle_map = $map;
			}
		}
		$data = $this->where($circle_map)->find();
		$limit = $limit?" limit {$limit}":'';
		$where = " where L.id in({$data['lids']})";
		$sql = "SELECT L.*,A.origin FROM {$prefix}label as L LEFT JOIN {$prefix}accessory as A ON L.logo = A.id {$where}{$limit}";
		$labeldata = $this->query($sql);
		foreach($labeldata as &$value){
			$value['origin'] = __ROOT__.$value['origin'];
			$sql = "SELECT count(*) as jvf_count FROM {$prefix}label_relation as LR left JOIN {$prefix}about_like as TAL ON LR.tid = TAL.tid and LR.lid = 1";
			$like = $this->query($sql);
			$value['likes'] = $like[0]['jvf_count'];
		}
		return $labeldata;
	}
	
	//根据 标签 查询所属 圈子
	public function getCricle($lid){
		$map['_string'] = "LOCATE(',{$lid},',CONCAT(',',`lids`,','))";
		$data = $this->where($map)->find();
		return $data;
	}
}
?>