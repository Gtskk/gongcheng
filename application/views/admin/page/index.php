<section>
	<h2>页面</h2>
	<p>
		<?php echo anchor('admin/page/edit', '<i class="icon-plus"></i> 新建页面');?>
		<?php echo anchor('admin/page/order', '<i class="icon-hand-right"></i> 页面排序', 'class="label label-important pull-right"');?>
	</p>
	<table class="table table-striped">
		<tr>
			<th>标题</th>
			<th>父页面</th>
			<th>编辑</th>
			<th>删除</th>
		</tr>
		<?php if(count($pages)):foreach($pages as $page):?>
		<tr>
			<td><?php echo $page->title;?></td>
			<td><?php echo $page->parent_title;?></td>
			<td><?php echo btn_edit('admin/page/edit/'.$page->id);?></td>
			<td><?php echo btn_delete('admin/page/delete/'.$page->id);?></td>
		</tr>
		<?php endforeach;else:?>
		<tr>
			<td>暂无页面.</td>
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