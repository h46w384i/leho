<?php
// 节点模型
class RegionModel extends CommonModel {
	protected $_filter = array(
		'id'=>array('GetNum'),
		'name'=>array('Char_cv'),
		'pid'=>array('GetNum'),
		'level'=>array('GetNum'),
		'path'=>array('Char_cv'),
		'sort'=>array('GetNum'),
	);

	protected function _before_write(&$data){
		parent::_before_write($data);
		if(empty($data['pid'])){
			$data['level'] = 0;
			$data['path'] = '0,'.$data['id'].',';
		}else{
			$parent = $this->find($data['pid']);
			if(empty($parent)){
				$data['level'] = 0;
				$data['path'] = '0,'.$data['id'].',';
			}else{
				$data['level'] = $parent['level'] + 1;
				$data['path'] = $parent['path'].$data['id'].',';
			}
		}

		$data['spelling'] = getSpelling($data['name']);
		$data['letter'] = getFirstLetter($data['spelling']);

	}
}
?>