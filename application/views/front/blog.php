<section class="ContentPageOddEvenSection margintop" style="padding-left: 10px; margin: 50px 0 0 0 !important" itemscope>
		<h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 2px;padding-bottom:2px;">দারস   </h3>
    <div class="container">
      
        <div class="row">
		<?php
                foreach ($blogs as $row) {
		?>
			<div style="margin-top:20px;">
				<div style="float: left; width: 30%;">
					<img <?php if(file_exists($row['image'])){ ?> src="<?php echo base_url(). $row['image']?>"
						<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 100%;height: 150px; margin: auto;" >
				</div>
				
				<div style="float: right;width: 70%;padding-left: 3%;">
					<h5 style="text-align: justify;color: #895621;font-size:16px;"><strong><?php echo $row['title']?></strong></h5>
					<p style="text-align: justify;line-height: 1.3em;font-size: 14px;"><?php echo word_limiter(strip_tags($row['description']), 65); ?></p>
					<p ><a href="<?php echo base_url()?>index.php/home/blog_detail/<?php echo $row['post_id']?>" style="background-color: #895621;padding: 0px 8px 0px 8px;color: #fff;float: right; border-radius: 3px;" >বিস্তারিত</a></p>
				</div>
			</div>
			<div style="clear: both;"></div>
		<?php } ?>
        </div>  
    </div>
</section>
