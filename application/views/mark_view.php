<div class="list_box">
	<ul>
		<?php foreach($query->result() as $row): ?>
		<!--单个-->
			<li class="item">
				<h4>
					<a href="<?=$row->link?>" target="_blank" class="item_tit" rel="nofollow">
						<?=$row->title?>
					</a>
				</h4>
				<div class="tags">
					<ul>
						<li class="t_item"><a href="http://www.laicang.com/tag/%E5%90%A7%E5%8F%B0" target="_blank">吧台</a></li></ul>
						</div>						<div class="url">http://news.homekoo.com/qtjiaju/6625</div>
									<div class="actions">
					<ul>
					<li class="a_item"><a href="http://www.laicang.com/xiaofeiyang">xiaofeiyang</a>于2014-12-15 17:16收藏</li>
					<li class="a_item"><a href="http://www.laicang.com/url/u56972#uyan_frame" class="comment">评论</a><a href="#" class="report">举报</a></li>
					</ul>
				</div>
			</li>
		<!--单个-->
		<?php endforeach; ?>
	</ul>
</div>
<div class="page page_next">
	<ul>
		<li><a href="http://www.laicang.com/new">下一页&#187;</a></li>
	</ul>
</div>
