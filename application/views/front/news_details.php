<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
	<?php
		foreach($news as $row){
	?>           
		<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " ><?php echo $row['title']?></h3>
	
		<div class="col-md-12" style=" margin-left: auto; margin-right: auto;">
			<img <?php if(file_exists($row['image'])){ ?> src="<?php echo base_url(). $row['image']?>"
						<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 50%;height: auto; margin-left: auto; margin-right: auto;display: block;" >
		</div>
			<p><?php echo $row['description']?></p>
		</div>
	<?php
		}
	?>
    </div>
</div>

