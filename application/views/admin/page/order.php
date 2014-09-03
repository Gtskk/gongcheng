<section>
	<h2>页面排序</h2>
	<p class="alert alert-info">拖动页面然后点击“保存”按钮.</p>
	<div id="orderResult"></div>
	<input type="button" id="save" class="btn btn-primary" value="Save" />
</section>

<script type="text/javascript">
	$(function(){
		$.post('<?php echo site_url("admin/page/order_ajax");?>', function(data){
			$('#orderResult').html(data);
		});

		$('#save').click(function(){
			oSortable = $('.sortable').nestedSortable('toArray');

			$('#orderResult').slideUp(function(){
				$.post('<?php echo site_url("admin/page/order_ajax");?>', {sortable: oSortable}, function(data){
					$('#orderResult').html(data);
					$('#orderResult').slideDown();
				});
			});
		});
	});
</script>