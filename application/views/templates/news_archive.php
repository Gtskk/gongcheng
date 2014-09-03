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
		<?php if($pagination):?>
		<div class="pagination">
			<?php echo $pagination;?>
		</div>
		<?php endif;?>
	</div>

	<!-- Sidebar -->
	<?php $this->load->view('components/sidebar');?>
</div>