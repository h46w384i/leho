<?php
//系统配置
class Front_coverModel extends CommonModel {
	protected $_filter = array(
				'id'=>array('GetNum'),
				'name'=>array('Char_cv'),
                'logo'=>array('GetNum'),
				'sort'=>array('GetNum'),
				'isdefault'=>array('GetNum'),
			);

}
?>