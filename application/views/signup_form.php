<!--主体内容-->
<div class="main wrap">
	<!--左边-->
	<div class="content">
		<!--注册-->
		<div class="page_reg">
			<div class="reg_box">
				<p>注册只需10秒！快来体验一下吧！</p>
				<form action="<?=site_url('login/create_member')?>" method="post" id="regform" name="regform" onsubmit="return myReg.formSubmit();">
				<ul>
					<li><label>用户名：</label><input type="text" value="" class="input_txt" name="username" autocomplete="auto" onblur="myReg.checkUserName()" onfocus="myReg.showTip('UserName');" style="ime-mode:disabled"/><span id="resUserName"></span></li>
					<li><label>密码：</label><input type="password" value="" class="input_txt" name="password" onblur="myReg.checkpassword()" onfocus="myReg.showTip('Password');"/><span id="resPassword"></span></li>
					<li><label>重复密码：</label><input type="password" value="" class="input_txt" name="passwordconfirm" onblur="myReg.checkpasswordConfirm()" onfocus="myReg.showTip('PasswordConfirm');"/><span id="resPasswordConfirm"></span></li>
					<li><label>邮箱地址：</label><input type="text" value="" class="input_txt" name="email" onblur="myReg.checkEmail()" onfocus="myReg.showTip('Email');"/><span id="resEmail"></span></li>
					<li><label>验证码：</label><input type="text" value="" class="input_txt input_vcode" name="vcode"/><img src="vcode.php" alt="验证码点击切换" onclick="myReg.vodeChange(this);"/></li>
					<li><label></label><input type="submit" value="注册" class="input_submit"  name="submit"/></li>
				</ul>
				</form>
			</div>
			<div class="login_box">
				已经有账号了，请直接登录<a href="<?=site_url('login')?>">登录</a>
			</div>
		</div>
		<!--/注册-->
	</div>
	<!--/左边-->
</div>
<!--/主体内容-->


<script type="text/javascript">
function checkReg(formId,objSelf) {
	this.objForm = document.getElementById(formId);
	var self = this;
	this.objSelf = objSelf;
	this.passed = false;
	this.checkitem = ["UserName","Password","PasswordConfirm","Email"];
	this.classname = ["tip_box","checking_box","error_box","ok_box"];
	this.tip = {
		'UserName' : '使用英文、数字，总字符数在 4 - 14 之间。',
		'Password' : '长度为 6 - 20 个字符。',
		'PasswordConfirm' : '重复输入',
		'Email' : '正确的格式'
	}
	//字符串长度
	this.getStrLength = function (str) {
		var newLength = 0;
		for(var i=0;i<str.length;i++) {
			if(str.charCodeAt(i) > 255) {
				newLength = newLength + 2;
			} else {
				newLength = newLength + 1;
			}
		}
		return newLength;
	}
	//提交表单
	this.formSubmit = function() {
		this.passed = true;
		for (var i=0;i<this.checkitem.length;i++) {
			obj = document.getElementById("res"+this.checkitem[i]);
			if (obj.className != this.classname[3]) {
			var checkinfo = eval("this.check"+this.checkitem[i]+"()");
			if (checkinfo == 'checking') {
				this.passed = false;
			} else {
				this.passed = this.passed && checkinfo;
			}
		}
		}
		return this.passed;
	}
	//显示信息
	this.showTip = function (obj,item,tip) {
		var obj;
		if (item == null) {
			item = 0;
		}
		if (tip == null) {
			tip = eval("this.tip."+obj);
		}
		obj = document.getElementById("res"+obj);
		obj.innerHTML = tip;
		obj.className = this.classname[item];
	}
	//用户名验证
	this.checkUserName = function() {
		if(this.objForm.username.value.length == 0) {
			tip = "用户名不能为空";
			this.showTip("UserName", 2 ,tip);
			return false;
		} else if (!/^[A-Za-z0-9]{4,14}$/.test(this.objForm.username.value)) {
			tip = "用户名由数字、字母、组合而成";
			this.showTip("UserName", 2, tip);
			return false;
		} else if (this.objForm.username.value.indexOf (' ') >= 0 || this.objForm.username.value.indexOf ('\\') >= 0 || this.objForm.username.value.indexOf ('\'') >= 0 || this.objForm.username.value.indexOf ('\"') >= 0 || this.objForm.username.value.indexOf ('&') >= 0) {
			tip = "用户名包含非法字符";
			this.showTip("UserName", 2, tip);
			return false;
		} else {
			this.showTip("UserName",3,"此用户名可以注册");
	//		self.objForm.submit.removeAttribute("disabled");
			return true;	//下面那个函数应该修改，与现在数据库相连
			this.checkUserNameAjax();
			return 'checking';
		}
	}
	 //用户名ajax验证
	this.checkUserNameAjax = function() {
		this.showTip("UserName", 1, "正在检测中");
		var userNameAjax = myGetAjax ("signcheck.php?act=name&regname="+encodeURI(this.objForm.username.value),this.callbackCheckUsername,self);
	}
	this.callbackCheckUsername = function (txt,obj) {
		if (txt == "ok") {
			self.showTip("UserName",3,"此用户名可以注册");
			self.objForm.submit.removeAttribute("disabled");
		} else {
			self.showTip("UserName",2,txt);
			self.objForm.submit.setAttribute("disabled",true);
		}
			
	}
	//密码验证
	this.checkpassword = function () {
		if(this.objForm.password.value.length == 0) {
			tip = "密码不能为空";
			this.showTip("Password",2,tip);
			return false;
		} else if (this.objForm.password.value.length < 6 || this.objForm.password.value.length >20) {
			tip = "密码长度在6到20之间";
			this.showTip("Password",2,tip);
			return false;
		} else {
			tip = "密码ok";
			this.showTip("Password",3,tip);
			return true;
		}
	}
	//密码确认验证
	this.checkpasswordConfirm = function () {
		if(this.objForm.passwordconfirm.value.length == 0) {
			tip = "密码不能为空！";
			this.showTip("PasswordConfirm",2,tip);
			return false;
		} else if (this.objForm.passwordconfirm.value.length < 6 || this.objForm.passwordconfirm.value.length >20) {
			tip = "密码长度在6到20之间";
			this.showTip("PasswordConfirm",2,tip);
			return false;
		} else if (this.objForm.passwordconfirm.value != this.objForm.password.value) {
			tip = "两次密码不一致";
			this.showTip("PasswordConfirm",2,tip);
			return false;
		} else {
			tip = "确认密码ok";
			this.showTip("PasswordConfirm",3,tip);
			return true;
		}
	}
	//邮箱验证
	this.checkEmail = function () {
		if(this.objForm.email.value.length == 0) {
			tip = "邮箱不能为空";
			this.showTip("Email",2,tip);
			return false;
		} else if ((/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/).test(this.objForm.email.value) == false) {
			tip = "邮箱格式不对";
			this.showTip("Email",2,tip);
			return false;
		} else {
			this.showTip("Email",3,"此邮箱可以注册");
			return true;	//下面函数自己定义邮箱规则
			this.checkEmailAjax();
			return 'checking';
		}
	}
	 //邮箱ajax验证
	this.checkEmailAjax = function() {
		this.showTip("Email", 1, "正在检测中");
		var emailAjax = myGetAjax ("signcheck.php?act=email&regemail="+encodeURI(this.objForm.email.value),this.callbackCheckMail,self);
	}
	this.callbackCheckMail = function (txt) {
		if (txt == "ok") {
			self.showTip("Email",3,"此邮箱可以注册");
			return true;
		} else {
			self.showTip("Email",2,txt);
			return false;
		}	
	}
	
	//验证码切换
	this.vodeChange = function(o) {
		o.setAttribute("src","http://www.laicang.com/vcode.php?"+ new Date().getTime());
	}
}
var myReg = new checkReg("regform","myReg");
</script>
