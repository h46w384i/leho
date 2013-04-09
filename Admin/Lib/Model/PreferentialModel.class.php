<?php
// 用户模型
class PreferentialModel extends CommonModel {

	protected $_filter = array(
			'id'=>array('GetNum'),
			'title'=>array('Char_cv'),
			'short_title'=>array('Char_cv'),
			'content'=>array('h'),
			'note'=>array('h'),
			'logo'=>array('GetNum'),
			'sort'=>array('GetNum'),
			'pre'=>array('Char_cv'),
			'starttime'=>array('strtotime','toDateYmd'),
			'endtime'=>array('strtotime','toDateYmd'),
			'status'=>array('GetNum'),
		  );

}
?>