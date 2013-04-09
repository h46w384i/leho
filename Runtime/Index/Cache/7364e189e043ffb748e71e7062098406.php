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
<link rel="stylesheet" type="text/css" href="../Public/css/coupon.css"/>
<div id="wrapper">
<link rel="stylesheet" type="text/css" href="../Public/css/result_unit.css"/>

<script type="text/javascript">
<!--
$(function(){
	$('.businessesMap').click(function(){
		jvfDialog('bmaps', APP+'/Index/maps/bid/'+<?php echo ($businessesdata["id"]); ?>);
	});
	
	$('.toggle').toggle(function(){
		$(this).parent().removeClass('unfold').addClass('fold');
		$(this).text('收起');
		$('#shmsg_ext').show();
	},function(){
		$(this).parent().removeClass('fold').addClass('unfold');
		$(this).text('更多');
		$('#shmsg_ext').hide();
	});
	
	$('#nav a').hover(function(){
		$(this).parent().addClass('curr');
	},function(){
		$(this).parent().removeClass('curr');
	});
});
//-->
</script>
<div id="hd">
<div id="banner_module">
	<div class="crumb-bg">
		<div class="gl-w crumb">
			<a href="<?php echo U('Businesses/index');?>">逛商街</a><em>&gt;</em>
							<a href="<?php echo U('Businesses/list/cid/'.$arr_data[1]);?>"><?php echo (getParent('Businesses_category',$arr_data["1"])); ?></a><em>&gt;</em>
							<a href="<?php echo U('Businesses/list/cid/'.$arr_data[1]);?>?child=<?php echo ($arr_data[2]); ?>"><?php echo (getParent('Businesses_category',$arr_data["2"])); ?></a><em>&gt;</em>
			<span><?php echo ($businessesdata["name"]); ?></span></div>
		<div class="gl-w vcard">
			<div class="general cls">
				<span class="name"><h2 style="font-size: 23px;"><a href="<?php echo U('Businesses/detail/id/'.$businessesdata['id']);?>"><?php echo ($businessesdata["name"]); ?></a></h2></span>
								<?php if(($businessesdata["qualifications"])  ==  "1"): ?><a target="_blank" href="<?php echo U('Article/detail/id/58');?>" class="ico-rz zizi" title="资质认证"></a><?php endif; ?>
								<?php if(($businessesdata["security"])  ==  "1"): ?><a target="_blank" href="<?php echo U('Article/detail/id/59');?>" class="ico-rz baozhengjin" title="保证金计划"></a><?php endif; ?>
								<?php if(($businessesdata["real_scene"])  ==  "1"): ?><a target="_blank" href="<?php echo U('Businesses/poto/id/'.$businessesdata['id']);?>" class="ico-rz shijing" title="实景照片"></a><?php endif; ?>
								<a href="<?php echo U('User/space/id/'.$businessesdata['uid']);?>" target="_blank" class="node">社区主页»</a>
			</div>
			<div class="info">
				<ul class="">
						<li>
							<label>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</label><span class="addr"><?php echo ($businessesdata["address"]); ?>&nbsp;&nbsp;[<a class="addr_map_button map-locate businessesMap" href="javascript:;" rel="<?php echo ($businessesdata["id"]); ?>">地图</a>]</span>
						</li>
						<li>
						<label>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</label><span><?php echo ($businessesdata["tel"]); ?></span>
													<label>营业时间：</label><span class="open"><?php echo ($businessesdata["opening"]); ?></span>
																			<span class="unfold" style=""><a href="javascript:;" class="toggle">更多</a></span>
						</li>
				</ul>
				<ul id="shmsg_ext" style="display: none; ">
					<li>
						<label>商家特色：</label><span><?php echo ($businessesdata["characteristic"]); ?></span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
	</div>
	<div id="nav" class="gl-w">
		<dl class="first">
			<dt <?php if((ACTION_NAME)  ==  "detail"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/detail/id/'.$businessesdata['id']);?>"><strong>商家首页</strong></a></dt>
		</dl>
		<span class="bdr"></span>
		<dl>
			<dt <?php if((ACTION_NAME)  ==  "info"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/info/id/'.$businessesdata['id']);?>"><strong>商家信息</strong></a></dt>
			<dd <?php if((ACTION_NAME)  ==  "poto"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/poto/id/'.$businessesdata['id']);?>">相册</a></dd>
			<dd <?php if((ACTION_NAME)  ==  "video"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/video/id/'.$businessesdata['id']);?>">视频</a></dd>
		</dl>
		<span class="bdr"></span>
		<dl>
			<dt <?php if((ACTION_NAME)  ==  "service"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/service/id/'.$businessesdata['id']);?>"><strong>精品服务</strong></a></dt>
			<dd <?php if((ACTION_NAME)  ==  "doing"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/doing/id/'.$businessesdata['id']);?>">优惠活动</a></dd>
		</dl>
		<span class="bdr"></span>
		<dl>
			<dt <?php if((ACTION_NAME)  ==  "mouth"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/mouth/id/'.$businessesdata['id']);?>"><strong>商家口碑</strong></a></dt>
		</dl>
		<div class="contact">
			<span class="bdr"></span>
			<dl>
				<dt <?php if((ACTION_NAME)  ==  "contact"): ?>class="curr"<?php endif; ?>><a href="<?php echo U('Businesses/contact/id/'.$businessesdata['id']);?>"><strong>联系商家</strong></a></dt>
			</dl>
			<span class="bdr"></span>
		</div>
</div>
<div id="bd" class="gl-w">
    <div id="wrap" class="cls switch-tabs doc-ex-1">
        <div id="main">
            <div class="inner">
                <div class="sh-mod coupon-detail">
                    <div class="bd">
                        <div class="coupon-topic">
                            <div class="col"><h3><?php echo ($preferentialdata["title"]); ?></h3></div>
                            <div class="col">
                                <?php if(($preferentialdata["endtime"] > time())): ?>有效期：<i><strong><?php echo (toDateYmd($preferentialdata["addtime"])); ?></strong></i> 至 <i><strong><?php echo (toDateYmd($preferentialdata["endtime"])); ?></strong></i>
                                <?php else: ?>
                                已结束<?php endif; ?>
                            <span class="coupon-taken"><?php echo ($preferentialdata["crr"]); ?> 人已领取</span></div>
                            <div class="col cls">
                                <div class="share-container cls">
                                    <span style="float:left;padding-top: 3px;"><em>分享到：</em></span>
                                    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                                        <a class="bds_qzone" title="分享到QQ空间" href="#"></a><a class="bds_renren" title="分享到人人网" href="#"></a>
                                        <a class="bds_tsina" title="分享到新浪微博" href="#"></a>
                                        <a class="bds_tqq" title="分享到腾讯微博" href="#"></a>
                                        <a class="bds_kaixin001" title="分享到开心网" href="#"></a> <a class="bds_douban" title="分享到豆瓣网" href="#"></a>
                                        <a class="bds_copy" title="分享到复制网址" href="#"></a>
                                    </div>
                                    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=668549" ></script>
                                    <script type="text/javascript" id="bdshell_js"></script>
                                </div>
                                <?php if(($preferentialdata["endtime"] > time())): ?><div class="coupon-btn cls">
                                    <a class="btn-ex-typewriter-2 print_coupon" href="<?php echo U('Businesses/preferentialPrint/id/'.$preferentialdata['id']);?>" title="打印优惠券"><span>打印优惠券</span></a>									<a class="btn-ex-mobile-2 send_by_sms" href="#" title="发送到手机"><span>发送到手机</span></a>
                                </div><?php endif; ?>
                            </div>
                        </div>
                        <div class="section coupon-list">
                            <a href="javascript:;" target="_blank"><img src="<?php echo ($preferentialdata["logo"]["path"]); ?>" alt="<?php echo ($preferentialdata["title"]); ?>" style="max-width: 705px;"></a>
                        </div>
                        <div class="section">
                            <div class="coupon-tips">
                                <p><strong>优惠内容及注意事项：</strong></p>
                                <p><?php echo ($preferentialdata["note"]); ?></p>
                            </div>
                            <div class="coupon-msg">
                                <dl>
                                    <dt><i><strong>短信优惠券：</strong>下载短信使用同样有效</i><em>（短信下载完全免费，我们会严格保密您的手机号码）</em></dt>
                                    <dd>
                                        <p><?php echo ($preferentialdata["sms"]); ?></p>
                                    </dd>
                                </dl>
                            </div>
                            <?php if(($preferentialdata["endtime"] > time())): ?><div class="coupon-btn">
                                <a class="btn-ex-typewriter-2 print_coupon" href="<?php echo U('Businesses/preferentialPrint/id/'.$preferentialdata['id']);?>" title="打印优惠券"><span>打印优惠券</span></a><a class="btn-ex-mobile-2 send_by_sms" href="#" title="发送到手机"><span>发送到手机</span></a>
                            </div><?php endif; ?>
                        </div>
                        <div class="section">
                            <div class="cls">
                                <span style="float:left;padding-top: 3px;"><em>分享到：</em></span>
                                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                                    <a class="bds_qzone" title="分享到QQ空间" href="#"></a><a class="bds_renren" title="分享到人人网" href="#"></a>
                                    <a class="bds_tsina" title="分享到新浪微博" href="#"></a>
                                    <a class="bds_tqq" title="分享到腾讯微博" href="#"></a>
                                    <a class="bds_kaixin001" title="分享到开心网" href="#"></a> <a class="bds_douban" title="分享到豆瓣网" href="#"></a>
                                    <a class="bds_copy" title="分享到复制网址" href="#"></a>
                                </div>
                            </div>
                            <p><em>以上信息的最终解释权归商家所有，如有疑问请联系商家咨询。</em></p>
                        </div>
                    </div>
                </div>
                <!-- 其它用户还浏览了 } -->
                <div class="sh-mod">
                    <div class="hd"><span class="n">其它用户还浏览了</span></div>
                    <div class="bd">
                        <div class="sub-hd"><span class="n"><h3>精品服务</h3></span></div>
                        <div class="sub-bd">
                            <ul class="mod-it-1 cls">
                             <?php if(is_array($goodsdata)): $i = 0; $__LIST__ = $goodsdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
                                    <div class="img"><a href="<?php echo U('Goods/index/id/'.$vo['id']);?>" alt="<?php echo ($vo["title"]); ?>" width="220">
                                        <img height="160" src="<?php echo ($vo["accessory"]["thumbnail"]); ?>" width="219" alt="<?php echo ($vo["title"]); ?>">
                                    </a></div>
                                    <div class="txt">
                                        <p class="attr"><a href="<?php echo U('Goods/index/id/'.$vo['id']);?>" target="_blank"><?php echo ($vo["title"]); ?></a></p>
                                        <p class="price"><span class="discount">&yen;<i><?php echo ($vo["price"]); ?></i></span><span class="original">&yen;<i><?php echo ($vo["original"]); ?></i></span></p>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="<?php echo U('Businesses/detail/id/'.$_REQUEST['id']);?>" class="back2index" title="返回商家首页"></a>
                </div>
            </div>
        </div>
            <div id="aside">
                <div id="map_module">
                    <!-- 地图 -->
                    <div class="sh-mod shop-map">
                        <div class="bd">
                            <div class="img">
                                <div id="map" style="height: 177px; width: 210px;">

                                </div>
                                <div>
                                    <a class="businessesMap" href="javascript:;">查看大图</a>
                                </div>
                                <script type="text/javascript">
                                    $(function(){
                                        load_map_wrapper();
                                    });
                                    function load_map_wrapper(){
                                        <?php if(($businessesdata["latitude"] != '') AND ($businessesdata["longitude"] != '')): ?>var map = new jvfMap("map","<?php echo ($businessesdata["latitude"]); ?>","<?php echo ($businessesdata["longitude"]); ?>",<?php echo ($businessesdata["zoom"]); ?>,false);
                                            map.addTags("<?php echo ($businessesdata["latitude"]); ?>","<?php echo ($businessesdata["longitude"]); ?>","<?php echo ($businessesdata["address"]); ?>",<?php echo ($businessesdata["zoom"]); ?>,"");
                                        <?php else: ?>
                                        initialize();<?php endif; ?>
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 社区feeds -->
                <div class="sh-mod shop-feeds" id="sns_mini_module">
                    <div class="bd">
                        <div class="info cls">
                            <div class="avatar">
                                <a href="<?php echo U('User/space/id/'.$mdata['id']);?>" target="_blank"><img width="50" height="50" src="<?php echo ($mdata["header"]["thumbnail"]); ?>" width="50" height="50" alt="<?php echo ($mdata["name"]); ?>"></a>
                            </div>
                            <div class="fn">
                                <p><a href="<?php echo U('User/space/id/'.$mdata['id']);?>" target="_blank"><?php echo ($mdata["name"]); ?></a><a href="javascript:;" class="i-v" title="商家认证"></a></p>
                                <p><a href="#" class="btn-ex-follow"><span>加关注</span></a><em><?php echo ($mdata['wasAttentionNum']); ?>观众</em></p>
                            </div>
                        </div>
                        <div class="feeds">
                            <ul>
                                <?php if(is_array($talk_aboutdata)): $i = 0; $__LIST__ = $talk_aboutdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li class="feeds-li _cmtTarget">
                                        <p class="p">
                                            <?php echo ($vo["content"]); ?>
                                        </p>
                                        <?php if(!empty($vo["accessory"])): ?><p class="p">
                                                <a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" target="_blank"><img src="<?php echo ($vo["accessory"]["0"]["thumbnail"]); ?>" alt="" width="58"></a>
                                            </p><?php endif; ?>
                                        <div class="tools cls">
                                            <p class="f-l"><em><?php echo (date('m-d H:i',$vo["addtime"])); ?></em></p>
                                            <p class="f-r">
                                                <span><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" class="digg like-btn" data--ban="0" style="outline:none"><em><?php echo ($vo["likes"]); ?></em></a></span>
                                                <span class="comment-number"><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" class="comment-view-btn _cmtBtn">评论</a><b class="c-count">(<?php echo ($vo["comment"]); ?>)</b></span>
                                            </p>
                                        </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="sh-more">
                                <a href="<?php echo U('User/space/id/'.$mdata['id']);?>" target="_blank">更多精彩»</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
        </div>
        <div id="smscontent" style="display: none;" >
            <div class="panel-mobile-sand" title="发送到手机" style="width: 450px;height: 300px;">
            <form class="bb-form" action="<?php echo U('Businesses/preferentialSms');?>" method="post" name="send_form">

                <input type="hidden" name="id" value="<?php echo ($preferentialdata["id"]); ?>">
                <h4>以下内容将被发送至您的手机</h4>
                <div class="sms-content">
                    <?php echo ($preferentialdata["sms"]); ?>
                </div>
                <ul>
                    <li><label class="k" for="id">手机号：</label>
                        <input class="v" id="send_phone" style="font-weight:bold;" datatype="mobilecode" name="phone" reqmsg="手机号码" errmsg="手机号码"><em style=""></em></li>
                    <li class="coupon-vcode">
                        <label class="k" for="safecode">验证码：</label>
									<span class="v">
										<input style="float: left;" class="safecode" name="_vcode" type="text" value="" datatype="vcode" maxlength="4" reqmsg="为防止短信骚扰，请输入正确的验证码">
                        <div class="safecode-img" style="margin: 0;">
                            <img id="_vcode_img" src="<?php echo U('Index/verify');?>">
                            <a href="javascript:;" id="_vcode_txt" onclick="$(this).prev().attr('src',APP+'/Index/verify')">看不清？</a>
                        </div>
                    </li>
                </ul>
                <div class="btn">
                    <button id="s_submit" type="button" onclick="sendS(this);">发送</button>
                </div>
            </form>
        </div>
        </div>
<script type="text/javascript">
    $(function(){
        $.onload(function(){
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
        });
        $('.send_by_sms').click(function(){
            jvfDialogHtml('smssend',$('#smscontent').html());
        });
    });
    function sendS(t){
        var form = $(t).parents('form');
        var phone = form.find('input[name="phone"]');
        if(!phone.val()){
            phone.tip('请输入手机号码',3000);
            return false;
        }
        var _vcode = form.find('input[name="_vcode"]');
        if(!_vcode.val()){
            _vcode.tip('请输入验证码',3000);
            return false;
        }
        $.post(form.attr('action'),form.serialize(),function(data){
            if(data.status == 1){
                $(t).parents('.ui-dialog').find('.ui-dialog-titlebar-close').trigger('click');
                jalert(data.info,{callback:function(){
                    window.location.reload();}});
            }else{
                $(t).tip(data.info,3000);
            }
        },'json');
        return false;
    }
</script>
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