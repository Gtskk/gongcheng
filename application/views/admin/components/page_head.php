<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <title><?php echo $meta_title;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
	   	<link href="<?php echo base_url('css/admin.css');?>" rel="stylesheet" media="screen">
	   	<link href="<?php echo base_url('css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet"  media="screen">

        <script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
	    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
	    <script src="<?php echo base_url('js/admin.js');?>"></script>
	    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js');?>"></script>
	    <script src="<?php echo base_url('js/bootstrap-datetimepicker.zh-CN.js');?>"></script>
	   	<?php if(isset($sortable) && $sortable):?>
	    <script src="<?php echo base_url('js/jquery-ui-1.9.1.custom.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.mjs.nestedSortable.js');?>"></script>
		<?php endif;?>

	    <!-- TinyMCE -->
		<script type="text/javascript" src="<?php echo base_url('js/tiny_mce/tiny_mce.js'); ?>"></script>
		<script type="text/javascript">
			tinyMCE.init({
				// General options
				mode : "textareas",
				language: 'zh-cn',
				theme : "advanced",
				plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
		
				// Theme options
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,
			});
		</script>
		<!-- /TinyMCE -->
    </head>