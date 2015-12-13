<?php $this->load->view('includes/header'); ?>




<div id="infoMessage"><?php echo $message;?></div>

<div class="row">
  <div class="col-lg-6">
    <div class="well bs-component">
      <?php echo form_open("auth/login", 'class="form-horizontal" ');?>
        <fieldset>
          <legend><?php echo lang('login_heading');?></legend>
          <p><?php echo lang('login_subheading');?></p>
          <div id="infoMessage"><?php echo $message;?></div>
          <div class="form-group">
            <?php echo lang('login_identity_label', 'identity', 'class="col-lg-2 control-label"');?>
            <div class="col-lg-10">
              <?php echo form_input($identity, 'identity', 'class="form-control" placeholder="Email"');?>
            </div>
          </div>
          <div class="form-group"> 

            <?php echo lang('login_password_label', 'password', 'class="col-lg-2 control-label"');?>
            <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
            <div class="col-lg-10">
              <?php echo form_password($password, 'password', 'class="form-control"');?>
              <div class="checkbox">
                <label>
                  <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                  <?php echo lang('login_remember_label', 'remember');?>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default">Cancel</button>
              <?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-primary"'); ?>
            </div>
          </div>
        </fieldset>
      <?php echo form_close();?>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>