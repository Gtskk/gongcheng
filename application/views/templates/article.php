<div class="row">
	<!-- Main content -->
	<div class="span9">
		<article>
			<h2 class="text-center"><?php echo $article->title;?></h2>
			<em><?php echo $article->pubdate;?></em>
			<?php echo $article->body;?>
		</article>
	</div>

	<!-- Sidebar -->
	<?php $this->load->view('components/sidebar');?>
</div>