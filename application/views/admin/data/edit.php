<div class="content">
	<h3><?php echo !empty($data->id) ? '编辑桩号"'.$data->id.'"' : '新建数据';?></h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td>机号<span class="required">*</span></td>
			<td><?php echo form_input('mac_id', set_value('mac_id', $data->mac_id));?></td>
		</tr>
		<tr>
			<td>X轴坐标<span class="required">*</span></td>
			<td><?php echo form_input('x_axis', set_value('x_axis', $data->x_axis));?></td>
		</tr>
		<tr>
			<td>Y轴坐标<span class="required">*</span></td>
			<td><?php echo form_input('y_axis', set_value('y_axis', $data->y_axis));?></td>
		</tr>
		<tr>
			<td>桩型</td>
			<td><?php echo form_input('type', set_value('type', $data->type));?></td>
		</tr>
		<tr>
			<td>桩径</td>
			<td><?php echo form_input('radius', set_value('radius', $data->radius));?></td>
		</tr>
		<tr>
			<td>桩顶标高</td>
			<td><?php echo form_input('top_ref', set_value('top_ref', $data->top_ref));?></td>
		</tr>
		<tr>
			<td>桩长</td>
			<td><?php echo form_input('length', set_value('length', $data->length));?></td>
		</tr>
		<tr>
			<td>入岩深度</td>
			<td><?php echo form_input('ruyan_depth', set_value('ruyan_depth', $data->ruyan_depth));?></td>
		</tr>
		<tr>
			<td>预测入岩</td>
			<td><?php echo form_input('predict_ruyan', set_value('predict_ruyan', $data->predict_ruyan));?></td>
		</tr>
		<tr>
			<td>实际入岩</td>
			<td><?php echo form_input('shiji_ruyan', set_value('shiji_ruyan', $data->shiji_ruyan));?></td>
		</tr>
		<tr>
			<td>全筋桩长</td>
			<td><?php echo form_input('quanjin_length', set_value('quanjin_length', $data->quanjin_length));?></td>
		</tr>
		<tr>
			<td>开钻时间</td>
			<td>
				<div class="datepicker input-append">
					<?php echo form_input('kaizhuan_time', set_value('kaizhuan_time', $data->kaizhuan_time), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
		</tr>
		<tr>
			<td>成桩时间</td>
			<td>
				<div class="datepicker input-append">
					<?php echo form_input('chengzhuang_time', set_value('chengzhuang_time', $data->chengzhuang_time), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
		</tr>
		<tr>
			<td>护筒标高</td>
			<td><?php echo form_input('hutong_heightRef', set_value('hutong_heightRef', $data->hutong_heightRef));?></td>
		</tr>
		<tr>
			<td>机台标高</td>
			<td><?php echo form_input('jitai_heightRef', set_value('jitai_heightRef', $data->jitai_heightRef));?></td>
		</tr>
		<tr>
			<td>主钻杆</td>
			<td><?php echo form_input('zhuzhuangan', set_value('zhuzhuangan', $data->zhuzhuangan));?></td>
		</tr>
		<tr>
			<td>附钻杆</td>
			<td><?php echo form_input('fuzhuangan', set_value('fuzhuangan', $data->fuzhuangan));?></td>
		</tr>
		<tr>
			<td>钻头</td>
			<td><?php echo form_input('zhuantou', set_value('zhuantou', $data->zhuantou));?></td>
		</tr>
		<tr>
			<td>主筋规格</td>
			<td><?php echo form_input('zhujinguige', set_value('zhujinguige', $data->zhujinguige));?></td>
		</tr>
		<tr>
			<td>焊接长度</td>
			<td><?php echo form_input('hanjie_length', set_value('hanjie_length', $data->hanjie_length));?></td>
		</tr>
		<tr>
			<td>加劲箍规格</td>
			<td><?php echo form_input('jiajinguguige', set_value('jiajinguguige', $data->jiajinguguige));?></td>
		</tr>
		<tr>
			<td>加密箍筋规格</td>
			<td><?php echo form_input('jiamigujinguige', set_value('jiamigujinguige', $data->jiamigujinguige));?></td>
		</tr>
		<tr>
			<td>加密长度</td>
			<td><?php echo form_input('jiami_length', set_value('jiami_length', $data->jiami_length));?></td>
		</tr>
		<tr>
			<td>非密箍筋规格</td>
			<td><?php echo form_input('feimigujinguige', set_value('feimigujinguige', $data->feimigujinguige));?></td>
		</tr>
		<tr>
			<td>锚固长</td>
			<td><?php echo form_input('maoguchang', set_value('maoguchang', $data->maoguchang));?></td>
		</tr>
		<tr>
			<td>终孔深度</td>
			<td><?php echo form_input('zongkongshendu', set_value('zongkongshendu', $data->zongkongshendu));?></td>
		</tr>
		<tr>
			<td>余尺</td>
			<td><?php echo form_input('yuci', set_value('yuci', $data->yuci));?></td>
		</tr>
		<tr>
			<td>吊筋护桶</td>
			<td><?php echo form_input('diaojinhutong', set_value('diaojinhutong', $data->diaojinhutong));?></td>
		</tr>
		<tr>
			<td>砼面机台</td>
			<td><?php echo form_input('hangmianjitai', set_value('hangmianjitai', $data->hangmianjitai));?></td>
		</tr>
		<tr>
			<td>搭接笼长</td>
			<td><?php echo form_input('dajielongchang', set_value('dajielongchang', $data->dajielongchang));?></td>
		</tr>
		<tr>
			<td>全筋笼长</td>
			<td><?php echo form_input('quanjinlongchang', set_value('quanjinlongchang', $data->quanjinlongchang));?></td>
		</tr>
		<tr>
			<td>底笼</td>
			<td><?php echo form_input('dilong', set_value('dilong', $data->dilong));?></td>
		</tr>
		<tr>
			<td>全筋底笼</td>
			<td><?php echo form_input('quanjindilong', set_value('quanjindilong', $data->quanjindilong));?></td>
		</tr>
		<tr>
			<td>砼强度</td>
			<td><?php echo form_input('hangqiangdu', set_value('hangqiangdu', $data->hangqiangdu));?></td>
		</tr>
		<tr>
			<td>砼超灌量</td>
			<td><?php echo form_input('hangchaoguanliang', set_value('hangchaoguanliang', $data->hangchaoguanliang));?></td>
		</tr>
		<tr>
			<td>砼理论量</td>
			<td><?php echo form_input('hanglilunliang', set_value('hanglilunliang', $data->hanglilunliang));?></td>
		</tr>
		<tr>
			<td>备注</td>
			<td><?php echo form_textarea('extra', set_value('extra', $data->extra), 'class="tinymce"');?></td>
		</tr>
		<tr>
			<td><?php echo form_submit('submit', '保存', 'class="btn btn-primary btn-large"');?></td>
			<td><?php echo anchor('admin/data', '取消', 'class="btn btn-primary btn-large"');?></td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datetimepicker({
			language: 'zh-CN'
		});
	});
</script>