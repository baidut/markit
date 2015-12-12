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

<table cellpadding=0 cellspacing=10>
	<?php foreach ($marks as $key => $mk):?>
		<tr>
			<td>
				<?php echo anchor('user/vote_mark/1/'.$mk->mark_id, '▲')
							.$mk->value
							.anchor('user/vote_mark/1/'.$mk->mark_id, '▼'); 
				?>
			</td>
			<td><?php echo anchor($mk->url, $mk->title);?></td>
			<td><?php echo anchor('user/'.$mk->contributor, $mk->username.'('.$mk->contribution).')';?></td>
			
            <td>
            	<?php foreach ($tags[$key] as $tag): ?>
            	<?php echo anchor('explore/tag_search_marks/'.$tag->tagid.'/'.$theme_id, $tag->tag_name);?>
            	<?php endforeach;?>
            </td>

			<td><?php echo anchor('user/new_tag/'.$mk->mark_id.'/'.$theme_id, '+');?></td>

		</tr>
	<?php endforeach;?>
</table>

<?php $this->load->view('includes/footer'); ?>