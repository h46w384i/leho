<?php
class Daren_showModel extends CommonModel {
	public function getDaren($map,$limit){
		$map = addPre($map, 'D');
		$prefix = C('DB_PREFIX');
		$data = $this->Table("{$prefix}daren_show as D")->
		join("{$prefix}member as M ON D.uid = M.id")->
		field("D.*,M.name,M.header,M.daren,M.daren_explain,M.self_introduction")->where($map)->
		limit($limit)->
		order('D.sort desc')->
		findAll();
		$member = D('Member');
		$talk_about = D('Talk_about');
		foreach($data as &$value){
			$value['header'] = $member->getHeader($value['header']);
			$value['was_likes'] = $member->getWasLikeNum($value['uid']);
			$value['last'] = $talk_about->getLast($value['uid']);
		}
		return $data;
	}
	
	public function circleDaren($id,$num){
		$map['cid'] = array('eq',$id);
		return $this->getDaren($map,6);
	}
}
?>