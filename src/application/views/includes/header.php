<?php
/************************************************************************
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
*************************************************************************/

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-CN"> <!-- lang="en" -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- User -->
    <title>Markit</title>
  </head>
  <body>


  <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="https://bootswatch.com/" class="navbar-brand">Markit</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
            	<?php echo anchor('explore/themes', 'Themes');?>
            </li>
            <li>
            	<?php echo anchor('explore/marks', 'Marks');?>
            </li>
            <li>
            	<?php echo anchor('explore/users', 'Contributors');?>
            </li>
            <li>
              <a href="https://bootswatch.com/help/">Help</a>
            </li>
            <li>
              <a href="http://news.bootswatch.com/">Blog</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">


          	<?php if ($this->session->userdata('user_id')): ?>
            <li><?php echo anchor('#', 					$this->session->userdata('username') ); ?></li>
            <li><?php echo anchor('auth/logout', 		'Logout'	); ?></li>
        	<?php else: ?>
            <li><?php echo anchor('auth/login', 		'Login'		); ?></li>
            <li><?php echo anchor('auth/create_user', 	'Register'	); ?></li>
        	<?php endif; ?>
          </ul>

        </div>
      </div>
    </div>

	<div class="container">

    <br/>
    <br/>
    <br/>

