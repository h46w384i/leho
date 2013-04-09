<?php
class MallAction extends CommonAction
{

	public function index(){
        $this->_category();
		$goods = D('Goods');
		$goodsmap  = $goods->_defaultWhere();
		$hot = $goods->getData($goodsmap,2);
		$businesses = D('Businesses');
		foreach($hot as &$value){
			$value['accessory'] = $goods->getAccessory($value['id'],true);
			$value['businesses'] = $businesses->getOne($value['promulgator']);
		}
		$goods_category = D('Goods_category');
		$goods_categorydata = $this->get('categorydata');
		$tmp['isdefault'] = array('eq',1);
		foreach($goods_categorydata as &$value){
			$tmp['pid'] = array('eq',$value['id']);
			$value['child'] = $goods_category->getData($tmp);
			foreach($value['child'] as $val){
				$child[] = $val['id'];
			}
			$goodsmap['cid'] = array('in',$child);
			$value['goods'] = $goods->getData($goodsmap,12);
			foreach($value['goods'] as &$v){
				$v['accessory'] = $goods->getAccessory($v['id'],true);
				$v['businesses'] = $businesses->getOne($v['promulgator']);
			}
			unset($child);
		}
		//公告
		$this->_announcement();
		
		$region = D('Region');
		$defaultRegion = getDefaultRegion();
		$regionmap = array(
				'pid'=>array('eq',$defaultRegion['id']),
				'isdefault'=>array('eq',1),
		);
		$regiondata = $region->getData($regionmap);
		
		$this->assign('regiondata',$regiondata);
		$this->assign('hot',$hot);
		$this->assign('goods_categorydata',$goods_categorydata);
		$this->display();
	}

	public function classify(){
        $this->_category();
		$data = Init_GP(array('cid','child','rid','sort'));
		$cid = intval($data['cid']);
		if(!$cid){
			$this->error('页面不存在');
		}
		$goods_category = D('Goods_category');
        $goods_categorydata = $this->get('categorydata');
		$tmp['isdefault'] = array('eq',1);
		foreach($goods_categorydata as &$value){
			$tmp['pid'] = array('eq',$value['id']);
			$value['child'] = $goods_category->getData($tmp);
			if($cid && $cid == $value['id']){
				$crr_category = $value;
				$dtmp = $tmp;
				unset($dtmp['isdefault']);
				$crr_category['child'] = $goods_category->getData($dtmp);
				unset($dtmp);
			}
		}
		
		$region = D('Region');
		$defaultRegion = getDefaultRegion();
		$regionmap = array(
				'pid'=>array('eq',$defaultRegion['id']),
		);
		$regiondata = $region->getData($regionmap);

		$child = intval($data['child']);
		if($child){
			$map['cid']=array('eq',$child);
			$child = $goods_category->getOne($child);
			$this->assign('child',$child);
		}else{
			$ctmp['pid'] = array('eq',$cid);
			$map['cid'] = array('in',$goods_category->getGather($ctmp));
		}
		
		$rid= intval($data['rid']);
		if($rid){
			$map['rid']=array('eq',$rid);
		}
		
		if($data['sort']){
			$sortarr = explode('_', $data['sort']);
			if(!empty($sortarr)){
				$sort = implode(' ',$sortarr);
			}
			$this->assign('sortarr',$sortarr);
		}
		$goods = D('Goods');
		$count = $goods->getCount($map);
		$limit = $this->page($count,'',$data);
		$goodsdata = $goods->getData($map,$limit,$sort);
		$businesses = D('Businesses');
		foreach($goodsdata as &$value){
			$value['accessory'] = $goods->getAccessory($value['id'],true);
			$value['businesses'] = $businesses->getOne($value['promulgator']);
		}
		$this->assign('count',$count);
		$this->assign('goodsdata',$goodsdata);
		$this->assign('crr_category',$crr_category);
		$this->assign('regiondata',$regiondata);
		$this->assign('goods_categorydata',$goods_categorydata);
		$this->display();
	}
}
?>