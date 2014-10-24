<div class="content">
	<div class="action">
        <?php echo anchor('admin/role/edit', '新建角色', 'class="btn button pull-left"');?>
    </div>
	<table class="table table-striped">
		<tr>
			<th>角色名</th>
			<th>角色全称</th>
			<th>默认角色</th>
			<th>角色权限</th>
			<th>编辑</th>
			<th>删除</th>
		</tr>
		<?php if(count($roles)):foreach($roles as $role):?>
		<tr>
			<td><?php echo $role->role;?></td>
			<td><?php echo empty($role->full) ? '无' : $role->full;?></td>
			<td><?php echo $role->default ? '是' : '否';?></td>
			<td>
				<?php if(count($permissions)):foreach($permissions as $perm):?>
				<span class="lable label-info"><?php echo $perm;?></span>
				<?php endforeach;else:?>
				无
				<?php endif;?>
			</td>
			<td><?php echo btn_edit('admin/role/edit/'.$role->role_id);?></td>
			<td><?php echo btn_delete('admin/role/delete/'.$role->role_id);?></td>
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