<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">

	<form method="post" action="__URL__/insert/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="user_id" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>"/> 
		<input type="hidden" name="level" value="<?php echo ($level); ?>">
		<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>地区名称：</label>
				<input type="text" class="required"  name="name">
			</div>
			
			<div class="unit">
				<label>序号：</label>
				<input type="text" class="alphanumeric"  name="sort">
			</div>
			
			<div class="unit">
				<label>父类：</label>
				<SELECT name="pid" class="combox">
					<option value="">无</option>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"])  ==  $pid): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>
			
			<div class="unit">
				<label>是否默认：</label>
				<SELECT name="isdefault" class="combox">
					<option value="0">否</option>
					<option value="1">是</option>
				</SELECT>
			</div>
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>

</div>