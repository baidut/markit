<!--页眉-->
<!DOCTYPE html>
<html lang='en'>
<head>
	<title><?php echo (isset($title))? $title : "Markit" ;?></title>
	<meta charset = 'utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta charset="utf-8"/>
	<meta 	name="description" 
			content="Markit-为您提供免费网络收藏夹,帮助您收藏自己喜欢的网页,存放安全,永远不会丢失,还可以为您的网站增加外链,提高权重,欢迎您的使用。" />
	<meta 	name="keywords" 
			content="Markit,网络收藏夹,免费网络收藏夹,收藏夹,书签,网络书签,免费网络书签,网站推广,网络推广,网站营销,网络营销" />
	<link rel="shortcut icon" href="<?=base_url('favicon.ico')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css?ver=2013102001">
</head>
<body>
	<!-- 头部 -->
	<div class="header">
		<h1 class="logo">
			<a href="<?=site_url()?>">
				<img src="<?=base_url('img/logo.png')?>" 
					 alt="Markit-网络收藏夹" 
					 title="Markit-网络收藏夹"/>
			</a>
		</h1>
		<div class="user_action">
			<ul>
			<?php if($this->session->userdata('username')): ?>
				<li><a href="<?=site_url('login/logout')?>"><?=$this->session->userdata('username')?></a></li>
				<li><a href="<?=site_url('login/logout')?>" class="reg">注销</a></li>
			<?php else: ?>
				<li><a href="<?=site_url('login')?>">登陆</a></li>
				<li><a href="<?=site_url('login/signup')?>" class="reg">注册</a></li>	
			<?php endif; ?>
			</ul>
		</div>
		<div class="nav">
			<ul>
				<li><a href="<?=site_url()?>">首页</a></li>
				<li><a href="<?=site_url('marks/latest')?>">最新收藏</a></li>
				<li><a href="<?=site_url('pages/view/downloads')?>">收藏工具</a></li>
				<li><a href="<?=site_url('pages/view/help')?>">帮助中心</a></li>
				<li><a href="<?=site_url('users/top')?>">排行榜</a></li>
			</ul>
			<p><a href="<?=site_url('login')?>">进入我的收藏</a></p>
		</div>
	</div>
	<!-- /头部 -->
	<!--藏-->
	<div class="index_cang">
		<div class="wrap">
			<div class="act">
				<p>将网址复制到下面的输入框中，点击收藏按钮立即收藏！</p>
				<form action="<?=site_url('user/add_mark')?>" method="post">
					<input type="text" value="请输入网址url..." name="url" class="input_txt" onfocus="this.value=''" onblur="if(this.value=='') {this.value='请输入网址url...'}"style="color:#666;"/>
					<input type="submit" value="收藏" class="input_submit">
				</form>
			</div>
		</div>
	</div>
	<!--/藏-->
<!--/页眉-->
