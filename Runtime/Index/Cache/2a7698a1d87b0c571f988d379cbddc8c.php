<?php if (!defined('THINK_PATH')) exit();?><?php if(empty($talk_aboutdata)): ?><div style="width:600px;" id="like_space" class="block-space jvf_pubu">
			<div class="index-space">
				<i></i>这里空空如也、寸草不生、空无一物、人去楼空、总之什么都没有！！
			</div>
	</div>
<?php else: ?>
<?php if(is_array($talk_aboutdata)): $i = 0; $__LIST__ = $talk_aboutdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="block-feed jvf_pubu">
	<div class="bd">
		<div class="operate-btns" style="display: none;">
        	<div class="operate-menu operate-menu-share">
				<a href="javascript:;" class="btn-operate btn-share">分享</a>
				<div class="operate-menu-list share-operate" style="display: none">
					<div class="tips">
						<div class="tips-t1">
							<div class="tips-content share-container">
								<div class="bd">
									<?php $ref_urllink = HOST.U('Talk_about/detail/id/'.$vo['id']);
									$ref_name = C('sysconfig.site_title');
									$ref_pic = HOST.$vo['accessory'][0]['thumbnail']; ?>
									<a href="javascript:;" class="op-transmit trans-btn" tid="<?php echo ($vo['tid']?$vo['tid']:$vo['id']); ?>">转发到站内</a>
									<a href="http://v.t.sina.com.cn/share/share.php?url=<?php echo ($ref_urllink); ?>&title=<?php echo ($ref_name); ?>&pic=<?php echo ($ref_pic); ?>"  class="op-sina shareto-button-tsina jvf_shareto"	onclick="return false;" title="新浪微博">新浪微博</a>
									<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo ($ref_urllink); ?>&amp;title=<?php echo ($ref_name); ?>&amp;pics=<?php echo ($ref_pic); ?>" onclick="return false;"  class="op-qqkj shareto-button-qzone jvf_shareto" title="QQ空间">QQ空间</a>
									<a href="http://share.renren.com/share/buttonshare.do?link=<?php echo ($ref_urllink); ?>&title=<?php echo ($ref_name); ?>"  class="op-renren shareto-button-renren jvf_shareto" onclick="return false;"  title="人人网">人人网</a>
									<a href="http://v.t.qq.com/share/share.php?title=<?php echo ($ref_name); ?>&url=<?php echo ($ref_urllink); ?>&pic=<?php echo ($ref_pic); ?>"  class="op-qq shareto-button-tqq jvf_shareto" onclick="return false;" title="腾讯微博">腾讯微博</a>
								</div>
							</div>
							<span class="sd"></span>
						</div>
					</div>
				</div>
			</div>
			<a href="javascript:;" class="btn-operate btn-comment" tid="<?php echo ($vo["id"]); ?>">评论</a>
            <a href="<?php echo U('Member/talk_aboutLike/tid/'.$vo['id']);?>" onclick="return false" class="btn-operate <?php if(in_array(($vo["id"]), is_array($memberdata['like_ids'])?$memberdata['like_ids']:explode(',',$memberdata['like_ids']))): ?>btn-loved<?php else: ?>btn-love<?php endif; ?> like-btn">喜欢</a>
			
		</div>
		<?php if(!empty($vo["accessory"])): ?><div class="pic-wrap">
			<?php $count = count($vo['accessory']); ?>
			<?php if(($count)  <=  "2"): ?><?php if(is_array($vo["accessory"])): $i = 0; $__LIST__ = $vo["accessory"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><div class="explain-wrap">
				<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>"> 
				<img src="<?php echo ($v["thumbnail"]); ?>"	alt="<?php echo ($v["title"]); ?>" height="<?php echo ($v["thumbnail_height"]); ?>">
				</a>
				<div class="explain" data-h="44" style="height: 0">
					<p><?php echo ($v["title"]); ?></p>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php else: ?>
			
			<div class="explain-wrap">
				<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>"> 
				<img src="<?php echo ($vo["accessory"]["0"]["thumbnail"]); ?>"	alt="<?php echo ($vo["accessory"]["0"]["title"]); ?>" height="<?php echo ($vo["accessory"]["0"]["thumbnail_height"]); ?>">
				</a>
				<div class="explain" data-h="44" style="height: 0">
					<p><?php echo ($vo["accessory"]["0"]["title"]); ?></p>
				</div>
			</div>
			
			<ul class="pic-small cls">
				<li class="fl">
					<div class="explain-wrap">
						<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>"> 
						<img src="<?php echo ($vo["accessory"]["1"]["thumbnail"]); ?>"	alt="<?php echo ($vo["accessory"]["1"]["title"]); ?>" height="<?php echo ($vo["accessory"]["1"]["thumbnail_height"]); ?>">
						</a>
						<div class="explain" data-h="44" style="height: 0">
							<p><?php echo ($vo["accessory"]["1"]["title"]); ?></p>
						</div>
					</div>
				</li>
				<li class="fr">
					<div class="explain-wrap">
						<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>"> 
						<img src="<?php echo ($vo["accessory"]["2"]["thumbnail"]); ?>"	alt="<?php echo ($vo["accessory"]["2"]["title"]); ?>" height="<?php echo ($vo["accessory"]["2"]["thumbnail_height"]); ?>">
						</a>
						<div class="explain" data-h="44" style="height: 0">
							<p><?php echo ($vo["accessory"]["2"]["title"]); ?></p>
						</div>
					</div>
				</li>
			</ul>
			<?php if(($count)  >  "3"): ?><div class="pic-more cls">
				<a target="_blank"
					href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>">查看全部<?php echo ($count); ?>张图片</a>
			</div><?php endif; ?><?php endif; ?>
		</div><?php endif; ?>
		
		<?php if(!empty($vo["source"]["accessory"])): ?><div class="pic-wrap">
			<?php $count = count($vo['source']['accessory']); ?>
			<?php if(($count)  <=  "2"): ?><?php if(is_array($vo["source"]["accessory"])): $i = 0; $__LIST__ = $vo["source"]["accessory"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><div class="explain-wrap">
				<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['source']['id']);?>"> 
				<img src="<?php echo ($v["thumbnail"]); ?>"	alt="<?php echo ($v["title"]); ?>" height="<?php echo ($v["thumbnail_height"]); ?>">
				</a>
				<div class="explain" data-h="44" style="height: 0">
					<p><?php echo ($v["title"]); ?></p>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php else: ?>
			
			<div class="explain-wrap">
				<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['source']['id']);?>"> 
				<img src="<?php echo ($vo["source"]["accessory"]["0"]["thumbnail"]); ?>"	alt="<?php echo ($vo["source"]["accessory"]["0"]["title"]); ?>" height="<?php echo ($vo["source"]["accessory"]["0"]["thumbnail_height"]); ?>">
				</a>
				<div class="explain" data-h="44" style="height: 0">
					<p><?php echo ($vo["source"]["accessory"]["0"]["title"]); ?></p>
				</div>
			</div>
			
			<ul class="pic-small cls">
				<li class="fl">
					<div class="explain-wrap">
						<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['source']['id']);?>"> 
						<img src="<?php echo ($vo["source"]["accessory"]["1"]["thumbnail"]); ?>"	alt="<?php echo ($vo["source"]["accessory"]["1"]["title"]); ?>" height="<?php echo ($vo["source"]["accessory"]["1"]["thumbnail_height"]); ?>">
						</a>
						<div class="explain" data-h="44" style="height: 0">
							<p><?php echo ($vo["source"]["accessory"]["1"]["title"]); ?></p>
						</div>
					</div>
				</li>
				<li class="fr">
					<div class="explain-wrap">
						<a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['source']['id']);?>"> 
						<img src="<?php echo ($vo["source"]["accessory"]["2"]["thumbnail"]); ?>"	alt="<?php echo ($vo["source"]["accessory"]["2"]["title"]); ?>" height="<?php echo ($vo["source"]["accessory"]["2"]["thumbnail_height"]); ?>">
						</a>
						<div class="explain" data-h="44" style="height: 0">
							<p><?php echo ($vo["source"]["accessory"]["2"]["title"]); ?></p>
						</div>
					</div>
				</li>
			</ul>
			<?php if(($count)  >  "3"): ?><div class="pic-more cls">
				<a target="_blank"
					href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>">查看全部<?php echo ($count); ?>张图片</a>
			</div><?php endif; ?><?php endif; ?>
		</div><?php endif; ?>


		<div class="share-content">
			<?php if(!empty($vo["source"])): ?><strong>
					<a target="_blank"	href="<?php echo U('User/space/id/'.$vo['source']['uid']);?>" title="<?php echo ($vo["source"]["name"]); ?>"><?php echo ($vo["source"]["name"]); ?></a>
				</strong>:<?php echo ($vo["source"]["content"]); ?>
			<?php else: ?>
				<?php echo ($vo["content"]); ?><?php endif; ?>
		</div>

		<div class="data-block tools">
			<span class="like like-num"><?php echo ($vo["likes"]); ?></span><span class="other-data">
			
			<em><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" style="color: #999;">详细</a></em>
			<span class="dot"></span>
			<em><i class="c-count"><?php echo ($vo["comment"]); ?></i>评论</em><span class="dot"></span><em><?php echo ($vo["forwarding"]); ?>转发</em></span>
		</div>
		<div class="user-block transmit cls">
			<div class="user-photo">
				<a target="_blank"
					href="<?php echo U('User/space/id/'.$vo['uid']);?>">
					<img src="<?php echo ($vo["header"]); ?>" title="<?php echo ($vo["name"]); ?>" width="30"></a>
			</div>
			<div class="user-info" title="<?php echo ($vo["name"]); ?>">
				<strong>
				<a target="_blank" href="<?php echo U('User/space/id/'.$vo['uid']);?>"
					title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></strong>
					<?php if(($vo["daren"])  ==  "1"): ?><a class="ico-approve approve-person-s"	href="<?php echo U('Index/daren');?>" target="_blank" title="乐活达人认证"></a><?php endif; ?>
					<?php if(!empty($vo["source"])): ?>：<?php echo ($vo["content"]); ?><?php endif; ?>
			</div>
		</div>
		<div class="comment mini-comment" style="display: none">
			<!--{start: 评论框与评论列表 -->
			<div class="comment-list cls">
				<div class="loading loading-16 comm-loading">
					<i></i>正在加载，请稍候...
				</div>
				<ul></ul>
				<p class="more"></p>
			</div>
			<div class="comment-post">
				<a target="_blank"
					href="{:U('User/space/id/'.$memberdata['id'])}"
					class="head"><img
					src="<?php echo ($memberdata["header"]["thumbnail"]); ?>" width="30"></a>
				<div class="comment-textarea" style="display: block">
				<form class="comment_form">
					<input type="hidden" name="tid" value="<?php echo ($vo["id"]); ?>" />
					<div class="txt">
						<textarea placeholder="我觉得…"	class="into comment-txt" name="content" ></textarea>
					</div>
					<div class="submit cls">
						<a href="javascript:;" class="comment-btn btns btn-default-20"
							data--ban="100"><span>评论</span></a>
							<a href="javascript:;" class="btn-faces">表情</a>
							<span class="penel-check-wrap">
							<i class="checkbox panel-checkbox"></i>
							<input type="hidden" value="0" name="panel-checkbox">
							<span class="font">同时转发</span>
							</span>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</a>
</div><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>