<?php $this->load->view('admin/components/page_head');?>
    
    <body>
        <div class="row admin_top">
            <div class="span5 top_left">
                <h3>钻孔灌注桩信息监理有限公司</h3>
                <h4>江苏建科建设监理有限公司</h4>
            </div>
            <div class="span7 offset4 top_right">
                <p class="pull-left">
                    <img src="<?php echo base_url('images/user.png');?>" alt="用户小图标">
                    <span class="user">当前用户：<?php echo $this->session->userdata('name');?></span>
                    <span class="time">系统时间：<?php echo date('Y/m/d');?></span>
                </p>
                <p class="pull-right">
                    <img src="<?php echo base_url('images/logout.png');?>" alt="退出">
                    <?php echo anchor('admin/user/logout', '退出', 'class="logout"');?>
                </p>
            </div>
        </div>
        <div class="row admin_middle"></div>
        <div class="navbar navbar-static-top">
            <div class="navbar-inner menu">
                <div class="menu_con">
                    <ul class="nav">
                        <!-- <li<?php if($this->uri->segment(2) == 'dashboard'):?> class="active"<?php endif;?>>
                            <a href="<?php echo site_url('admin/dashboard');?>">主页</a>
                        </li> -->
                        <!-- <li<?php if($this->uri->segment(2) == 'page'):?> class="active"<?php endif;?>><?php echo anchor('admin/page', '页面');?></li>
                        <li<?php if($this->uri->segment(2) == 'article'):?> class="active"<?php endif;?>><?php echo anchor('admin/article', '文章');?></li> -->
                        <li class="dropdown<?php if($this->uri->segment(2) == 'data'):?> active<?php endif;?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                数据
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?php echo anchor('admin/data', '数据');?></li>
                                <li><?php echo anchor('admin/data/edit', '新建数据');?></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php if($this->uri->segment(2) == 'user'):?> active<?php endif;?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                用户
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?php echo anchor('admin/user', '用户');?></li>
                                <li><?php echo anchor('admin/user/edit', '新建用户');?></li>
                            </ul>
                        </li>
                        <li><?php echo anchor('admin/user/edit/'.$this->session->userdata('id'), '设置');?></li>
                    </ul>
                </div>
            </div>
        </div>


        <?php $this->load->view($subview);?>
        
        <div id="foot">
            <p>
                <span class="copyright">&copy;2013-2014江苏建科建设监理有限公司版权所有</span>
                <span class="icp">苏ICP备06011060号-1</span>
            </p>
        </div>
        <!-- <div class="container-fluid">
            <div class="row-fluid">
                <div class="span10">
                    <?php //$this->load->view($subview);?>
                </div>
                <div class="span2">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><?php //echo mailto('iamgtskk@gmail.com', '<i class="icon-user"></i>用户</a>');?></li>
                        <li><?php //echo anchor('admin/user/logout', '<i class="icon-off"></i>退出');?></li>
                    </ul>
                </div>
            </div>
        </div> -->

<?php $this->load->view('admin/components/page_foot');?>