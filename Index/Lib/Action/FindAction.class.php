<?php
class FindAction extends CommonAction
{
    public function index(){
        $data = Init_GP(array('keyword','type'));
        $search_key = $data['keyword'];

        if(!empty($search_key) && $search_key != L('search_input_tip')){
            $this->assign('search_key',$search_key);
            $key_array = preg_split('/[\s|\,|\+|\-]/i', $search_key);
            foreach($key_array as &$value){
                $value = "LOCATE('{$value}',CONCAT(`content`))>0";
            }
            $map['_string'] = implode(' and ', $key_array);
        }
        if($data['type'] == 1 && !empty($this->memberinfo)){
            $attention = D('Attention');
            $attentionmap['main'] = array('eq',$this->memberinfo['id']);
            $map['uid'] = array('in',$attention->getGather($attentionmap,'was'));
        }
        if($data['type'] == 2){
            $member = D('Member');
            $membermap['daren'] = array('eq',1);
            $map['uid'] = array('in',$member->getGather($membermap));
        }
        if($data['type'] == 3){
            $businesses = D('Businesses');
            $businessesmap['status'] = array('eq',1);
            $map['uid'] = array('in',$businesses->getGather($businessesmap,'uid'));
        }
        $talk_about = D('Talk_about');
        $talk_about_count = $talk_about->getCount($map);
        $limit = $this->page($talk_about_count,'',$data);
        $talk_aboutdata = $talk_about->getDataAll($map,$limit);
        $this->assign('talk_aboutdata',$talk_aboutdata);
        $this->display();
    }

    public function yh(){
        $data = Init_GP(array('keyword'));
        $search_key = $data['keyword'];

        if(!empty($search_key) && $search_key != L('search_input_tip')){
            $this->assign('search_key',$search_key);
            $key_array = preg_split('/[\s|\,|\+|\-]/i', $search_key);
            foreach($key_array as &$value){
                $value = "LOCATE('{$value}',CONCAT(P.`title`,P.`note`,B.`name`))>0";
            }
            $where = implode(' and ', $key_array);
        }
        if(!empty($where)){
            $where = 'where '.$where;
        }
        $preferential = D('Preferential');
        $prefix = C('DB_PREFIX');
        $sql = "SELECT count(*) as jvf_count FROM `{$prefix}preferential` as P {$where}";
        $count = $preferential->query($sql);
        $count = $count[0]['jvf_count'];
        $limit = $this->page($count);
        $sql = "SELECT P.*,B.name,CONCAT('".__ROOT__."',A.origin) as header FROM `{$prefix}preferential` as P left join `{$prefix}businesses` as B on P.bid = B.id left join `{$prefix}accessory` as A on B.header = A.id {$where}";
        $preferentialdata = $preferential->query($sql);
        $this->assign('preferentialdata',$preferentialdata);
        $this->display();
    }

    public function zr(){
        $data = Init_GP(array('keyword'));
        $search_key = $data['keyword'];
        $map['status'] = array('eq',1);
        if(!empty($search_key) && $search_key != L('search_input_tip')){
            $this->assign('search_key',$search_key);
            $key_array = preg_split('/[\s|\,|\+|\-]/i', $search_key);
            foreach($key_array as &$value){
                $value = "LOCATE('{$value}',CONCAT(`name`,`mail`,`self_introduction`))>0";
            }
            $map['_string'] = implode(' and ', $key_array);
        }
        $member = D('Member');
        $count = $member->getCount($map);
        $limit = $this->page($count);
        $memberdata = $member->getDataAll($map);
        $this->assign('mdata',$memberdata);
        $this->display();
    }

}
?>