<section class="ContentPageOddEvenSection margintop" style="padding-left: 10px; margin: 50px 0 0 0 !important" itemscope>
		<h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 2px;padding-bottom:2px;">লেখকের তালিকা</h3>
    
	<div class="container">
      
        <div class="row" style="background-color: #ddd;">
		<?php
                foreach ($authors as $row) {
		?>
			<div style="min-height: 5px;background-color: #fff;"></div>
			<div style="margin-top:20px;"> 
				<div style="float: left; width: 20%; background-color: #ddd;">
					<img <?php if(file_exists($row['photo'])){ ?> src="<?php echo base_url(). $row['photo']?>"
						<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 80%;height: 220px; margin: auto;" >
				</div>
				
				<div style="float: right;width: 80%;padding: 0% 3% 0% 3%; background-color: transparent;">
					<h5 style="text-align: justify;color: #895621;font-size:16px;"><strong><?php echo $row['author_name']?></strong></h5>
					<p style="text-align: justify;line-height: 1.3em;font-size: 14px;"><?php echo word_limiter(strip_tags($row['profile']), 15); ?></p>
					<p ><a href="<?php echo base_url()?>index.php/home/author_details/<?php echo $row['author_id']?>" style="background-color: #895621;padding: 0px 8px 0px 8px;color: #fff;float: right; border-radius: 3px;" >আরও জানুন </a></p>
					<p ><a href="<?php echo base_url()?>index.php/home/authorsbook/<?php echo $row['author_id']?>" style="background-color: #895621;padding: 0px 8px 0px 8px;color: #fff;float: right; border-radius: 3px;margin-right: 4px;" >বইসমূহ </a></p>
				</div>
			</div>
			<div style="clear: both;"></div>
		<?php } ?>
        </div>  
    </div>
</section>
