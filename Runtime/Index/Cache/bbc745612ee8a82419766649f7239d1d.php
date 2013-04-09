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
<link rel="stylesheet" type="text/css" href="../Public/css/mylife.css"/>
<script type="text/javascript">
<!--
$(function(){
	$('#add_domain').submit(function(){
		var form = $(this);
		var para = form.serialize();
		var url = form.attr('action');
		var re = new RegExp("^[A-Za-z][A-Za-z0-9]{3,20}$","i");
		var domain = form.find('#domain').val();
		if(!re.test(domain)){
			form.find('#domain').tip('英文字母开头,4-20个字母和数字',2000);
			return false;
		}
		$.post(url,para,function(data){
			if(data.status == 1){
				goUrl(APP+'/Member/domain');
			}else{
				form.find('input[type="submit"]').tip(data.info,2000);
			}
		},'json');
	});
});
//-->
</script>
<div id="wrapper">
	<div id="bd" class="bb-t6">
		<div id="main">
			<div class="inner">
				
	<div class="mylife-top">
		<h2>帐号设置</h2>
	</div>
	<div class="mylife-cont">
		<div class="mylife-hd">
			<h3>个性域名</h3>
			<p>个性域名是你的时光轴地址。通过个性域名可直接访问时光轴，帮助朋友快速浏览你的精华分享.</p>
		</div>
		<?php if(empty($domaindata)): ?><div class="mylife-bd">
						<form class="sns-form" action="<?php echo U('Member/doDomain');?>" method="post" id="add_domain" onsubmit="return false;">
			<div class="mylife-domain">
				<ul class="cls">
					<li>
						<label for=""><?php echo HOST.__APP__.'/';?></label>
						<span class="v">
							<input type="text" size="20" name="domain" id="domain" class="sns-text" placeholder="英文字母开头,4-20个字母和数字" reqmsg="个性域名" datatype="reg" maxlength="20" reg-pattern="/^[A-Za-z][A-Za-z0-9]{3,20}$/" errmsg="英文字母开头,4-20个字母和数字">
						</span>
						<em class="warning">请仔细填写，保存后不可更改。</em><span class="tip" id="tip"></span>
					</li>
				</ul>
				<p class="tl-url">您当前的时间轴为<?php echo HOST.U('User/space/id/'.$memberdata['id']);?></p>
				<div class="btn">
					<input type="submit" value="保存" class="btn-reg">
				</div>
			</div>
			</form>
		</div>
		<?php else: ?>
		<div class="mylife-bd">
						<div class="domain">
				<div class="domain-in">
					<div class="notice-wrap">
						<div class="pic succeed"></div>
						<div class="notice-txt cls">
							<p>已设定个性域名</p>
							<p>当前时光轴地址为：<?php echo HOST.__APP__.'/'.$domaindata['domain'];?></p>
						</div>
					</div>
				</div>
			</div>
				</div><?php endif; ?>
	</div>
	
	
	

			</div>
		</div>
		<div id="aside">
<div class="mylife-nav">
	<dl>
		<dt>个人资料</dt>
		<dd <?php if((ACTION_NAME)  ==  "edit"): ?>class="selected"<?php endif; ?>><a href="<?php echo U('Member/edit');?>">基本信息</a></dd>
		<dd <?php if((ACTION_NAME)  ==  "avatar"): ?>class="selected"<?php endif; ?>><a href="<?php echo U('Member/avatar');?>">修改头像</a></dd>
		<dd <?php if((ACTION_NAME)  ==  "verification"): ?>class="selected"<?php endif; ?>><a href="<?php echo U('Member/verification');?>">帐号绑定</a></dd>
		<dd <?php if((ACTION_NAME)  ==  "domain"): ?>class="selected"<?php endif; ?>><a href="<?php echo U('Member/domain');?>">个性域名</a></dd>
		<dd <?php if((ACTION_NAME)  ==  "modifyPwd"): ?>class="selected"<?php endif; ?>><a href="<?php echo U('Member/modifyPwd');?>">修改密码</a></dd>
	</dl>
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