<?php
//系统配置
class AppModel extends CommonModel {
	protected $_filter = array(
				'id'=>array('GetNum'),
				'name'=>array('Char_cv'),
                'sort'=>array('GetNum'),
				'cid'=>array('GetNum'),
				'logo'=>array('GetNum'),
				'url'=>array('Char_cv'),
				'traffic'=>array('GetNum'),
				'width'=>array('GetNum'),
				'height'=>array('GetNum'),
				'status'=>array('GetNum'),
				'addtime'=>array('strtotime','toDate'),
			);

}
?>