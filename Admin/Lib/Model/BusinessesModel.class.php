<?php
//系统配置
class BusinessesModel extends CommonModel {
	protected $_filter = array(
				'id'=>array('GetNum'),
				'uid'=>array('GetNum'),
				'name'=>array('Char_cv'),
				'qualifications'=>array('GetNum'),
				'security'=>array('GetNum'),
			'type'=>array('Char_cv'),
			'characteristic'=>array('Char_cv'),
				'address'=>array('Char_cv'),
			'longitude'=>array('GetNum'),
			'latitude'=>array('GetNum'),
			'zoom'=>array('GetNum'),
				'opening'=>array('Char_cv'),
				'tel'=>array('Char_cv'),
				'addtime'=>array('strtotime','toDate'),
			'validity'=>array('strtotime','toDateYmd'),
				'status'=>array('GetNum'),	
	);
}
?>