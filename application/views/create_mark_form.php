<!--主体内容-->
	<div class="main wrap">
		<!--左边-->
		<div class="content">
		<div class="t">收藏新网页</div>
		<div class="url_get">
			<form action="<?=site_url('user/add_mark')?>" method="post" id="urlGet">
			<ul>
				<li class="f14 bold tit">网页标题：</li>
				<li><input type="text" name="gettitle" value="<?=isset($fetched_title)?$fetched_title:"";?>" class="input_txt"><span id="resTitle"></span></li>
				<li class="f14 bold tit">网页地址：</li>
				<li><input type="text" name="geturl" value="<?=isset($url)?$url:"请输入网址url..."?>" class="input_txt"><span id="resUrl"></span></li>
				<li class="f14 bold tit">网页描述：</li>
				<li><textarea name="info" rows="3" ><?=isset($fetched_description)?$fetched_description:''?></textarea></li>
				<li class="f14 bold tit">关键词：</li>
				<li><input type="text" name="tags" class="input_txt" value="<?=isset($fetched_keywords)?$fetched_keywords:''?>"></li>
				<li class="f14 tit_status"><span class="bold f14">收藏状态：</span>公开<input type="radio" name="ishide" value="0" checked="">隐藏<input type="radio" name="ishide" value="1"></li> 注：目前还不支持私有收藏
				<li><a class="btn_blue" onclick="myUrlGet.formSubmit();"><b>提 交</b></a></li>
			</ul>
			</form>
		</div>
		</div>
		<!--/左边-->
	</div>
	<!--/主体内容-->
	<script type="text/javascript">
		function checkUrlGet(formId,objSelf) {
			this.objForm = document.getElementById(formId);
			var self = this;
			this.objSelf = objSelf;
			this.passed = false;
			this.checkitem = ["Title","Url"];
			this.classname = ["tip_box","checking_box","error_box","ok_box"];
			//网址正则验证
			this.IsURL = function(str_url) {
        var strRegex = "^((https|http|ftp|rtsp|mms)?://)"
        + "?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?" //ftp的user@
        + "(([0-9]{1,3}\.){3}[0-9]{1,3}" // IP形式的URL- 199.194.52.184
        + "|" // 允许IP和DOMAIN（域名）
        + "([0-9a-z_!~*'()-]+\.)*" // 域名- www.
        + "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." // 二级域名
        + "[a-z]{2,6})" // first level domain- .com or .museum
        + "(:[0-9]{1,4})?" // 端口- :80
        + "((/?)|" // a slash isn't required if there is no file name
        + "(/[0-9A-Za-z_!~*'().;?:@&=+$,%#-]+)+/?)$";
        var re=new RegExp(strRegex);
        if (re.test(str_url)){
            return true;
        } else {
            return false;
        }
			}
			//提交表单
			this.formSubmit = function() {
				this.passed = true;
				for (var i=0;i<this.checkitem.length;i++) {
					obj = document.getElementById("res"+this.checkitem[i]);
					var checkinfo = eval("this.check"+this.checkitem[i]+"()");
					this.passed = this.passed && checkinfo;
				}
				if(this.passed) {
					this.objForm.submit();
				}
			}
			//显示信息
			this.showTip = function (obj,item,tip) {
				var obj;
				if (item == null) {
					item = 0;
				}
				obj = document.getElementById("res"+obj);
				obj.innerHTML = tip;
				obj.className = this.classname[item];
			}
			//网页标题验证
			this.checkTitle = function() {
				if(this.objForm.gettitle.value.length == 0) {
					tip = "网页标题不能空着啊";
					this.showTip("Title", 2 ,tip);
					return false;
				} else {
					tip = "";
					this.showTip("Title",3,tip);
					return true;
				}
			}
			//网页地址验证
			this.checkUrl = function () {
				if(this.objForm.geturl.value.length == 0) {
					tip = "网页地址不能空着啊";
					this.showTip("Url",2,tip);
					return false;
				} else if(!this.IsURL(this.objForm.geturl.value)) {
					tip = "网页地址格式不对";
					this.showTip("Url",2,tip);
					return false;
				} else {
					tip = "";
					this.showTip("Url",3,tip);
					return true;
				}
			}
		}
		var myUrlGet = new checkUrlGet("urlGet","myUrlGet");
	</script>
