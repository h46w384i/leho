<?php
class Medal_relationModel extends CommonModel {
	public function getMedal($uid){
		$prefix = C('DB_PREFIX');
		$sql = "SELECT M.*,CONCAT('".__ROOT__."',A.origin) as logopath FROM `{$prefix}medal_relation` as MR inner join `{$prefix}medal` as M on MR.mid = M.id and MR.uid = {$uid} left join `{$prefix}accessory` as A on M.logo = A.id order by M.id asc";
		$data = $this->query($sql);
		return $data;
	}
}
?>