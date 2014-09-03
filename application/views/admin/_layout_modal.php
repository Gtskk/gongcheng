<?php $this->load->view('admin/components/page_head');?>
	
	<body class="login">
		<!-- <div class="modal show" role="dialog">
			
			<?php //$this->load->view($subview);?>
			<div class="modal-footer">
				&copy;2014 <?php echo $meta_title;?> BY <?php echo $site_author;?>
			</div>
		</div> -->
		<div class="left_login">
			<img src="<?php echo base_url('images/login_left.gif');?>" alt="登录">
		</div>
		<!-- 登录框 -->
		<div class="modal show right_login" role="dialog">

			<?php $this->load->view($subview);?>
			
		</div>

<?php $this->load->view('admin/components/page_foot');?>