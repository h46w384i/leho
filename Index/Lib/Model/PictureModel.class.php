<?php
class PictureModel extends CommonModel {
	function getData($map='',$limit='',$order='id desc'){
		$data = parent::getData($map,$limit,$order);
        foreach($data as &$value){
            if(!empty($value)){
                $value['accessory'] = $this->getAccessory($value['id'],true);
            }
        }
		return $data;
	}

    function getAccessory($id,$one = false){
        static $picture_accessory = array();
        if (isset($picture_accessory[$one.'_'.$id])){
            return $picture_accessory[$one.'_'.$id];
        }
        $accessory_relation = D('Accessory_relation');
        $map = array(
            'AR.relationid' =>array('eq',$id),
            'AR.table' =>array('eq','Picture'),
        );
        $limit = $one?'0,1':'';
        $data = $accessory_relation->getData($map,$limit);
        $data = $one?$data[0]:$data;
        $picture_accessory[$one.'_'.$id] = $data;
        return $data;
    }
}
?>