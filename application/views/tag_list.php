<!--热门关键字-->
<div class="hot_tags">
	<p class="t">热门关键字</p>
	<ul>
		<?php foreach ( $this->db->query("SELECT distinct(tag) FROM mark_tag;")-> result() as $t) : ?>
		<li>
			<a href="http://www.laicang.com/tag/Links"><?=$t->tag?></a>
		</li>
		<?php endforeach; ?>
	</ul>
	<p class="more"><a href="#">更多&#187;</a></p>
</div>
<!--/热门关键字-->