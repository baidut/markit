<?php $this->load->view('includes/header'); ?>

<div class="row">
  <div class="col-lg-6">
    <div class="well">
    <!-- "user/new_mark/".$theme_id -->
      <?php echo form_open('user/add_tag/'.$mark_id.'/'.$theme_id, 'class="form-horizontal" ') ?>
        <fieldset>
          <legend><?php echo lang('new').' '.lang('tag') ?></legend>

          <div class="form-group">
            <?php echo lang('name', 'name', 'class="col-lg-2 control-label"');?>
            <div class="col-lg-10">
             <?php echo form_input('name', set_value('name'), 'class="form-control"');?>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default"><?php echo lang('cancel')?></button>
              <?php echo form_submit('submit', lang('submit'), 'class="btn btn-primary"'); ?>
            </div>
          </div>
        </fieldset>
      <?php echo form_close();?>
    </div>
  </div>

</div>

<?php $this->load->view('includes/footer'); ?>