<?php $this->load->view('includes/header'); ?>
<!--主体内容-->
<div class="main wrap">
	<!--左边-->
	<?php if(isset($main_content)): ?>
	<div class="content">
		<?=isset($title)?'<div class="t">'.$title."</div>\n":NULL?>
		<?php $this->load->view($main_content); ?>
	</div>
	<?php endif; ?>
	<!--/左边-->
	<?php if(isset($sidebar)): ?>
	<!--右边-->
		<div class="sidebar">
			<?php $this->load->view($sidebar); ?>
		</div>
	<!--/右边-->
	<?php endif; ?>
</div>
<!--/主体内容-->
<?php $this->load->view('includes/footer'); ?>