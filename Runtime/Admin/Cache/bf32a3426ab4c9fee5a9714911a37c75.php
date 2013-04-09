<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__/lookUp">
	<input type="hidden" name="pageNum" value="1" />
</form>
<div class="pageHeader">
	<form rel="pagerForm" method="post" action="__URL__/lookUp" onsubmit="return dwzSearch(this, 'dialog');">
	<input type="hidden" name="dialogId" value="<?php echo ($_REQUEST["dialogId"]); ?>">
	<input type="hidden" name="group" value="<?php echo ($_REQUEST["group"]); ?>">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>用户帐号：</label>
				<input type="text" name="name" class="medium" >
			</li>
			<li>
				<label>电子邮件：</label>
				<input type="text" name="mail" class="medium" >
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

	<table class="table" layoutH="118" targetType="dialog" width="100%">
		<thead>
		<tr>
			<th width="40">编号</th>
			<th width="100" orderField="name" <?php if($_REQUEST["_order"] == 'name'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>用户帐号</th>
            <th width="150" orderField="mail" <?php if($_REQUEST["_order"] == 'mail'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>电子邮件</th>
            <th width="160" orderField="regtime" <?php if($_REQUEST["_order"] == 'regtime'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>注册时间</th>
			<th width="80" orderField="regip" <?php if($_REQUEST["_order"] == 'regip'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>注册IP</th>
            <th width="50" orderField="value" <?php if($_REQUEST["_order"] == 'value'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>><?php echo C("sysconfig.site_credits_name");?></th>
			<th width="40" orderField="status" <?php if($_REQUEST["_order"] == 'status'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>状态</th>
			<th width="40">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr target="sid_node" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($vo['id']); ?></td>
				<td><?php echo ($vo['name']); ?></td>
                <td><?php echo ($vo['mail']); ?></td>
                <td><?php echo ($vo['regtime']); ?></td>
				<td><?php echo ($vo['regip']); ?></td>
                <td><?php echo ($vo['value']); ?></td>
				<td><?php echo (getStatus($vo['status'])); ?></td>
				<td>
				<a class="btnSelect" href="javascript:lookUpBack(<?php echo getJsStr($vo,array('id','name','mail'));?>,'<?php echo ($_REQUEST["dialogId"]); ?>','<?php echo ($_REQUEST["group"]); ?>')" title="查找带回">选择</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="dialog" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>
</div>