<?php $this->load->view('components/page_head');?>

<div class="row admin_top">
	<div class="span5 top_left">
		<h3>钻孔灌注桩信息监理有限公司</h3>
		<h4>江苏建科建设监理有限公司</h4>
	</div>
	<div class="span7 offset4 top_right">
		<p class="pull-right qiantai">
			<a class="backbtn" href="<?php echo base_url('admin');?>">管理员录入</a>
		</p>
	</div>
</div>
<div class="row admin_middle"></div>
<div class="row-fluid print">
	<div class="span5 offset4">
		<ul class="nav nav-pills">
			<li><a href="#"><img src="images/huizongbiao.png" alt="汇总表打印">汇总表打印</a></li>
			<li><a href="#"><img src="images/pingtai.png" alt="平台打印">平台打印</a></li>
			<li><a href="#"><img src="images/pangzhan.png" alt="旁站打印">旁站打印</a></li>
		</ul>
	</div>
	<div class="span2 offset1">
		<a href="#" id="search">
			<img src="images/search.png" alt="便捷工具查询">便捷工具查询
		</a>
	</div>
</div>
<div class="main_content">
	<div class="content">

		<div class="searchbar">
			<form action="">
				<div class="type pull-left">
					<input type="radio" checked="checked" name="content">成孔
					<input type="radio" name="content">钢筋笼
					<input type="radio" name="content">二青
					<input type="radio" name="content">铨浇筑
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/application.js"></script>

<script type="text/javascript">
	var jq = jQuery.noConflict();
	jq(document).ready(function(){
	    jQuery.fn.extend({
	        TitleShow: function(strHTML) {
	            var xOffset = 0;
	            var yOffset = 0;
	            var preview = jq("#preview_container");
	            if(preview.length<=0){
	                jq("body").append("<div id='preview_container'></div>");
	                preview = jq("#preview_container");
	            }
	            preview.css({
	                "display":"none",
	                "position":"absolute",
	                "width":"150px",
	                "word-break":"break-all"
	            });
	            return this.each(function() {
	                var _this = jq(this);
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
	                                jq(this).hide();
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
	    jq("#zhuang<?php echo $val->id;?>").TitleShow("<div class='mapDiv'>\
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