<!DOCTYPE html>
<html lang='en'>
<head>
	<title>
		<?php echo (isset($title))? $title : "Markit" ;?>
	</title>
	<meta charset = 'utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta charset="utf-8"/>
	<meta name="description" content="Markit-为您提供免费网络收藏夹,帮助您收藏自己喜欢的网页,存放安全,永远不会丢失,还可以为您的网站增加外链,提高权重,欢迎您的使用。" />
	<meta name="keywords" content="Markit,网络收藏夹,免费网络收藏夹,收藏夹,书签,网络书签,免费网络书签,网站推广,网络推广,网站营销,网络营销" />
	<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css?ver=2013102001">
</head>
<body>
  <h1><?php if(isset($heading))echo $heading ?></h1>
  	<!--头部-->
	<div class="header">
		<h1 class="logo">
			<a href="<?php echo base_url();?>">
				<img src="<?php echo base_url();?>img/logo.png" alt="Markit-网络收藏夹" title="Markit-网络收藏夹"/>
			</a>
		</h1>
		<div class="user_action">
			<ul>
				<li><a href="/login">登陆</a></li>
				<li><a href="/signup" class="reg">注册</a></li>	
			</ul>
		</div>
		<div class="nav">
			<ul>
				<li><a href="/">首页</a></li>
				<li><a href="/new">最新收藏</a></li>
				<li><a href="/tool/">收藏工具</a></li>
				<li><a href="/help/">帮助中心</a></li>
				<li><a href="/top/">排行榜</a></li>
			</ul>
			<p><a href="/login">进入我的收藏</a></p>
		</div>
	</div>
	<!--/头部-->