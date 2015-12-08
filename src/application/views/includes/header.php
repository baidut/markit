<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<title>Markit</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/plain.css"> 
</head>
<body>

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