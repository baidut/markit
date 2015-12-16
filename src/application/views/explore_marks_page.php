<?php $this->load->view('includes/header'); ?>

<h1><?php echo isset($theme_name)? $theme_name : 'Hot marks'; ?>
<?php echo anchor('user/contrib2theme/'.$theme_id, '↙'); ?>
</h1>
<pre>
if ( You.like(a_mark) ) {
	press("▲"); // vote up
else if ( You.dislike(a_mark) ){
	press("▼"); // vote down
}
else {
	// do whatever you want
}
</pre>

<table class="table table-striped table-hover ">
	<tbody>
		<?php foreach ($marks as $key => $mk):?>
		<tr>
			<td>
				<?php
				$query=$this->db->select('type')->where('user_id', $user_id)->where('mark_id', $mk->mark_id)->get('vote');
				$avote =$query->row();
				if(!$avote)
				{
					echo anchor('user/vote_mark/1/'.$mk->mark_id, '△')
							.$mk->value
							.anchor('user/vote_mark/-1/'.$mk->mark_id, '▽');
				}
				else
				{
					if($avote->type==1)
					{
						echo '▲'.$mk->value.anchor('user/vote_mark/-1/'.$mk->mark_id,'▽');
					}
					else
					{
						echo anchor('user/vote_mark/1/'.$mk->mark_id,'△').$mk->value.'▼';
					}
				}
				?>
			</td>
			<td><?php echo anchor($mk->url, $mk->title);?>
				<?php foreach ($tags[$key] as $tag): ?>
					<span class="label label-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
            		<?php echo anchor('explore/tag_search_marks/'.$tag->tagid.'/'.$theme_id, $tag->tag_name);?>
            		</span>
            	<?php endforeach;?>
			</td>
			<td><?php echo anchor('user/'.$mk->contributor, $mk->username.'('.$mk->contribution).')';?></td>
			<td><?php echo anchor('user/new_tag/'.$mk->mark_id.'/'.$theme_id, '+');?></td>

		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<?php $this->load->view('includes/footer'); ?>