<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">

	<form method="post" action="__URL__/update/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="user_id" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" >
		<input type="hidden" name="ajax" value="1">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>分类名称：</label>
				<input type="text" class="required"  name="name" value="<?php echo ($vo["name"]); ?>">
			</div>
			
			<div class="unit">
				<label>序号：</label>
				<input type="text" class="alphanumeric"  name="sort" value="<?php echo ($vo["sort"]); ?>">
			</div>
			
			<div class="unit">
				<label>父类：</label>
				<SELECT name="pid" class="combox">
					<option value="">无</option>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"])  ==  $vo['pid']): ?>selected="selected"<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>
			
			<!-- <div class="unit">
				<label>标签(','分隔)：</label>
				<textarea cols="50" rows="5" name="label"><?php echo ($vo['label']); ?></textarea>
			</div> -->
			
			<div class="unit">
				<label>是否默认：</label>
				<SELECT name="isdefault" class="combox">
					<option value="0" <?php if(($vo["isdefault"])  ==  "0"): ?>selected="selected"<?php endif; ?>>否</option>
					<option value="1" <?php if(($vo["isdefault"])  ==  "1"): ?>selected="selected"<?php endif; ?>>是</option>
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