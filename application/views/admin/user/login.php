<div class="modal-header">
	<div class="welcome">
		<p>欢迎登录钻孔灌注桩信息管理平台</p>
	</div>
</div>
<div class="modal-body">
	<div class="login_info">
		<img src="<?php echo base_url('images/user_icon.jpg');?>" alt="用户">
		<span class="info_txt">登录您的帐户</span>
	</div>
	<?php //echo '<pre>'.print_r($this->session->userdata, TRUE).'</pre>';?>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('error');;?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td class="input">
				<input type="text" name="login" id="login" value="<?php set_value('login');?>" placeholder="登 录 帐 号">
				<input type="password" name="password" id="password" value="<?php set_value('password');?>"  placeholder="密 码">
			</td>
		</tr>
		<?php if($show_captcha) : if(!$use_recaptcha) : ?>
		<tr>
			<td class="capt">
				<input type="text" name="capt" id="capt" placeholder="验 证 码">
				<img src="<?php echo base_url('admin/user/verify_image');?>" id="verify_code" alt="验证码">
				<span class="refresh">看不清？</span>
				<a href="#" onclick="document.getElementById('verify_code').src = '<?php echo base_url('admin/user/verify_image');?>?r='+Math.random();">换一张</a>
			</td>
		</tr>
		<?php else : ?>
		<tr>
			<td>&nbsp;</td>
			<td>
				<p>
					Write the following word:<br>
					<img src="<?php echo $captcha_html; ?>" id="captcha" /><br />
				<a class="small" href="javascript:void(0)" onclick="document.getElementById('captcha').src='<?php echo site_url(); ?>captcha/captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();" id="change-image">Not readable? Change text.</a><br/><br/><input type="text" name="captcha" id="captcha-form" autocomplete="off" /></p>
			</td>
			<td style="color: red;"><?php echo form_error('captcha'); ?><?php echo isset($errors['captcha']) ? $errors['captcha'] : ''; ?></td>
		</tr>
		<?php endif; endif; ?>
		<tr>
			<td class="capt"><input class="btn btn-primary btn-large btn-success" type="submit" value="登录"></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>

<!-- 
<div class="modal-header">
	<h3>登录</h3>
</div>
<div class="modal-body">
	<?php //echo '<pre>'.print_r($this->session->userdata, TRUE).'</pre>';?>
	<?php //echo validation_errors();?>
	<?php //echo $this->session->flashdata('error');;?>
	<?php //echo form_open();?>
	<table class="table">
		<tr>
			<td>邮箱</td>
			<td><?php //echo form_input('email');?></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><?php //echo form_password('password');?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php //echo form_submit('submit', '登录');;?></td>
		</tr>
	</table>
	<?php //echo form_close();?>
</div> -->