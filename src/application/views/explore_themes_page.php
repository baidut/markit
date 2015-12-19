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
				<td>
				<?php
  					if($user_id = $this->session->userdata('user_id')){
              $query=$this->db->select('theme_id')->where('user_id', $user_id)->where('theme_id', $th->id)->get('user_like_theme');
    					$liked = ($query->row())?true:false;
            }
            else $liked = null;
        ?>
				<?php echo anchor('user/like_theme/'.$th->id, $liked?'❤':'♡')
				.$th->like_num;?></td>
				<td><?php echo '☍'.$th->mark_num;?></td>
	            <td><?php echo anchor('explore/marks/'.$th->id, $th->theme_name);?></td>
				<td>
					<div class="btn-group">
				    <?php echo anchor('user/contrib/'.$th->id.'/'.$th->theme_name, lang('contrib_mark'), 'class="btn btn-xs"') ?>
				    <?php echo anchor('user/like_theme/'.$th->id, lang('like'), 'class="btn btn-xs"') ?>
				  </div>
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