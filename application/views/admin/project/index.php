<div class="content">
    <div class="action">
        <?php echo anchor('admin/project/edit', '新建项目', 'class="btn button pull-left"');?>
    </div>
    <table class="table table-striped" id="tableContent">
        <tr>
            <th>项目名称</th>
            <th>项目图片</th>
            <th>创建者</th>
            <th>操作</th>
        </tr>
        <?php if(count($projects)):foreach($projects as $project):?>
		<tr>
			<td><?php echo $project->name;?></td>
			<td><img src="<?php echo $project->background;?>" alt="背景图" style="width:100px;height:40px;"></td>
			<td><?php echo $this->tank_auth->get_username_by_id($project->author);?></td>
			<td class="caozuo">
				<div class="btn-group">
					<a href="" role="button" class="btn button2 dropdown-toggle" data-toggle="dropdown">操作<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><?php echo btn_edit('admin/project/edit/'.$project->id);?></li>
						<li><?php echo btn_delete('admin/project/delete/'.$project->id);?></li>
					</ul>
				</div>
			</td>
		</tr>
		<?php endforeach;else:?>
		<tr>
			<td>暂无数据。</td>
		</tr>
		<?php endif;?>
    </table>
</div>

<script type="text/javascript">
	function del(url, obj){
		event.preventDefault();
		if(confirm('确认删除？')){
			$.post(url, function(data){
				if(data.status == 'ok'){
					alert('删除成功');
					$(obj).parent().parent().parent().parent().parent().remove();
				}else{
					alert('删除失败');
				}
			}, 'json');
		}
	}
</script>