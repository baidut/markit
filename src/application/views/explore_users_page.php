<?php $this->load->view('includes/header'); ?>

<h1>Contribution leaderboard</h1>

<pre>
You.contrib(mark_xxx);
if( Someone.vote_up(mark_xxx) ){
	You.contribution ++;
} 
if( Someone.vote_down(mark_xxx) ){
	You.contribution --;
}
this.show_leaderboard();
</pre>

<table cellpadding=0 cellspacing=10>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8'); ?></td>
			<td><?php echo htmlspecialchars($user->contribution,ENT_QUOTES,'UTF-8'); ?></td>
		</tr>
	<?php endforeach;?>
</table>

<?php $this->load->view('includes/footer'); ?>