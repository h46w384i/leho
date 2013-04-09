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
<link rel="stylesheet" type="text/css" href="../Public/css/global.css"/>
<link rel="stylesheet" type="text/css" href="../Public/css/pay.css"/>
<script type="text/javascript">
$(function(){
	memberPayment();
});
</script>

<div id="wrapper">
            
	<!--div id="hd"></div-->
				<div id="bd" class="grid-m0a220 sh-platform">
		<div id="wrap" class="cls m-context-bg">
			<div id="main">
				<div class="inner">
					<div class="context">
						<!-- 标题 -->
						<div class="cont-title">
							<span class="orders">订购服务<i>仅需三步</i></span>
							<div class="steps">
								<ol>
									<li class="selected-pre"><span class="first"><em>1.提交订单</em></span></li>
									<li class="selected"><span class=""><em>2.选择支付方式</em></span></li>
									<li><span class="last"><em>3.支付成功</em></span></li>
								</ol>
							</div>
						</div>
						<form method="post" id="payForm">
						<div class="order-list">
							<table summary="" cellpadding="0" cellspacing="0">
								<colgroup>
									<col class="table-list-11">
									<col class="table-list-2">
									<col class="table-list-3">
									<col class="table-list-4">
									<col class="table-list-7">
									<col class="table-list-8">
								</colgroup>
								<thead>
									<tr>
										<th class="table-list-11">服务内容</th>
										<th>数量</th>
										<th>&nbsp;</th>
										<th>乐活价</th>
										<th>&nbsp;</th>
										<th>小计</th>
									</tr>
								</thead>
								<tbody>
								<?php if(is_array($goodsdata)): $i = 0; $__LIST__ = $goodsdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr>
										<td class="table-list-11"><p class=""><a href="<?php echo U('Goods/index/id/'.$vo['id']);?>" target="_blank"><?php echo ($vo["title"]); ?></a></p><p class="from"><em>来自：<?php echo ($vo["promulgator"]["name"]); ?></em></p></td>
										<td class="price">
										<?php echo ($nums[$vo['id']]); ?>
										</td>
										<td class="symbol">×</td>
										<td class="price">&yen;<?php echo ($vo["price"]); ?></td>
										<td class="symbol">=</td>
										<td class="price single">&yen;
										<?php $tmp = $nums[$vo['id']] * $vo['price'];
					          			$total += $tmp;
					          			echo toPrice($tmp); ?>
					          			</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
									<tr>
										<td colspan="6" class="total mobile">订购成功后，消费券密码将发送至您的手机号：<b>13512345678</b>，凭此密码到店消费。</td>
									</tr>
									<tr>
										<td colspan="6" class="total"><a href="javascript:;" onclick="window.history.back();return false;" class="fix" id="btn-back">&lt;&lt;返回修改订单</a>应付金额：<i>&yen;<span id="totalPrices"><?php echo (toPrice($total)); ?></span></i></td>
									</tr>
								</tbody>
							</table>
						</div>
						  <?php if(!empty($orderdata)): ?><input id="oid" name="oid" type="hidden" value="<?php echo ($orderdata["id"]); ?>"><?php endif; ?>
						<div id="mobile" class="order-next">
							<div class="title">
								<span class="">您的手机：</span>
							</div>
							<div class="content mobile">
								<p><em>订购成功后，乐活券密码将发送至您的手机号：</em><span class="emptyhint dark-emptyhint">在此填写您的手机号码</span><input type="text" name="phone" id="phone" data-placeholder="在此填写您的手机号码" value="<?php if(empty($orderdata)): ?><?php echo ($memberdata["phone"]); ?><?php else: ?><?php echo ($orderdata["phone"]); ?><?php endif; ?>" maxlength="11" datatype="mobilecode" forcevld="true" reqmsg=" 请输入手机号" emel="hint-mobile" emptyhintel="emptyhint-10001"><em>，凭此密码到店消费。</em></p>
								<p class="mobile-err"><span id="hint-mobile"></span></p>
							</div>
						</div>
						<div id="mobile" class="order-next">
							<div class="title">
								<span class="">账户信息：</span>
							</div>
							<div class="content mobile">
							<ul class="account_info">
								<li class="balance"><strong class="font14px bold"><?php echo L("account_balance");?>：</strong><span class="arial">&yen;<b id="balanceTf"><?php echo (toPrice($memberdata["cash"])); ?></b></span></li>
								<li id="needPriceWrap" class="balance hidden" style="display: list-item;">
									<?php if(($orderdata["incharge"])  >  "0"): ?><strong class="font14px bold"><?php echo L("status_pay");?>：</strong>
										<span class="f18 fontff5500">&yen;<b id="incharge"><?php echo ($orderdata["incharge"]); ?></b></span>，<?php endif; ?>
										<strong class="font14px bold"><?php echo L("member_payment_needpricewrap");?>：</strong>
										<span class="f18 fontff5500">&yen;<b id="needPrice">0</b></span>
								</li>
                                <li class="balance"><input type="checkbox" checked="checked" id="iscash" value="1" name="iscash"><label for="iscash"><?php echo L("member_payment_iscash");?></label></li>
					            <li class="mobile bdt"><?php echo L("member_payment_verification");?></li>
					            
					            <li class="mobile bold" style="height: auto;line-height: auto;"><label class="jvf_fl" for="remark"><?php echo L("remark_text");?>：</label><textarea cols="30" rows="4" placeholder="<?php echo L("remark_text");?>" class="jvf_inputt mx600" name="remark" id="remark"><?php echo ($orderdata["remark"]); ?></textarea></li>
            				</ul>
							</div>
						</div>
						<script type="text/javascript">
$(function(){
	$('#hideBank').click(function(){
		var input = $('input[name="payblank"]');
		input.attr('checked',false);
	});
	
	$('input[name="paytype"]').click(function(){
		var li = $(this).parents('li');
		var lis = li.siblings();
		lis.removeClass('checked');
		li.addClass('checked');
	});
})

</script>
<div class="order-next">
	<div class="title" style="margin-bottom:15px;">
		<span class="">选择支付方式：</span>
	</div>
	<div class="content pay" style="margin-left:15px;">
		<div class="bank">
			<p>第三方支付：</p>
			<ul class="bank_select_bor">
				<?php if(is_array($paymentdata)): $i = 0; $__LIST__ = $paymentdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><input type="radio" name="paytype" id="bank_zhifubao" <?php if(($key)  ==  "0"): ?>checked="checked"<?php endif; ?> type="radio" value="<?php echo ($vo["mark"]); ?>" id="<?php echo ($vo["mark"]); ?>"><label for="<?php echo ($vo["mark"]); ?>"><img src="__ROOT__<?php echo ($vo["logo"]); ?>" alt="<?php echo ($vo["name"]); ?>" /></label></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="bank">
			<p>网银支付：</p>
			<ul class="bank_select_bor mt10" id="showBanks">
			    <li><span>
			      <input name="payblank" type="radio" value="ABC" id="ABC-NET-B2C"  />
			      </span>
			      <label for="ABC-NET-B2C"><img src="../Public/images/bank/ABC-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="CCB" id="CCB-NET-B2C" />
			      </span>
			      <label for="CCB-NET-B2C"><img src="../Public/images/bank/CCB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="CMB" id="CMBCHINA-NET-B2C" />
			      </span>
			      <label for="CMBCHINA-NET-B2C"><img src="../Public/images/bank/CMBCHINA-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="BOC" id="BOC-NET-B2C" />
			      </span>
			      <label for="BOC-NET-B2C"><img src="../Public/images/bank/BOC-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="BCM" id="BOCO-NET-B2C" />
			      </span>
			      <label for="BOCO-NET-B2C"><img src="../Public/images/bank/BOCO-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="CEB" id="CEB-NET-B2C" />
			      </span>
			      <label for="CEB-NET-B2C"><img src="../Public/images/bank/CEB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="CMBC" id="CMBC-NET-B2C" />
			      </span>
			      <label for="CMBC-NET-B2C"><img src="../Public/images/bank/CMBC-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="SPDB" id="SPDB-NET-B2C" />
			      </span>
			      <label for="SPDB-NET-B2C"><img src="../Public/images/bank/SPDB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="CIB" id="CIB-NET-B2C" />
			      </span>
			      <label for="CIB-NET-B2C"><img src="../Public/images/bank/CIB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="GDB" id="GDB-NET-B2C" />
			      </span>
			      <label for="GDB-NET-B2C"><img src="../Public/images/bank/GDB-NET-B2C.png" /></label>
			    </li>         
			    <li><span>
			      <input name="payblank" type="radio" value="CITIC" id="ECITIC-NET-B2C" />
			      </span>
			      <label for="ECITIC-NET-B2C"><img src="../Public/images/bank/ECITIC-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="SDB" id="SDB-NET-B2C" />
			      </span>
			      <label for="SDB-NET-B2C"><img src="../Public/images/bank/SDB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="PAB" id="PINGANBANK-NET" />
			      </span>
			      <label for="PINGANBANK-NET"><img src="../Public/images/bank/PINGANBANK-NET.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="BJB" id="BCCB-NET-B2C" />
			      </span>
			      <label for="BCCB-NET-B2C"><img src="../Public/images/bank/BCCB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="PSBC" id="POST-NET-B2C" />
			      </span>
			      <label for="POST-NET-B2C"><img src="../Public/images/bank/POST-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="BJNB" id="BJRCB-NET-B2C" />
			      </span>
			      <label for="BJRCB-NET-B2C"><img src="../Public/images/bank/BJRCB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="NBB" id="NBCB-NET-B2C" />
			      </span>
			      <label for="NBCB-NET-B2C"><img src="../Public/images/bank/NBCB-NET-B2C.png" /></label>
			    </li>
			    <li><span>
			      <input name="payblank" type="radio" value="SHB" id="SHB-NET-B2C" />
			      </span>
			      <label for="SHB-NET-B2C"><img src="../Public/images/bank/SHB-NET-B2C.png" /></label>
			    </li>
			    <li><a href="javascript:;" id="hideBank"><?php echo L("member_paylist_hidebank");?></a></li>
			</ul>
		</div>
	</div>
</div>
												<!-- 提交订购 -->
						<div class="btns">
													<a href="javascript:;" class="btn btn-t1" target="_blank" id="goodsBuyBtn" onclick="$('#payForm').submit();"><span>确认订单，付款</span></a>
												</div>
						</form>
					</div>
				</div>
			</div>
			<div id="aside" class="no-bdr">
				<div class="mod serv-tel">
					<div class="hd">客服电话：</div>
					<div class="bd">
						<p><i><?php echo C("sysconfig.site_services_tel");?></i></p>
						<p>工作时间：<?php echo C("sysconfig.site_work_times");?></p>
					</div>
					<div class="ft" style="display:none;"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="ft"></div>	
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