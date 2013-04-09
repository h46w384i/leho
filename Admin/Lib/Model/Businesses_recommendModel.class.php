<?php
// 用户模型
class Businesses_recommendModel extends CommonModel {

	protected $_filter = array(
				'id'=>array('GetNum'),
				'bid'=>array('GetNum'),
				'sort'=>array('GetNum'),
		  );

}
?>