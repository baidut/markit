<?php
/************************************************************************
<html lang="en">
	 <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    original theme
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/plain.css">


<div id="container">

	<h1><b>Markit</b>: Explore web of link & Mark it 
	&nbsp;&nbsp;&nbsp;
	<?php echo '| '.anchor('explore/themes', 'Themes');?>
	<?php echo '| '.anchor('explore/marks', 'Marks');?>
	<?php echo '| '.anchor('explore/users', 'Contributors');?>
	&nbsp;&nbsp;&nbsp;

	<?php 
	if($this->session->userdata('user_id')) {
		echo '| '.$this->session->userdata('username');
		echo '| '.anchor('auth/logout', 'Logout');
	} else {
		echo '| '.anchor('auth/login', 'Login');
		echo '| '.anchor('auth/create_user', 'Register');
	}
	
	?>

	</h1>

	<div id="body">

	

	<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
    <br/>
	<br/>
  <div class="container">
    <h1>起步</h1>
    <p class="lead">简介整个项目、组件、和如何使用一个简单的模版入门</p>
  </div>
</header>

	
*************************************************************************/

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo isset($title)?$title:lang('markit'); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
	body{font-family:"ff-tisa-web-pro-1","ff-tisa-web-pro-2","Lucida Grande","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
	</style>

	<!-- Fork me on GitHub -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/github-fork-ribbon-css/0.1.1/gh-fork-ribbon.min.css" />
	<!--[if lt IE 9]>
	  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/github-fork-ribbon-css/0.1.1/gh-fork-ribbon.ie.min.css" />
	<![endif]-->
    <div class="github-fork-ribbon-wrapper right-bottom">
        <div class="github-fork-ribbon">
			<a href="https://github.com/baidut/markit">Fork me on GitHub</a>
        </div>
    </div>
	<!-- See https://github.com/blog/273-github-ribbons -->
	<!-- See https://github.com/simonwhitaker/github-fork-ribbon-css -->

  </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar">

  	

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="https://bootswatch.com/" class="navbar-brand"><?php echo lang('markit') ?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
            	<?php echo anchor('explore/themes', lang('theme'));?>
            </li>
            <li>
            	<?php echo anchor('explore/marks', lang('mark'));?>
            </li>
            <li>
            	<?php echo anchor('explore/users', lang('contributor'));?>
            </li>
            <li>
              <?php echo anchor('#', lang('help'));?>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

          	<?php if ($this->session->userdata('user_id')): ?>

            <li><?php echo anchor('#', $this->session->userdata('username') ); ?></li>
            <li><?php echo anchor('auth/logout', 'Logout'); ?></li>
        	  
            <?php else: ?>
            
            <li><?php echo anchor('auth/login', lang('login')) ?>
            </li>
            <li><?php echo anchor('auth/create_user', lang('register')) ?>
            </li>
        	  
            <?php endif; ?>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">
                <?php echo lang('language') ?>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li>
                  <a href="<?php echo base_url('ui/language/zh_cn') ?>">
                    中文
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('ui/language/english') ?>">
                    English
                  </a>
                </li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>

    <div class="container">

    <br/>
    <br/>

