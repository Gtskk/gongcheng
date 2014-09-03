<div class="modal-header">
	<h3>登录</h3>
</div>
<div class="modal-body">
	<?php //echo '<pre>'.print_r($this->session->userdata, TRUE).'</pre>';?>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('error');;?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td>邮箱</td>
			<td><?php echo form_input('email');?></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><?php echo form_password('password');?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Log in');;?></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>