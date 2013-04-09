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
	<link href="http://sns.ipiao.me/public/css/reset.css" rel="stylesheet" type="text/css" media="screen"> 
	<link rel="stylesheet" type="text/css" href="../Public/css/head.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/css/sns_common.css"/>
	<link href="../Public/css/panel-login.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="../Public/css/feed.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/css/feedback-box.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/css/chat.css"/>
	<script src="__PUBLIC__/dwz/js/jquery-1.7.2.min.js"></script>
	<script src="__PUBLIC__/dwz/js/jquery-ui-1.8.19.custom.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/dwz/js/jquery.ajaxupload.js" type="text/javascript"></script>
	<!--<script src="../Public/js/baidumap_one.js" type="text/javascript"></script>
	 <script src="http://api.map.baidu.com/api?v=1.3" type="text/javascript"></script> -->
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
		<div class="global-header-inner">
			<div class="left">
				<div class="logo">
					<a href="http://sns.ipiao.com/" target="_blank"><img src="http://sns.ipiao.com/public/images/five/guest_detail_sprite.png" alt="<?php echo C("sysconfig.site_name");?>" /></a>
				</div>
				<ul class="cate-nav">
					<li>
						<a href="<?php echo U('Businesses/index');?>">逛商店</a>
					</li>
					
					<li><a href="<?php echo U('Businesses/lists');?>">找商家</a></li>
					<li><a href="<?php echo U('Businesses/preferential');?>">淘优惠</a></li>
					<li><a href="<?php echo U('Mall/index');?>">乐活商城</a></li>
				</ul>
			</div>

			<div class="right">
				<div class="search hover" id="search">
					<form action="<?php echo U('Find/index');?>" method="get">
						<input type="text" autocomplete="off" placeholder="搜分享、人、商家..." name="keyword"/>
						<button type="submit">搜索</button>
					</form>
				</div>
				<?php if(empty($memberdata)): ?><ul class="login-nav">
					<li>
						<a href="<?php echo U('User/register');?>" target="_blank">注册</a><span class="gap">|</span>
						<a href="javascript:jvfDialog('signinDialog',APP+'/User/signin');">登录</a>
					</li>
					<li class="hover-shim">
						<a href="javascript:;" class="">第三方帐号登录<i class="ico-arrow"></i></a>
						<div class="dropmenu">
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
			
					</div>
	</div>
	</div>
<link rel="stylesheet" type="text/css" href="../Public/css/businesses.css"/>
<div id="doc3">
	<div id="bd">
		<div id="sec-header">
			<div class="sec-header-inner">
				<h2>
					<a class="logo" href="<?php echo U('Businesses/index');?>">逛商街</a>
					<div class="city">
						<a class="currcity" href="<?php echo U('Index/city');?>"><span><?php echo ($switch_region["crr"]["name"]); ?></span></a>
					</div>
				</h2>
				<ul class="cate-nav">
					<li <?php if((ACTION_NAME)  ==  "index"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/index');?>"><span>首页</span></a></li>
					<li <?php if((ACTION_NAME)  ==  "lists"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/lists');?>"><span>找商家</span></a></li>
					<li <?php if((ACTION_NAME)  ==  "preferential"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/preferential');?>"><span>淘优惠</span></a></li>
				</ul>
			</div>
			<style type="text/css">
				#sec-header{position:relative; z-index:3; width:100%; border-bottom:1px solid #ddd; background-color:#eee;}
				#index #sec-header{border-bottom:0 none; background-color:transparent;}
				.sec-header-inner{width:980px; height:60px; margin:0 auto;}
				#sec-header h2{position:relative; float:left;}
				#sec-header h2 .logo{font:24px/60px "5FAE8F6F96C59ED1","5b8b4F53"; color:#333; text-shadow:0 1px 1px rgba(0,0,0,0.2)}
				#sec-header h2 .logo:hover{text-decoration:none;}
				#sec-header .city{position:absolute; left:82px; top:18px; font-weight:normal; line-height:26px; white-space:nowrap;}
				#sec-header .city a{color:#666;}
				#sec-header .city a:hover{text-decoration:none;}
				#sec-header .city .currcity{display:block; padding-left:8px; background:url(../Public/images/sec-header_sj.png) 0 0 no-repeat;}
				#sec-header .city .currcity:hover{background-position:0 -26px;}
				#sec-header .city .currcity span{position:relative; right:-1px; display:inline-block; padding-right:18px; background:url(../Public/images/sec-header_sj.png) right top no-repeat; cursor:pointer;}
				#sec-header .city .currcity:hover span{background-position:right -26px;}
				#sec-header .active .currcity, #sec-header .active .currcity:hover{background-position:0 -52px;}
				#sec-header .active .currcity span, #sec-header .active .currcity:hover span{background-position:right -52px;}
				#sec-header .city i{position:absolute; top:9px; right:5px; border-width:4px 4px 0; border-style:solid solid none; border-color:#999 #f5f4f4 #f5f4f4; line-height:0;}
				#sec-header .active i{border-width:0 4px 4px; border-style:none solid solid; border-color:#f5f4f4 #f5f4f4 #999;}
				#sec-header .city ul{position:absolute; left:0; top:26px; display:none; padding:1px; border:1px solid #ccc; border-radius:2px; box-shadow:1px 1px 1px rgba(0,0,0,0.2); background-color:#fff; opacity:0.9; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);}
				#sec-header .active ul{display:block;}
				#sec-header .city ul a{display:block; padding:0 16px 0 8px;}
				#sec-header .city ul a:hover{color:#333; background-color:#eee;}
				#sec-header .cate-nav{float:left; _display:inline; margin:17px auto auto 120px; font:16px/28px "5FAE8F6F96C59ED1","5b8b4F53";}
				#sec-header .cate-nav li{float:left; margin-right:7px;}
				#sec-header .cate-nav li a{float:left; display:block; padding-left:12px; color:#333; text-shadow:1px 1px 0 #fff;}
				#sec-header .cate-nav li a:hover, #sec-header .cate-nav .curr a{color:#fff; text-decoration:none; background:url(../Public/images/sec-header_sj.png) 0 -78px no-repeat; text-shadow:0 1px 1px rgba(0,0,0,0.3);}
				#sec-header .cate-nav li span{position:relative; right:-2px; display:inline-block; padding-right:12px; cursor:pointer;}
				#sec-header .cate-nav li a:hover span, #sec-header .cate-nav .curr span{background:url(../Public/images/sec-header_sj.png) right -78px no-repeat;}
			</style>
		</div>
		<div class="bd-wrap">
			<div id="main">
				<div class="inner">
					<div id="slide" class="switch-fade">
							<?php echo showAdvPosition('businesses_top');?>
					</div>
					<div class="section">
						<div class="common-tt">
							<h2 class="type-1"><span>商家分类</span></h2>
						</div>
						<?php if(is_array($businesses_categorydata)): $i = 0; $__LIST__ = $businesses_categorydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="cate-list">
							<h3><span class="ico"></span><a target="_blank" href="<?php echo U('Businesses/lists/cid/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a></h3>
							<ul>
							<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><li><a target="_blank" href="<?php echo U('Businesses/lists/cid/'.$vo['id']);?>?child=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="section recommend">
						<div class="common-tt">
							<h2 class="type-1"><span>乐活推荐</span></h2>
						</div>
						<?php if(is_array($businessesdata)): $i = 0; $__LIST__ = $businessesdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><dl>
							<dd class="pic">
							<a target="_blank" href="<?php echo U('Businesses/detail/id/'.$vo['id']);?>">
								<img src="<?php echo ($vo["accessory"]["origin"]); ?>" alt="<?php echo ($vo["name"]); ?>" width="160" height="114">
							</a>
							</dd>
							<dt><a target="_blank" href="<?php echo U('Businesses/detail/id/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a></dt>
							<dd><?php echo ($vo["signature"]); ?></dd>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="section preferential">
						<div class="common-tt">
							<h2 class="type-1"><span>热门优惠</span></h2>
							<a target="_blank" href="<?php echo U('Businesses/preferential');?>" class="more">更多»</a>
						</div>
						<?php if(is_array($preferentialdata)): $i = 0; $__LIST__ = $preferentialdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><ul>
							<li class="pic"><a target="_blank" href="<?php echo U('Businesses/preferentialDetail/id/'.$vo['id']);?>"><img src="<?php echo ($vo["logo"]["origin"]); ?>" alt="" width="220" height="70"></a></li>
							<li><a target="_blank" href="<?php echo U('Businesses/preferentialDetail/id/'.$vo['id']);?>"><?php echo ($vo["short_title"]); ?></a></li>
						</ul><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
			<div id="aside">
				<div class="inner">
					<div class="statistic">
						<p>在<?php echo ($switch_region["crr"]["name"]); ?>，已有</p>
						<ul>
							<li><span><?php echo (str_pad($businessescount,6,'0',STR_PAD_LEFT)); ?></span>商家通过<a href="<?php echo U('Article/detail/id/58');?>" target="_blank">资质认证</a></li>
			
							<li><span><?php echo (str_pad($qualificationscount,6,'0',STR_PAD_LEFT)); ?></span>商家入驻平台</li>
						</ul>
						<a id="a_zhaoshang_link" class="btn" href="<?php echo U('Member/applyBusiness');?>" target="_blank"><span>我是商家，我要入驻</span></a>
						
					</div>
					<div class="famous">
						<div class="common-tt">
							<h2 class="type-2"><span>知名品牌</span></h2>
						</div>
						<?php if(is_array($isbranddata)): $i = 0; $__LIST__ = $isbranddata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><dl>
						<dd class="pic"><a target="_blank" href="<?php echo U('Businesses/detail/id/'.$vo['id']);?>"><img src="<?php echo ($vo["accessory"]["thumbnail"]); ?>" alt="<?php echo ($vo["name"]); ?>" width="50" height="50"></a></dd>
						<dt><a target="_blank" href="<?php echo U('Businesses/detail/id/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a></dt>
						<dd><?php echo ($vo["signature"]); ?></dd>
						<?php if(($vo["qualifications"])  ==  "1"): ?><dd><span class="ico ico-verify" title="资质认证">企业经营资质认证</span></dd><?php endif; ?>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>

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
		<!--
        <p class="copyright-url">
		<?php if(is_array($footernav)): $i = 0; $__LIST__ = $footernav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($vo["url"]); ?>" <?php if(($vo["isblank"])  ==  "1"): ?>target="_blank"<?php endif; ?> ><?php echo ($vo["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		</p>	
        -->
		<div class="copyright-info">
            <div class="copyright">
                <p class="footer-link mrb10"><span class="tel-400">4006 838 000</span></p>
                <p class="footer-link">
                    <a href="http://www.ipiao.com/about/" target="_blank">关于我们</a><i>|</i>
                    <a href="http://www.ipiao.com/about/contact.html" target="_blank">联系方式</a><i>|</i>
                    <a href="http://www.ipiao.com/about/termofuse.html" target="_blank">网站服务协议</a><i>|</i>
                    <a class="mrlr20" href="/Home/Help/fqa" target="_blank">帮助中心</a>
                    &copy;2010-2012 Ipiao. All Rights Reserved. 粤ICP备10203628号 增值电信业务经营许可证编号：粤B2-20100473
                </p>
            </div>
		</div>
</div>
</div>