<?php $this->load->view('components/page_head');?>

<div class="row admin_top">
	<div class="span5 top_left">
		<!-- <h3>钻孔灌注桩信息监理有限公司</h3>
		<h4>江苏建科建设监理有限公司</h4> -->
		<img src="<?php echo base_url('images/banner_txt.png');?>" alt="banner">
	</div>
	<div class="span7 offset4 top_right">
		<p class="pull-right qiantai">
			<a class="backbtn" href="<?php echo base_url('admin');?>">管理员录入</a>
		</p>
	</div>
</div>
<div class="row admin_middle"></div>
<div class="row-fluid print">
	<div class="span5">
		<ul class="nav nav-pills">
			<li><a href="javascript:void(0)" onclick="printdiv('huizongbiao')"><img src="images/huizongbiao.png" alt="汇总表打印">汇总表打印</a></li>
			<li><a href="javascript:void(0)" onclick="printdiv('pingjian')"><img src="images/pingtai.png" alt="平台打印">平台打印</a></li>
			<li><a href="javascript:void(0)" onclick="printdiv('pangzhan')"><img src="images/pangzhan.png" alt="旁站打印">旁站打印</a></li>
		</ul>
	</div>
	<div class="span2 offset5">
		<a href="javascript:void(0)" id="search">
			<img src="images/search.png" alt="便捷工具查询">便捷工具查询
		</a>
	</div>
</div>
<div class="main_content">
	<div class="content">

		<div class="searchbar">
			<form action="">
				<div class="type pull-left">
					<input type="radio" checked="true" name="content" value="chengkong">成孔
					<input type="radio" name="content" value="gangjinlong">钢筋笼制安
					<input type="radio" name="content" value="erqing">二次清孔
					<input type="radio" name="content" value="shuanjiaozhu">砼浇筑
				</div>
				<a href="#" class="btn btn-primary pull-right">数据查询</a>
			</form>
		</div>

		<div class="main"><img usemap="#Map" src="images/cad.jpg" alt="地图" /></div>
		<map name="Map" id="Map">
			<?php foreach ($projectDatas as $val):?>
			<area id="zhuang<?php echo $val->id;?>" alt="<?php echo $val->id;?>" href="javascript:void(0);" coords="<?php echo $val->x_axis;?>, <?php echo $val->y_axis;?>, 4" shape="circ">
			<?php endforeach;?>
		</map>
	</div>
</div>
<div id="foot">
	<p>
		<span class="copyright">&copy;2013-2014江苏建科建设监理有限公司版权所有</span>
		<span class="icp">苏ICP备06011060号-1</span>
	</p>
</div>

<table class="table table-striped hide" id="huizongbiao">
    <tr>
        <th>桩号</th>
        <th>机号</th>
        <th>桩型</th>
        <th>桩径</th>
        <th>桩长</th>
        <th>桩顶标高</th>
        <th>入岩深度</th>
        <th>预测入岩</th>
        <th>实际入岩</th>
        <th>开钻时间</th>
        <th>成桩时间</th>
        <th>护筒标高</th>
        <th>操作</th>
    </tr>
    <?php if(count($projectDatas)):foreach($projectDatas as $data):?>
	<tr>
		<td><?php echo $data->id;?></td>
		<td><?php echo $data->mac_id;?></td>
		<td><?php echo $data->type;?></td>
		<td><?php echo $data->radius;?></td>
		<td><?php echo $data->length;?></td>
		<td><?php echo $data->top_ref;?></td>
		<td><?php echo $data->ruyan_depth;?></td>
		<td><?php echo $data->predict_ruyan;?></td>
		<td><?php echo $data->shiji_ruyan;?></td>
		<td><?php echo $data->kaizhuan_time;?></td>
		<td><?php echo $data->chengzhuang_time;?></td>
		<td><?php echo $data->hutong_heightRef;?></td>
		<td class="caozuo">
			<div class="btn-group">
				<a href="" role="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">操作<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					<li><?php echo btn_edit('admin/data/edit/'.$data->id);?></li>
					<li><?php echo btn_delete('admin/data/delete/'.$data->id);?></li>
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
<table class="table table-striped hide" id="pingjian">
    <tr>
        <th>桩号</th>
        <th>机号</th>
        <th>桩型</th>
        <th>桩径</th>
        <th>试块</th>
        <th>操作</th>
    </tr>
    <?php if(count($pingjianDatas)):foreach($pingjianDatas as $data):?>
	<tr>
		<td><?php echo $data->id;?></td>
		<td><?php echo $data->mac_id;?></td>
		<td><?php echo $data->type;?></td>
		<td><?php echo $data->radius;?></td>
		<td><?php echo $data->extra;?></td>
		<td class="caozuo">
			<div class="btn-group">
				<a href="" role="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">操作<span class="caret"></span></a>
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
<table class="table table-striped hide" id="pangzhan">
    <tr>
        <th>编号</th>
        <th>工程名称</th>
        <th>工程地点</th>
        <th>桩径</th>
        <th>操作</th>
    </tr>
    <?php if(count($pangzhanDatas)):foreach($pangzhanDatas as $data):?>
	<tr>
		<td><?php echo $data->num;?></td>
		<td><?php echo $data->project_name;?></td>
		<td><?php echo $data->work_address;?></td>
		<td><?php echo $data->zhuangjing;?></td>
		<td class="caozuo">
			<div class="btn-group">
				<a href="" role="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">操作<span class="caret"></span></a>
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

<script src="<?php echo base_url('js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.imagemapster.min.js');?>"></script>
<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript" src="js/application.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('img').mapster({
			fillColor: 'ff0000',
			stroke: true
		});
		// 高亮信息点
		$('area').mapster('highlight');


	    jQuery.fn.extend({
	        TitleShow: function(strHTML) {
	            var xOffset = 0;
	            var yOffset = 0;
	            var preview = $("#preview_container");
	            if(preview.length<=0){
	                $("body").append("<div id='preview_container'></div>");
	                preview = $("#preview_container");
	            }
	            preview.css({
	                "display":"none",
	                "position":"absolute",
	                "width":"150px",
	                "word-break":"break-all"
	            });
	            return this.each(function() {
	                var _this = $(this);
	                _this.hover(
	                    function(e){
	                        preview.html(strHTML);
	                        preview
	                            .css("top",(e.pageY - xOffset) + "px")
	                            .css("left",(e.pageX + yOffset) + "px")
	                            .css("opaticy",0)
	                            .show()
	                            .stop()
	                            .animate({"opacity":0.9},300);
	                            
	                    },function(){
	                        preview
	                            .stop()
	                            .animate({"opacity":0},300,function(){
	                                $(this).hide();
	                            });
	                    }
	                )
	                _this.mousemove(function(e){
	                    preview
	                        .css("top",(e.pageY - xOffset) + "px")
	                        .css("left",(e.pageX + yOffset) + "px");
	                });
	            });
	        }
	    });
		<?php foreach ($projectDatas as $val):?>
	    $("#zhuang<?php echo $val->id;?>").TitleShow("<div class='mapDiv'>\
	    	桩型：<?php echo $val->type;?><br />\
	    	桩径：<?php echo $val->radius;?><br />\
	    	桩长：<?php echo $val->length;?>\
	    	桩顶标高：<?php echo $val->top_ref;?><br />\
	    	桩长：<?php echo $val->length;?><br />\
	    	全筋桩长：<?php if($val->quanjin_length>10):?><span class='red'><?php endif;?><?php echo $val->quanjin_length;?><?php if($val->quanjin_length>10):?></span><?php endif;?><br />\
	    	入岩深度：<?php echo $val->ruyan_depth;?><br />\
	    	预测入岩：<?php echo $val->predict_ruyan;?><br />\
	    	实际入岩：<?php echo $val->shiji_ruyan;?><br />\
	    	开钻时间：<?php echo $val->kaizhuan_time;?><br />\
	    	成桩时间：<?php echo $val->chengzhuang_time;?><br />\
	    	护筒标高：<?php echo $val->hutong_heightRef;?></div>"
	    );
	    <?php endforeach;?>
	});
</script>

<?php $this->load->view('components/page_foot');?>