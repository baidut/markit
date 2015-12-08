<?php $this->load->view('includes/header'); ?>

<h1><?php echo lang('new').lang('mark'); ?></h1>

<?php echo form_open('user/new_mark/'.$theme_id);?>

  <p>
    <?php echo lang('title', 'title');?>
    <?php echo form_input('title', set_value('title', 'title'));?>
  </p>

  <p>
    <?php echo lang('url', 'url');?>
    <?php echo form_input('url', set_value('url', 'url'));?>
  </p>

  <p><?php echo form_submit('submit', lang('submit'));?></p>

<?php echo form_close();?>

<?php $this->load->view('includes/footer'); ?>