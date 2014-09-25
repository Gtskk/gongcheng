<div class="row">
	<!-- Main content -->
	<div class="span9">
		<div class="table">
			<?php foreach($articles as $article):?>
			<div>
				<?php echo get_excerpt($article);?>
			</div>
			<?php endforeach;?>
		</div>
	</div>

	<!-- Sidebar -->
	<?php $this->load->view('components/sidebar');?>
</div>