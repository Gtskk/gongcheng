<h3><?php echo !empty($page) ? '编辑 "'.$page->title.'"' : '新建页面';?></h3>
<?php echo validation_errors();?>
<?php echo $this->session->flashdata('saveError');?>
<?php echo form_open();?>
<table class="table">
	<tr>
		<td>父页面</td>
		<td><?php echo form_dropdown('parent_id', $pages_no_parent, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id);?></td>
	</tr>
	<tr>
		<td>模版</td>
		<td><?php echo form_dropdown('template', $templates, $this->input->post('template') ? $this->input->post('template') : $page->template);?></td>
	</tr>
	<tr>
		<td>标题</td>
		<td><?php echo form_input('title', set_value('title', $page->title));?></td>
	</tr>
	<tr>
		<td>后缀</td>
		<td><?php echo form_input('slug', set_value('slug', $page->slug));?></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><?php echo form_textarea('body', set_value('body', $page->body), 'class="tinymce"');?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"');;?></td>
	</tr>
</table>
<?php echo form_close();?>