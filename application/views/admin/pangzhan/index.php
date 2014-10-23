<div class="content">
    <div class="action">
        <?php echo anchor('admin/pangzhan/edit', '新建数据', 'class="btn button pull-left"');?>
        <a href="#" onclick="printdiv('tableContent')" class="btn button2 pull-right">打印数据</a>
    </div>
    <table class="table table-striped" id="tableContent">
        <tr>
            <th>编号</th>
            <th>工程名称</th>
            <th>工程地点</th>
            <th>桩径</th>
            <th>操作</th>
        </tr>
        <?php if(count($datas)):foreach($datas as $data):?>
		<tr>
			<td><?php echo $data->num;?></td>
			<td><?php echo $data->project_name;?></td>
			<td><?php echo $data->work_address;?></td>
			<td><?php echo $data->zhuangjing;?></td>
			<td class="caozuo">
				<div class="btn-group">
					<a href="" role="button" class="btn button2 dropdown-toggle" data-toggle="dropdown">操作<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><?php echo btn_edit('admin/pangzhan/edit/'.$data->id);?></li>
						<li><?php echo btn_delete('admin/pangzhan/delete/'.$data->id);?></li>
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