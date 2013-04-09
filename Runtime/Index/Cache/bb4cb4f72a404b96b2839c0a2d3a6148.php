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
<link rel="stylesheet" type="text/css" href="../Public/css/detail.css"/>
<script type="text/javascript" src="../Public/js/jquery.countdown.min.js"></script>
<script>
$.onload(function(){
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
	$.getScript('../Public/js/baidumap_one.js');
});

function load_map_wrapper(){
	<?php if(($goodsdata["latitude"] != '') AND ($goodsdata["longitude"] != '')): ?>var map = new jvfMap("map","<?php echo ($goodsdata["latitude"]); ?>","<?php echo ($goodsdata["longitude"]); ?>",<?php echo ($goodsdata["zoom"]); ?>,false);
	map.addTags("<?php echo ($goodsdata["latitude"]); ?>","<?php echo ($goodsdata["longitude"]); ?>","<?php echo ($goodsdata["address"]); ?>",<?php echo ($goodsdata["zoom"]); ?>,"<?php echo ($goodsdata["short_title"]); ?><br /><?php echo L("address_text");?>：<?php echo ($goodsdata["address"]); ?><br /><?php echo L("phone_text");?>：<?php echo ($goodsdata["tel"]); ?>");
	<?php else: ?>
	initialize();<?php endif; ?>
}
$(function(){
	jQuery("#ddTimeout").countdown({
		until: <?php echo ($goodsdata['finishtime'] - time()); ?>, 
		compact: true,
		layout: '<span>{d10}{d1}天</span><span>{h10}{h1}小时</span><span>{m10}{m1}分</span><span>{s10}{s1}秒</span>'
	});
	goodsIndex();
	load_map_wrapper();
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
        <div id="main" class="detail">
            <div class="inner">
            
	            	<ul class="path">
				<li class="first"><a href="<?php echo U('Mall/index');?>">商城首页</a></li>
				<li><a href="<?php echo U('Mall/classify/cid/'.$cidarr[1]);?>"><?php echo (getParent('Goods_category',$cidarr[1])); ?></a></li>
				<li><a href="<?php echo U('Mall/classify/cid/'.$cidarr[1]);?>?child=<?php echo ($cidarr[2]); ?>"><?php echo (getParent('Goods_category',$cidarr[2])); ?></a></li>
				<li><?php echo ($goodsdata["short_title"]); ?></li>
	</ul>
	<div class="product-info cls">
		<div class="intro">
			<h1><?php echo ($goodsdata["short_title"]); ?></h1>
			<p><?php echo ($goodsdata["title"]); ?></p>
		</div>
		<div class="illustration"><div class="pic-center"><img src="<?php echo ($goodsdata["accessory"]["0"]["path"]); ?>" title="<?php echo ($goodsdata["short_title"]); ?>" width="410" height="300"></div></div>
		<div class="purchase-module purchase-module-type1">
			<div class="price">
				<p>&yen<span><?php echo ($goodsdata["price"]); ?></span></p>
				<div class="purchase-btn"><a class="tobuy" href="javascript:;">抢购</a></div>
			</div>
						<div class="result cls">
				<dl>
					<dt>原价</dt>
					<dd>&yen<?php echo ($goodsdata["original"]); ?></dd>
				</dl>
				<dl>
					<dt>折扣</dt>
					<dd><?php echo toPrice($goodsdata['price']/$goodsdata['original']*10);?>折</dd>
				</dl>
				<dl>
					<dt>节省</dt>
					<dd>&yen<?php echo ($goodsdata['original'] - $goodsdata['price']); ?></dd>
				</dl>
			</div>
			<div class="statistic"><span class="ico ico-people"></span><strong><?php echo ($goodsdata["crrnum"]); ?></strong>人已购买</div>
			<div class="timeleft">
				<span class="ico ico-time"></span>
				<dl>
					<dt>剩余时间</dt>
					<dd id="ddTimeout"></dd>
				</dl>
			</div>
			<div class="promise cls">
				<dl>
					<dd class="ico ico-rsms"></dd>
					<dt>如实描述</dt>
                    <dd><a title="服务信息真实消费才靠谱" href="<?php echo U('Article/detail/id/55');?>"></a></dd>
				</dl>
                				<dl>
					<dd class="ico ico-sst"></dd>
					<dt>随时退款</dt>
                    <dd><a title="未消费想退就退" href="<?php echo U('Article/detail/id/56');?>"></a></dd>
				</dl>
                				<dl>
					<dd class="ico ico-xxpf"></dd>
					<dt>先行赔付</dt>
                    <dd><a title="消费纠纷商城为您做主" href="<?php echo U('Article/detail/id/57');?>"></a></dd>
				</dl>
			</div>
		</div>
		<div class="share-container bdshare_t bds_tools get-codes-bdshare" id="bdshare" style="z-index: 1; ">
			<h4>分享到：</h4>
            <a class="bds_qzone" title="分享到QQ空间">QQ空间</a>
            <a class="bds_tsina" title="分享到新浪微博">新浪微博</a>
            <a class="bds_tqq" title="分享到腾讯微博">腾讯微博</a>
            <a class="bds_renren" title="分享到人人网">人人网</a>
            <span class="bds_more">更多</span>
		</div>
		<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=668549" ></script>
		<script type="text/javascript" id="bdshell_js"></script>
	</div>
	<div class="article">
        <?php echo ($goodsdata["detail"]); ?>
	</div>
	<div class="purchase-module purchase-module-type2">
		<div class="price">
				<p>&yen<span><?php echo ($goodsdata["price"]); ?></span></p>
				<div class="purchase-btn"><a class="tobuy" href="<?php echo U('Goods/buy/id/'.$goodsdata['id']);?>">抢购</a></div>
			</div>
						<div class="result cls">
				<dl>
					<dt>原价</dt>
					<dd>&yen<?php echo ($goodsdata["original"]); ?></dd>
				</dl>
				<dl>
					<dt>折扣</dt>
					<dd><?php echo toPrice($goodsdata['price']/$goodsdata['original']*10);?>折</dd>
				</dl>
				<dl>
					<dt>节省</dt>
					<dd>&yen<?php echo ($goodsdata['original'] - $goodsdata['price']); ?></dd>
				</dl>
			</div>
	</div>

            </div>
        </div>
        
        
        
        <div id="aside">
            
	<div class="shop-info mod">
		<div class="bd">
        	<h2><a href="<?php echo U('Businesses/detail/id/'.$goodsdata['promulgator']['id']);?>" target="_blank"><?php echo ($goodsdata['promulgator']['name']); ?></a></h2>
			<ul>
	          <li>
				  <em>商家认证：</em>
				  <?php if(($goodsdata["promulgator"]["qualifications"])  ==  "1"): ?><a target="_blank" href="<?php echo U('Article/detail/id/58');?>" class="ico zizi" title="资质认证"></a><?php endif; ?>
	              <?php if(($goodsdata["promulgator"]["security"])  ==  "1"): ?><a target="_blank" href="<?php echo U('Article/detail/id/59');?>" class="ico baozhengjin" title="保证金计划"></a><?php endif; ?>
	          </li>
              <li><em>类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：</em><?php echo (($goodsdata["promulgator"]["type"])?($goodsdata["promulgator"]["type"]):"暂无信息"); ?></li>
              
              <li><em>商家特色：</em><?php echo (($goodsdata["promulgator"]["characteristic"])?($goodsdata["promulgator"]["characteristic"]):"暂无信息"); ?></li>

				<li><em>营业时间：</em><?php echo (($goodsdata["promulgator"]["opening"])?($goodsdata["promulgator"]["opening"]):"暂无信息"); ?></li>
                                                                
				<li><em>预约电话：</em><?php echo (($goodsdata["promulgator"]["tel"])?($goodsdata["promulgator"]["tel"]):"暂无信息"); ?></li>
				<li><em>商家地址：</em><?php echo (($goodsdata["promulgator"]["address"])?($goodsdata["promulgator"]["address"]):"暂无信息"); ?><a class="addr_map_button tomap" href="javascript:;" id="businessesMap" rel="<?php echo ($goodsdata["promulgator"]["id"]); ?>">[地图]</a></li>
			</ul>
		</div>
	</div>
    
    <!-- 店铺介绍 end -->

    <!-- 地图 sta -->
	<div class="mod shop-map">
		<div class="hd"><h4>地图</h4></div>
		<div id="map_module" class="bd">
                   <div class="data" style="">
           <div id="map" class="map"></div>
           <div class="options cls text"><span class="opt-2"><a class="addr_map_button" href="javascript:;" id="bigMap" rel="<?php echo ($goodsdata["id"]); ?>">查看大图</a></span></div>
       </div>
            		</div>
	</div>
    <div id="hugeViewMapPanel" style="width: 813px;display:none;" class="panel panel-t1">
        <div class="panel-content">
            <div class="hd">
                <h3>查看地图</h3>
            </div>
            <div class="bd">
                <!-- content -->
                <div class="panel-map">
                    <div class="map" style="width:782px;height:541px;"></div>
                </div>
                <div class="panel-map-info">
                    <h4><a href="javascript:;" rel="nofollow" class="map-shop-name"></a></h4>
                    <ul class="map-shop-container cls">
                        <li><span class="map-shop-address-icon map-shop-common">地址：</span><span class="map-shop-address"></span></li>
                        <li><span class="map-shop-phone-icon map-shop-common">电话：</span><span class="map-shop-phone"></span></li>
                    </ul>
                    <div class="tips">
                        提醒: 地图标注位置仅供参考，具体情况以实际道路标识信息为准
                    </div>
                </div>
            </div>
        </div>

        <span class="co1"><span></span></span>
        <span class="co2"><span></span></span>
        <span class="cue"></span>
        <span class="sd"></span>
        <span class="close"></span>
        <span class="resize"></span>
    </div>

    				


    
    <!-- 地图 end -->

    	<div class="recommend-list mod">
		<div class="hd"><h4>相关服务推荐</h4></div>
		<div class="bd showindow">
		<?php if(is_array($similar)): $i = 0; $__LIST__ = $similar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="cell">
				<div class="pic"><a href="<?php echo U('Goods/index/id/'.$vo['id']);?>">
					<img height="138" src="<?php echo ($vo["accessory"]["thumbnail"]); ?>" title="<?php echo ($vo["short_title"]); ?>"></a>
				</div>
				<div class="intro"><a href="<?php echo U('Goods/index/id/'.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></div>
				<div class="info2">
					<div class="record"><span><?php echo ($vo["crrnum"]); ?></span>人已经购买</div>
					<a class="go" href="<?php echo U('Goods/index/id/'.$vo['id']);?>">去看看</a>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
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