<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $meta_title;?></title>
		<!-- Bootstrap -->
		<link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/admin.css');?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet" media="screen">
		<script src="<?php echo base_url('js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
		<!--<script type="text/javascript" src="<?php echo base_url('js/mapster/redist/when.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/core.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/graphics.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/mapimage.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/mapdata.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/areadata.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/areacorners.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/scale.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mapster/tooltip.js');?>"></script>-->
		<script type="text/javascript" src="<?php echo base_url('js/jquery.imagemapster.min.js');?>"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('img').mapster({
					fillColor: 'ff0000',
					stroke: true, 
					singleSelect: true
				});
				// 高亮信息点
				$('area').mapster('highlight');
			});
		</script>
	</head>
	<body>