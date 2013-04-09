<?php
class Businesses_categoryModel extends CommonModel {
	function getChild($where){
		$prefix = C('DB_PREFIX');
		if(!empty($where)){
			if(!is_array($where)){
				$map[$this->getPk()] = array('eq',$where);
			}else{
				$map = $where;
			}
			$map = addPre($map,'BC1');
		}
		$data = $this->Table("{$prefix}businesses_category as BC1")->
		join("{$prefix}businesses_category as BC2 ON LOCATE(CONCAT(',',BC1.id,','),BC2.path) > 0")->
		field('BC1.id,group_concat(CAST(BC2.id as char)) as child')->
		where($map)->
		group('BC1.id')->
		findAll();
		return $data;
	}
}
?>