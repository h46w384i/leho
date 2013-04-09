<?php
//系统配置
class AlbumModel extends CommonModel {
	protected $_filter = array(
		'id'=>array('GetNum'),
		'title'=>array('Char_cv'),
		'content'=>array('Char_cv'),
		'sort'=>array('GetNum'),
		'lids'=>array('Char_cv'),
		'addtime'=>array('strtotime','toDate'),
		'logo'=>array('GetNum'),
		'enlarge'=>array('GetNum'),
		'label'=>array('Char_cv'),
	);
	
	public function _before_write(&$data){
		if(isset($data['label'])){
			$labelarr = explode(',', str_replace('，', ',', $data['label']));
			$label = D('label');
			foreach($labelarr as $value){
				$value = trim($value);
				if(!empty($value)){
					$map['name'] = array('eq',$value);
					$d = $label->where($map)->find();
					if(empty($d)){
						$labeldata = array(
								'name'=>$value,
						);
						$lids[] = $label->add($labeldata);
					}else{
						$lids[] = $d['id'];
					}
				}
				unset($map,$d);
			}
			$data['lids'] = implode(',', $lids);
		}
	}
}
?>