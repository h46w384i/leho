<?php
//系统配置
class Daren_showModel extends CommonModel {
	protected $_filter = array(
		'id'=>array('GetNum'),
		'uid'=>array('GetNum'),
		'cid'=>array('GetNum'),
		'reason'=>array('Char_cv'),
		'addtime'=>array('strtotime','toDate'),
	);
}
?>