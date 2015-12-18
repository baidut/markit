<?php $this->load->view('includes/header'); ?>

<div class="row">
  <div class="col-lg-6">
    <div class="well">
    <!-- "user/new_mark/".$theme_id -->
      <?php echo form_open("user/contrib_mark/", 'class="form-horizontal" ') ?>
        <fieldset>
          <legend><?php echo lang('new').lang('mark') ?></legend>

          <div class="form-group">
            <?php echo lang('title', 'title', 'class="col-lg-2 control-label"') ?>
            <div class="col-lg-10">
              <?php echo form_input('title', set_value('title', $mark_title), 'class="form-control"') ?>
            </div>
          </div>

          <div class="form-group">
            <?php echo lang('url', 'url', 'class="col-lg-2 control-label"');?>
            <div class="col-lg-10">
              <?php echo form_input('url', set_value('url', $mark_url), 'class="form-control"') ?>
            </div>
          </div>

	      <div class="form-group">
		    <?php echo lang('theme', 'select_theme', 'class="col-lg-2 control-label"');?>
		    <div class="col-lg-10">
		      <?php echo form_dropdown('theme_id', $opt_themes, null, 'class="form-control" id="select_theme"') ?>
		    </div>
		  </div>

		  <div class="form-group">
		    <?php echo lang('tag', 'select_tag', 'class="col-lg-2 control-label"');?>
		    <div class="col-lg-10">
		       <?php echo form_dropdown('tag_id', $opt_themes, null, 'class="form-control" id="select_tag"') ?>
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

  <div class="col-lg-4 col-lg-offset-1">
	<div class="alert alert-dismissible alert-info">
  	  <button type="button" class="close" data-dismiss="alert">×</button>
  	  <h4>快速添加链接小工具</h4>
	  <p>
	  	把 马克伊特 拖到收藏栏 浏览网页时点击即可分享链接，
	  	从此告别复制粘贴的麻烦！
	  	点击则提示
	  </p>
	  <p>
	  	<a href='javascript:(function(){window.open("<?php echo base_url('user/contrib')?>"+"/?title="+encodeURIComponent(document.title)+"&url="+encodeURIComponent(location.href));})()' class="btn btn-primary btn-lg">
		<?php echo lang('markit') ?>
	  	</a>
	  </p>
	</div>
  </div>

</div>

<?php $this->load->view('includes/footer'); ?>