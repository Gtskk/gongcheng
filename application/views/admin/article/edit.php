<h3><?php echo !empty($article) ? '编辑 "'.$article->title.'"' : '新建文章';?></h3>
<?php echo validation_errors();?>
<?php echo $this->session->flashdata('saveError');?>
<?php echo form_open();?>
<table class="table">
	<tr>
		<td>发表日期</td>
		<td><?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="datepicker"');?></td>
	</tr>
	<tr>
		<td>标题</td>
		<td><?php echo form_input('title', set_value('title', $article->title));?></td>
	</tr>
	<tr>
		<td>后缀</td>
		<td><?php echo form_input('slug', set_value('slug', $article->slug));?></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><?php echo form_textarea('body', set_value('body', $article->body), 'class="tinymce"');?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"');;?></td>
	</tr>
</table>
<?php echo form_close();?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({ format: 'yyyy-mm-dd'});
	})
</script>