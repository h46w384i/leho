<?php
class Daren_showAction extends CommonAction {
	public function _filter(&$map){
		$data = Init_GP(array('mintime','maxtime'));
		$mintime = strtotime($data['mintime']);
		$maxtime = strtotime($data['maxtime']);
		if ($mintime && $maxtime) {
			$map ['addtime'] = array('between',"{$mintime},{$maxtime}");
		}
	}
	
	public function _before_add() {
		$model	=	D("Circle");
		$list	=	$model->order('`sort` asc')->select();
		$this->assign('list',$list);
	}
	
	public function _before_edit() {
		$model	=	D("Circle");
		$list	=	$model->order('`sort` asc')->select();
		$this->assign('list',$list);
	}
	
	function edit() {
		$name=$this->getActionName();
		$model = D ( $name );
		$id = $_REQUEST [$model->getPk ()];
		$vo = $model->getById ( $id );
		$member = D('Member');
		$memberdata = $member->find($vo['uid']);
		$vo['daren_explain'] = $memberdata['daren_explain'];
		$this->assign ( 'vo', $vo );
		$this->display ();
	}
	
	public function insert() {
		$name=$this->getActionName();
		$model = D ($name);
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		//保存当前数据对象
		$list=$model->add ();
		if ($list!==false) { //保存成功
			$data = Init_GP(array('uid','daren_explain'));
			$member = D('Member');
			$memberdata = array(
					'id'=>$data['uid'],
					'daren'=>1,
					'daren_explain'=>$data['daren_explain'],
				);
			$member->save($memberdata);
			$this->assign ( 'jumpUrl', U($name.'/index'));
			$this->success ('新增成功!');
		} else {
			//失败提示
			$this->error ('新增失败!');
		}
	}
	
	function update() {
		//B('FilterString');
		$name=$this->getActionName();
		$model = D ( $name );
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		// 更新数据
		$list=$model->save ();
		if (false !== $list) {
			$data = Init_GP(array('uid','daren_explain'));
			$member = D('Member');
			$memberdata = array(
					'id'=>$data['uid'],
					'daren'=>1,
					'daren_explain'=>$data['daren_explain'],
			);
			$member->save($memberdata);
			//成功提示
			$this->assign ( 'jumpUrl', U($name.'/index'));
			$this->success ('编辑成功!');
		} else {
			//错误提示
			$this->error ('编辑失败!');
		}
	}
}
?>