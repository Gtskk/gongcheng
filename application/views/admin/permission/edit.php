<div class="content">
	<h3><?php echo !empty($permission->permission) ? '编辑权限 “'.$permission->permission : '创建新权限';?>”</h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td>权限名<span class="required">*</span></td>
			<td><?php echo form_input('permission', set_value('permission', $permission->permission));?></td>
		</tr>
		<tr>
			<td>权限描述</td>
			<td><?php echo form_input('description', set_value('description', $permission->description));?></td>
		</tr>
		<!-- <tr>
			<td>父权限</td>
			<td><?php echo form_input('parent', set_value('parent', $permission->parent));?></td>
		</tr> -->
		<tr>
			<td>排序</td>
			<td><?php echo form_input('sort', set_value('sort', $permission->sort));?></td>
		</tr>
		<tr>
			<td colspan='2'><?php echo form_submit('submit', '提交', 'class="btn btn-primary"');;?></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>