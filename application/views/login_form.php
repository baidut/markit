<!--主体内容-->
	<div class="main wrap">
		<!--左边-->
		<div class="content">
			<!--登录-->
			<div class="page_login">
				<div class="login_box">
					<p>填写账号密码</p>
					<?=validation_errors('<div class="notice_tip">','</div>')?>
					<form action="<?=site_url('login/validate_credentials')?>" method="post">
					<ul>
						<li><label for="username">用户名：</label><input type="text" value="" id='username' name="username" class="input_txt"/><span id="tipName"></span></li>
						<li><label for="username">密  码：</label><input type="password" value="" id='password' name="password" class="input_txt"/><span id="tipPassword"></span></li>
						<input type="hidden" value="" name="post_ref"/>
						<li class="submit"><input type="submit" value="登录" name=""/><a href="#">忘记密码？</a></li>
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
<script>
$(document).ready(function(){
	// 密码检测
	// $('#username').blur(function(){//用户名文本框失去焦点触发验证事件
 //    	alert("blur");
 //    	var username = $(this).val();
	// 	if(!/[a-zA-Z0-9]{3,8}/.test(username)) {   //如果没有匹配到，那么就错误
 //     		$("#r_name").html("用户名格式错误!");
	// 	}
 //    	if( !$(this).val() || !$(this).val().match(/([w]){2,15}$/))  {//只处验证不能为空并且只能为英文或者数字或者下划线组成的２－１５个字符
 //        	alert("wa");//$("#tipName").html("用户名不能为空且只能为英文或者数字");
 //    	}
 //    	else {
 //        	alert("right");//$("#tipName").html("输入正确");
 //    	}
 // 	});
 //    $('#password').blur(function(){//用户名文本框失去焦点触发验证事件
 //        if(!$(this).val() || !$(this).val().match(/([w]){2,15}$/)) {//只处验证和上面一样
 //            $("#tipPassword").html("密码不能为空且只能为英文或者数字");
 //        }
 //        else{
 //            $("#tipPassword").html("输入正确");
 //        }
 //     });
});
</script>