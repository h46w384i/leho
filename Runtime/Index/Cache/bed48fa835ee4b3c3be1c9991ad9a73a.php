<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<title><?php if(empty($title)): ?><?php echo C("sysconfig.site_title");?><?php else: ?><?php echo ($title); ?><?php endif; ?></title>
	<meta name="title" content="<?php if(empty($title)): ?><?php echo C("sysconfig.site_title");?><?php else: ?><?php echo ($title); ?><?php endif; ?>" />
	<meta name="description" content="<?php if(empty($title)): ?><?php echo C("sysconfig.site_title");?><?php else: ?><?php echo ($title); ?><?php endif; ?>">
	<meta name="keywords" content="<?php if(empty($keywords)): ?><?php echo C("sysconfig.site_keywords");?><?php else: ?><?php echo ($keywords); ?><?php endif; ?>">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
	<link href="../Public/css/sns_bc.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="../Public/css/sns_common.css"/>
	<link href="../Public/css/panel-login.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="../Public/css/feed.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/css/feedback-box.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/css/chat.css"/>
	<script src="__PUBLIC__/dwz/js/jquery-1.7.2.min.js"></script>
	<script src="__PUBLIC__/dwz/js/jquery-ui-1.8.19.custom.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/dwz/js/jquery.ajaxupload.js" type="text/javascript"></script>
	<script src="../Public/js/baidumap_one.js" type="text/javascript"></script>
	<script src="http://api.map.baidu.com/api?v=1.3" type="text/javascript"></script>
	<script src="<?php echo U('Index/language');?>" type="text/javascript"></script>
	<script type="text/javascript">
	var ROOT = '__ROOT__';
	var APP = '__APP__';
	var URL = '__SELF__';
	var ACTION = '<?php echo constant("MODULE_NAME");?>';
	var PUBLIC = '__PUBLIC__';
	var TPL_PUBLIC = '../Public/';
	var ISCHAT = <?php echo C("sysconfig.is_open_chat");?>;
	var ICON = "../Public/images/bmarker_orange.png";
	<?php if(($memberdata["step"])  ==  "0"): ?>var first_landing = true;
	<?php else: ?>
	var first_landing = false;<?php endif; ?>
</script>
<!--[if IE 6]>
		<script src="../Public/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
		<script type="text/javascript">
		try { 
			document.execCommand('BackgroundImageCache', false, true); 
        } catch (e) {
        }
		DD_belatedPNG.fix('#header .logo img');
		</script>
<![endif]-->

<script src="../Public/js/common.js" type="text/javascript"></script>				
</head>
<body>
<div id="header">
	<noscript> 
		<div class="nojs">
			<p>您的浏览器已经禁用了脚本，这会影响您正常使用本站的功能。</p> 
		</div>
	</noscript> 
		<div class="global-header ">
		<div class="global-header-inner cls">
			<div class="left">
				<div class="logo">
					<a href="__ROOT__"><img src="__ROOT__<?php echo C("sysconfig.site_logo");?>" alt="<?php echo C("sysconfig.site_name");?>" /></a>
				</div>
				<ul class="cate-nav">
					<?php if(empty($memberdata)): ?><li class="curr"><a href="<?php echo U('Index/index');?>" class="cate-nav-home"><span>首页</span></a></li>
					<?php else: ?>
					<li class="curr">
						<a href="<?php echo U('Member/index');?>" class="cate-nav-home"><span>我的首页</span></a>
					</li><?php endif; ?>
					<li class="hover-shim "><a href="<?php echo U('Circle/detection');?>" class="cate-nav-discover"><span>发现生活<i class="ico-arrow"></i></span></a>
					<div class="down-discover">
						<div class="dropdown ">
							<ul class="sec-sort-list cls">
                                <?php if(is_array($circledata)): $i = 0; $__LIST__ = $circledata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
									<a href="<?php echo U('Circle/index/cid/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<div class="gap-line"></div>
							<ul class="sec-nav-list cls">
								<li><a href="<?php echo U('Circle/philosopher');?>">达人秀</a></li>
								<li><a href="<?php echo U('Circle/app');?>">应用中心</a></li>
								<!--<li><a href="<?php echo U('Circle/top');?>">排行榜</a></li>-->
							</ul>
						</div>
						<div class="dropdown-ft"></div>
					</div>
					</li>
					<li class="hover-shim">
						<a href="<?php echo U('Businesses/index');?>" class="cate-nav-s"><span>逛商街<i class="ico-arrow"></i></span></a>
						<div class="down-s">
							<div class="dropdown">
								<ul class="cls">
									<li><a href="<?php echo U('Businesses/lists');?>">找商家</a></li>
									<li><a href="<?php echo U('Businesses/preferential');?>">淘优惠</a></li>
								</ul>
							</div>
							<div class="dropdown-ft"></div>
						</div>
					</li>
					<li><a href="<?php echo U('Mall/index');?>" class="cate-nav-mall"><span>乐活商城<i class="ico-new"></i></span></a></li>
				</ul>
			</div>

			<div class="right">
				<div class="search" id="search">
					<form action="<?php echo U('Find/index');?>" method="get">
						<input type="text" autocomplete="off" placeholder="搜分享、人、商家..." name="keyword"/>
						<button type="submit">搜索</button>
					</form>
				</div>
				<?php if(empty($memberdata)): ?><ul class="login-nav">
					<li class="login-first-party">
						<a href="<?php echo U('User/register');?>" target="_blank">注册</a><span class="gap">|</span>
						<a href="javascript:jvfDialog('signinDialog',APP+'/User/signin');">登录</a>
					</li>
					<li class="hover-shim">
						<a href="javascript:;" class="login-third-party">第三方帐号登录<i class="ico-arrow"></i></a>
						<div class="down-third-party">
							<div class="dropdown">
								<ul class="cls">
								<?php if(is_array($login_portdata)): $i = 0; $__LIST__ = $login_portdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Login_port/index/id/'.$vo['id']);?>" target="_blank"><i class="ico-sort ico-<?php echo ($vo["remark"]); ?>"></i><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
							<div class="dropdown-ft"></div>
						</div>
					</li>
				</ul>
				<?php else: ?>
				<ul class="person">
					<li class="top-user">
						<a href="<?php echo U('User/space/id/'.$memberdata['id']);?>" class="user">
							<img src="<?php echo ($memberdata["header"]["thumbnail"]); ?>" width="20" height="20">
							<?php echo ($memberdata["name"]); ?><i class="ico-arrow"></i>
						</a>
						<div class="down-user">
							<div class="dropdown">
								<ul class="cls">
									<li>
										<a href="<?php echo U('User/space/id/'.$memberdata['id']);?>">我的时光轴</a>
									</li>
									<li><a href="<?php echo U('Member/myshare');?>">我的分享</a></li>
									<li><a href="<?php echo U('Member/buyOrderList');?>">我的订单</a></li>
									<li><a href="<?php echo U('Member/edit');?>">帐号设置</a></li>
									<li><a href="<?php echo U('User/logout');?>">退出</a></li>
								</ul>
							</div>
							<div class="dropdown-ft"></div>
						</div>
					</li>
					<li class="top-mess">
						<a href="javascript:;" class="mess">消息<i class="ico-arrow"></i></a>
						<div class="gl-top-tips" id="notify_layer">
							<div class="dropdown" id="top-mess-layer"><ul class="tips-nav cls">
		<li><a href="<?php echo U('Member/comment');?>">查看评论</a></li>
			<li><a href="<?php echo U('Member/at');?>">查看@我</a></li>
			<li><a href="<?php echo U('Member/liked');?>">查看喜欢</a></li>
	</ul></div>
							<div class="dropdown-ft"></div>
						</div>
					</li>
					<li class="top-share" id="top-share"><a href="javascript:;" class="share" onclick="jvfDialog('sharebox', APP+'/Member/sharebox');"><i class="ico-share"></i>发布</a></li>
				</ul><?php endif; ?>
							</div>
			<?php if(empty($memberdata)): ?><div class="header-unlogin" <?php if((MODULE_NAME)  !=  "Index"): ?>style="display: none;"<?php endif; ?>>
				<div class="header-unlogin-txt">
					<p class="desc-tit"><?php echo C("sysconfig.site_name");?> 找<em>靠谱</em></p>
					<p class="desc-txt">有品质！有快乐！有生活！</p>
				</div>
				<a href="<?php echo U('Login_port/index/id/1');?>" target="_blank" class="header-unlogin-sina" title="新浪微博登录">新浪微博登录</a>
				<a href="<?php echo U('Login_port/index/id/5');?>" target="_blank" class="header-unlogin-qq" title="QQ帐号登录">QQ帐号登录</a>
			</div><?php endif; ?>
					</div>
	</div>
	</div>
<link rel="stylesheet" type="text/css" href="../Public/css/post.css"/>
<script>
$(document).ready(function(){
	$('.likeButton,.like-btn').click(function(){
		var span = $('.like-btn').parent();
		var button = $('.likeButton');
		var url = $(this).attr('href');
		$.getJSON(url,function(data){
			//t.tip(data.info,2000);
			if(data.status==1){
				var like = $('.like-btn em');
				if(!span.is('.current')){
					button.removeClass('btn-love').addClass('btn-loved');
					span.addClass('current');
					like.text(parseInt(like.html())+1);
				}else{
					button.removeClass('btn-loved').addClass('btn-love');
					span.removeClass('current');
					like.text(parseInt(like.html())-1);
				}
			}
		});
		return false;
	});
	
	$('.operate-menu-share').hover(function(){
		$(this).find('.operate-menu-list').show();
	},function(){
		$(this).find('.operate-menu-list').hide();
	});
	
	$('.share-operate .jvf_shareto').live('click',function(){
		var href = $(this).attr('href');
		window.open(href,'','height=400,width=650,top=300,left=500,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no');
	});
	
	$('.trans-btn').live('click',function(){
		var tid = $(this).attr('tid');
		jvfDialog(guid(), APP+'/Member/forwarding/tid/'+tid);
	});
	
	$('.cmt-reply').live('click',function(){
		var t = $(this);
		var div = t.parents('li.cls').find('.comment-post');
		if(div.is(':hidden')){
			var content = div.find('textarea[name="content"]');
			if(!content.val()){
				content.val('回复@'+t.attr('data-info')+':');
				commentNum(content);
			}
			div.show();
		}else{
			div.hide();
		}
	});
	
	$('.comment-tools .del').live('click',function(){
		var t = $(this);
		var li = t.parents('li');
		var cid = t.attr('cid');
		$.getJSON(APP+'/Member/comment_del/id/'+cid,function(data){
			if(data.status == 1){
				li.fadeOut(function(){
					li.remove();
				});
			}else{
				t.tip(data.info);
			}
		});
	});
	
	$('.comment_form .comment-btn').live('click',function(){
		var t = $(this);
		var form = t.parents('.comment_form');
		var para = form.serialize();
		if(t.is('.btn-t6')){
			$.post(APP+'/Member/doTalk_about_comment',para,function(data){
				if(data.status == 1){
					$.get(APP+'/Talk_about/getCommentOne/id/'+data.info,function(data){
						$('.comment-list ul').prepend(data);
					});
					var content = form.find('textarea[name="content"]');
					content.val('');
					commentNum(content);
				}else{
					t.tip(data.info,2000);
				}
			},'json');
		}
	});
	
	$('.comment_form .btn-faces').qqFace('.comment_form',function(t){
		commentNum(t);
	},'textarea[name="content"]');
	
	$('.comment_form textarea[name="content"]').live('keyup',function(e){
		var t = $(this);
		commentNum(t);
	});
	
	$('.comment_form .panel-checkbox').live('click',function(){
		var t = $(this);
		var input = t.siblings('input[name="panel-checkbox"]');
		if(t.is('.checkbox')){
			t.removeClass('checkbox').addClass('checked');
			input.val(1);
		}else{
			t.removeClass('checked').addClass('checkbox');
			input.val(0);
		}
	});
	
	function commentNum(t){
		var form = t.parents('.comment_form');
		var submitbtn = form.find('.comment-btn');
		var num = getLength(t.val());
		var textNum = 140 - num;
		if(textNum < 0){
			submitbtn.removeClass('btn-t6').addClass('btn-default-20');
		}else{
			submitbtn.removeClass('btn-default-20').addClass('btn-t6');
		}
		if(num <=0){
			submitbtn.removeClass('btn-t6').addClass('btn-default-20');
		}
	}
});
</script>

<div id="wrapper">

<div id="bd" class="bb-t4">
	<div id="main">
		<div class="inner">
			<div class="post-detail">
				<div class="feed">
					<div class="feed-content">
						<div class="share-detail">
							<div class="share-user">
								<p class="share-avatar">
									<a href="<?php echo U('User/space/id/'.$talk_aboutdata['uid']);?>"><img src="<?php echo ($talk_aboutdata["header"]); ?>" alt="<?php echo ($talk_aboutdata["name"]); ?>"></a>
								</p>
								<p>
									<strong><a target="_blank" href="<?php echo U('User/space/id/'.$talk_aboutdata['uid']);?>"><?php echo ($talk_aboutdata["name"]); ?></a></strong>
									<?php if(($talk_aboutdata["daren"])  ==  "1"): ?><a class="ico-approve approve-person-s" href="<?php echo U('Index/daren');?>" target="_blank" title="达人认证"></a><?php endif; ?>
								</p>
								<p>
									<span class="when">
										<?php echo (dgmdate($talk_aboutdata["addtime"])); ?>
									</span>
								</p>
							</div>
							<div class="share-cont">
																														<div class="share-pic-cont">
							<?php if(is_array($talk_aboutdata["accessory"])): $i = 0; $__LIST__ = $talk_aboutdata["accessory"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="share-pic">
								<a href="<?php echo ($vo["origin"]); ?>" target="_blank"><img class="share-img" src="<?php echo ($vo["origin"]); ?>"></a>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
							<?php if(is_array($talk_aboutdata["source"]["accessory"])): $i = 0; $__LIST__ = $talk_aboutdata["source"]["accessory"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="share-pic">
								<a href="<?php echo ($vo["origin"]); ?>" target="_blank"><img class="share-img" src="<?php echo ($vo["origin"]); ?>"></a>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				<?php if(!empty($talk_aboutdata["source"]["content"])): ?><div class="share-txt">
					<a href="<?php echo U('/User/space/id/'.$talk_aboutdata['source']['uid']);?>"><?php echo ($talk_aboutdata['source']['name']); ?></a>:<?php echo ($talk_aboutdata["source"]["content"]); ?>
				</div><?php endif; ?>
				<div class="share-txt">
					<?php echo ($talk_aboutdata["content"]); ?>
				</div>
				<?php if(!empty($talk_aboutdata["place"])): ?><div style="line-height:28px;">
					<i class="jvf_place fl"></i>&nbsp;&nbsp;<?php echo ($talk_aboutdata["place"]); ?>
				</div><?php endif; ?>
				<?php if(!empty($talk_aboutdata["price"])): ?><div style="line-height:28px;">
					<i class="jvf_yen fl"></i>&nbsp;&nbsp;<?php echo ($talk_aboutdata["price"]); ?>元
				</div><?php endif; ?>
		<ul class="share-info">
					</ul>
																								</div>
							<div class="tools cls">
								<span <?php if(in_array(($talk_aboutdata["id"]), is_array($memberdata['like_ids'])?$memberdata['like_ids']:explode(',',$memberdata['like_ids']))): ?>class="current"<?php endif; ?>><a href="<?php echo U('Member/talk_aboutLike/tid/'.$talk_aboutdata['id']);?>" class="digg like-btn"><em><?php echo ($talk_aboutdata["likes"]); ?></em></a></span>
								<span><a href="javascript:void(0);" class="comment-view-btn">评论</a><b class="c-count">(<?php echo ($talk_aboutdata["comment"]); ?>)</b></span>
								<span><a href="javascript:void(0);" class="trans-btn" tid="<?php echo ($talk_aboutdata['tid']?$talk_aboutdata['tid']:$talk_aboutdata['id']); ?>">转发</a><b>(<?php echo ($talk_aboutdata["forwarding"]); ?>)</b></span>
							</div>
							<div class="comment" id="comment_container" style="display: block; ">
								<div class="comment-post">
								<form class="comment_form">
									<input type="hidden" name="tid" value="<?php echo ($talk_aboutdata["id"]); ?>" />
									<div class="txt">
										<textarea placeholder="我觉得…" class="into comment-txt" name="content"></textarea>
									</div>
									<div class="submit cls">
										<a href="javascript:;" class="comment-btn btns btn-default-20">
											<span>评论</span>
										</a>
										<a href="javascript:;" class="btn-faces">表情</a>
										<span class="penel-check-wrap publish"><i class="checkbox panel-checkbox" style="display:inline-block;"></i><span class="font">同时转发</span></span>
									</div>
									<i class="arr-t"></i>
								</form>
								</div>
								<div class="comment-list">
									<ul>
									<?php if(is_array($commentdata)): $i = 0; $__LIST__ = $commentdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
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
<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
								<div class="global-page"><?php echo ($page); ?></div>							</div>
						</div>
						<div class="fix-operate-btns" style="top: 60px;">
							<div class="operate-btns">
																		<a href="<?php echo U('Member/talk_aboutLike/tid/'.$talk_aboutdata['id']);?>" class="likeButton btn-operate <?php if(in_array(($talk_aboutdata["id"]), is_array($memberdata['like_ids'])?$memberdata['like_ids']:explode(',',$memberdata['like_ids']))): ?>btn-loved<?php else: ?>btn-love<?php endif; ?>">喜欢</a>
																		<div class="operate-menu operate-menu-share">
										<a href="javascript:;" class="btn-operate btn-share">分享</a>
										<div class="operate-menu-list share-operate" style="display: none; ">
											<div class="tips">
												<div class="tips-t1">
													<div class="tips-content share-container">
														<div class="bd">
															<?php $ref_urllink = HOST.U('Member/talk_aboutLike/tid/'.$talk_aboutdata['id']);
														$ref_name = C('sysconfig.site_title');
														$ref_pic = HOST.$talk_aboutdata['accessory'][0]['thumbnail']; ?>
														<a href="javascript:;" class="op-transmit trans-btn" tid="<?php echo ($talk_aboutdata['tid']?$talk_aboutdata['tid']:$talk_aboutdata['id']); ?>">转发到站内</a>
														<a href="http://v.t.sina.com.cn/share/share.php?url=<?php echo ($ref_urllink); ?>&title=<?php echo ($ref_name); ?>&pic=<?php echo ($ref_pic); ?>" onclick="return false;" class="op-sina shareto-button-tsina jvf_shareto"	title="新浪微博">新浪微博</a>
														<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo ($ref_urllink); ?>&amp;title=<?php echo ($ref_name); ?>&amp;pics=<?php echo ($ref_pic); ?>" onclick="return false;" class="op-qqkj shareto-button-qzone jvf_shareto" title="QQ空间">QQ空间</a>
														<a href="http://share.renren.com/share/buttonshare.do?link=<?php echo ($ref_urllink); ?>&title=<?php echo ($ref_name); ?>" onclick="return false;" class="op-renren shareto-button-renren jvf_shareto" title="人人网">人人网</a>
														<a href="http://v.t.qq.com/share/share.php?title=<?php echo ($ref_name); ?>&url=<?php echo ($ref_urllink); ?>&pic=<?php echo ($ref_pic); ?>" onclick="return false;" class="op-qq shareto-button-tqq jvf_shareto" title="腾讯微博">腾讯微博</a>
														</div>
													</div>
													<span class="sd"></span>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="aside">
					<div class="side-con cls">
			<div class="post-wrap">
				<div class="title cls">
					<h3><a href="<?php echo U('User/space/id/'.$talk_aboutdata['uid']);?>"><?php echo ($talk_aboutdata["name"]); ?></a>
					<?php if(($talk_aboutdata["daren"])  ==  "1"): ?><a class="ico-approve approve-person-s" href="<?php echo U('Index/daren');?>" target="_blank" title="达人认证"></a><?php endif; ?>
					的分享
                    </h3>
					<a target="_blank" href="<?php echo U('User/space/id/'.$talk_aboutdata['uid']);?>" class="right-a">更多</a>
				</div>
				<div class="cls">
					<ul class="pic-list post-pic cls" id="more_post">
					<?php if(is_array($tadata)): $i = 0; $__LIST__ = $tadata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
								<div class="pic-wrap">
								<?php if(!empty($vo["accessory"])): ?><a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>"><img src="<?php echo ($vo["accessory"]["0"]["thumbnail"]); ?>" width="85" height="85"></a><?php endif; ?>
								<?php if(!empty($vo["source"]["accessory"])): ?><a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['source']['id']);?>"><img src="<?php echo ($vo["source"]["accessory"]["0"]["thumbnail"]); ?>" width="85" height="85"></a><?php endif; ?>
								</div>
								<div class="con-wrap cls">
									<p><?php echo (msubstr($vo["content"],0,20)); ?><a target="_blank" href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>">查看全部</a></p>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
							</div>
		</div>
</div>
</div>
	</div>
<div id="footer">
	<div class="global-footer">
	<div class="global-footer-inner">
		<?php if(is_array($footerArticle)): $i = 0; $__LIST__ = $footerArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><dl class="list">
			<dt><?php echo ($vo["name"]); ?></dt>
			<?php if(is_array($vo["article"])): $i = 0; $__LIST__ = $vo["article"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo U('Help/index/id/'.$v['id']);?>" target="_blank"><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
		</dl><?php endforeach; endif; else: echo "" ;endif; ?>
		<dl class="list last">
			<dt>服务支持</dt>
			<dd class="serves serve-2"><a href="#" target="_blank">在线沟通<span>&gt;&gt;</span></a><i>（<?php echo C("sysconfig.site_work_times");?>）</i></dd>
			<dd class="serves serve-3">服务热线：<?php echo C("sysconfig.site_services_tel");?><i>（<?php echo C("sysconfig.site_work_times");?>）</i></dd>
			<dd class="serves serve-4">客服邮箱：<?php echo C("sysconfig.site_services_email");?></dd>
		</dl>
	</div>
</div><div class="copyright">
	<div class="copyright-inner">
		<p class="copyright-url">
		<?php if(is_array($footernav)): $i = 0; $__LIST__ = $footernav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($vo["url"]); ?>" <?php if(($vo["isblank"])  ==  "1"): ?>target="_blank"<?php endif; ?> ><?php echo ($vo["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		</p>
		<div class="copyright-info">
			<p>
				<span><?php echo C("sysconfig.site_powerby");?></span>
				<a href=http://www.miibeian.gov.cn target="_blank"><?php echo C("sysconfig.site_beian");?></a>
			</p>
			<p><?php echo C("sysconfig.site_tongji");?></p>
		</div>
	</div>
</div>
</div>