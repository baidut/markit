<?php $this->load->view('includes/header'); ?>

<h1>Hot themes <?php echo anchor('user/contrib_theme/','✛') ?></h1>

<pre>while( You.at(here) ) {
	if ( You.like(a_theme) ) {
		press("❤"); // express your grateful.
		if ( You.have(a_good_mark) ){
			press("↙"); // share your mark
		}
	}
}
We.hope( You.love(this.website) ) );</pre>


<table cellpadding=0 cellspacing=10>
	<?php foreach ($themes as $th):?>
		<tr>
			<td><?php echo anchor('user/like_theme/'.$th->id, '❤')
			.htmlspecialchars($th->like_num,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo anchor('explore/marks/'.$th->id, $th->theme_name);?></td>
			<td><?php echo $th->mark_num.'☍';?></td>
			<td><?php echo anchor('user/contrib2theme/'.$th->id, '↙') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<?php $this->load->view('includes/footer'); ?>