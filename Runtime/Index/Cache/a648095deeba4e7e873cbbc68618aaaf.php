<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
$(function(){
	signin();
});
</script>

<div class="panel panel-login-new" id="BAIDU_PANEL_4" title="登录">

	<div class="panel-content">

		<div class="bd">
			<div class="panel-login-cont-hd"></div>
			<div class="panel-login-cont-bd cls">
				<div class="panel-login-cont-l">
					<p>还没有帐号？</p>
					<a title="立即注册" class="reg-btn" target="_blank" href="<?php echo U('User/register');?>">立即注册</a>
					<div class="login-btns">
						<p>使用合作网站帐号登录</p>
						<?php if(is_array($login_portdata)): $i = 0; $__LIST__ = $login_portdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a title="<?php echo ($vo["name"]); ?>" class="third-party-btn <?php echo ($vo["remark"]); ?>" target="_blank" href="<?php echo U('Login_port/index/id/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<div class="panel-login-cont-r">
					<form action="<?php echo U('User/login');?>" id="signinform" name="loginForm" method="post" class="panel-login-form">
						<ul>
							<li>
								<label class="k" for="a1">帐号：</label>
								<span class="v">
									<input type="text" id="uname" name="email" value="" placeholder="请输入邮箱">
								</span>
							</li>
							<li>
								<label class="k" for="a2">密码：</label>
								<span class="v">
									<input type="password" id="password" name="password" value="" placeholder="请输入密码">
								</span>
							</li></ul>
							<div class="error-txt"><em id="error_txt"></em></div>
							<div class="login-remember cls">
								<div class="remember-checkbox">
									<input type="checkbox" name="remember_me" id="auto_flag1" checked="true">
									<label for="auto_flag1" title="建议在网吧或公共电脑上取消该选项">下次自动登录</label>
								</div>
								<a class="fogot-num" href="<?php echo U('User/ajaxforgot_password');?>" tabindex="-1" id="forgotPassword">忘记密码?</a>
							</div>
						<div class="btns">
							<input class="btn-login" type="button" id="submit" value="登录">
							<input class="btn-login btn-active" style="display:none" type="button" value="登录中...">
						</div>
					</form>
				</div>
			</div>
		</div>
        
        
	</div>
</div>