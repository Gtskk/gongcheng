<div class="content">
	<div class="action">
        <?php echo anchor('admin/user/edit', '新建用户', 'class="btn button pull-left"');?>
    </div>
	<table class="table table-striped">
		<tr>
			<th>用户名</th>
			<th>显示名</th>
			<th>邮箱</th>
			<th>电话</th>
			<th>角色</th>
			<th>编辑</th>
			<th>删除</th>
		</tr>
		<?php if(count($users)):foreach($users as $user):?>
		<?php $profile = $user->profile;?>
		<tr>
			<td><?php echo $user->username;?></td>
			<td><?php echo empty($profile['display_name']) ? '无' : $profile['display_name'];?></td>
			<td><?php echo $user->email;?></td>
			<td><?php echo empty($profile['phone']) ? '无' : $profile['phone'];?></td>
			<td>
				<?php if(count($user->roles)):foreach($user->roles as $role):?>
				<span class="label label-info"><?php echo $role['full'];?></span>
				<?php endforeach;else:?>
				无
				<?php endif;?>
			</td>
			<td><?php echo btn_edit('admin/user/edit/'.$user->id);?></td>
			<td><?php echo btn_delete('admin/user/delete/'.$user->id);?></td>
		</tr>
		<?php endforeach;else:?>
		<tr>
			<td>暂无用户.</td>
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