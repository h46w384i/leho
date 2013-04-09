<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>


<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="__URL__" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>组名：</label>
				<input type="text" name="name" />
			</li>
			<li>
				<label>状态：</label>
				<select name="status" class="combox">
					<option value="">所有</option>
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</select>
			</li>
		</ul>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="__URL__/add" target="dialog" rel="__MODULE___add"><span>新增</span></a></li>
			<li><a class="delete" href="__URL__/foreverdelete/id/{sid_role}/navTabId/__MODULE__" target="ajaxTodo" title="你确定要删除吗？" warn="请选择角色"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/id/{sid_role}" target="dialog" rel="__MODULE___edit" warn="请选择角色"><span>编辑</span></a></li>
		</ul>
	</div>

	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="60">编号</th>
			<th width="120" orderField="name" <?php if($_REQUEST["_order"] == 'name'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>组名</th>
			<th width="120">上级组</th>
			<th width="150" orderField="status" <?php if($_REQUEST["_order"] == 'status'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>状态</th>
			<th>描述</th>
			<th width="150">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr target="sid_role" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($vo['id']); ?></td>
				<td><?php echo ($vo['name']); ?></td>
				<td><?php echo (getGroupName($vo['pid'])); ?></td>
				<td><?php echo (getStatus($vo['status'])); ?></td>
				<td><?php echo ($vo['remark']); ?></td>
				<td><?php echo (showStatus($vo['status'],$vo['id'])); ?> <a href="__URL__/app/groupId/<?php echo ($vo['id']); ?>" target="dialog" mask="true" title="<?php echo ($vo['name']); ?> 授权 ">授权 </a> <a href="__URL__/user/id/<?php echo ($vo['id']); ?>" target="dialog" mask="true" title="<?php echo ($vo['name']); ?> 用户列表 ">用户列表</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>

</div>