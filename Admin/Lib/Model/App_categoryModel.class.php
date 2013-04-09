<?php
//系统配置
class App_categoryModel extends CommonModel {
	protected $_filter = array(
				'id'=>array('GetNum'),
				'name'=>array('Char_cv'),
                'sort'=>array('GetNum'),
			);

}
?>