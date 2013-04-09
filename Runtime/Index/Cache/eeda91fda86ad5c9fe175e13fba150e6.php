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
<link rel="stylesheet" type="text/css" href="../Public/css/myhome.css"/>
<link rel="stylesheet" type="text/css" href="../Public/css/district.css"/>
<script>
$(function(){
	memberPeriphery();
});
</script>
<div id="wrapper">
<div class="myhone-bg">
	<div class="myhome-hd">
		<div class="myhome-user">
			<div class="user-photo">
				<a href="<?php echo U('User/space/id/'.$memberdata['id']);?>"><img src="<?php echo ($memberdata["header"]["path"]); ?>" alt="<?php echo ($memberdata["name"]); ?>" width="120"></a>
				<div class="amend" id="modify_headimg" style="height:0px;"><i></i><span><a title="修改头像" alt="修改头像" href="<?php echo U('Member/avatar');?>">修改头像</a></span></div>
			</div>
			<dl class="user-info">
				<dt><a href="<?php echo U('User/space/id/'.$memberdata['id']);?>" title="test003"><?php echo ($memberdata["name"]); ?></a>
</dt>
				<dd><a href="<?php echo U('User/space/id/'.$memberdata['id']);?>"><i class="ico-timeline"></i><span>我的时光轴</span></a></dd>
				<dd>
					<a href="javascript:;" onclick="return false" class="exp_credit"><i class="ico-medal"></i><span>积分：<?php echo ($memberdata["value"]); ?></span></a>
					<div id="medal">
						<a href="javascript:;" onclick="return false" class="me-style"><i class="ico-mark"></i><span>勋章</span></a>
						
						<div class="panel panel-t3 medal-panel" style="display:none;">
							<div class="panel-content">
								<div class="bd">
								<?php if(empty($medaldata)): ?><span class="empty-medal">你尚未获得任何勋章</span>
								<?php else: ?>
									<ul class="medal-list cls">
									<?php if(is_array($medaldata)): $i = 0; $__LIST__ = $medaldata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li data-name="<?php echo ($vo["name"]); ?>" data-mark="<?php echo ($vo["mark"]); ?>"><a href="#" onclick="return false" ><img class="medal" src="<?php echo ($vo["logopath"]); ?>" alt="<?php echo ($vo["name"]); ?>" is-new="0" title="" style="width: 34px; height: 34px;"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul><?php endif; ?>
								</div>
							</div>
							<span class="sd"></span>
						</div>
											</div>
				</dd>
				<dd class="user-attention">
					<ul class="cls">
						<li><a href="<?php echo U('Member/liked');?>"><strong><?php echo ($allNum["was_like"]); ?></strong><span>被喜欢</span></a></li>
						<li><a href="<?php echo U('User/wasAttention/id/'.$memberdata['id']);?>"><strong><?php echo ($allNum["was_attention"]); ?></strong><span>观众</span> </a></li>
						<li><a href="<?php echo U('User/attention/id/'.$memberdata['id']);?>"><strong><?php echo ($allNum["attention"]); ?></strong><span>关注</span> </a></li>
					</ul>
				</dd>
			</dl>
		<div id="yindao-add-headimg" class="panel panel-t4 panel-t4-lt panel-photo-tips" style="position: absolute; top: 30px; left: 130px; display: none; ">
	<div class="panel-content">
		<div class="hd">
			<h3>上传头像</h3>
		</div>
		<div class="bd">
			<div class="photo-tips-cont">
				<p>还没有上传头像？有头像更容易得到关注！</p>
				<p><a href="<?php echo U('Member/avatar');?>">立即上传</a></p>
			</div>
		</div>
	</div>
	<span class="sd"></span>
	<span class="cue"></span>
	<span class="close">X</span>
</div></div>
	
		<div class="block-show">
			<a href="#" onclick="return false" class="share-btn"></a>
			<div class="go-discover go-2">
				<a href="<?php echo U('Circle/detection');?>">去发现生活</a>
			</div>
		<div id="yindao-add-post" class="panel panel-t4 panel-t4-tl panel-guide-end" style="position:absolute;top:92px;left:20px; display:none; z-index:99;">
	<div class="panel-content">
		<div class="hd">
			<h3>引导页</h3>
		</div>
		<div class="bd">
			<div class="guide-end-cont">
				<p>在这里轻松发布</p>
			</div>
		</div>
	</div>
	<span class="sd"></span>
	<span class="cue"></span>
	<a href="javascript:;" class="close">X</a>
</div></div>
	</div>
</div>
<div class="myhome-nav">
	<a href="<?php echo U('Member/interest');?>" class="tab" data-feed_type="0">
		<i class="favorite"></i><span>兴趣爱好</span>
	</a>
	<a href="<?php echo U('Member/index');?>" class="tab" data-feed_type="1">
		<i class="dynamic"></i><span>好友动态</span>
	</a>
	<a href="<?php echo U('Circle/ajaxCircle/periphery/'.$memberdata['id']);?>" onclick="return false" class="tab selected" data-feed_type="2">
		<i class="address"></i><span>周边资讯</span>
	</a>
</div>
<div id="bd" class="bb-t1">
	<div id="main">
		<div class="column-wraper cls">
		<?php if(empty($peripherydata)): ?><div class="block-empty interest" data-feed_type="0" style="">
				<div class="explain-empty">
					<p>啊哦，这里还是空的…</p>
					<p>添加你爱逛的商圈，<span class="font-color1">周边打折优惠</span>包打听！</p>
				</div>
				<a href="#" onclick="return false" class="empty-btn-add add-group"><span>添加周边</span> </a>
			</div>
		<?php else: ?>
			<div class="moudle-block moudle tag-list interest jvf_pubu" data-feed_type="0" id="interest" style="">
				<div class="hd"></div>
				<div class="bd">
					<div class="title"><span>我的周边</span></div>
					<div class="main cls">
						<div class="tag-block">
							<div class="tag-bd" style="max-height: 228px; overflow: hidden;">
								<ul class="interest-list cls">
									<?php $count = count($peripherydata); ?>
									<?php if(($count)  >  "1"): ?><li class="interest-tag selected" lid="0" uid="<?php echo ($memberdata["id"]); ?>">
									<a href="#" onclick="return false;">全部</a>
									</li><?php endif; ?>
									<?php if(is_array($peripherydata)): $i = 0; $__LIST__ = $peripherydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li class="interest-tag <?php if(($count)  <  "2"): ?><?php if(($i)  ==  "1"): ?>selected<?php endif; ?><?php endif; ?>" lid="<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["name"]); ?>">
									<a href="#" onclick="return false;"><?php echo ($vo["name"]); ?></a>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
								<div class="block-loading loading" style="display: none; "></div>
							</div>
							<a href="#" onclick="return false" class="display-tag less" style="display: none; " title="显示全部"><span></span></a>
						</div>
						<div class="other-block">
							<a href="#" onclick="return false" class="add-group">+ 添加周边</a>
							<a href="#" class="manage-group" target="_blank" style="display: none;">管理兴趣</a>
						</div>
					</div>
				</div>
				<div class="ft"></div>
			</div><?php endif; ?>
		</div>
		<div id="split_page" class="splitpage cls" style="display:none;"></div>
	</div>
</div>

	</div>
<div id="medal_tips" class="panel panel-t4 panel-t4-tl medal-explain" style="position: absolute; width: 170px; zoom: 1; z-index: 147; display: none; ">
	<div class="panel-content">
		<div class="bd"></div>
	</div>
	<span class="sd"></span>
	<span class="cue"></span>
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