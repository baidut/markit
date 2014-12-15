<!--藏--><!--收藏工具-->
<div class="index_cang">
	<div class="wrap">
			<div class="act">
				<p>将网址复制到下面的输入框中，点击收藏按钮立即收藏！</p>
				<form action="http://www.laicang.com/gettitle.php?getby=u" method="post">
					<input type="text" value="请输入网址url..." name="url" class="input_txt" onfocus="this.value=''" onblur="if(this.value=='') {this.value='请输入网址url...'}"style="color:#666;"/>
					<input type="submit" value="收藏" class="input_submit">
				</form>
			</div>
	</div>
</div>
<!--/藏-->

<ol>
	<?php foreach($query->result() as $row): ?>
	<li><a href=<?=$row->link?> ><?=$row->title?></li>
	<?php endforeach; ?>
</ol>
