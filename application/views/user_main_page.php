<!--用户主页-->
	<!--个人信息-->
	<?php define('WHO',($is_self)?'我':'TA'); ?>
		<div class="profile_other">
			<div class="u_face">
				<a href="http://www.laicang.com/xiaoqiang"><img src="http://www.laicang.com/avatar/data/00/24/95_avatar_small.jpg" alt="xiaoqiang的头像" title="xiaoqiang的头像" onerror="this.onerror=null;this.src = 'http://res.laicang.com/lcres/avatar/no_s.png'"></a>
			</div>
			<div class="u_info">
				<dl>
					<dt>
						<a href="http://www.laicang.com/xiaoqiang" class="u_name"><?=$this->session->userdata('username')?></a>
						<a href="http://www.laicang.com/xiaoqiang" class="u_url">http://www.laicang.com/xiaoqiang</a>
					</dt>
					<?php if($is_self): ?>
					<dd>
						<a href="http://www.laicang.com/avatar/avatar.php">更换我的头像</a><span>|</span>
						<a href="http://www.laicang.com/xiaoqiang/profile">修改我的个人信息</a>
					</dd>
					<?php else: ?>
					<dd>
						<a href="friend.php?act=q_add&f_name=xcbxnbn">加为好友</a>
						<span>|</span>
						<a href="pm.php?act=q_send&u_name=xcbxnbn">发站内信</a>
						<span>|</span>
						<a href="xcbxnbn/feed/">RSS订阅</a>
					</dd>
					<?php endif; ?>
				</dl>
			</div>
		</div>
		<!--/个人信息-->
		<!--选项卡-->
		<div class="tab_box">
			<ul>
				<li class="current"><a><?=WHO?>的收藏</a></li>
				<li><a href="http://www.laicang.com/xiaoqiang/tags"><?=WHO?>的关键词</a></li>
				<li><a href="http://www.laicang.com/xiaoqiang/friends"><?=WHO?>的好友</a></li>
				<li><a href="http://www.laicang.com/xiaoqiang/profile"><?=WHO?>的个人资料</a></li>
			</ul>
		</div>
		<!--/选项卡-->
		<!--总数-->
		<div class="total_num">
			<s></s><?=WHO?>共有<span id="t_num"><?=$query->num_rows()?></span>条收藏</div>
		<!--/总数-->
		<div class="list_box">
			<ul>
			<?php foreach($query->result() as $row): ?>
			<!--单个-->
			<li class="item" id="<?=$row->markid?>">
				<h4><a href="http://www.laicang.com/url/u57670" target="_blank" class="item_tit"><?=$row->markname?></a></h4>
				<div class="tags">
					<ul>
						<?php foreach ( $this->db->query("SELECT tag FROM mark_tag WHERE markid = '".$row->markid."' ")-> result() as $t) : ?>
						<li class="t_item">
							<a href="http://www.laicang.com/tag/%E7%BD%91%E9%A1%B5%E5%85%B3%E9%94%AE%E8%AF%8D1" target="_blank"><?=$t->tag?></a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="url"><?=$row->link?></div>
				<div class="notes"><?=$row->description?></div>
				<div class="actions">
					<ul>
						<li class="a_item"><?=$row->datetime?> 收藏</li><li class="a_item">共<span class="num"><?=$row->usernum?></span>人收藏</li><li class="a_item"><a href="http://www.laicang.com/cache/u57670" target="_blank">快照</a><a href="update.php?id=66423&uid=2495&urlid=57670">修改</a><a href="javascript:;" onclick="remove_mark(<?=$row->markid?>)">删除</a></li>
					</ul>
				</div>
			</li>
			<!--/单个-->
			<?php endforeach; ?>
		</ul>	
	</div>
	<div class="page">
	</div>


<script type="text/javascript">
// remove为函数名时自动删除了自身 应该是和jQuery冲突了
// 我有几条收藏需要更新
function remove_mark(id){
	if(!confirm("确认删除？"))return;
	var form_data = {
		markid: id,
	};
	$.ajax({
		url: "<?=site_url('user/remove_mark')?>",
		type: 'POST',
		data: form_data,
		success: function(msg) {
			alert(msg);
		}
	});
	$("#"+id).remove();
}
</script>