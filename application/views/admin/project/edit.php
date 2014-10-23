<div class="content">
	<h3><?php echo !empty($project->name) ? '编辑项目"'.$project->name.'"' : '新建项目';?></h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td>项目名称<span class="required">*</span></td>
			<td><?php echo form_input('name', set_value('name', $project->name));?></td>
		</tr>
		<tr>
			<td><?php echo form_submit('submit', '保存', 'class="btn btn-primary btn-large"');?></td>
			<td><?php echo anchor('admin/dashboard', '取消', 'class="btn btn-primary btn-large"');?></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>