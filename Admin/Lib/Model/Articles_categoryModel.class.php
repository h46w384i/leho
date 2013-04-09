<?php
// 节点模型
class Articles_categoryModel extends CommonModel {
	protected $_filter = array(
		'id'=>array('GetNum'),
		'name'=>array('Char_cv'),
		'pid'=>array('GetNum'),
		'level'=>array('GetNum'),
		'path'=>array('Char_cv'),
		'sort'=>array('GetNum'),
	);
	protected $_validate	=	array(
		array('name','','分类名称已经存在',self::EXISTS_VAILIDATE,'unique',self::MODEL_INSERT),
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
	}
}
?>