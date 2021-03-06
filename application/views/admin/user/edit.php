<div class="content">
	<h3><?php echo !empty($user->name) ? '编辑用户 '.$user->name : '创建新用户';?></h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td>用户名</td>
			<td><?php echo form_input('name', set_value('name', $user->name));?></td>
		</tr>
		<tr>
			<td>显示名</td>
			<td><?php echo form_input('display_name', set_value('display_name', $user->display_name));?></td>
		</tr>
		<tr>
			<td>邮箱</td>
			<td><?php echo form_input('email', set_value('email', $user->email));?></td>
		</tr>
		<tr>
			<td>电话</td>
			<td><?php echo form_input('phone', set_value('phone', $user->phone));?></td>
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
			<td colspan='2'><?php echo form_submit('submit', '提交', 'class="btn btn-primary"');;?></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>