<div class="content">
    <!-- <div class="action">
        <?php echo anchor('admin/data/edit', '新建数据', 'class="btn button pull-left"');?>
        <a href="#" onclick="printdiv('tableContent')" class="btn button2 pull-right">打印数据</a>
    </div> -->
    <div class="row-fluid">
    	<ul class="thumbnails">
    		<?php if(count($projects)):foreach($projects as $project):?>
          	<li class="span4">
            	<div class="thumbnail">
          			<img src="<?php echo $project->background;?>" style="width: 300px; height: 200px;">
	              	<div class="caption">
	                	<h3 style="text-align:center;">
	                		<a href="<?php echo base_url('admin/data/index/'.$project->id);?>">
	                			<?php echo $project->name;?>
	                		</a>
	                	</h3>
	              	</div>
	            </div>
        	</li>
	        <?php endforeach;endif;?>
	        <li class="span4">
        		<a href="<?php echo base_url('admin/project/edit');?>">
          			<img src="<?php echo base_url('images/plus.png');?>" alt="新建">
          		</a>
        	</li>
        </ul>
    </div>
</div>