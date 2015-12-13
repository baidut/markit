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
		<?php foreach ($marks as $mk):?>
		<tr>
			<td>
				<?php echo anchor('user/vote_mark/1/'.$mk->mark_id, '▲')
							.$mk->value
							.anchor('user/vote_mark/1/'.$mk->mark_id, '▼'); 
				?>
			</td>
            <td><?php echo anchor($mk->url, $mk->title);?></td>
			<td><?php echo anchor('user/'.$mk->contributor, $mk->username.'('.$mk->contribution).')';?></td>
			
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<?php $this->load->view('includes/footer'); ?>