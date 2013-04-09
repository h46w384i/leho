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
<link rel="stylesheet" type="text/css" href="../Public/css/home.css"/>
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
		<div id="wrap" class="doc-ex-1 cls">
			<div id="main">
				<div class="inner" id="inner">
	<div id="wideAdvert_module">
				<div class="sh-mod slider switch-fade cls">
			<div id="picslide">
				<ul class="slide-img switch-content">
                    <?php if(is_array($businesses_slidedata)): $i = 0; $__LIST__ = $businesses_slidedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li <?php if(($i)  ==  "1"): ?>style="opacity: 1;"<?php else: ?>style="opacity: 0;"<?php endif; ?>>
                        <a href="<?php echo ($vo["link"]); ?>" target="_blank"><img src="__ROOT__<?php echo ($vo["img"]); ?>" width="100%" height="270"></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<ul class="slide-num switch-nav">
                    <?php if(is_array($businesses_slidedata)): $i = 0; $__LIST__ = $businesses_slidedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php if(($i)  ==  "1"): ?><li class="selected first"><?php echo ($i); ?></li>
                    <?php else: ?>
                    <li class="unselected"><?php echo ($i); ?></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
            <script type="text/javascript">
                $(function(){
                    function start(){
                        window.businesses_slide = setInterval(function(){
                            var crr = $('.slide-num li.selected').next();
                            if(!crr.html()){
                                crr = $('.slide-num li:first');
                            }
                            xunhuan(crr);
                        },3000);
                    }
                    function xunhuan(t){
                        var li = $('.slide-num li');
                        var index = li.index(t);
                        li.removeClass('selected').addClass('unselected');
                        t.removeClass('unselected').addClass('selected');
                        $('.slide-img li').css('opacity','0').eq(index).css('opacity','1');
                    }
                    $('.slide-num li').hover(function(){
                        xunhuan($(this));
                        clearInterval(window.businesses_slide);
                    },function(){
                        start();
                    });
                    start();

					$('.introduce .switch-nav li').click(function(){
						var lis = $('.introduce .switch-nav li');
						lis.removeClass('selected').addClass('unselected');
						var index = lis.index($(this));
						$(this).removeClass('unselected').addClass('selected');
						var divs = $('.introduce .switch-content .pre');
						divs.removeClass('selected').addClass('unselected');
						divs.eq(index).removeClass('unselected').addClass('selected');
					});
                });
            </script>
		</div>
	</div>
													
	<div id="multi_info_module">
		<a name="multi_info"></a>
		<!-- 公司介绍 视频相册 商户动态 -->
		<div class="sh-mod introduce">
			<div class="hd tab-hd">
				<ul class="switch-nav">
                    <?php if(is_array($businesses_articledata)): $i = 0; $__LIST__ = $businesses_articledata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php if(($i)  ==  "1"): ?><li class="selected">
                        <?php else: ?>
                        <li class="unselected"><?php endif; ?>
                            <a href="javascript:;"><?php echo ($vo["title"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
			</div>
			<div class="bd tab-bd switch-content" id="multi-info-content">
                <?php if(is_array($businesses_articledata)): $i = 0; $__LIST__ = $businesses_articledata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php if(($i)  ==  "1"): ?><div class="pre hide selected" style="height: 385px; ">
                    <?php else: ?>
                    <div class="pre hide unselected" style="height: 385px; "><?php endif; ?>
                         <?php echo ($vo["content"]); ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			    <div class="sh-more sh-more-toggle" style="display:none;">
					<a href="#" class="" id="muti_tab_fold">更多精彩<em class="unfold"></em></a>
				</div>
			</div>
					</div>
	</div>

                <div id="recService_module">
                    <a name="recService"></a>
                    <!-- 套系服务 -->
                    <div class="sh-mod service">
                        <div class="hd">
                            <span class="n"><h2>推荐服务</h2></span>
                        </div>
                        <div class="bd">
                            <ul class="mod-it-1 cls">
                                <?php if(is_array($goodsdata)): $i = 0; $__LIST__ = $goodsdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
                                    <div class="img pic-center-210-150">
                                        <a class="pc-inner" href="<?php echo U('Goods/index/id/'.$vo['id']);?>" target="_blank">
                                            <img height="160" src="<?php echo ($vo["accessory"]["thumbnail"]); ?>" width="220" alt="<?php echo ($vo["title"]); ?>">
                                        </a>
                                    </div>
                                    <div class="txt">
                                        <p class="attr"><a href="<?php echo U('Goods/index/id/'.$vo['id']);?>" target="_blank"><?php echo ($vo["title"]); ?></a></p>
                                        <p class="price"><span class="discount">&yen;<i><?php echo ($vo["price"]); ?></i></span><span class="original">&yen;<i><?php echo ($vo["original"]); ?></i></span></p>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="sh-more"><a href="<?php echo U('Businesses/service/id/'.$_REQUEST['id']);?>" target="_blank">查看全部服务»</a></div>
                        </div>
                        <div class="ft" style="display:none;"></div>
                    </div>
                </div>

                <div id="discount_module">
                    <a name="discount"></a>
                    <!-- 优惠 -->
                    <div class="sh-mod discount">
                        <div class="hd">
                            <span class="n"><h2>优惠</h2></span>
                        </div>
                        <div class="bd">
                            <ul class="mod-t-1 cls">
                                <?php if(is_array($preferentialdata)): $i = 0; $__LIST__ = $preferentialdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li class="dst-2">
                                    <dl class="">
                                        <dt><a href="<?php echo U('Businesses/preferentialDetail/id/'.$vo['id']);?>" target="_blank"><?php echo ($vo["title"]); ?></a></dt>
                                        <dd>
										<span>截止时间：<?php echo (toDateYmd($vo["endtime"])); ?>  还有：<?php echo intval(($vo['endtime'] - time()) / 86400);?>天</span>
                                            <a href="<?php echo U('Businesses/preferentialDetail/id/'.$vo['id']);?>" target="_blank">立即领取»</a>
                                        </dd>
                                    </dl>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="sh-more">
                                <a href="<?php echo U('Businesses/doing/id/'.$_REQUEST['id']);?>" target="_blank">更多精彩»	</a>
                            </div>
                        </div>
                        <div class="ft" style="display:none;"></div>
                    </div>
                </div>

                <div id="pic_module">
                    <!-- 推荐主题 -->
                    <div class="sh-mod album">
                        <div class="hd">
                            <span class="n"><h2>相册</h2></span>
                        </div>
                        <div class="bd">
                            <ul class="mod-it-2 cls">
                                <?php if(is_array($picturedata)): $i = 0; $__LIST__ = $picturedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li>
                                    <div class="img">
                                        <a class="pc-inner" href="<?php echo U('Businesses/pic/id/'.$vo['id']);?>" target="_blank">
                                            <img src="<?php echo ($vo["accessory"]["thumbnail"]); ?>" alt="<?php echo ($vo["title"]); ?>" width="150">

                                        </a>
                                    </div>
                                    <div class="txt">
                                        <p><a target="_blank" class="" data_number="18" href="<?php echo U('Businesses/pic/id/'.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></p>
                                        <p>(<?php echo ($vo["num"]); ?>张)</p>
                                    </div>
                                    <?php if(($vo["isreal"])  ==  "1"): ?><span class="i-certificate">实景认证</span><?php endif; ?>
                                    <span class="x1"></span>
                                    <span class="x2"></span>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="sh-more"><a href="<?php echo U('Businesses/poto/id/'.$_REQUEST['id']);?>" target="_blank">更多精彩»</a></div>
                        </div>
                        <div class="ft" style="display:none;"></div>
                    </div>
                </div>

                <div id="sns_module">
                <a name="sns"></a>
                <div class="sh-mod expshare">
                <div class="hd tab-hd">
                    <ul class="switch-nav">
                        <li class="selected"><a href="javascript:;">消费分享</a></li>
                    </ul>
                    <?php if(!empty($memberdata)): ?><a href="javascript:;" class="more-link" onclick="jvfDialog('sharebox', APP+'/Member/sharebox');">我也要说»</a><?php endif; ?>
                </div>
                <div class="bd switch-content">

                <div class="selected">
                <div class="mod-loading" style="display: none; "></div>
                <div id="feed_place_list">
                <!-- { start 消费分享 -->
                <ul class="feed-share sh">
                <?php if(is_array($fenxiangdata)): $i = 0; $__LIST__ = $fenxiangdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li class="feed-c">
                    <div class="avatar"><a href=""><img width="50" height="50" src="<?php echo ($vo["header"]); ?>" alt=""></a></div>
                    <div class="fname">
                        <p><strong><a href="<?php echo U('User/space/id/'.$vo['uid']);?>" target="_blank"><?php echo ($vo["name"]); ?></a></strong></p>
                        <p><a href="<?php echo U('User/space/id/'.$vo['uid']);?>" target="_blank"><?php echo (dgmdate($vo["addtime"])); ?></a></p>
                    </div>
                    <div class="post-detail _cmtTarget">
                        <div class="txt">
                            <?php echo ($vo["content"]); ?>
                        </div>

                        <div class="img">
                            <ul class="cls">
                                <?php if(is_array($vo["accessory"])): $i = 0; $__LIST__ = $vo["accessory"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" target="_blank"><img src="<?php echo ($v["thumbnail"]); ?>" width="120" height="120" alt=""></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>

                        <div class="tools cls" postid="72e01b38b06a89ebc5db017a">
                            <span><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" class="digg like-btn"><em><?php echo ($vo["likes"]); ?></em></a></span>
                            <span><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" class="comment-view-btn _cmtBtn" data-postid="72e01b38b06a89ebc5db017a" data--ban="2000">评论</a><b class="c-count">(<?php echo ($vo["comment"]); ?>)</b></span>
                            <span><a href="<?php echo U('Talk_about/detail/id/'.$vo['id']);?>" class="trans-btn">转发</a><b>(<?php echo ($vo["forwarding"]); ?>)</b></span>
                        </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <!-- end 消费分享 }  -->
                </div>

                </div>
                </div>
                </div>
                    <div style="height:1px;"></div>
				</div>
			</div>
        </div>
			<div id="aside">
				<!-- 商家特色 -->
				<div class="sh-mod shop-serv">
																																																																																																																																																																																																																																																																																																																																																																												<div class="hd">
							<span class="n">商家特色</span>
						</div>
						<?php $characteristic = explode(',',str_replace('，',',',$businessesdata['characteristic'])); ?>
						<div class="bd">
							<ul class="cls">
							    <?php if(is_array($characteristic)): $i = 0; $__LIST__ = $characteristic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): ++$i;$mod = ($i % 2 )?><li><span><?php echo ($item); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<span class="x1"></span>
							<div class="btn">
								<a href="javascript:;" class="btns-ex btn-ex-t1 follow jvf_callme" uid="<?php echo ($businessesdata["uid"]); ?>" ><span>在线咨询</span></a>
							</div>
						</div>
									</div>
										
	
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
                        map.addTags("<?php echo ($businessesdata["latitude"]); ?>","<?php echo ($businessesdata["longitude"]); ?>","<?php echo ($businessesdata["address"]); ?>",<?php echo ($businessesdata["zoom"]); ?>,"");<?php endif; ?>
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
				<p><a href="<?php echo U('Member/attention/id/'.$mdata['id']);?>" class="btn-ex-follow guanzhu"><span>加关注</span></a><em><?php echo ($mdata['wasAttentionNum']); ?>观众</em></p>
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