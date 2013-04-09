<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>



<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="__URL__" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>商号：</label>
				<input type="text" name="name" class="medium" >
			</li>
			<li style="width: 600px;">
				<label>入驻时间：</label>
				<input type="text" name="mintime" class="date" readonly="true" format="yyyy-MM-dd HH:mm:ss"/>
				<a class="inputDateButton" href="javascript:;">选择</a>
				<span style="float: left;" >&nbsp;～&nbsp;</span>
				<input type="text" name="maxtime" class="date" readonly="true" format="yyyy-MM-dd HH:mm:ss"/>
				<a class="inputDateButton" href="javascript:;">选择</a>
			</li>
			<li>
				<label>状态：</label>
				<SELECT name="status" class="combox">
					<option value="">所有</option>
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</SELECT>
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
    <!--  功能操作区域  -->
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="__URL__/add" target="dialog" rel="__MODULE___add"><span>新增</span></a></li>
			<li><a class="delete" href="__URL__/foreverdelete/id/{sid_node}/navTabId/__MODULE__" target="ajaxTodo" calback="navTabAjaxMenu" title="你确定要删除吗？" warn="请选择"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/id/{sid_node}" rel="__MODULE___edit" target="dialog" warn="请选择"><span>修改</span></a></li>
		</ul>
	</div>
   <!-- 功能操作区域结束 -->
	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="60">编号</th>
			<th width="100" orderField="name" <?php if($_REQUEST["_order"] == 'name'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>商号</th>
            <th width="100" orderField="tel" <?php if($_REQUEST["_order"] == 'tel'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>预约电话</th>
            <th width="80" orderField="addtime" <?php if($_REQUEST["_order"] == 'addtime'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>入驻时间</th>
            <th width="40" orderField="sort" <?php if($_REQUEST["_order"] == 'sort'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>序号</th>
            <th width="40" orderField="isbrand" <?php if($_REQUEST["_order"] == 'isbrand'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>品牌商家</th>
            <th width="40" orderField="qualifications" <?php if($_REQUEST["_order"] == 'qualifications'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>资质认证</th>
            <th width="40" orderField="security" <?php if($_REQUEST["_order"] == 'security'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>保证金</th>
			<th width="40" orderField="status" <?php if($_REQUEST["_order"] == 'status'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>状态</th>
			<th width="60">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr target="sid_node" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($vo['id']); ?></td>
				<td><?php echo ($vo['name']); ?></td>
				<td><?php echo ($vo['tel']); ?></td>
                <td><?php echo ($vo['addtime']); ?></td>
                <td>
                	<div class="jvf_fl"><?php echo ($vo['sort']); ?></div>
                	<div style=" height: 17px; padding: 2px 6px 0 0; float:right;">
                    	<a class="jvf_jia" href="__URL__/sortInc/id/<?php echo ($vo['id']); ?>"></a>
                        <a class="jvf_jian" href="__URL__/sortDec/id/<?php echo ($vo['id']); ?>"></a>
                    </div>
                    <div class="jvf_cl"></div>
                </td>
                <td><?php echo (getWhether($vo['isbrand'])); ?></td>
                <td><?php echo (getCheckStatus($vo['qualifications'])); ?></td>
                <td><?php echo (getCheckStatus($vo['security'])); ?></td>
                <td><?php echo (getStatus($vo['status'])); ?></td>
				<td><?php echo (showStatus($vo['status'],$vo['id'])); ?> <a href="__URL__/edit/id/<?php echo ($vo['id']); ?>" target="dialog" rel="__MODULE___edit" >编辑</a></td>
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