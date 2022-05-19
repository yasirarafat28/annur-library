<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
	<?php
		foreach($author as $row){
	?>           
		<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " ><?php echo $row['author_name']?></h3>
	
		<div class="col-md-12" style=" margin-left: auto; margin-right: auto;">
			<img <?php if(file_exists($row['photo'])){ ?> src="<?php echo base_url(). $row['photo']?>"
						<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 220px;height: auto;" >
		</div>
			<p><?php echo $row['profile'];?></p>
			<p ><a href="<?php echo base_url()?>index.php/home/authorsbook/<?php echo $row['author_id']?>" style="background-color: #895621;padding: 8px 8px 8px 8px;color: #fff;border-radius: 3px;" >বইসমূহ </a></p>
		</div>
	<?php
		}
	?>
    </div>
</div>

