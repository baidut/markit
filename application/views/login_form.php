<!--主体内容-->
	<div class="main wrap">
		<!--左边-->
		<div class="content">
			<!--登录-->
			<div class="page_login">
				<div class="login_box">
					<p>填写账号密码</p>
					<form action="<?=site_url('login/validate_credentials')?>" method="post">
					<ul>
						<li><label for="username">用户名：</label><input type="text" value="" name="username" class="input_txt"/></li>
						<li><label for="username">密  码：</label><input type="password" value="" name="password" class="input_txt"/></li>
						<input type="hidden" value="" name="post_ref"/>
												<li class="submit"><input type="submit" value="登录" name=""/><a href="#">忘记密码？</a></li>
					<?php echo validation_errors('<p class="error">'); ?>
					</ul>
				</form>
				<div class="login_other">
					<dl>
						<dt>推荐使用下列帐号登录来藏：</dt>
						<dd><a href="qqlogin/index.php"><img src="http://www.laicang.com/img/qqlogin.png" alt="使用QQ账号登录"/></a></dd>
						<dd><a href="javascript:;"><img src="http://www.laicang.com/img/wblogin.png" alt="使用新浪微博账号登录" title="暂未支持"/></a></dd>
					</dl>
				</div>
				 			
				</div>
				<div class="reg_box">
					<dl>
						<dt>还没有开通？赶快免费注册一个吧！</dt>
						<dd><a href="<?=site_url('login/signup')?>">注册</a></dd>
					</dl>
				</div>
			</div>
			<!--/登录-->
		</div>
		<!--/左边-->
	</div>
	<!--/主体内容-->
