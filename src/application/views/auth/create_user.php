<?php $this->load->view('includes/header'); ?>

<br/>
<div class="container">

<div class="well bs-component">
  <?php echo form_open("auth/create_user");?>
    <fieldset>
      <legend><?php echo lang('create_user_heading');?></legend>
      <p><?php echo lang('create_user_subheading');?></p>
      
       <?php if($message) :?>
          <div class="alert alert-dismissible alert-danger" id="infoMessage">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $message;?>
          </div>
          <?php endif; ?> 
        
      <div class="form-group">
        <?php echo lang('create_user_fname_label', 'first_name', 'class="col-lg-2 control-label"');?>
        <div class="col-lg-10">
          <?php echo form_input($first_name, 'first_name', 'class="form-control" ');?>
        </div>
      </div>
      <div class="form-group"> 
        <?php echo lang('create_user_lname_label', 'last_name', 'class="col-lg-2 control-label"');?>
        <div class="col-lg-10">
          <?php echo form_input($last_name, 'last_name', 'class="form-control" ');?>
        </div>
      </div>

      <?php
        if($identity_column!=='email') {
            echo '<p>';
            echo lang('create_user_identity_label', 'identity');
            echo '<br />';
            echo form_error('identity');
            echo form_input($identity);
            echo '</p>';
        }
      ?>

      <div class="form-group"> 
        <?php echo lang('create_user_company_label', 'company', 'class="col-lg-2 control-label"');?>
        <div class="col-lg-10">
          <?php echo form_input($company, 'company', 'class="form-control"');?>
        </div>
      </div>

      <div class="form-group"> 
        <?php echo lang('create_user_email_label', 'email', 'class="col-lg-2 control-label"');?>
        <div class="col-lg-10">
          <?php echo form_input($email, 'email', 'class="form-control"');?>
        </div>
      </div>

      <div class="form-group"> 
        <?php echo lang('create_user_phone_label', 'phone', 'class="col-lg-2 control-label"');?>
        <div class="col-lg-10">
          <?php echo form_input($phone, 'phone', 'class="form-control"');?>
        </div>
      </div>

      <div class="form-group"> 
        <?php echo lang('create_user_password_label', 'password', 'class="col-lg-2 control-label"');?>
        <div class="col-lg-10">
          <?php echo form_password($password, 'password', 'class="form-control"');?>
        </div>
      </div>

      <div class="form-group"> 
        <?php echo lang('create_user_password_confirm_label', 'password_confirm', 'class="col-lg-2 control-label"');?>
        <div class="col-lg-10">
          <?php echo form_input($password_confirm, 'password_confirm', 'class="form-control"');?>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"'); ?>
        </div>
      </div>
    </fieldset>
  <?php echo form_close();?>
</div>

</div>

<?php $this->load->view('includes/footer'); ?>