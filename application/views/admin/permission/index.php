<div class="content">
	<div class="action">
        <?php echo anchor('admin/permission/edit', '新建权限', 'class="btn button pull-left"');?>
    </div>
	<table class="table table-striped">
		<tr>
			<th>权限</th>
			<th>描述</th>
			<!-- <th>父权限</th> -->
			<th>编辑</th>
			<th>删除</th>
		</tr>
		<?php if(count($permissions)):foreach($permissions as $permission):?>
		<tr>
			<td><?php echo $permission->permission;?></td>
			<td><?php echo empty($permission->description) ? '无' : $permission->description;?></td>
			<!-- <td><?php echo empty($permission->parent) ? '无' : $permission->parent;?></td> -->
			<td><?php echo btn_edit('admin/permission/edit/'.$permission->permission_id);?></td>
			<td><?php echo btn_delete('admin/permission/delete/'.$permission->permission_id);?></td>
		</tr>
		<?php endforeach;else:?>
		<tr>
			<td>暂无权限.</td>
		</tr>
		<?php endif;?>
	</table>
</div>

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