<div style="clear: both;"></div>

<section class="ContentPageOddEvenSection margintop" style="padding-left: 10px; margin: 50px 0 0 0 !important" itemscope>
		<h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 2px;padding-bottom:2px;">বইয়ের তালিকা</h3>
    
	<div class="container">
      
        <div class="row" style="background-color: #ddd;">
		
		<?php
                foreach ($books as $row) {
		?>
			
			<div style="min-height: 5px;background-color: #fff;"></div>
			<div style="margin-top:20px;"> 
				<div style="float: left; width: 20%; background-color: #ddd;">
					<img <?php if(file_exists($row['book_image'])){ ?> src="<?php echo base_url(). $row['book_image']?>"
						<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 80%;height: 220px; margin: auto;" >
				</div>
				
				<div style="float: right;width: 80%;padding:0% 3% 0% 3%; background-color: transparent;">
					<h5 style="text-align: justify;color: #895621;font-size:16px;"><strong><?php echo $row['book_name']?></strong></h5>
					<p style="text-align: justify;line-height: 1.3em;font-size: 14px;"><?php echo word_limiter(strip_tags($row['overview']), 15); ?></p>
					<p style="text-align: left;line-height: 1.3em;font-size: 14px;"><strong>লেখকের নাম :</strong><a href="<?php echo base_url()?>index.php/home/author_details/<?php echo $row['author_id']?>"><?php echo $row['author_name']; ?></a></p>
					<p style="text-align: left;line-height: 1.3em;font-size: 14px;"><strong>প্রকাশনীর নাম  : </strong><a href="<?php echo base_url()?>index.php/home/publisher_details/<?php echo $row['publisher_id']?>"><?php echo $row['publisher_name']; ?></a></p>
					<p ><a href="<?php echo base_url()?>index.php/home/book_details/<?php echo $row['book_id']?>" style="background-color: #895621;padding: 0px 8px 0px 8px;color: #fff;float: right; border-radius: 3px;" >বইটি পড়ুন</a></p>
				</div>
			</div>
			 
			<div style="clear: both;"></div>
		<?php } ?>
        </div>  
    </div>
</section>
