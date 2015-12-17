<?php $this->load->view('includes/header'); ?>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th><?php echo lang('like')?></th>
      <th><?php echo lang('#link') ?></th>
      <th>
      	<?php echo lang('name')?>
      </th>
      <th></th>
    </tr>
  </thead>
	<tbody>
		<?php foreach ($themes as $th):?>
			<tr>
				<td><?php echo anchor('user/like_theme/'.$th->id, '❤')
				.$th->like_num;?></td>
				<td><?php echo '☍'.$th->mark_num;?></td>
	            <td><?php echo anchor('explore/marks/'.$th->id, $th->theme_name);?></td>
				<td>
				  <?php echo anchor('user/contrib2theme/'.$th->id, lang('contrib_mark') ) ?>
				  <?php echo anchor('user/like_theme/'.$th->id, lang('like') ) ?>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>

<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong><?php echo lang('tips') ?></strong> 没有找到你喜欢的主题？导航栏->主题->新建主题
</div>

<?php $this->load->view('includes/footer'); ?>