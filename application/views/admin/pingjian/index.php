<div class="content">
    <div class="action">
        <?php echo anchor('admin/pingjian/edit', '新建数据', 'class="btn button pull-left"');?>
        <a href="#" onclick="printdiv('tableContent')" class="btn button2 pull-right">打印数据</a>
    </div>
    <table class="table table-striped" id="tableContent">
        <tr>
            <th>桩号</th>
            <th>机号</th>
            <th>桩型</th>
            <th>桩径</th>
            <th>试块</th>
            <th>操作</th>
        </tr>
        <?php if(count($datas)):foreach($datas as $data):?>
		<tr>
			<td><?php echo $data->id;?></td>
			<td><?php echo $data->mac_id;?></td>
			<td><?php echo $data->type;?></td>
			<td><?php echo $data->radius;?></td>
			<td><?php echo $data->shikuai;?></td>
			<td class="caozuo">
				<div class="btn-group">
					<a href="" role="button" class="btn button2 dropdown-toggle" data-toggle="dropdown">操作<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><?php echo btn_edit('admin/pingjian/edit/'.$data->id);?></li>
						<li><?php echo btn_delete('admin/pingjian/delete/'.$data->id);?></li>
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