<?php if (!defined('THINK_PATH')) exit();?><?php if(is_array($talk_aboutdata)): $i = 0; $__LIST__ = $talk_aboutdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="timeline-two-col cls timeline-feed">
								<div class="feed">
									<div class="feed-content">
									<div class="share-detail">
<div class="share-user">
	<p>
		<span class="when">
			<a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" target="_blank"><?php echo (toDateYmd($vo["time"])); ?></a>
		</span>
	</p>
</div>
<div class="share-cont">
	<?php $count = count($vo['accessory']); ?>
	<?php if(($count)  >=  "1"): ?><div class="share-pic-cont">
	<?php if(($count)  <=  "2"): ?><div class="share-pic">
		<?php if(is_array($vo["accessory"])): $i = 0; $__LIST__ = $vo["accessory"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" target="_blank">
			<img src="<?php echo ($v["path"]); ?>" alt="<?php echo ($v["title"]); ?>">
			</a><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	<?php else: ?>
		<div class="share-pic">
			<a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" target="_blank">
			<img src="<?php echo ($vo["accessory"]["0"]["path"]); ?>" alt="<?php echo ($vo["accessory"]["0"]["title"]); ?>" title="">
			</a>
		</div>
		<ul class="share-pic-list cls">
		<?php if(is_array($vo["accessory"])): $i = 0; $__LIST__ = array_slice($vo["accessory"],1,count($__LIST__),true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" target="_blank">
				<img src="<?php echo ($v["thumbnail"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul><?php endif; ?>
	</div><?php endif; ?>
	<div class="share-txt">
		<?php echo ($vo["content"]); ?>
	</div>
</div>
<?php if(!empty($vo["source"])): ?><div class="quote-cont">
<div class="share-user">
	<p class="share-avatar">
		<a href="<?php echo U('User/space/id/'.$vo['source']['uid']);?>">
			<img src="$vo['source']['header']" alt="<?php echo ($vo['source']['name']); ?>" title="<?php echo ($vo['source']['name']); ?>">
		</a>
		<?php if(($vo["source"]["daren"])  ==  "1"): ?><a class="ico-approve approve-person-s" href="<?php echo U('Index/daren');?>" target="_blank" title="达人认证"></a><?php endif; ?>
	</p>
	<p>
		<strong><a href="<?php echo U('User/space/id/'.$vo['source']['uid']);?>"><?php echo ($vo['source']['name']); ?></a></strong>
	</p>
</div>
<div class="share-cont">
	<?php if(!empty($vo["source"]["accessory"])): ?><div class="share-pic-cont">
		<div class="share-pic">
			<a href="<?php echo U('Talk_about/detail/id/'.$vo['source']['id']);?>" target="_blank">
			<img src="<?php echo ($vo["source"]["accessory"]["0"]["path"]); ?>" alt="<?php echo ($vo["source"]["accessory"]["0"]["title"]); ?>">
			</a>
		</div>
	</div><?php endif; ?>
	<div class="share-txt"><?php echo ($vo["source"]["content"]); ?></div>
</div>
</div><?php endif; ?>

<div class="tools cls">
	<span <?php if(in_array(($vo["id"]), is_array($memberdata['like_ids'])?$memberdata['like_ids']:explode(',',$memberdata['like_ids']))): ?>class="current"<?php endif; ?>><a href="<?php echo U('Member/talk_aboutLike/tid/'.$vo['id']);?>" class="digg like-btn" data--ban="500" style="outline:none"><em><?php echo ($vo["likes"]); ?></em></a></span>
	<span><a class="comment-view-btn" href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" data-postid="23e110d83bdffce3ecebf02e">评论</a><b class="c-count">(<?php echo ($vo["comment"]); ?>)</b></span>
</div>
<div class="comment">
	<div class="comment-wrap" style="display:none">
		<div class="comment-post">
			<div class="txt">
				<!-- 输入内容时textarea添加class="into" -->
				<textarea placeholder="我觉得…" data-info="pid=23e110d83bdffce3ecebf02e;puid=c4e9349e0909b5c31b38045b" class="into comment-txt"></textarea>
			</div>
			<div class="submit cls">
				<!-- 备注 默认为btn-t0 输入内容时为btn-t6 -->
				<a href="javascript:;" class="comment-btn btns btn-default-20" data--ban="1000">
					<span>评论</span>
				</a>
				<a href="javascript:;" class="btn-faces">表情</a>
				<span class="penel-check-wrap"><i class="checkbox panel-checkbox"></i><span class="font">同时转发</span></span> 
			</div>
			<i class="arr-t"></i>
		</div>
		<div class="comment-list">
			<div class="loading loading-16 comm-loading">
				<i></i>正在加载，请稍候...
			</div>
			<ul>
			</ul>
			<p class="more"></p>
		</div>
	</div>
<!-- }end:操作内容 comment -->
</div>
</div>
</div>
<div class="operate-btns" data-postid="23e110d83bdffce3ecebf02e" style="display:none;">
	<a href="#" class="btn-operate btn-love likeButton" data-postid="23e110d83bdffce3ecebf02e">喜欢</a>
	<a href="javascript:;" class="btn-operate btn-comment comment-view-btn" data-postid="23e110d83bdffce3ecebf02e">评论</a>
	<div class="operate-menu operate-menu-share">
		<a href="javascript:;" class="btn-operate btn-share">分享</a>
		<div class="operate-menu-list share-operate" style="display:none;">
		<div class="tips">
			<div class="tips-t1">
				<div class="tips-content share-container">
				<div class="bd">
					<a href="javascript:;" class="op-transmit trans-btn" data-postid="23e110d83bdffce3ecebf02e">转发到站内</a>
					<a href="javascript:;" class="op-sina shareto-button-tsina" title="新浪微博">新浪微博</a>
					<a href="javascript:;" class="op-qqkj shareto-button-qzone" title="QQ空间">QQ空间</a>
					<a href="javascript:;" class="op-renren shareto-button-renren" title="人人网">人人网</a>
					<a href="javascript:;" class="op-qq shareto-button-tqq" title="腾讯微博">腾讯微博</a>
				</div>
				</div>
				<span class="sd"></span>
			</div>
		</div>
		</div>
	</div>
</div>
<span class="cue"></span>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>