<?php $this->load->view('includes/header'); ?>

<h1><?php echo lang('new').lang('theme'); ?></h1>

<?php echo form_open('user/new_theme/');?>

  <p>
    <?php echo lang('name', 'name');?>
    <?php echo form_input('name', set_value('name', 'name'));?>
  </p>
  <p><?php echo form_submit('submit', lang('submit'));?></p>

<?php echo form_close();?>

<?php $this->load->view('includes/footer'); ?>