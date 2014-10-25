<div class="content">
	<h3><?php echo !empty($user->username) ? '编辑用户 '.$user->username : '创建新用户';?></h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td>用户名</td>
			<td><?php echo form_input('username', set_value('username', $user->username));?></td>
		</tr>
		<tr>
			<td>显示名</td>
			<td><?php echo form_input('display_name', set_value('display_name', $profile['display_name']));?></td>
		</tr>
		<tr>
			<td>邮箱</td>
			<td><?php echo form_input('email', set_value('email', $user->email));?></td>
		</tr>
		<tr>
			<td>电话</td>
			<td><?php echo form_input('phone', set_value('phone', $profile['phone']));?></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><?php echo form_password('password');?></td>
		</tr>
		<tr>
			<td>确认密码</td>
			<td><?php echo form_password('password_confirmation');?></td>
		</tr>
		<tr>
			<td>角色</td>
			<td><?php echo form_dropdown('user_roles', $roles, $user_roles);?></td>
		</tr>
		<tr>
			<td><?php echo form_submit('submit', '提交', 'class="btn btn-primary"');;?></td>
			<td><?php echo anchor('admin/user', '取消', 'class="btn btn-primary"');?></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>