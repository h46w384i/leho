<?php
class CompanyAction extends CommonAction
{
	private $businesses;
	public function _initialize() {
		parent::_initialize();
		if(empty($this->memberinfo)){
			if($this->isAjax()){
				$this->error(L('not_logged'));
			}else{
				cookie('before_login',__SELF__);
				$this->redirect('User/signin');
			}
		}else{
			if(C('sysconfig.site_mb_autoreg')==1 && $this->memberinfo['mailstatus']==0){
				$this->redirect('User/noverifymail');
			}
			$businesses = D('Businesses');
			$map['uid'] = array('eq',$this->memberinfo['id']);
			$map['status'] = array('eq',1);
			$businessesdata = $businesses->getOne($map);
			if(empty($businessesdata)){
				$this->error('您还未申请商家');
			}
			$this->businesses = $businessesdata;
			$this->assign('businesses',$businessesdata);
		}
	}
	
	public function index(){
		$this->display();
	}
    
	//卖出订单列表
	public function sellOrderList(){
		$order_details = D('Order_details');
		$goods = D('Goods');
		$businesses = D('Businesses');
		$businessesmap['uid'] = array('eq',$this->memberinfo['id']);
		$businessesdata = $businesses->getOne($businessesmap);
		$goodsmap['promulgator'] = array('eq',$businessesdata['id']);
		$gids = $goods->getGather($goodsmap);
		$order_detailsmap['gid'] = array('in',$gids);
		$order_details_count = $order_details->getCount($order_detailsmap);
		$limit = $this->page($order_details_count);
		$order_detailsdata = $order_details->getDataAll($order_detailsmap,$limit);
		$this->assign('order_detailsdata',$order_detailsdata);
		$this->display();
	}
	
	//卖出的优惠券
	public function sellcoupons(){
		$data = Init_GP(array('filter','title','sn'));
		$coupon = D('Coupon');
		//获取用户优惠券
		$businesses = D('Businesses');
		$businessesmap['uid'] = array('eq',$this->memberinfo['id']);
		$businessesdata = $businesses->getOne($businessesmap);
		$map['promulgator'] = array('eq',$businessesdata['id']);
		$now = time();
		if($data['filter'] == 'unused'){
			$map['status'] = array('eq',0);
		}elseif($data['filter'] =='used'){
			$map['status'] = array('eq',1);
		}elseif($data['filter'] =='freeze'){
			$map['status'] = array('eq',2);
		}elseif($data['filter'] =='expired'){
			$map['status'] = array('eq',0);
			$map['endtime'] = array('lt',$now);
		}
	
		if(!empty($data['title'])){
			$goods = D('Goods');
			$goodsmap['_string'] = "LOCATE('{$data['title']}',`title`)>0";
			$ids = $goods->getGather($goodsmap);
			$map['gid'] = array('in',$ids);
		}
		if(!empty($data['sn'])){
			$map['sn'] = array('like',"%{$data['sn']}%");
		}
	
		$count = $coupon->getCount($map);
		$limit = $this->page($count,'',$data);
		$couponsdata = $coupon->getDataAll($map,$limit);
		$this->assign('now',$now);
		$this->assign('filter',$data['filter']);
		$this->assign('title',$data['title']);
		$this->assign('sn',$data['sn']);
		$this->assign('couponsdata',$couponsdata);
		$this->display();
	}
	
	//消费登记
	public function verifycoupon(){
		$this->display();
	}
	//查询优惠券
	public function querycoupon(){
		$data = Init_GP(array('sn'));
		$config = C('sysconfig');
		if(empty($data['sn']))$this->error(L('member_querycoupon_empty_sn').$config['site_couponname'].L('voucher_sn'));
	
		$coupon = D('Coupon');
		$map['sn'] = array('eq',$data['sn']);
		$businesses = D('Businesses');
		$businessesmap['uid'] = array('eq',$this->memberinfo['id']);
		$businessesdata = $businesses->getOne($businessesmap);
		$map['promulgator'] = array('eq',$businessesdata['id']);
		$coupondata = $coupon->getOne($map);
		if(empty($coupondata)) {
			$msg = "{$data['sn']}&nbsp;".L('member_querycoupon_invalid');
		}elseif($coupondata['status'] == 1){
			$msg = $config['site_couponname'].L('member_querycoupon_used').date('Y-m-d H:i:s',$coupondata['consume_time']);
		}elseif($coupondata['status'] == 2){
			$msg = $config['site_couponname'].L('member_querycoupon_freeze');
		}elseif($coupondata['endtime'] < strtotime(date('Y-m-d'))) {
			$msg = "{$data['sn']}&nbsp;".L('member_querycoupon_expired').date('Y-m-d', $coupon['endtime']);
		}else{
			$msg = "{$data['sn']}&nbsp;".L('member_querycoupon_effective').":{$coupondata['good']['short_title']}<br />".L('member_querycoupon_validity')."&nbsp;".date('Y-m-d',$coupondata['starttime'])."～".date('Y-m-d',$coupondata['endtime']);
		}
		$this->success($msg);
	}
	//消费优惠券
	public function consumecoupon(){
		$data = Init_GP(array('sn','pass'));
		$config = C('sysconfig');
		if(empty($data['sn']))$this->error(L('member_querycoupon_empty_sn').$config['site_couponname'].L('voucher_sn'));
		if(empty($data['pass']))$this->error(L('member_querycoupon_empty_sn').$config['site_couponname'].L('voucher_pass'));
	
		$coupon = D('Coupon');
		$map['sn'] = array('eq',$data['sn']);
		$businesses = D('Businesses');
		$businessesmap['uid'] = array('eq',$this->memberinfo['id']);
		$businessesdata = $businesses->getOne($businessesmap);
		$map['promulgator'] = array('eq',$businessesdata['id']);
		$coupondata = $coupon->getOne($map);
	
		if(empty($coupondata)) {
			$msg = "#{$data['sn']}&nbsp;".L('member_querycoupon_invalid')."<br />".L('member_consumecoupon_error');
			$this->error($msg);
		}elseif($coupondata['pass']!=$data['pass']) {
			$msg = $config['site_couponname'].L('member_consumecoupon_pass_error').'<br />'.L('member_consumecoupon_error');
			$this->error($msg);
		}elseif($coupondata['status'] == 1){
			$msg = "#{$data['sn']}&nbsp;".L('member_querycoupon_used').date('Y-m-d H:i:s',$coupondata['consume_time'])."<br />".L('member_consumecoupon_error');
			$this->error($msg);
		}elseif($coupondata['status'] == 2){
			$msg = $config['site_couponname'].L('member_querycoupon_freeze');
		}elseif($coupondata['starttime'] > strtotime(date('Y-m-d'))) {
			$msg = "#{$data['sn']}&nbsp;".L('member_consumecoupon_not_yet')."&nbsp;".date('Y-m-d',$coupondata['starttime'])."～".date('Y-m-d',$coupondata['endtime']);
			$this->error($msg);
		}elseif($coupondata['endtime'] < strtotime(date('Y-m-d'))) {
			$msg = "#{$data['sn']}&nbsp;".L('member_querycoupon_expired').date('Y-m-d',$coupondata['endtime'])."<br />".L('member_consumecoupon_error');
			$this->error($msg);
		}else{
			$now = time();
			$tip = $coupon->where($map)->setField('status',1);
			$tip = $coupon->where($map)->setField('consume_time',$now);
			$coupon->consume_sms($coupondata['id']);
			$coupon->consume_mail($coupondata['id']);
			$msg = $config['site_couponname'].L('member_querycoupon_effective')."{$coupondata['good']['short_title']}<br />".L('member_consumecoupon_time').date('Y-m-d H:i:s',$now)."<br />".L('member_consumecoupon_success');
			$commission = D('Commission');
			$commission->distribution($coupondata);
			$this->success($msg);
		}
	}
	
	public function update(){
		$data = Init_GP(array('header','tel','type','characteristic','services','signature','address','opening','longitude','latitude','zoom'));
		$businesses = D('Businesses');
		$data['id'] = $this->businesses['id'];
		$info = $businesses->save($data);
		if($info !== false){
			$this->success('编辑成功');
		}else{
			$this->error('编辑失败');
		}
	}
	/* 商店管理 */
	public function store(){
		$businesses_slide = D('Businesses_slide');
		$map['bid'] = array('eq',$this->businesses['id']);
		$businesses_slidedata = $businesses_slide->getData($map);
		$this->assign('businesses_slidedata',$businesses_slidedata);
        $businessesArticle = D('BusinessesArticle');
        $businessesArticledata = $businessesArticle->getData($map);
        $this->assign('businessesArticledata',$businessesArticledata);
		$this->display();
	}
	/* 添加幻灯片  */
	public function addSlide(){
		$this->display();
	}
	
	/* 插入幻灯片 */
	public function insertSlide(){
		$data = Init_GP(array('link','img','sort'));
		$businesses_slide = D('Businesses_slide');
		if(empty($data['img'])){
			$this->error('请上传图片');
		}
		$data['bid'] = $this->businesses['id'];
		$info = $businesses_slide->insert($data);
		if($info){
			$this->success('添加成功');
		}else{
			$this->error('添加失败');
		}
	}
	
	public function delSlide(){
		$id = intval($_REQUEST['id']);
		if($id){
			$businesses_slide = D('Businesses_slide');
			$businesses_slidemap['id'] = array('eq',$id);
			$businesses_slidemap['bid'] = array('eq',$this->businesses['id']);
			$info = $businesses_slide->where($businesses_slidemap)->delete();
			if($info){
				$this->success('删除成功');
			}else{
				$this->error('操作错误');
			}
		}else{
			$this->error('操作错误');
		}
	}
	
	public function addArticle(){
		$this->display();
	}

    public function insertArticle(){
        $data = Init_GP(array('title','sort'));
        $data['content'] = h($_REQUEST['content']);
        if(empty($data['title'])){
            $this->error('请输入标题');
        }
        if(empty($data['content'])){
            $this->error('请输入内容');
        }
        $data['bid'] = $this->businesses['id'];
        $businessesArticle = D('BusinessesArticle');
        $info = $businessesArticle->insert($data);
        if($info){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }

    public function editArticle(){
        $id = intval($_REQUEST['id']);
        if($id){
            $businessesArticle = D('BusinessesArticle');
            $businessesArticledata = $businessesArticle->getOne($id);
            $this->assign('vo',$businessesArticledata);
        }
        $this->display();
    }

    public function updateArticle(){
        $data = Init_GP(array('id','title','sort'));
        $data['content'] = h($_REQUEST['content']);
        if(empty($data['title'])){
            $this->error('请输入标题');
        }
        if(empty($data['content'])){
            $this->error('请输入内容');
        }
        $businessesArticle = D('BusinessesArticle');
        $map['id'] = $data['id'];
        $map['bid'] = $this->businesses['id'];
        if(!$businessesArticle->isExist($map)){
            $this->error('操作错误');
        }

        $info =   $businessesArticle->save($data);
        if($info !== false){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }

    public function delArticle(){
        $id = intval($_REQUEST['id']);
        if($id){
            $businessesArticle = D('BusinessesArticle');
            $businessesArticlemap['id'] = array('eq',$id);
            $businessesArticlemap['bid'] = array('eq',$this->businesses['id']);
            $info = $businessesArticle->where($businessesArticlemap)->delete();
            if($info){
                $this->success('删除成功');
            }else{
                $this->error('操作错误');
            }
        }else{
            $this->error('操作错误');
        }
    }

    public function goods(){
        $goods = D('Goods');
        $goodsmap['promulgator'] = array('eq',$this->businesses['id']);
        $count = $goods->getCount($goodsmap);
        $limit = $this->page($count);
        $goodsdata = $goods->getData($goodsmap,$limit);
        $this->assign('goodsdata',$goodsdata);
        $this->display();
    }

    public function addGoods(){
        $goods_category = D('Goods_category');
        $goods_categorydata = $goods_category->getData('','','`path` asc');
        $region = D('Region');
        $regiondata = $region->getData('','','`path` asc');
        $this->assign('goods_categorydata',$goods_categorydata);
        $this->assign('regiondata',$regiondata);
        $this->display();
    }

    public function insertGoods(){
        $data = Init_GP(array('title','short_title','cid','rid','num','onenum','original','payment','price','finishtime','pre','starttime','endtime','keywords','description','tel','address','latitude','longitude','zoom'));
        $data['promulgator'] = $this->businesses['id'];
        $data['detail'] = $_REQUEST['detail'];
        if(C('sysconfig.release_audit')){
            $data['audit'] = 1;
        }
        $goods = D('Goods');
        $info = $goods->insert($data);
        if($info){
            $imgs = $_REQUEST['imgs'];
            $accessory_relation = D('Accessory_relation');
            foreach($imgs as $val){
                $val = intval($val);
                if($val){
                    $arr[] = array(
                        'accessoryid'=>$val,
                        'relationid'=>$info,
                        'table'=>'Goods',
                    );
                }
            }
            if(!empty($arr)){
                $accessory_relation->addAll($arr);
            }
            $this->success('操作成功');
        }else{
            $error = $goods->getError();
            if(!$error){
                $error = '操作错误';
            }
            $this->error($error);
        }
    }

    public function editGoods(){
        $id = intval($_REQUEST['id']);
        if(!$id){
            $this->error('操作失败');
        }
        $goods = D('Goods');
        $goodsdata = $goods->where("id={$id}")->find();
        if(empty($goodsdata) || $goodsdata['promulgator'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $goodsdata['accessory'] = $goods->getAccessory($goodsdata['id']);
        $goods_category = D('Goods_category');
        $goods_categorydata = $goods_category->getData('','','`path` asc');
        $region = D('Region');
        $regiondata = $region->getData('','','`path` asc');
        $this->assign('goods_categorydata',$goods_categorydata);
        $this->assign('regiondata',$regiondata);
        $this->assign('data',$goodsdata);
        $this->display();
    }

    public function updateGoods(){
        $data = Init_GP(array('id','title','cid','rid','detail','short_title','cid','rid','num','onenum','original','payment','price','finishtime','pre','starttime','endtime','keywords','description','tel','address','longitude','latitude','zoom'));
        $goods = D('Goods');
        $data['id'] = intval($data['id']);
        if(!$data['id']){
            $this->error('操作失败');
        }
        $goodsdata = $goods->where("id={$data['id']}")->find();
        if(empty($goodsdata) || $goodsdata['promulgator'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $goods = D('Goods');
        $info = $goods->save($data);
        if($info !== false){
            $imgs = $_REQUEST['imgs'];
            $accessory_relation = D('Accessory_relation');
            $accessory_relation->where("relationid={$data['id']}")->delete();
            foreach($imgs as $val){
                $val = intval($val);
                if($val){
                    $arr[] = array(
                        'accessoryid'=>$val,
                        'relationid'=>$data['id'],
                        'table'=>'Goods',
                    );
                }
            }
            if(!empty($arr)){
                $accessory_relation->addAll($arr);
            }
            $this->success('操作成功');
        }else{
            $error = $goods->getError();
            if(!$error){
                $error = '操作错误';
            }
            $this->error($error);
        }
    }

    public function delGoods(){
        $id = intval($_REQUEST['id']);
        if(!$id){
            $this->error('操作失败');
        }
        $goods = D('Goods');
        $goodsdata = $goods->where("id={$id}")->find();
        if(empty($goodsdata) || $goodsdata['promulgator'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $info = $goods->where("id={$id}")->delete();
        if($info !== false){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function preferential(){
        $preferential = D('Preferential');
        $preferentialmap['bid'] = array('eq',$this->businesses['id']);
        $count = $preferential->getCount($preferentialmap);
        $limit = $this->page($count);
        $preferentialdata = $preferential->getData($preferentialmap,$limit);
        $this->assign('preferentialdata',$preferentialdata);
        $this->display();
    }

    public function addPreferential(){
        $this->display();
    }

    public function insertPreferential(){
        $data = Init_GP(array('title','short_title','note','sms','starttime','endtime','logo','status'));
        $data['starttime'] = strtotime($data['starttime']);
        $data['endtime'] = strtotime($data['endtime']);
        $data['bid'] = $this->businesses['id'];
        $preferential = D('Preferential');
        $info = $preferential->insert($data);
        if($info){
            $this->success('操作成功');
        }else{
            $error = $preferential->getError();
            if(!$error){
                $error = '操作错误';
            }
            $this->error($error);
        }
    }

    public function editPreferential(){
        $id = intval($_REQUEST['id']);
        if(!$id){
            $this->error('操作失败');
        }
        $preferential = D('Preferential');
        $preferentialdata = $preferential->where("id={$id}")->find();
        if(empty($preferentialdata) || $preferentialdata['bid'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        if(!empty($preferentialdata['logo'])){
            $accessory = D('Accessory');
            $preferentialdata['logopath'] = __ROOT__.$accessory->getField('origin',"id={$preferentialdata['logo']}");
        }
        $this->assign('data',$preferentialdata);
        $this->display();
    }

    public function updatePreferential(){
        $data = Init_GP(array('id','title','short_title','note','pre','starttime','endtime','logo','status'));
        $data['starttime'] = strtotime($data['starttime']);
        $data['endtime'] = strtotime($data['endtime']);
        $preferential = D('Preferential');
        $data['id'] = intval($data['id']);
        if(!$data['id']){
            $this->error('操作失败');
        }
        $preferentialdata = $preferential->where("id={$data['id']}")->find();
        if(empty($preferentialdata) || $preferentialdata['bid'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $info = $preferential->save($data);
        if($info !== false){
            $this->success('操作成功');
        }else{
            $error = $goods->getError();
            if(!$error){
                $error = '操作错误';
            }
            $this->error($error);
        }
    }

    public function delPreferential(){
        $id = intval($_REQUEST['id']);
        if(!$id){
            $this->error('操作失败');
        }
        $preferential = D('Preferential');
        $preferentialdata = $preferential->where("id={$id}")->find();
        if(empty($preferentialdata) || $preferentialdata['bid'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $info = $preferential->where("id={$id}")->delete();
        if($info !== false){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function video(){
        $this->display();
    }

    public function updateVideo(){
        $video = h($_REQUEST['video']);
        $businesses = D('Businesses');
        $info = $businesses->setField('video',$video,"id={$this->businesses['id']}");
        if($info !== false){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    public function picture(){
        $picture = D('Picture');
        $picturemap['bid'] = array('eq',$this->businesses['id']);
        $count = $picture->getCount($picturemap);
        $limit = $this->page($count);
        $picturedata = $picture->getData($picturemap,$limit);
        $this->assign('picturedata',$picturedata);
        $this->display();
    }

    public function addPicture(){
        $this->display();
    }

    public function insertPicture(){
        $data = Init_GP(array('title'));
        $data['bid'] = $this->businesses['id'];
        $picture = D('Picture');
        $info = $picture->insert($data);
        if($info){
            $imgs = $_REQUEST['imgs'];
            $accessory_relation = D('Accessory_relation');
            foreach($imgs as $val){
                $val = intval($val);
                if($val){
                    $arr[] = array(
                        'accessoryid'=>$val,
                        'relationid'=>$info,
                        'table'=>'Picture',
                    );
                }
            }
            if(!empty($arr)){
                $accessory_relation->addAll($arr);
            }
            $picture->setField('num',count($arr),"id={$info}");
            $this->success('操作成功');
        }else{
            $error = $preferential->getError();
            if(!$error){
                $error = '操作错误';
            }
            $this->error($error);
        }
    }

    public function editPicture(){
        $id = intval($_REQUEST['id']);
        if(!$id){
            $this->error('操作失败');
        }
        $picture = D('Picture');
        $picturedata = $picture->where("id={$id}")->find();
        if(empty($picturedata) || $picturedata['bid'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $picturedata['accessory'] = $picture->getAccessory($picturedata['id']);
        $this->assign('data',$picturedata);
        $this->display();
    }

    public function updatePicture(){
        $data = Init_GP(array('id','title'));
        $picture = D('Picture');
        $data['id'] = intval($data['id']);
        if(!$data['id']){
            $this->error('操作失败');
        }
        $picturedata = $picture->where("id={$data['id']}")->find();
        if(empty($picturedata) || $picturedata['bid'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $info = $picture->save($data);
        if($info !== false){
            $imgs = $_REQUEST['imgs'];
            $accessory_relation = D('Accessory_relation');
            $accessory_relation->where("relationid={$data['id']}")->delete();
            foreach($imgs as $val){
                $val = intval($val);
                if($val){
                    $arr[] = array(
                        'accessoryid'=>$val,
                        'relationid'=>$data['id'],
                        'table'=>'Picture',
                    );
                }
            }
            if(!empty($arr)){
                $accessory_relation->addAll($arr);
            }
            $picture->setField('num',count($arr),"id={$data['id']}");
            $this->success('操作成功');
        }else{
            $error = $picture->getError();
            if(!$error){
                $error = '操作错误';
            }
            $this->error($error);
        }
    }

    public function delPicture(){
        $id = intval($_REQUEST['id']);
        if(!$id){
            $this->error('操作失败');
        }
        $picture = D('Picture');
        $picturedata = $picture->where("id={$id}")->find();
        if(empty($picturedata) || $picturedata['bid'] != $this->businesses['id']){
            $this->error('操作失败');
        }
        $info = $picture->where("id={$id}")->delete();
        if($info !== false){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }
}
?>