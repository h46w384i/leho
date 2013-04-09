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
<link rel="stylesheet" type="text/css" href="../Public/css/index.css"/>
<script>
$(function(){
	index();
});
</script>
	<div id="wrapper" >
<div class="bd-main theme-1">
	<div class="block-intro">
		<div class="block-intro-inner">
            <?php echo showAdvPosition('index_top');?>
		</div>
	</div>
<div id="bd">
	<div class="share-item">
		<div class="item-bd cls">
			<div class="item-bd-top"></div>
			<div class="item-bd-btm"></div>
			<div class="share-items-hd cls">
				<h4 title="热门专辑"><a href="<?php echo U('Album/index');?>" target="_blank">热门专辑</a></h4>
			<ul>
			<?php if(is_array($albumdata)): $i = 0; $__LIST__ = array_slice($albumdata,8,count($__LIST__),true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a target="_blank" href="<?php echo U('Circle/album/aid/'.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			</div>
			<div id="switch-tabs-rmzj" class="share-items-bd switch-tabs">
				<a class="switch-scroll-prev switch-scrolled" href="javascript:;"><span class="prev"></span></a>
				<a class="switch-scroll-next" href="javascript:;"><span class="next"></span></a>
				<div class="share-items-list switch-scroll-panel">
					<ul class="switch-nav cls">
					<?php if(is_array($albumdata)): $i = 0; $__LIST__ = array_slice($albumdata,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 4 )?><?php if(($mod)  ==  "1"): ?><?php if(($i)  ==  "1"): ?><li class="selected">
						<?php else: ?>
						<li class="unselected"><?php endif; ?><?php endif; ?>
						<a href="<?php echo U('Circle/album/aid/'.$vo['id']);?>" class="pic" target="_blank">
						<img src="<?php echo ($vo["accessory"]["origin"]); ?>" alt="<?php echo ($vo["title"]); ?>" width="218" height="298">
							<?php echo ($vo["title"]); ?>
						</a>
				
					<?php if(($mod)  ==  "0"): ?></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
				</div>
			</div>
		</div>
		<div class="item-bt"></div>
	</div>
		<div class="ad-item" id="ad-top">
		<?php echo showAdvPosition('index_middle');?>
		</div>
    <?php if(is_array($share)): $i = 0; $__LIST__ = $share;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><div class="block-item" style="position:relative;">
			<a name="lxms" class="anchor-name">&nbsp;</a>
			<div class="item-hd cls">
				<h4 title="<?php echo ($val["name"]); ?>" class="item-tit1"><a href="<?php echo U('Circle/index/cid/'.$val['id']);?>" target="_blank"><?php echo ($val["name"]); ?></a></h4>
			</div>
			<div class="item-bd cls">
				<div class="item-bd-top"></div>
				<div class="item-bd-btm"></div>
				<div class="block-item-bd cls">
					<div class="share-hot">
                        <ul class="cls">
                        <?php if(is_array($val["share"])): $i = 0; $__LIST__ = array_slice($val["share"],0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
                                <h5 class="share-hot-hd"><a href="<?php echo U('Circle/index/lid/'.$vo['id']);?>" target="_blank"><?php echo ($vo["name"]); ?></a><span>(<?php echo ($vo["count"]); ?>)</span></h5>
                                <div class="share-hot-bd cls">
                                    <a href="<?php echo U('Circle/index/lid/'.$vo['id']);?>" target="_blank">
                                        <img src="<?php echo ($vo["origin"]); ?>" width="196" height="196">
                                    </a>
                                </div>
                                <div class="share-hot-bt">
                                    <em class="num-pl"><?php echo ($vo["likes"]); ?></em>
                                    <a href="<?php echo U('Circle/index/lid/'.$vo['id']);?>" target="_blank">去看看</a>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="share-hot-tags">
                        更多分享：
                        <?php if(is_array($val["share"])): $i = 0; $__LIST__ = array_slice($val["share"],8,count($__LIST__),true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a href="<?php echo U('Circle/index/lid/'.$vo['id']);?>" target="_blank" class="hot-tag"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <a class="hot-more" target="_blank" href="<?php echo U('Circle/index/cid/'.$val['id']);?>">全部<span>&gt;&gt;</span></a>
                    </div>
				</div>
			</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<div class="ad-item" id="ad-bottom" style="opacity: 1; ">
		<?php echo showAdvPosition('index_footer');?>
	</div>
	<div id="partner" class="block-item">
	<!--{start: 合作伙伴 -->
		<div class="item-bd">
		<div class="item-bd-top"></div>
		<div class="item-bd-btm"></div>
		<h3 title="友情链接"><span>友情链接</span></h3>
		<?php if(is_array($linkdata)): $i = 0; $__LIST__ = $linkdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 9 )?><?php if(($mod)  ==  "1"): ?><div class="block-item-cont cls"><dl>
			<?php else: ?>
			<?php if(($mod)  ==  "0"): ?><dl class="last"><dl>
			<?php else: ?>
			<dl><?php endif; ?><?php endif; ?>
				<dd><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php if(($vo["type"])  ==  "1"): ?><img src="__ROOT__<?php echo ($vo["logo"]); ?>"><?php else: ?><?php echo ($vo["name"]); ?><?php endif; ?></a></dd>
			</dl>
		<?php if(($mod)  ==  "0"): ?></div><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>

	</div>
</div>
</div>
</div>

<div class="panel panel-t1 feedback-box" id="feed_panel" style="display:none">
	<div class="panel-content" style="width:480px; overflow:hidden;">
		<div class="hd">
			<h3>你提我改</h3>
		</div>
		<div class="bd cls">
			<div class="con-pos" style="padding:0">
				<form action="/talkleho/_add" method="post" id="feed_back_form">
					<div class="feedback-type">
						<span>反馈类型</span>
						<label><input class="feed-type-radio" type="radio" name="feedback_type" value="11" checked="checked" />建议</label>
						<label><input class="feed-type-radio" type="radio" name="feedback_type" value="12" />问题</label>
						<label><input class="feed-type-radio" type="radio" name="feedback_type" value="13" />其他</label>
					</div>
					<div class="feedback-content">
						<textarea id="feedback_content" name="feedback_content"></textarea>
					</div>
				</form>
			</div>
			<div class="ft">
				<div id="feedback_error" class="feedback-error" style="display:none">请输入10~2000个字符的内容</div>
				<div class="panel-btn"><a href="javascript:;" id="feedback_confirm" class="btns btn-t2"><span>提交</span></a></div>
			</div>
		</div>
	</div>
	<span class="sd"></span>
	<span class="close">X</span>
</div>
<div class="fix-block-r">
		<a class="back-top" href="javascript:;">返回顶部</a>
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