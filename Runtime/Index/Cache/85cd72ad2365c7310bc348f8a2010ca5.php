<?php if (!defined('THINK_PATH')) exit();?><script>
$(function(){
	interestBox();
});
</script>
<div class="interest-panel" title="添加兴趣">
	<div class="panel-content">
		<div class="bd">
			<p class="explain">选择你喜欢的兴趣，成功关注后就可以看到相关精彩内容！</p>
						<ul class="interest-nav">
						<?php if(is_array($share)): $i = 0; $__LIST__ = $share;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><li><a href="#" onclick="return false" data-num="1" class="nav1 interest-tab"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
			<div class="interest-tags">
						<?php if(is_array($share)): $i = 0; $__LIST__ = $share;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><ul class="interest-tag-list cls" <?php if(($i)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
								<?php if(is_array($v["share"])): $i = 0; $__LIST__ = $v["share"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li class="interest-tag <?php if(in_array(($vo["id"]), is_array($iids)?$iids:explode(',',$iids))): ?>selected<?php endif; ?>" data-interest_id="8c1464019818e619fa7a33fb" data--ban="500" lid="<?php echo ($vo["id"]); ?>"><a href="#" onclick="return false"><span><?php echo ($vo["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="ft">
			<a href="#" onclick="return false" class="interest-close"></a>
		</div>
	</div>
</div>