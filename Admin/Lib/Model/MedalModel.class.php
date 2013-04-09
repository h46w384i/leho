<?php
//系统配置
class MedalModel extends CommonModel {
	protected $_filter = array(
				'id'=>array('GetNum'),
				'name'=>array('Char_cv'),
                'logo'=>array('GetNum'),
				'mark'=>array('Char_cv'),
				'talkaboutnum'=>array('GetNum'),
				'waslikenum'=>array('GetNum'),
			);

}
?>