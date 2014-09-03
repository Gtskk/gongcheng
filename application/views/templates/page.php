<div class="row">
	<!-- Main content -->
	<div class="span9">
		<h2><?php echo $page->title;?></h2>
		<p><?php echo $page->body;?></p>
	</div>

	<!-- Sidebar -->
	<?php $this->load->view('components/sidebar');?>
</div>