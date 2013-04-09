<?php if (!defined('THINK_PATH')) exit();?><script>
$(function(){
	talk_about();
});
</script>
<div class="panel-content publish switch-list switch-tabs" id="publish"
	title="生活分享">
	<div class="bd switch-content" id="edit_content">
		<div class="container cls selected">
			<form id="talk_aboutBox" method="post">
				<ul class="type-in cls">
					<li class="cls">
						<div class="wrap-pic">
							<div class="pos cls" id="img_list">
								<div class="up-pic re-up-pic">
								<a id="imgs" href="javascript:;" class="imgs"></a>
								</div>
							</div>
						</div>
					</li>
					<li><div class="editor cls">
							<ul class="txt-type cls">
								<li class="current"><a href="javascript:;" class="face" id="face"></a></li>
								<li><a href="javascript:;" id="friend"
									class="friend"></a></li>
								<li data-type="blank" class="consume-blank-topic" id="label"><a
									href="javascript:;" class="topic"></a></li>
							</ul>
							<textarea id="consume_textarea" name="content"><?php echo ($labelstr); ?></textarea>
							<div id="textNum" style="display: block; "><div class="count-txt">还可以输入<span class="txt">500</span>字</div></div>
						</div></li>
					<li class="cls"><div
							id="address-sug" class="input1 address">
							<div class="inp-cn">
								<i class="ico-1"></i>
								<input id="address-sug-input" type="text" name="place" class="placeholder" placeholder="发生在哪儿" emptyhintel="emptyhint-10002">
								<i class="ico-2 X" style="display: none" id="address_clear"></i>
							</div>
							<div class="foot">如：东城区东直门来福士购物中心</div>
						</div>
						</li>
					<li class="cls"><div class="input1 money">
							<div class="inp-cn">
								<i class="ico-1"></i><input id="inp_price" type="text"
									class="placeholder" name="price"
									placeholder="花了多少钱" emptyhintel="emptyhint-10003"><em></em>
							</div>
							<div class="foot">元/人</div>
						</div></li>
				</ul>
				<div class="publish-bar">
					<div class="calendar-box" style="">
						<input type="text" class="input-day into" id="consume_date"
							name="consume_date" value="<?php echo toDateYmd(time());?>"><img
							src="../Public/images/Calendar.gif"
							align="absMiddle" class="calendar-hdl-img"
							style="cursor: pointer">
					</div>
					<label class="checkbox-cont">
						
                        <span class="checkbox-text consume_showin_timeline checked" style="width:100px; line-height:15px;">&nbsp;&nbsp;&nbsp;&nbsp;展现在时光轴</span>
					</label>
					<input type="hidden" name="consume_showTimeline"
						id="consume_showTimeline" value="1"><a href="javascript:;"
						id="submit" class="btns btn-default-32"><span>发布</span></a>
				</div>
			</form>
		</div>

	</div>
</div>