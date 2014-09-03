	<script type="text/javascript">
    	$(function(){
    		$('#search_content').keydown(function(){
				var s = $(this).val();
				$.post('<?php echo site_url("page/search_ajax");?>', {s: s}, function(data){
					$('#sidebar').html(data);
				});

    		});
    	});
    </script>
	</body>
</html>