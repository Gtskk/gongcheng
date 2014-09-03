<section>
	<h2>文章</h2>
	<p>
		<?php echo anchor('admin/article/edit', '<i class="icon-plus"></i> 新建文章');?>
	</p>
	<table class="table table-striped">
		<tr>
			<th>标题</th>
			<th>发表日期</th>
			<th>编辑</th>
			<th>删除</th>
		</tr>
		<?php if(count($articles)):foreach($articles as $article):?>
		<tr>
			<td><?php echo $article->title;?></td>
			<td><?php echo $article->pubdate;?></td>
			<td><?php echo btn_edit('admin/article/edit/'.$article->id);?></td>
			<td><?php echo btn_delete('admin/article/delete/'.$article->id);?></td>
		</tr>
		<?php endforeach;else:?>
		<tr>
			<td>暂无文章.</td>
		</tr>
		<?php endif;?>
	</table>
</section>

<script type="text/javascript">
	function del(url, obj){
		event.preventDefault();
		if(confirm('Delete? Yes or no.')){
			$.post(url, function(data){
				if(data.status == 'ok'){
					alert('删除成功');
					$(obj).parent().parent().remove();
				}else{
					alert('删除失败');
				}
			}, 'json');
		}
	}
</script>