<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>


<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="__URL__" method="post">
	<?php if(is_array($para)): $i = 0; $__LIST__ = $para;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($vo); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>模块名：</label>
				<input type="text" class="alphanumeric"  name="name">
			</li>
			
			<li>
				<label>显示名：</label>
				<input type="text" name="title">
			</li>
			
			<div class="unit">
				<label>状态：</label>
				<SELECT name="status" class="combox">
					<option value="">所有</option>
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</SELECT>
			</div>
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
			<li><a class="delete" href="__URL__/foreverdelete/id/{sid_node}/navTabId/__MODULE__" target="ajaxTodo" calback="navTabAjaxMenu" title="你确定要删除吗？" warn="请选择"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/id/{sid_node}" target="dialog" rel="__MODULE___edit" warn="请选择"><span>修改</span></a></li>
			<li class="line">line</li>
			<li class=""><a target="dialog" href="__URL__/tree/" rel="__MODULE___tree" class="icon"><span>树形</span></a></li>
			<li class="line">line</li>
			<li><a class="back" href="__URL__/index/nav/back" target="navTab" rel="Node" title="节点管理"><span>后退</span></a></li>
		</ul>
		<div style="line-height: 20px;margin-left: 55px;float: left;"><?php echo ($path_str); ?></div>
	</div>


	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="60">编号</th>
			<th width="100" orderField="title" <?php if($_REQUEST["_order"] == 'title'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>模块名</th>
			<th>显示名</th>
			<th width="100">分组</th>
			<th width="80" orderField="sort" <?php if($_REQUEST["_order"] == 'sort'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>序号</th>
			<th width="100" orderField="status" <?php if($_REQUEST["_order"] == 'status'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>状态</th>
			<th width="100">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr target="sid_node" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($vo['id']); ?></td>
				<td><a href="__URL__/index/pid/<?php echo ($vo['id']); ?>/" target="navTab" rel="__MODULE__"><?php echo ($vo['name']); ?></a></td>
				<td><?php echo ($vo['title']); ?></td>
				<td><?php echo (getNodeGroupName($vo['group_id'])); ?></td>
				<td>
					<div class="jvf_fl"><?php echo ($vo['sort']); ?></div>
                	<div style=" height: 17px; padding: 2px 6px 0 0; float:right;">
                    	<a class="jvf_jia" href="__URL__/sortInc/id/<?php echo ($vo['id']); ?>"></a>
                        <a class="jvf_jian" href="__URL__/sortDec/id/<?php echo ($vo['id']); ?>"></a>
                    </div>
                    <div class="jvf_cl"></div>
				</td>
				<td><?php echo (getStatus($vo['status'])); ?></td>
				<td><?php echo (showStatus($vo['status'],$vo['id'])); ?> <a href="__URL__/edit/id/<?php echo ($vo['id']); ?>" target="dialog" rel="__MODULE___edit">编辑</a></td>
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