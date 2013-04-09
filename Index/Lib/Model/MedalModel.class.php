<?php
class MedalModel extends CommonModel {
	//颁发勋章
	public function promulgate($uid){
		$medal_relation = D('Medal_relation');
		$medal_relationmap['uid'] = array('eq',$uid);
		$mids = $medal_relation->getGather($medal_relationmap,'mid');
		if($mids){
			$map['id'] = array('not in',$mids);
		}
		$talk_about = D('Talk_about');
		$talk_aboutmap = array(
				'uid'=>array('eq',$uid),
				'tid'=>array('eq',0),				
			);
		$talkaboutnum = $talk_about->where($talk_aboutmap)->count();
		unset($talk_aboutmap['tid']);
		$waslikenum = $talk_about->where($talk_aboutmap)->sum('likes');
		$map['talkaboutnum'] = array('elt',$talkaboutnum);
		$map['waslikenum'] = array('elt',$waslikenum);
		$data = $this->where($map)->findAll();
		if($data){
			foreach ($data as $value){
				$medal_relationdata[] = array(
						'mid'=>$value['id'],
						'uid'=>$uid,
						);
			}
			$medal_relation->addAll($medal_relationdata);
		}
	}
}
?>