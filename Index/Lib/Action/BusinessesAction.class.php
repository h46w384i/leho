<?php
class BusinessesAction extends CommonAction
{
	public function index(){
		$businesses_category = D('Businesses_category');
		$businesses_categorymap['level'] = array('eq',0);
		$businesses_categorydata = $businesses_category->getData($businesses_categorymap);
		$tmp['isdefault'] = array('eq',1);
		foreach($businesses_categorydata as &$value){
			$tmp['pid'] = array('eq',$value['id']);
			$value['child'] = $businesses_category->getData($tmp);
		}
		
		//推荐商家
		$businesses_recommend = D('Businesses_recommend');
		$businesses_recommenddata = $businesses_recommend->getGather('','bid');
		$businesses = D('Businesses');
		$businessesmap['id'] = array('in',$businesses_recommenddata);
		$businessesmap['status'] = array('eq',1);
		$businessesdata = $businesses->getData($businessesmap,4);
		
		//热门优惠
		$preferential = D('Preferential');
        unset($map);
        $map['status'] = array('eq',1);
		$preferentialdata = $preferential->getData($map,3);
		
		//品牌商家
		$isbrandmap['isbrand'] = array('eq',1);
		$isbrandmap['status'] = array('eq',1);
		$isbranddata = $businesses->getData($isbrandmap,10);
		
		//商家总数
		$countmap['status'] = array('eq',1);

		$switch_region = $this->get('switch_region');
		$countmap['rid'] = array('in',$switch_region['crr']['child']);
		$businessescount = $businesses->getCount($countmap);
		//资质认证总数
		$countmap['qualifications'] = array('eq',1);
		$qualificationscount = $businesses->getCount($countmap);
		
		$this->assign('businessescount',$businessescount);
		$this->assign('qualificationscount',$qualificationscount);
		$this->assign('isbranddata',$isbranddata);
		$this->assign('preferentialdata',$preferentialdata);
		$this->assign('businessesdata',$businessesdata);
		$this->assign('businesses_categorydata',$businesses_categorydata);
		$this->display();
	}
	
	//商家列表
	public function lists(){
		$data = Init_GP(array('cid','child','security','real_scene','qualifications'));
		$cid = intval($data['cid']);
		$child = intval($data['child']);
		$businesses = D('Businesses');
		$default_region = $this->get('switch_region');
		//获取所有分类信息
		$businesses_category = D('Businesses_category');
		$businesses_categorymap['level'] = array('eq',0);
		$businesses_categorydata = $businesses_category->getData($businesses_categorymap);
		foreach($businesses_categorydata as &$value){
			$ctmp['pid'] = array('eq',$value['id']);
			$value['child'] = $businesses_category->getData($ctmp);
			foreach($value['child'] as $val){
				$cids[] = $val['id'];
			}
			$btmp['cid'] = array('in',$cids);
			$btmp['rid'] = array('in',$default_region['crr']['child']);
			$value['count_num'] = $businesses->getCount($btmp);
				if($cid == $value['id']){
					$crr_categorydata = $value['child'];
				}
			unset($cids,$btmp,$ctmp);
		}
		
		if(!$cid){
			$crr_categorydata = $businesses_categorydata;
		}else{
			foreach($crr_categorydata as &$value){
				$btmp['cid'] = array('eq',$value['id']);
				$btmp['rid'] = array('in',$default_region['crr']['child']);
				$value['count_num'] = $businesses->getCount($btmp);
			}
		}
		
		if($cid){
			foreach($crr_categorydata as $val){
				$crr_cids[] = $val['id'];
			}
			$map['cid'] = array('in',$crr_cids);
		}
		
		if($child){
			$map['cid'] = array('eq',$child);
		}
		
		if(!empty($data['security'])){
			$map['security'] = array('eq',1);
		}
		if(!empty($data['real_scene'])){
			$map['real_scene'] = array('eq',1);
		}
		if(!empty($data['qualifications'])){
			$map['qualifications'] = array('eq',1);
		}
		
		$map['status'] = array('eq',1);
		$map['rid'] = array('in',$default_region['crr']['child']);
		$count = $businesses->getCount($map);
		$limit = $this->page($count,'',$data);
		$businessesdata = $businesses->getData($map,$limit,$sort);
		
		$preferential = D('Preferential');
		$preferentialmap['status'] = array('eq',1);
		$preferentialdata = $preferential->getData($preferentialmap);
		
		$this->assign('count',$count);
		$this->assign('preferentialdata',$preferentialdata);
		$this->assign('businessesdata',$businessesdata);
		$this->assign('businesses_categorydata',$businesses_categorydata);
		$this->assign('crr_categorydata',$crr_categorydata);
		$this->display();
	}
	
	//商家详细
	public function detail(){
		$id = intval($_REQUEST['id']);
		if($id){
			$this->_pub();
			$businessesdata = $this->get('businessesdata');
			$member = D('Member');
			$memberdata = $member->getOne($businessesdata['uid']);
			$memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
			/*说说*/
			$talk_about = D('Talk_about');
			$map['uid'] = array('eq',$memberdata['id']);
			$talk_aboutdata = $talk_about->getDataAll($map,3);

            /*幻灯片*/
            $businesses_slide = D('Businesses_slide');
            unset($map);
            $map['bid'] = array('eq',$id);
            $businesses_slidedata = $businesses_slide->getData($map);
            /*文章*/
            $businesses_article = D('Businesses_article');
            $businesses_articledata = $businesses_article->getData($map);
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,3);
            $this->assign('goodsdata',$goodsdata);
            /*优惠*/
            $preferential = D('Preferential');
            unset($map);
            $map['status'] = array('eq',1);
            $map['bid'] = array('eq',$id);
            $preferentialdata = $preferential->getData($map,8);
            /*相册*/
            $picture = D('Picture');
			unset($map['status']);
            $picturedata = $picture->getData($map,8);
            /*消费分享*/
            $talk_about_relation = D('Talk_about_relation');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $ids = $talk_about_relation->getGather($map,'tid');
            unset($map);
            $map['id'] = array('eq',$ids);
            $fenxiangdata = $talk_about->getDataAll($map,5);
            $this->assign('fenxiangdata',$fenxiangdata);
            $this->assign('picturedata',$picturedata);
            $this->assign('preferentialdata',$preferentialdata);
            $this->assign('businesses_articledata',$businesses_articledata);
            $this->assign('businesses_slidedata',$businesses_slidedata);
			$this->assign('talk_aboutdata',$talk_aboutdata);
			$this->assign('mdata',$memberdata);
			$this->display();
		}else{
			$this->assign('操作错误');	
		}
	}
	
	protected function _pub(){
		$id = intval($_REQUEST['id']);
		if($id){
			$businesses = D('Businesses');
			$businessesdata = $businesses->getOne($id);
			$businesses_category = D('Businesses_category');
			$businesses_categorydata = $businesses_category->getOne($businessesdata['cid']);
			$arr_data = explode(',', $businesses_categorydata['path']);
			$this->assign('arr_data',$arr_data);
			$this->assign('businessesdata',$businessesdata);
		}
	}
	
	//优惠活动列表
	public function preferential(){
		$data = Init_GP(array('cid','child','sort'));
		$cid = intval($data['cid']);
		$child = intval($data['child']);
		$preferential = D('Preferential');

		//获取所有分类信息
		$businesses_category = D('Businesses_category');
		$businesses_categorymap['level'] = array('eq',0);
		$businesses_categorydata = $businesses_category->getData($businesses_categorymap);
		foreach($businesses_categorydata as &$value){
			$ctmp['pid'] = array('eq',$value['id']);
			$value['child'] = $businesses_category->getData($ctmp);
			foreach($value['child'] as $val){
				$cids[] = $val['id'];
			}
			$btmp['cid'] = array('in',$cids);
			$value['count_num'] = $preferential->getCategoryCount($btmp);
			if($cid == $value['id']){
				$crr_categorydata = $value['child'];
			}
			unset($cids,$btmp,$ctmp);
		}
		
		if(!$cid){
			$crr_categorydata = $businesses_categorydata;
		}else{
			foreach($crr_categorydata as &$value){
				$btmp['cid'] = array('eq',$value['id']);
				$value['count_num'] = $preferential->getCategoryCount($btmp);
			}
		}
		
		if($cid){
			foreach($crr_categorydata as $val){
				$crr_cids[] = $val['id'];
			}
			$map['B.cid'] = array('in',$crr_cids);
		}
		
		if($child){
			$map['B.cid'] = array('eq',$child);
		}
		$map['P.endtime'] = array('gt',time());
		$map['P.status'] = array('eq',1);
		$count = $preferential->getAllCount($map);
		$limit = $this->page($count,'',$data);
		if(!empty($data['sort'])){
			$sort = 'P.id desc';
		}
		$preferentialdata = $preferential->getAllData($map,$limit,$sort);
		$newmap['endtime'] = array('gt',time());
		$newmap['status'] = array('eq',1);
		$newdata = $preferential->getData($newmap,10,'id desc');
		$this->assign('newdata',$newdata);
		$this->assign('count',$count);
		$this->assign('preferentialdata',$preferentialdata);
		$this->assign('crr_categorydata',$crr_categorydata);
		$this->display();
	}
	
	//品牌商家
	public function brand(){
		$this->display();
	}

    /*商家信息*/
    public function info(){
        $id = intval($_REQUEST['id']);
        if($id){
            $this->_pub();
            $businessesdata = $this->get('businessesdata');
            $businesses_article = D('Businesses_article');
            $map['bid'] = array('eq',$id);
            $businesses_articledata = $businesses_article->getData($map);
            $this->assign('businesses_articledata',$businesses_articledata);

            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    /*商家相册*/
    public function poto(){
        $id = intval($_REQUEST['id']);
        if($id){
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);

            /*相册*/
            $picture = D('Picture');
            unset($map);
            $map['bid'] = array('eq',$id);
            $count = $picture->getCount($map);
            $limit = $this->page($count);
            $picturedata = $picture->getData($map);
            $this->assign('picturedata',$picturedata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function pic(){
        $id = intval($_REQUEST['id']);
        if($id){
            $picture = D('Picture');
            $picturedata = $picture->where("id={$id}")->find();
            $picturedata['accessory'] = $picture->getAccessory($picturedata['id']);
            $this->assign('picturedata',$picturedata);
            $_REQUEST['id'] = $picturedata['bid'];
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);

            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function video(){
        $id = intval($_REQUEST['id']);
        if($id){
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function service(){
        $id = intval($_REQUEST['id']);
        if($id){
            $d = Init_GP(array('order'));
            if($d['order']){
                if($d['order'] == 'asc'){
                    $order = '`price` asc';
                }else{
                    $order = '`price` desc';
                }
                $this->assign('order',$d['order']);
            }
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $count = $goods->getCount($map);
            $limit = $this->page($count,'',$d);
            $goodsdata = $goods->getDataAll($map,$limit);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function doing(){
        $id = intval($_REQUEST['id']);
        if($id){
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);

            /*优惠*/
            $preferential = D('Preferential');
            unset($map);
            $map['bid'] = array('eq',$id);
            $map['status'] = array('eq',1);
            $count = $preferential->getCount($map);
            $limit = $this->page($count);
            $preferentialdata = $preferential->getData($map,$limit);
            $this->assign('preferentialdata',$preferentialdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    //优惠活动详情
    public function preferentialDetail(){
        $id = intval($_REQUEST['id']);
        if($id){
            $preferential = D('Preferential');
            unset($map);
            $map['id'] = array('eq',$id);
            $map['status'] = array('eq',1);
            $preferentialdata = $preferential->getOne($map);
            $this->assign('preferentialdata',$preferentialdata);
            $_REQUEST['id'] = $preferentialdata['bid'];
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function mouth(){
        $id = intval($_REQUEST['id']);
        if($id){
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);

            /*消费分享*/
            $talk_about_relation = D('Talk_about_relation');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $ids = $talk_about_relation->getGather($map,'tid');
            $data['id'] = $id;
            unset($map);
            $map['id'] = array('in',$ids);
            $count = $talk_about->getCount($map);
            $limit = $this->page($count,'',$data);
            $fenxiangdata = $talk_about->getDataAll($map,$limit);
            $this->assign('fenxiangdata',$fenxiangdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function contact(){
        $id = intval($_REQUEST['id']);
        if($id){
            $this->_pub();
            /*推荐服务*/
            $goods = D('Goods');
            unset($map);
            $map = $goods->_defaultWhere();
            $map['promulgator'] = array('eq',$id);
            $goodsdata = $goods->getDataAll($map,2);
            $this->assign('goodsdata',$goodsdata);
            /*用户*/
            $businessesdata = $this->get('businessesdata');
            $member = D('Member');
            $memberdata = $member->getOne($businessesdata['uid']);
            $memberdata['wasAttentionNum'] = $member->getWasAttentionNum($businessesdata['uid']);
            $this->assign('mdata',$memberdata);
            /*说说*/
            $talk_about = D('Talk_about');
            unset($map);
            $map['uid'] = array('eq',$memberdata['id']);
            $talk_aboutdata = $talk_about->getDataAll($map,3);
            $this->assign('talk_aboutdata',$talk_aboutdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function preferentialPrint(){
        $id = intval($_REQUEST['id']);
        if($id){
            $preferential = D('Preferential');
            unset($map);
            $map['id'] = array('eq',$id);
            $map['status'] = array('eq',1);
            $preferentialdata = $preferential->getOne($map);
            if(empty($preferentialdata)){
                $this->error('操作错误');
            }
            if($preferentialdata['endtime'] < time()){
                $this->error('此优惠已结束');
            }
            $businesses = D('Businesses');
            $businessesdata = $businesses->where("id={$preferentialdata['bid']}")->find();
            $this->assign('businessesdata',$businessesdata);
            $this->assign('preferentialdata',$preferentialdata);
            $this->display();
        }else{
            $this->assign('操作错误');
        }
    }

    public function preferentialSms(){
        $id = intval($_REQUEST['id']);
        $phone = trim($_REQUEST['phone']);
        if(!isPhone($phone)){
            $this->error('手机号码格式错误');
        }
        $code = trim($_REQUEST['_vcode']);
        if(md5($code) != $_SESSION['verify']){
            $this->error('验证码错误');
        }
        if($id){
            $preferential = D('Preferential');
            unset($map);
            $map['id'] = array('eq',$id);
            $map['status'] = array('eq',1);
            $preferentialdata = $preferential->getOne($map);
            if(empty($preferentialdata)){
                $this->error('操作错误');
            }
            if($preferentialdata['endtime'] < time()){
                $this->error('此优惠已结束');
            }
            $preferential->setInc('crr',"id={$id}");
            sendsms($phone,$preferentialdata['sms']);
            $this->success('发送成功');
        }else{
            $this->assign('操作错误');
        }
    }

}
?>