<?php
// 节点模型
class RegionModel extends CommonModel {
	
	function getChild($where){
		$prefix = C('DB_PREFIX');
		if(!empty($where)){
			if(!is_array($where)){
				$map[$this->getPk()] = array('eq',$where);
			}else{
				$map = $where;
			}
			$map = addPre($map,'GC1');
		}
    	$data = $this->Table("{$prefix}region as GC1")->
					  join("{$prefix}region as GC2 ON LOCATE(CONCAT(',',GC1.id,','),GC2.path) > 0")->
					  field('GC1.id,group_concat(CAST(GC2.id as char)) as child')->
					  where($map)->
					  group('GC1.id')->
					  findAll();
		return $data;
	}
	
	function getNumCount($map,$effective = 0,$where = array()){
		$join = ($effective == 0)?'INNER':'LEFT';
		
		$default_region = getDefaultRegion();
		$where = addPre($where,'R');
		if($default_region){
			$where['R.pid'] = array('eq',$default_region['id']);
		}
		$and = $map?' AND '.$this->db->_parseWhere($map):'';
		$prefix = C('DB_PREFIX');
    	$data = $this->Table("{$prefix}region as R")->
					  join("{$join} JOIN {$prefix}goods as G on G.rid = R.id {$and}")->
					  field('R.*,count( G.id ) AS count')->
					  where($where)->
					  group('R.id')->
					  order('R.path,R.sort desc')->
					  findAll();
		return $data;
	}
	
	function getDefaultCount($map=array()){
		$map['R.isdefault'] = array('eq',1);
		return $this->getNumCount($map);
	}
	
	function getDefault($map=array()){
		$map['isdefault'] = array('eq',1);
		return $this->getData($map);
	}
}
?>