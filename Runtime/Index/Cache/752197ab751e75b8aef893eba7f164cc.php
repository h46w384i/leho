<?php if (!defined('THINK_PATH')) exit();?><li>
	<a href="<?php echo U('User/space/id/'.$vo['uid']);?>" target="_blank" class="head">
	<img alt="<?php echo ($vo["name"]); ?>" title="<?php echo ($vo["name"]); ?>" src="<?php echo ($vo["header"]); ?>" width="30">
	</a>
	<p>
		<a href="<?php echo U('User/space/id/'.$vo['uid']);?>" target="_blank" class="name" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a>：
		<span><?php echo (contentFilter($vo["content"])); ?></span>
	</p>
	<div class="cls">
		<span class="date"><?php echo (dgmdate($vo["addtime"])); ?></span>
		<p class="comment-tools">
		<?php if(($memberdata["id"])  ==  $vo['uid']): ?><a href="javascript:;" class="del" cid="<?php echo ($vo['id']); ?>">删除</a><?php endif; ?>
		</p>
	</div>
</li>