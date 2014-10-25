<div class="content">
	<h3><?php echo !empty($role->role) ? '编辑角色 '.$role->role : '创建新角色';?></h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td>角色名</td>
			<td><?php echo form_input('role', set_value('role', $role->role));?></td>
		</tr>
		<tr>
			<td>角色全称</td>
			<td><?php echo form_input('full', set_value('full', $role->full));?></td>
		</tr>
		<tr>
			<td>是否新建用户时默认选择</td>
			<td><?php echo form_dropdown('default', array('否', '是'), set_value('default', $role->default));?></td>
		</tr>
		<tr>
			<td>角色权限</td>
			<td><?php echo form_multiselect('role_perms[]', $permissions, $role_permissions);?></td>
		</tr>
		<tr>
			<td><?php echo form_submit('submit', '提交', 'class="btn btn-primary"');;?></td>
			<td><?php echo anchor('admin/role', '取消', 'class="btn btn-primary"');?></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>