<div class="content pingjian">
	<h3><?php echo !empty($data->id) ? '编辑桩号"'.$data->id.'"' : '新建数据';?></h3>
	<?php echo validation_errors();?>
	<?php echo $this->session->flashdata('saveError');?>
	<?php echo form_open();?>
	<table class="table">
		<tr>
			<td colspan="2">机号<span class="required">*</span></td>
			<td><?php echo (!empty($data->mac_id) ? form_input('mac_id', set_value('mac_id', $data->mac_id), 'readonly') : form_input('mac_id', set_value('mac_id', $data->mac_id)));?></td>
			<td>桩型<span class="required">*</span></td>
			<td><?php echo form_input('type', set_value('type', $data->type));?></td>
		</tr>
		<tr>
			<td colspan="2">备注</td>
			<td><?php echo form_input('extra', set_value('extra', $data->extra));?></td>
			<td>桩号</td>
			<td><?php echo form_input('id', set_value('id', $data->id));?></td>
		</tr>
		<tr>
			<td colspan="2">桩径<span class="required">*</span></td>
			<td><?php echo form_input('radius', set_value('radius', $data->radius));?></td>
			<td>试块<span class="required">*</span></td>
			<td><?php echo form_input('shikuai', set_value('shikuai', $data->shikuai));?></td>
		</tr>
		<tr>
			<td rowspan="4">开孔</td>
			<td>桩顶标高</td>
			<td><?php echo form_input('kaikong_zhuangdingbiaogao', set_value('kaikong_zhuangdingbiaogao', $data->kaikong_zhuangdingbiaogao));?>m</td>
			<td>桩底标高</td>
			<td><?php echo form_input('kaikong_zhuangdibiaogao', set_value('kaikong_zhuangdibiaogao', $data->kaikong_zhuangdibiaogao));?>m</td>
		</tr>
		<tr>
			<td>护筒标高</td>
			<td><?php echo form_input('kaikong_hutongbiaogao', set_value('kaikong_hutongbiaogao', $data->kaikong_hutongbiaogao));?>m</td>
			<td>机台标高</td>
			<td><?php echo form_input('kaikong_jitaibiaogao', set_value('kaikong_jitaibiaogao', $data->kaikong_jitaibiaogao));?>m</td>
		</tr>
		<tr>
			<td>钻头长度</td>
			<td><?php echo form_input('kaikong_zhuantouchangdu', set_value('kaikong_zhuantouchangdu', $data->kaikong_zhuantouchangdu));?>m</td>
			<td>水平、对中</td>
			<td><?php echo form_dropdown('kaikong_shuipingduizhong', array('不合格', '合格'), 0);?></td>
		</tr>
		<tr>
			<td>开钻时间</td>
			<td>
				<div class="datepicker input-append">
					<?php if(empty($data->kaikong_kaizhuanshijian) || $data->kaikong_kaizhuanshijian == '0000-00-00 00:00:00'):?>
					<?php echo form_input('kaikong_kaizhuanshijian', set_value('kaikong_kaizhuanshijian', $data->kaikong_kaizhuanshijian), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
					<?php else:?>
					<?php echo form_input('kaikong_kaizhuanshijian', set_value('kaikong_kaizhuanshijian', $data->kaikong_kaizhuanshijian), 'readonly');?>
					<?php endif;?>
				</div>
			</td>
			<td>监理</td>
			<td><?php echo form_input('kaikong_jianli', set_value('kaikong_jianli', $data->kaikong_jianli));?></td>
		</tr>
		<?php if($data->kaikong_jianli):?>
		<tr>
			<td rowspan="4">成孔</td>
			<td>主杆长</td>
			<td><?php echo form_input('chengkong_zhuganchang', set_value('chengkong_zhuganchang', $data->chengkong_zhuganchang));?>m</td>
			<td>钻具总长</td>
			<td><?php echo form_input('chengkong_zhuanjuzongchang', set_value('chengkong_zhuanjuzongchang', $data->chengkong_zhuanjuzongchang));?>m</td>
		</tr>
		<tr>
			<td>机余尺</td>
			<td><?php echo form_input('chengkong_jiyuci', set_value('chengkong_jiyuci', $data->chengkong_jiyuci));?>m</td>
			<td>终孔深度</td>
			<td><?php echo form_input('chengkong_zongkongshendu', set_value('chengkong_zongkongshendu', $data->chengkong_zongkongshendu));?>m</td>
		</tr>
		<tr>
			<td>预计入岩标高</td>
			<td><?php echo form_input('chengkong_yujiruyanbiaogao', set_value('chengkong_yujiruyanbiaogao', $data->chengkong_yujiruyanbiaogao));?>m</td>
			<td>一次清孔泥浆比重</td>
			<td><?php echo form_input('chengkong_yiciqingkongnijiangbizhong', set_value('chengkong_yiciqingkongnijiangbizhong', $data->chengkong_yiciqingkongnijiangbizhong));?>m</td>
		</tr>
		<tr>
			<td>实际入岩标高</td>
			<td><?php echo form_input('chengkong_shijiruyanbiaogao', set_value('chengkong_shijiruyanbiaogao', $data->chengkong_shijiruyanbiaogao));?>m</td>
			<td>监理</td>
			<td><?php echo form_input('chengkong_jianli', set_value('chengkong_jianli', $data->chengkong_jianli));?></td>
		</tr>
		<?php if($data->chengkong_jianli):?>
		<tr>
			<td rowspan="7">钢筋笼制安</td>
			<td>主筋规格</td>
			<td><?php echo form_input('gjgza_zhujinguige', set_value('gjgza_zhujinguige', $data->gjgza_zhujinguige));?></td>
			<td>加强筋规格</td>
			<td><?php echo form_input('gjgza_jiaqiangjinguige', set_value('gjgza_jiaqiangjinguige', $data->gjgza_jiaqiangjinguige));?></td>
		</tr>
		<tr>
			<td>加密螺旋筋</td>
			<td><?php echo form_input('gjgza_jiamiluoxuanjin', set_value('gjgza_jiamiluoxuanjin', $data->gjgza_jiamiluoxuanjin));?></td>
			<td>加密长度</td>
			<td><?php echo form_input('gjgza_jiamichangdu', set_value('gjgza_jiamichangdu', $data->gjgza_jiamichangdu));?>m</td>
		</tr>
		<tr>
			<td>非密螺旋筋</td>
			<td><?php echo form_input('gjgza_feimiluoxuanjin', set_value('gjgza_feimiluoxuanjin', $data->gjgza_feimiluoxuanjin));?></td>
			<td>至护筒吊筋</td>
			<td><?php echo form_input('gjgza_zhihutongdiaojin', set_value('gjgza_zhihutongdiaojin', $data->gjgza_zhihutongdiaojin));?>m</td>
		</tr>
		<tr>
			<td>全筋笼节数</td>
			<td><?php echo form_input('gjgza_quanjinlongjieshu', set_value('gjgza_quanjinlongjieshu', $data->gjgza_quanjinlongjieshu));?>节</td>
			<td>半全筋笼长度</td>
			<td><?php echo form_input('gjgza_banquanjinlongchangdu', set_value('gjgza_banquanjinlongchangdu', $data->gjgza_banquanjinlongchangdu));?>m</td>
		</tr>
		<tr>
			<td>搭接后笼长度</td>
			<td><?php echo form_input('gjgza_dajiehoulongchangdu', set_value('gjgza_dajiehoulongchangdu', $data->gjgza_dajiehoulongchangdu));?>m</td>
			<td>底笼长</td>
			<td><?php echo form_input('gjgza_dilongchang', set_value('gjgza_dilongchang', $data->gjgza_dilongchang));?>m</td>
		</tr>
		<tr>
			<td>累计总笼数</td>
			<td><?php echo form_input('gjgza_leijizonglongshu', set_value('gjgza_leijizonglongshu', $data->gjgza_leijizonglongshu));?>节</td>
			<td>监理</td>
			<td><?php echo form_input('gjgza_jianli', set_value('gjgza_jianli', $data->gjgza_jianli));?></td>
		</tr>
		<tr>
			<td>监理签字</td>
			<td colspan="3"><?php echo form_dropdown('gjgza_jianliqianzi', array('1焊','2焊','3焊','4焊','5焊'), 0);?></td>
		</tr>
		<?php if($data->gjgza_jianli):?>
		<tr>
			<td rowspan="3">二次清孔</td>
			<td>泥浆比重</td>
			<td><?php echo form_input('ecqk_nijiangbizhong', set_value('ecqk_nijiangbizhong', $data->ecqk_nijiangbizhong));?></td>
			<td>沉渣</td>
			<td><?php echo form_input('ecqk_chenzha', set_value('ecqk_chenzha', $data->ecqk_chenzha));?>mm</td>
		</tr>
		<tr>
			<td>机余尺</td>
			<td><?php echo form_input('chengkong_jiyuci', set_value('chengkong_jiyuci', $data->chengkong_jiyuci));?></td>
			<td>终孔深度</td>
			<td><?php echo form_input('chengkong_zongkongshendu', set_value('chengkong_zongkongshendu', $data->chengkong_zongkongshendu));?></td>
		</tr>
		<tr>
			<td>清孔后孔深</td>
			<td><?php echo form_input('ecqk_qingkonghoukongshen', set_value('ecqk_qingkonghoukongshen', $data->ecqk_qingkonghoukongshen));?></td>
			<td>监理</td>
			<td><?php echo form_input('ecqk_jianli', set_value('ecqk_jianli', $data->ecqk_jianli));?></td>
		</tr>
		<?php if($data->ecqk_jianli):?>
		<tr>
			<td rowspan="5">砼灌注</td>
			<td>导管距孔底距离</td>
			<td><?php echo form_input('shuanguanzhu_daoguanjukongdijuli', set_value('shuanguanzhu_daoguanjukongdijuli', $data->shuanguanzhu_daoguanjukongdijuli));?>cm</td>
			<td>砼强度</td>
			<td><?php echo form_input('shuanguanzhu_shuanqiangdu', set_value('shuanguanzhu_shuanqiangdu', $data->shuanguanzhu_shuanqiangdu));?></td>
		</tr>
		<tr>
			<td>坍落度</td>
			<td><?php echo form_input('shuanguanzhu_tanluodu', set_value('shuanguanzhu_tanluodu', $data->shuanguanzhu_tanluodu));?>mm</td>
			<td>砼实际量</td>
			<td><?php echo form_input('shuanguanzhu_shuanshijiliang', set_value('shuanguanzhu_shuanshijiliang', $data->shuanguanzhu_shuanshijiliang));?>m<sup>3</sup></td>
		</tr>
		<tr>
			<td>砼理论量</td>
			<td><?php echo form_input('shuanguanzhu_shuanlilunliang', set_value('shuanguanzhu_shuanlilunliang', $data->shuanguanzhu_shuanlilunliang));?>m<sup>3</sup></td>
			<td>充盈系数</td>
			<td><?php echo form_input('shuanguanzhu_chongyingxishu', set_value('shuanguanzhu_chongyingxishu', $data->shuanguanzhu_chongyingxishu));?></td>
		</tr>
		<tr>
			<td>砼面对护筒距离</td>
			<td><?php echo form_input('shuanguanzhu_shuanmianduihutongjuli', set_value('shuanguanzhu_shuanmianduihutongjuli', $data->shuanguanzhu_shuanmianduihutongjuli));?>m</td>
			<td>砼面对机台距离</td>
			<td><?php echo form_input('shuanguanzhu_shuanmianduijitaijuli', set_value('shuanguanzhu_shuanmianduijitaijuli', $data->shuanguanzhu_shuanmianduijitaijuli));?>m</td>
		</tr>
		<tr>
			<td>灌注时间</td>
			<td>
				<div class="datepicker input-append">
					<?php echo form_input('shuanguanzhu_guanzhushijian', set_value('shuanguanzhu_guanzhushijian', $data->shuanguanzhu_guanzhushijian), 'data-format="yyyy/MM/dd hh:mm:ss"');?>
					<span class="add-on">
				      	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span>
				</div>
			</td>
			<td>监理</td>
			<td><?php echo form_input('shuanguanzhu_jianli', set_value('shuanguanzhu_jianli', $data->shuanguanzhu_jianli));?></td>
		</tr>
		<?php endif;?>
		<?php endif;?>
		<?php endif;?>
		<?php endif;?>
		<tr>
			<td colspan="5">
				<?php echo form_submit('submit', '保存', 'class="btn btn-large btn-primary pull-left"');?>
				<?php echo anchor('admin/pingjian', '取消', 'class="btn btn-primary btn-large pull-right"');?>
			</td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>

<script type="text/javascript">
	$(function() {
	    $('.datepicker').datetimepicker({
			language: 'zh-CN'
		});
	 });
</script>