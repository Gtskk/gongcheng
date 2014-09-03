<?php $this->load->view('components/page_head');?>

<div class="container">
	<!-- Page head -->
	<section>
		<h2>My awesome site</h2>
	</section>

	<!-- Nav bar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a href="<?php echo site_url();?>" class="brand">Gtskk</a>
			<?php echo get_menus($menus);?>

			<form id="search" class="navbar-search pull-right" action="" method="post">
                <input type="text" id="search_content" class="search-query span2" name="s" placeholder="Search">
            </form>
		</div>
	</div>
</div>

<!-- Main section -->
<div class="container">
	<?php $this->load->view('templates/'.$subview);?>
</div>

<?php $this->load->view('components/page_foot');?>