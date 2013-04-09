<?php
class PreferentialModel extends CommonModel {
	public function getData($map,$limit=''){
		$data = parent::getData($map,$limit);
		$accessory = D('Accessory');
		foreach($data as &$value){
			$value['logo'] = $accessory->getOne($value['logo']);
		}
		return $data;
	}

    public function getOne($id){
        $data = parent::getOne($id);
        $accessory = D('Accessory');
        if(!empty($data)){
            $data['logo'] = $accessory->getOne($data['logo']);
        }
        return $data;
    }
	
	public function getCategoryCount($where){
		$prefix = C('DB_PREFIX');
		if(!empty($where)){
			if(!is_array($where)){
				$map[$this->getPk()] = array('eq',$where);
			}else{
				$map = $where;
			}
			$map = addPre($map,'B');
		}
		
		$data = $this->Table("{$prefix}preferential as P")->
		join("{$prefix}businesses as B ON P.bid = B.id")->
		field('count(P.id) as jvf_count')->
		where($map)->
		find();
		return $data['jvf_count'];
	}
	
	public function getAllCount($map){
		$prefix = C('DB_PREFIX');
		$data = $this->Table("{$prefix}preferential as P")->
		join("{$prefix}businesses as B ON P.bid = B.id")->
		field('count(P.id) as jvf_count')->
		where($map)->
		find();
		return $data['jvf_count']?$data['jvf_count']:0;
	}
	
	public function getAllData($map,$limit,$sort = 'P.sort desc'){
		$prefix = C('DB_PREFIX');
		$data = $this->Table("{$prefix}preferential as P")->
		join("{$prefix}businesses as B ON P.bid = B.id")->
		field('P.*,B.name')->
		where($map)->
		limit($limit)->
		order($sort)->
		findAll();
		$accessory = D('Accessory');
		foreach($data as &$value){
			$value['logo'] = $accessory->getOne($value['logo']);
		}
		return $data;
	}
}
?>