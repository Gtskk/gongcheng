<div class="content pingjian">
	<h3><?php echo !empty($data->id) ? '编辑旁站记录表"'.$data->id.'"' : '新建数据';?></h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td colspan="2">工程名称<span class="required">*</span></td>
			<td colspan="2"><?php echo form_input('project_name', set_value('project_name', $data->project_name));?></td>
			<td>编号<span class="required">*</span></td>
			<td><?php echo form_input('num', set_value('num', $data->num));?></td>
		</tr>
		<tr>
			<td>日期</td>
			<td>
				<div class="datepicker input-append">
					<?php echo form_input('riqi', set_value('riqi', $data->riqi), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
			<td>气候</td>
			<td><?php echo form_input('qihou', set_value('qihou', $data->qihou));?></td>
			<td>工程地点</td>
			<td><?php echo form_input('work_address', set_value('work_address', $data->work_address));?></td>
		</tr>
		<tr>
			<td colspan="2">旁站部位<span class="required">*</span></td>
			<td><?php echo form_input('pangzhanbuwei', set_value('pangzhanbuwei', $data->pangzhanbuwei));?></td>
			<td>桩径<span class="required">*</span></td>
			<td><?php echo form_input('zhuangjing', set_value('zhuangjing', $data->zhuangjing));?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">旁站监理开始时间</td>
			<td>
				<div class="datepicker input-append">
					<?php echo form_input('pangzhanjianlikaishishijian', set_value('pangzhanjianlikaishishijian', $data->pangzhanjianlikaishishijian), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
			<td colspan="2">旁站监理结束时间</td>
			<td>
				<div class="datepicker input-append">
					<?php echo form_input('pangzhanjianlijieshushijian', set_value('pangzhanjianlijieshushijian', $data->pangzhanjianlijieshushijian), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
		</tr>
		<tr><td colspan="6">施工情况</td></tr>
		<tr>
			<td colspan="2">1、施工企业现场质检员到岗：</td>
			<td><?php echo form_dropdown('sg_zjArrive', array('否', '是'), set_value('sg_zjArrive', $data->sg_zjArrive));?></td>
			<td colspan="2">2、特殊工种上岗证是否齐全：</td>
			<td><?php echo form_dropdown('sg_shanggangzheng', array('否', '是'), set_value('sg_shanggangzheng', $data->sg_shanggangzheng));?></td>
		</tr>
		<tr>
			<td colspan="2">3、施工机械到位：</td>
			<td><?php echo form_dropdown('sg_machineArrive', array('否', '是'), set_value('sg_machineArrive', $data->sg_machineArrive));?></td>
			<td colspan="2">4、混凝土原材料是否检验：</td>
			<td><?php echo form_dropdown('sg_materialCheck', array('否', '是'), set_value('sg_materialCheck', $data->sg_materialCheck));?></td>
		</tr>
		<tr>
			<td colspan="2">5、有无混凝土配合比报告：</td>
			<td><?php echo form_dropdown('sg_hunningtuDoc', array('否', '是'), set_value('sg_hunningtuDoc', $data->sg_hunningtuDoc));?></td>
			<td colspan="2">6、各项条件是否具备：</td>
			<td><?php echo form_dropdown('sg_tiaojianReq', array('否', '是'), set_value('sg_tiaojianReq', $data->sg_tiaojianReq));?></td>
		</tr>
		<tr><td colspan="6">监理情况</td></tr>
		<tr>
			<td rowspan="5">设计要求</td>
			<td>砼设计强度</td>
			<td><?php echo form_input('jl_shuangshejiqiangdu', set_value('jl_shuangshejiqiangdu', $data->jl_shuangshejiqiangdu));?></td>
			<td>理论砼首灌</td>
			<td><?php echo form_input('jl_lilunshuanshouguan', set_value('jl_lilunshuanshouguan', $data->jl_lilunshuanshouguan));?>m<sup>3</sup></td>
			<td rowspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td>孔底标高</td>
			<td><?php echo form_input('jl_kongdibiaogao', set_value('jl_kongdibiaogao', $data->jl_kongdibiaogao));?>m</td>
			<td>理论砼量</td>
			<td><?php echo form_input('jl_lilunshuanliang', set_value('jl_lilunshuanliang', $data->jl_lilunshuanliang));?>m<sup>3</sup></td>
		</tr>
		<tr>
			<td>孔口标高</td>
			<td><?php echo form_input('jl_kongkoubiaogao', set_value('jl_kongkoubiaogao', $data->jl_kongkoubiaogao));?>m</td>
			<td>砼试块</td>
			<td><?php echo form_input('jl_shuanshikuai', set_value('jl_shuanshikuai', $data->jl_shuanshikuai));?>块/组</td>
		</tr>
		<tr>
			<td>设计砼面标高</td>
			<td><?php echo form_input('jl_shejishuanmianbiaogao', set_value('jl_shejishuanmianbiaogao', $data->jl_shejishuanmianbiaogao));?>m</td>
			<td>砼面标高</td>
			<td><?php echo form_input('jl_shuanmianbiaogao', set_value('jl_shuanmianbiaogao', $data->jl_shuanmianbiaogao));?>m</td>
		</tr>
		<tr>
			<td>导管长度</td>
			<td><?php echo form_input('jl_daoguanchangdu', set_value('jl_daoguanchangdu', $data->jl_daoguanchangdu));?>m</td>
			<td>充盈系数</td>
			<td><?php echo form_input('jl_chongyingxishu', set_value('jl_chongyingxishu', $data->jl_chongyingxishu));?></td>
		</tr>
		<tr>
			<td col>&nbsp;</td>
			<td colspan="5" class="special">
				<table class="tableSpe">
					<tr>
						<td>时间</td>
						<td>混凝土量</td>
						<td>坍落度</td>
						<td>灌注是否正常</td>
						<td>导管离孔底深度</td>
						<td>拔管前导管埋深</td>
						<td>拔管每节长度</td>
						<td>拔管节数</td>
						<td>拔管长度</td>
						<td>拔管后导管埋深</td>
						<td>拔管过程是否正常</td>
					</tr>
					<?php if(isset($jianli) && count($jianli)):$n = 1;foreach($jianli as $jl):?>
					<tr>
						<?php echo form_hidden('id'.$n, $jl->id);?>
						<td>
							<div class="datepicker input-append">
								<?php echo form_input('time'.$n, set_value('time'.$n, $jl->time), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
								<span class="add-on">
							      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							    </span>
							</div>
						</td>
						<td><?php echo form_input('huningtuliang'.$n, set_value('huningtuliang', $jl->huningtuliang));?></td>
						<td><?php echo form_input('tanluodu'.$n, set_value('tanluodu', $jl->tanluodu));?></td>
						<td><?php echo form_dropdown('guanzhuGood'.$n, array('结束', '是'), set_value('guanzhuGood', $jl->guanzhuGood));?></td>
						<td><?php echo form_input('daoguanlikongdishendu'.$n, set_value('daoguanlikongdishendu', $jl->daoguanlikongdishendu));?></td>
						<td><?php echo form_input('baguanqiandaoguanmaishen'.$n, set_value('baguanqiandaoguanmaishen', $jl->baguanqiandaoguanmaishen));?></td>
						<td><?php echo form_input('baguanmeijiechangdu'.$n, set_value('baguanmeijiechangdu', $jl->baguanmeijiechangdu));?></td>
						<td><?php echo form_input('baguanjieshu'.$n, set_value('baguanjieshu', $jl->baguanjieshu));?></td>
						<td><?php echo form_input('baguanchangdu'.$n, set_value('baguanchangdu', $jl->baguanchangdu));?></td>
						<td><?php echo form_input('baguanhoudaoguanmaishen'.$n, set_value('baguanhoudaoguanmaishen', $jl->baguanhoudaoguanmaishen));?></td>
						<td><?php echo form_dropdown('baguanGood'.$n, array('结束', '是'), set_value('baguanGood', $jl->baguanGood));?></td>
					</tr>
					<?php endforeach;endif;?>
					<tr>
						<td colspan="11">
							<a href="javascript:void(0)" class="jianli_record"><i class="icon-plus"></i></a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr><td colspan="6">发现问题</td></tr>
		<tr>
			<td colspan="3">1、有无违反工程建设强制性标准行为？</td>
			<td><?php echo form_dropdown('que_weifanqiangzhixing', array('无', '有'), set_value('que_weifanqiangzhixing', $data->que_weifanqiangzhixing));?></td>
		</tr>
		<tr>
			<td colspan="3">2、有无其他影响施工质量行为？</td>
			<td><?php echo form_dropdown('que_yingxiangzhiliang', array('无', '有'), set_value('que_yingxiangzhiliang', $data->que_yingxiangzhiliang));?></td>
		</tr>
		<tr>
			<td colspan="2">处理意见：</td>
			<td colspan="4"><?php echo form_textarea('chuliyijiang', set_value('chuliyijiang', $data->chuliyijiang), 'class="tinymce"');?></td>
		</tr>
		<tr>
			<td colspan="2">备注：</td>
			<td colspan="4"><?php echo form_textarea('extra', set_value('extra', $data->extra), 'class="tinymce"');?></td>
		</tr>
		<tr>
			<td colspan="2">施工企业</td>
			<td><?php echo form_input('shigongqiye', set_value('shigongqiye', $data->shigongqiye));?></td>
			<td colspan="2">监理企业</td>
			<td><?php echo form_input('jianliqiye', set_value('jianliqiye', $data->jianliqiye));?></td>
		</tr>
		<tr>
			<td colspan="2">项目经理部</td>
			<td><?php echo form_input('xiangmujinglibu', set_value('xiangmujinglibu', $data->xiangmujinglibu));?></td>
			<td colspan="2">项目监理机构</td>
			<td><?php echo form_input('xiangmujianlijigou', set_value('xiangmujianlijigou', $data->xiangmujianlijigou));?></td>
		</tr>
		<tr>
			<td colspan="2">质检员（签字）</td>
			<td><?php echo form_input('zhijianyuan', set_value('zhijianyuan', $data->zhijianyuan));?></td>
			<td colspan="2">旁站监理（签字）</td>
			<td><?php echo form_input('pangzhanjianli', set_value('pangzhanjianli', $data->pangzhanjianli));?></td>
		</tr>
		<tr>
			<td colspan="2">质检员（签字）日期</td>
			<td>
				<div class="datepicker1 input-append">
					<?php echo form_input('zhijianyuanqianziriqi', set_value('zhijianyuanqianziriqi', $data->zhijianyuanqianziriqi), 'data-format="yyyy/MM/dd"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
			<td colspan="2">旁站监理（签字）日期</td>
			<td>
				<div class="datepicker1 input-append">
					<?php echo form_input('jianliqianziriqi', set_value('jianliqianziriqi', $data->jianliqianziriqi), 'data-format="yyyy/MM/dd"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<?php echo form_submit('submit', '保存', 'class="btn btn-large btn-primary pull-left"');?>
				<?php echo anchor('admin/pangzhan', '取消', 'class="btn btn-primary btn-large pull-right"');?>
			</td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datetimepicker({
			language: 'zh-CN'
		});
		$('.datepicker1').datetimepicker({
			language: 'zh-CN',
			pickTime: false
		});
	});
</script>