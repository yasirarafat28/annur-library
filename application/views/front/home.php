<div class="container-fluid"style="margin-top: 10px;">
    <div class="startslide">
        <div id="mainSlide" class="col-md-12 nopadding carousel slide carousel-sync" data-ride="carousel" style="width: 70%;border: 1px solid #ddd;float:left;">
                    <!-- Indicators -->
            <ol class="carousel-indicators">
                <!-- li data-target="#mainSlide" data-slide-to="125" ></li -->
                <li class="active"></li>
                <!-- li data-target="#mainSlide" data-slide-to="3" ></li -->
                <li ></li>
                <!-- li data-target="#mainSlide" data-slide-to="128" ></li -->
                <li ></li>
                <!-- li data-target="#mainSlide" data-slide-to="129" ></li -->
                <li ></li>
                <!-- li data-target="#mainSlide" data-slide-to="126"  class="active" ></li -->
                <li></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner vertical" role="listbox">
                <?php
                    $i=0;
                    foreach($sliders as $slides){
                        $i++;
                ?>
                <div class="item <?php if($i==1){ echo 'active'; }?>" id="<?php echo $slides['slider_id']?>" >
                    <img class="img img-responsive" style="height: 375px;" src="<?php echo base_url() ?>uploads/slider/slider_<?php echo $slides['slider_id']?>.<?php echo $slides['ext']?>">
                </div>
                <?php
                    }
                ?>
            </div>
            <!-- Controls -->
            <a class="down carousel-control" role="button" data-slide="prev" style="background-color: darkindigo;">
                <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="up carousel-control" role="button" data-slide="next" style="background-color: darkindigo;">
                <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
		<div class="col-md-4 center LandingPageTile marginbottom60" style="width: 29.5%;float: left;border: 1px solid #ddd;margin-left: .5%;border-bottom: 10px solid #ddd;">
			<?php
				foreach($ads_data as $ad){
			?>
			<img style="width: 100%; height:345px;margin-top:10px;margin-bottom: 10px;"
				<?php if (file_exists('uploads/background/background_' . $ad['background_id'] . '.' . $ad['ext'])) { ?>
						 src="<?php echo base_url(); ?>uploads/background/background_<?php echo $ad['background_id'] ?>.<?php echo $ad['ext'] ?>"
					 <?php } else { ?>
						 src="<?php echo base_url(); ?>uploads/others/default.jpg"
						 <?php
					 }
				?>>
				<?php }?>
		
		</div>
		
		<div style="clear: both"></div>
		
		
		
		
		
    </div>
</div>



<div class="row">
           
	<div class="col-lg-4  col-md-4 col-sm-6 col-xs-6" style="width:20%;border 1px solid #ddd;margin-top:5px;">
		<div class="namaz_schedule" style="font-size: 12px; font-family: tahoma;">
			<h3 style="text-align:center;background-color: #895621; padding: 6px 8px 6px 8px;color: #fff; " >নামাজের সময়সূচী </h3>
			<table style="width: 100%;border: 1px solid #ddd;">
				<?php 
					foreach($namaz_schedule as $namaz):
				?>
				<tr>
					<td style="padding:0px 5px;font-size: 15px; color: #895621;"><?php echo $namaz['name'];?></td>
					<!--<td style="padding:0px 5px;font-size: 15px; color: #895621;"><?php echo $namaz['azan_time'];?></td>-->
					<td style="padding:0px 5px;font-size: 15px; color: #895621;"><?php echo $namaz['namaz_time'];?></td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
		<div class="namaz_schedule" style="font-size: 12px; font-family: tahoma;">
			<h3 style="text-align:center;background-color: #895621; padding: 6px 8px 6px 8px;color: #fff;" >বিভাগ সমূহ </h3>
			<table style="width: 100%;border: 1px solid #ddd;">
				<?php 
					foreach($categories as $category):
				?>
				<tr>
					<td style="padding: 5px;"><a href="/index.php/home/category/<?php echo $category['category_id'];?>" style="font-size: 15px; color: #895621;"><?php echo ' >  '.$category['category_name'];?></a></td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
	
	<div class="col-lg-4  col-md-4 col-sm-6 col-xs-6" style="width:80%" style="border: 1px solid #ddd;padding: 2px;">
		<div class="news_section" style="padding: 5px 0px 5px 0px;width:100%;">
			<h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 2px;padding-bottom:2px;">সংবাদ  </h3>
			
			<?php 
				foreach($newses as $news):
			?>
			<div style="width: 32.83%; float: left; border: 1px solid #ddd;padding: 2px; margin-left: .5%;">
				<img <?php if(file_exists($news['image'])){ ?> src="<?php echo base_url(). $news['image']?>"
					<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 100%;height: 170px; margin: auto;" ><br>
				<div style="min-height: 120px;!important">		
					<h5 style="text-align: justify;color: #895621;"><strong><?php echo $news['title']?></strong></h5>
					<p style="text-align: justify;line-height: 1.3em;font-size: 12px;"><?php echo word_limiter(strip_tags($news['description']), 25); ?></p>
				</div>
				<p ><a href="index.php/home/news_detail/<?php echo $news['post_id']?>" style="background-color: #895621;padding: 0px 8px 0px 8px;color: #fff;float: right; border-radius: 3px;" >বিস্তারিত</a></p>
			</div>
			<?php endforeach;?>
			
			<div style="clear: both;"></div>
		</div>
		
		<div class="news_section" style="padding: 5px;width:100%;">
			<h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 2px;padding-bottom:2px;">দারস  </h3> 
			
			<?php 
				foreach($blogs as $blog):
			?>
			<div style="width: 32.83%; float: left; border: 1px solid #ddd;padding: 2px; margin-left: .5%;">
				<img <?php if(file_exists($blog['image'])){ ?> src="<?php echo base_url(). $blog['image']?>"
					<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 100%;height: 170px; margin: auto;" ><br>
				<div style="min-height: 120px;!important">	
					<h5 style="text-align: justify;color: #895621;"><strong><?php echo $blog['title']?></strong></h5>
				
					<p style="text-align: justify;line-height: 1.3em;font-size: 12px;"><?php echo word_limiter(strip_tags($blog['description']), 25); ?></p>
				</div>
				<p ><a href="index.php/home/blog_detail/<?php echo $blog['post_id']?>" style="background-color: #895621;padding: 0px 8px 0px 8px;color: #fff;float: right; border-radius: 3px;" >বিস্তারিত</a></p>
			</div>
			<?php endforeach;?>
			
			<div style="clear: both;"></div>
		</div>
		
		<div class="news_section" style="padding: 5px;width:100%;">
			<h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 6px;padding-bottom:0px;">শীর্ষ বই    </h3>
			
			<?php 
				foreach($latest_book as $book):
			?>
			<div style="width: 24.3%; float: left; border: 1px solid #ddd;padding: 2px; margin-left: 5px;">
				<h5 style="text-align: center;"><?php echo $book['book_name']?></h5>
				<img <?php if(file_exists($book['book_image'])){ ?> src="<?php echo base_url(). $book['book_image']?>"
					<?php }else { ?> src="<?php echo base_url(); ?>uploads/others/default.jpg" <?php } ?> style="width: 90%;height: 240px; margin: auto;" >
				
				
				<p ><a href="index.php/home/book_details/<?php echo $book['book_id']?>" style="background-color: #895621;padding: 0px 8px 0px 8px;color: #fff;float: right; border-radius: 3px;margin-top: 5px;" >বইটি পড়ুন</a></p>
			</div>
			
			<?php endforeach;?>
			
			<div style="clear: both;"></div>
		</div>
	</div>
</div>

<!--

	Start of Popup
    
<div id="myModal" class="modal fade" style="height: 100% !important">
    <div class="modal-dialog" style="width: 100%;height: 100%; !important">
        <div class="modal-content" style="height: 100% !important">
            <div class="modal-header" style="background-color: #895621;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title" style="color: #ddd;text-align: center;">শুভ উদ্বোধন</h1>
            </div>
            <div class="modal-body">
				<h2 style="text-align: center;font-size: 48px;"><strong>মাখলুকুর রহমান ইসলামি গ্রন্থাগার ও গবেষণা কেন্দ্র</strong></h2>
            </div>
			<button type="button" data-dismiss="modal" aria-hidden="true" style="margin:2% 40% 2% 40%; width: 20%;background-color: #895621;color: #fff;height: 100px;!important"><strong>ওয়েবসাইটে ভিজিট করুন</strong></button>
        </div>
    </div>
</div> 

	<script type="text/javascript">
			$(document).ready(function(){
				$("#myModal").modal('show');
			});
		</script> 

		End of Popups

		-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	