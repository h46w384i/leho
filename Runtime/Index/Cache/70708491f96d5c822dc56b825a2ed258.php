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
<link rel="stylesheet" type="text/css" href="../Public/css/profile.css"/>
<style type="text/css">
.fixed_elem { position: fixed; top: 40px;}
#changeskinbtn { display: none; }
#promptskin { display: none; }
.comment { display: none; }
.panel-integral { display: none; }
</style>
<script>
	$(function(){
		var section = $('.timeline-section:first');
		layout(section);
		
		$('.timeline-capsule-hd-tit em').click(function(){
			var t = $(this);
			t.hide();
			var section = t.parents('.timeline-section');
			layout(section);
		});
		$('.timeline-scrubber .month').click(function(){
			var t = $(this);
			var time = t.attr('data-time');
			var section = $('.timeline-section[data-time="'+time+'"]');
			var top = section.offset().top;
			$('html,body').animate({scrollTop:top});
		});


        $('.likeButton,.like-btn').live('click',function(){
            var span = $(this).parent();
            var button = $(this);
            var url = $(this).attr('href');
            $.getJSON(url,function(data){
                //t.tip(data.info,2000);
                if(data.status==1){
                    var like = span.find('.like-btn em');
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
		
	});
	function layout(section){
		var month = section.attr('data-time');
		$.getJSON(APP+'/User/axis_item/uid/<?php echo ($userdata["id"]); ?>/month/'+month,function(data){
			if(data.status == 1){
				var html = $(data.info);
				html.hide();
				section.find('.timeline-capsule').append(html);
				html.filter('.timeline-two-col').each(function(){
					var pre = $(this).prev();
					var pre_top = pre.offset().top + pre.outerHeight();
					var pre_pre = pre.prev();
					var pre_pre_top = pre_pre.offset().top + pre_pre.outerHeight();
					if(pre_pre_top > pre_top){
						$(this).addClass('right-col');
					}else{
						$(this).addClass('left-col');
					}
					$(this).show();
				});
			}
		});
	}
</script>
<div id="wrapper">
	<div id="bd" class="bb-t2">
		<div id="main">
			<div class="inner">
				<div class="column-personal">
					<script>
	$(function(){
		$('#change-cover-btn').click(function(){
			var box = $('#change-cover-layer');
			if(box.is(':hidden')){
				box.show();
			}else{
				box.hide();
			}
		});
		
		$('#change-cover-layer .tips-close').click(function(){
			$('#change-cover-layer').hide();
		});
		
		$('.pic-wrap .re_img').click(function(){
			var t = $(this);
			var src = t.attr('rel');
			$('.pic-wrap .re_img').removeClass('selected');
			t.addClass('selected');
			$('#cover_wrap_img img').attr('src',src);
		});
		
		$('#cover_save').click(function(){
			var t = $(this);
			var id = $('.pic-wrap .re_img.selected').attr('fid');
			$.getJSON(APP+'/Member/setFront_cover/id/'+id,function(data){
				if(data.status == 1){
					$('#change-cover-layer .tips-close').trigger('click');
				}else{
					t.tip(data.info,2000);
				}
			});
		});
		
		$('.photo').hover(function(){
			$(this).find('.photo-upload').show();
		},function(){
			$(this).find('.photo-upload').hide();
		});
		
		$('#nav li').click(function(){
			var href = $(this).attr('data-href');
			goUrl(href);
		});

        $('.btn-invite').click(function(){
            $('#invitebox').dialog({
                modal: true,
                resizable:false,
                width:700
            });
        });
	});
</script>
<div class="personal-profile-section">
	<div class="cover-img">
		<div id="cover_wrap_img" class="cover-wrap-img">
			<img src="<?php echo ($front_coverdata["logo"]["origin"]); ?>">
		</div>
		<?php if(($userdata["id"])  ==  $memberdata['id']): ?><a href="javascript:;" id="change-cover-btn" class="btn-change"><span><i></i>更改封面</span></a>
		<a href="javascript:;" class="btn-invite"><span>邀请好友</span></a>
		<div class="prompt">为你的个人主页挑选一张独特的封面吧！</div><?php endif; ?>
			</div>
    <div class="panel-invite" id="invitebox" style="display: none;">
    <div class="wrap">
        <ul class="content">
            <li class="txt">邀请他人加入<?php echo C("sysconfig.site_name");?></li>
            <li>
                <span id="emptyhint-10005" class="emptyhint">邀请链接</span><input type="text" class="add-mail" value="<?php echo HOST.U('Index/invite') ?>">
            </li>
            <em style=""></em>
        </ul>
    </div>
    </div>
	<div class="profile-personal cls">
		<div class="profile-pic cls">
			<div class="photo">
				<a href="<?php echo U('User/space/id/'.$userdata['id']);?>">
					<img src="<?php echo ($userdata["header"]["path"]); ?>" alt="<?php echo ($userdata["name"]); ?>" title="<?php echo ($userdata["name"]); ?>" width="120" height="120">
				</a>
				<?php if(($userdata["id"])  ==  $memberdata['id']): ?><div class="photo-upload" style="display:none"><em class="ico-photo"></em>
					<a title="修改头像" alt="修改头像" href="<?php echo U('Member/avatar');?>">修改头像</a>
				</div><?php endif; ?>
			</div>
			
						<div class="actions">
									<?php if(($userdata["id"])  !=  $memberdata['id']): ?><a href="<?php echo U('Member/attention/id/'.$userdata['id']);?>" class="btn-follow-26-add add-follow guanzhu"><span>加关注</span></a><?php endif; ?>
			</div>
			            			<h2><a href="<?php echo U('User/space/id/'.$userdata['id']);?>" class="name"><?php echo ($userdata["name"]); ?></a>
            						<?php if(($userdata["daren"])  ==  "1"): ?><a class="ico-approve approve-person-b" href="<?php echo U('Index/daren');?>" target="_blank" title="达人认证"></a>
									<?php if(!empty($userdata["daren_explain"])): ?><span class="auth">(<?php echo ($userdata["daren_explain"]); ?>)</span><?php endif; ?><?php endif; ?>
                        			</h2>
		</div>
		<ul class="profile-info">
			<li>
			<?php if(($userdata["sex"])  ==  "1"): ?><em class="ico-sex-b"></em><?php endif; ?>
            <?php if(($userdata["sex"])  ==  "2"): ?><em class="ico-sex-g"></em><?php endif; ?>
                <?php echo ($userdata["address"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
									<?php echo (date('Y年m月d日',$userdata["birthday"])); ?>
				            </li>
			<li class="profile-info-total"> 积分<em><?php echo ($userdata["value"]); ?></em></li>
			<li title="">
			<?php if(($userdata["id"])  ==  $memberdata['id']): ?><a href="<?php echo U('Member/edit');?>" title="修改" class="modify-data"><span>修改</span></a><?php endif; ?>
			</li>
		</ul>
	<ul id="nav" class="profile-nav-list cls">
		<li data-href="<?php echo U('User/space/id/'.$userdata['id']);?>" class="share <?php if((ACTION_NAME)  ==  "space"): ?>curr<?php endif; ?>">分享<em class="count"><?php echo ($userdata["talk_about"]); ?></em></li>
		<li data-href="<?php echo U('User/like/id/'.$userdata['id']);?>" class="like <?php if((ACTION_NAME)  ==  "like"): ?>curr<?php endif; ?>">喜欢<em class="count"><?php echo ($userdata["like"]); ?></em></li>
		<li data-href="<?php echo U('User/attention/id/'.$userdata['id']);?>" class="follow <?php if((ACTION_NAME)  ==  "attention"): ?>curr<?php endif; ?>">关注<em class="count"><?php echo ($userdata["attention"]); ?></em></li>
		<li data-href="<?php echo U('User/wasAttention/id/'.$userdata['id']);?>" class="fans <?php if((ACTION_NAME)  ==  "wasAttention"): ?>curr<?php endif; ?>">观众<em class="count"><?php echo ($userdata["was_attention"]); ?></em></li>
	</ul>
	</div>
	<div class="cover-img-set cover-img-change tips" id="change-cover-layer" style="z-index: 1000; display: none; ">
				<div class="tips-t1">
					<div class="tips-content">
						<div class="hd">
							<ul class="upload-tab cls">
								<li class="curr"><a href="javascript:;">推荐配图</a></li>
							</ul>
						</div>
						<div class="temp-panel">
							<div class="bd" id="pic-con">
								<div class="temp-list cls">
									<div class="pic-wrap">
									<?php if(is_array($coverdata)): $i = 0; $__LIST__ = $coverdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a class="re_img <?php if(($front_coverdata["id"])  ==  $vo['id']): ?>selected<?php endif; ?>" fid="<?php echo ($vo["id"]); ?>" rel="<?php echo ($vo["logo"]["origin"]); ?>" href="javascript:;"><img width="100" height="62" src="<?php echo ($vo["logo"]["thumbnail"]); ?>" alt=""><p><?php echo ($vo["name"]); ?></p></a><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div>
							</div>
							<div class="ft">
								<a href="javascript:;" data-imid="49a9bf4eddb1340e96c5c8ba" id="cover_save" class="btns btn-t2"><span>保存</span></a>
								<a href="javascript:;" id="cover_cancel" class="btn-cancel btns btn-t4"><span>取消</span></a>
							</div>
						</div>
					</div>
					<span class="cue"></span>
					<span class="sd"></span>
					<span class="tips-close"></span>
				</div>
			</div>
	</div>
					<div class="timeline-tab-content">
						<div class="timeline-section" data-time="<?php echo ($first); ?>">
							<div class="timeline-capsule cls" id="currentMonthContainer">
								<div class="timeline-two-col left-col"></div>
								<div class="timeline-two-col right-col">
									<div class="feed">
										<div class="feed-content">
											<dl class="trends-list">
												<dt>
												<strong><?php echo ($userdata["name"]); ?></strong>的最新动态
												</dt>
												<?php if(is_array($member_feeddata)): $i = 0; $__LIST__ = $member_feeddata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><dd><?php echo ($vo["content"]); ?></dd><?php endforeach; endif; else: echo "" ;endif; ?>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</div>
	<?php if(is_array($axised)): $i = 0; $__LIST__ = array_slice($axised,1,count($__LIST__),true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="timeline-section" data-time="<?php echo ($key); ?>">
		<div class="timeline-capsule cls">
			<div class="timeline-capsule-hd">
				<h3 class="timeline-capsule-hd-tit" data-time="<?php echo ($key); ?>"><span><?php echo ($vo); ?></span><em>点击查看分享</em></h3>
			</div>
			<a class="timeline-spine"></a>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
				</div>
			</div>
		</div>
		<div id="aside">
			<ul class="timeline-scrubber fixed_elem">
				<?php if(is_array($axis)): $i = 0; $__LIST__ = $axis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li <?php if(($i)  ==  "1"): ?>class="curr"<?php endif; ?>>
						<a class="year" href="javascript:;"><?php echo ($key); ?>年</a>
						<ul style="">
						<?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><li><a href="javascript:;" class="month" data-time="<?php echo ($v); ?>"><?php echo ($key); ?>月</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
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