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
<link rel="stylesheet" type="text/css" href="../Public/css/global.css"/>
<link rel="stylesheet" type="text/css" href="../Public/css/mall.css"/>
<script>
$(function(){
	mallIndex();
});
</script>
<div id="bd" >
            
	<div id="sec-header">
		
<div class="sec-header-inner">
	<h4><a class="logo" href="<?php echo U('Mall/index');?>" title="乐活商城">乐活商城</a><div class="city"><a href="<?php echo U('Index/city');?>"><?php echo ($switch_region["crr"]["name"]); ?></a></div></h4>
	<ul id="sec-nav" class="cate-nav">
		<li class="navactiv"><a href="<?php echo U('Mall/index');?>">首页</a></li>
		<?php if(is_array($categorydata)): $i = 0; $__LIST__ = $categorydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
                <a href="<?php echo U('Mall/classify/cid/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>

</div>
    <div class="bd-wrap">
        <div id="main">
            <div class="inner">
                <div class="section-top">
					<div class="sort">
						<h2>全部分类</h2>
						<?php if(is_array($goods_categorydata)): $i = 0; $__LIST__ = $goods_categorydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="sort-list">
							<dl>
								<dt><a href="<?php echo U('Mall/classify/cid/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a></dt>
								<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo U('Mall/classify/cid/'.$vo['id'].'/child/'.$v['id']);?>"><?php echo ($v["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
							</dl>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div id="slide" class="switch-fade">
						<?php echo showAdvPosition('mail_top');?>
					</div>
					<div class="st-aside" id="n_s_guest">
					 <?php if(empty($memberdata)): ?><div id="g_login_reg_btn" class="login">
                            <a class="lg login_btn" href="javascript:jvfDialog('signinDialog',APP+'/User/signin');">登录</a>
                            <a class="reg reg_btn" href="<?php echo U('User/register');?>">注册</a>
                        </div>
                     <?php else: ?>
						<div id="n_s_user" class="login" style="">
							<dl>
								<dt>Hi，<span id="user_info_uname"><?php echo ($memberdata["name"]); ?></span></dt>
								<dd>查看 <a href="<?php echo U('Member/buyOrderList');?>">我的订单</a></dd>
							</dl>
						</div><?php endif; ?>
						<div class="promise">
							<dl>
								<dd class="ico ico-rsms"></dd>
								<dt>如实描述</dt>
								<dd>信息真实消费才靠谱</dd>
								<dd><a rel="nofollow" target="_blank" href="<?php echo U('Article/detail/id/55');?>"></a></dd>
							</dl>
							<dl>
								<dd class="ico ico-sst"></dd>
								<dt>随时退</dt>
								<dd>未消费想退就退</dd>
								<dd><a rel="nofollow" target="_blank" href="<?php echo U('Article/detail/id/56');?>"></a></dd>
							</dl>
							<dl class="last">
								<dd class="ico ico-xxpf"></dd>
								<dt>先行赔付</dt>
								<dd>消费纠纷商城为您做主</dd>
								<dd><a rel="nofollow" target="_blank" href="<?php echo U('Article/detail/id/57');?>"></a></dd>
							</dl>

						</div>
						<div class="placard">
							<h4>公告</h4>
							<ul>
							<?php if(is_array($announcement)): $i = 0; $__LIST__ = $announcement;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Article/detail/id/'.$vo['id']);?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
					<div class="showindow">
					<?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="cell">
							<div class="pic">
								<a href="<?php echo U('Goods/index/id/'.$vo['id']);?>" title="<?php echo ($vo["businesses"]["name"]); ?>" target="_blank"><img src="<?php echo ($vo["accessory"]["thumbnail"]); ?>" alt="<?php echo ($vo["businesses"]["name"]); ?>"></a>
								<div class="popbar">
									<div class="con">
										<div class="avatar"><a href="<?php echo U('Goods/index/id/'.$vo['id']);?>" title="<?php echo ($vo["businesses"]["name"]); ?>" target="_blank"><img src="<?php echo ($vo["businesses"]["accessory"]["thumbnail"]); ?>" alt="<?php echo ($vo["businesses"]["name"]); ?>"></a></div>
										<dl>
											<dt>&yen;<span><?php echo ($vo["price"]); ?></span></dt>
											<dd>原价：<?php echo ($vo["original"]); ?></dd>
										</dl>
										<a class="go" href="<?php echo U('Goods/index/id/'.$vo['id']);?>">去看看<span class="ico ico-arrow">箭头</span></a>
									</div>
									<div class="bg"></div>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
                
                
                
                                
                <?php if(is_array($goods_categorydata)): $i = 0; $__LIST__ = $goods_categorydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="section">
					<div class="common-tt cls">
						<h2>
                            <span>F<?php echo ($i); ?></span>
                            <?php echo ($vo["name"]); ?>
                            <a class="cate_anchor" name="meishi"></a>
                        </h2>
                        
						<a class="more" href="<?php echo U('Mall/classify/cid/'.$vo['id']);?>" target="_blank">更多<?php echo ($switch_region["crr"]["name"]); ?><?php echo ($vo["name"]); ?><span class="ico ico-more">更多箭头</span></a>

                        
                        <div class="sort-nav">
						<dl>
							<dt><span class="ico ico-label">标签</span>分类：</dt>
							<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo U('Mall/classify/cid/'.$vo['id'].'/child/'.$v['id']);?>"><?php echo ($v["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
						</dl>
	<dl class="last">
		<dt><span class="ico ico-zone">商圈</span>区域：</dt>
		<?php if(is_array($regiondata)): $i = 0; $__LIST__ = $regiondata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo U('Mall/classify/cid/'.$vo['id'].'/rid/'.$r['id']);?>"><?php echo ($r["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
	</dl>
</div>
                        
                        
					</div>
                    
					<div class="s-aside" style="height: 624px; ">
                    <?php if(is_array($vo["goods"])): $i = 0; $__LIST__ = array_slice($vo["goods"],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><div class="cell">
							<a href="<?php echo U('Goods/index/id/'.$v['id']);?>" target="_blank" class="avatar">
								<img src="<?php echo ($v['businesses']['accessory']['thumbnail']); ?>" style="width:124px;height:124px;" alt="<?php echo ($v['businesses']['name']); ?>">
							</a>
							<h3><a href="<?php echo U('Goods/index/id/'.$v['id']);?>"><?php echo ($v['businesses']['name']); ?></a></h3>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
                    
					<div class="showindow showindow-type1">
					<?php if(is_array($vo["goods"])): $i = 0; $__LIST__ = array_slice($vo["goods"],0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><div class="cell">
	<div class="pic">
		<a href="<?php echo U('Goods/index/id/'.$v['id']);?>" target="_blank"><img height="192" src="<?php echo ($v["accessory"]["thumbnail"]); ?>" title="<?php echo ($v["title"]); ?>"></a>
		<div class="popbar">
			<div class="con">
				<h3><a href="<?php echo U('Businesses/detail/id/'.$v['businesses']['id']);?>" target="_blank"><?php echo ($v["businesses"]["name"]); ?></a></h3>
			</div>
			<div class="bg"></div>
		</div>
                          								<!-- <div class="label">
                              <span class="new"></span>
                          </div> -->
                          							</div>
	<div class="intro"><a href="<?php echo U('Goods/index/id/'.$v['id']);?>" target="_blank"><?php echo ($v["title"]); ?></a></div>
	<div class="info1">
		<div class="price">&yen;<span><?php echo ($v["price"]); ?></span></div>
                          
                                                          								<div class="zone">
                          										<p><span class="ico ico-zone2">地址</span><span style="width: 57px;overflow: hidden;display: inline-block;height: 16px;"><?php echo ($v["address"]); ?></span></p>
                              								</div>
                                                          
		<a class="go" href="<?php echo U('Goods/index/id/'.$v['id']);?>" target="_blank">去看看</a>
	</div>
	<div class="info2">
		<div class="original">原价：&yen;<?php echo ($v["original"]); ?></div>
		<div class="discount">折扣：<?php echo toPrice($v['price']/$v['original']*10);?>折</div>
		<div class="record"><span><?php echo ($v["crrnum"]); ?></span>人已购买</div>
	</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
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