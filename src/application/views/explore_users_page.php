<?php $this->load->view('includes/header'); ?>

<div class="container">

<br/>
<br/>

<div class="row">
  <div class="col-lg-6">
    <div class="well">
    	<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th><?php echo lang('contributor')?></th>
			      <th><?php echo lang('contribution') ?></th>
			    </tr>
			  </thead>
				<tbody>
					<?php foreach ($users as $user):?>
					<tr>
						<td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8'); ?></td>
						<td><?php echo htmlspecialchars($user->contribution,ENT_QUOTES,'UTF-8'); ?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
    </div>
  </div>

  <div class="col-lg-4 col-lg-offset-1">
	<div class="alert alert-dismissible alert-info">
  	  <button type="button" class="close" data-dismiss="alert">×</button>
  	  <h4>如何提高贡献值</h4>
	  <p>
	  	分享有价值的链接，
	  </p>
	  <p>
	  	每被他人顶1次，就获得1贡献值;
	  </p>
	  <p>
		  每被他人踩1次，就失去1贡献值。
		</p>
	  <p>
		  (偷偷告诉你，自己也可以顶自己哦)
	  </p>
	</div>
  </div>

</div>

</div>

<?php $this->load->view('includes/footer'); ?>