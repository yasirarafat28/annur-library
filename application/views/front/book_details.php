<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
			<?php
			foreach ($book as $row) {
				?>
				<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " ><?php echo $row['book_name']?></h3>
				<div class="container-fluid nopadding">
					
					
					
					<div class="col-md-6 nopadding" style="width:30%;float: left;">
						<div class="thumb-images">
							<img src="<?php echo base_url().$row['book_image'];?>" alt="<?php echo $row['book_name'] ?>" style="max-width: 100%;">
						</div>
						<!-- /clearfix -->
					</div>
					<div class="col-md-6 nopadding" style="width:70%;float: left; padding: 1%;">
						<p style="text-align: justify;"><?php echo $row['overview']; ?></p>
						<p style="text-align: left;line-height: 1.3em;font-size: 14px;"><strong>লেখকের নাম :</strong><a href="<?php echo base_url()?>index.php/home/author_details/<?php echo $row['author_id']?>"><?php echo $row['author_name']; ?></a></p>
						<p style="text-align: left;line-height: 1.3em;font-size: 14px;"><strong>প্রকাশনীর নাম  : </strong><a href="<?php echo base_url()?>index.php/home/publisher_details/<?php echo $row['publisher_id']?>"><?php echo $row['publisher_name']; ?></a></p>
					</div>
					
					
					<div style="clear: both;"></div>
					<div class="" style="margin-top: 10px;">
						<ul id="prodPage" class="nav nav-tabs " style="font-size:14px !important">
							<li class="active"><a href="#accessoires" data-toggle="tab" itemprop="link">পিডিএফ</a></li>
							<li><a href="#specification" data-toggle="tab" itemprop="url">লেখক পরিচিতি </a></li>
						</ul>
						<div id="prodPageContent" class="tab-content">
							<div class="tab-pane fade in active" id="accessoires">
								<iframe target="_blank" style="min-height:600px; width: 100%" src="<?php echo $row['external_pdf_url'] ?>"></iframe>
							</div>
							<div class="tab-pane fade" id="specification" style="width: auto">
								<?php echo $row['profile']; ?>
							</div>
						</div>
					</div>
				</div>
				<?php
					if ($row['file1'] != '' || $row['file2'] !='' || $row['file3'] !='') {
				?>
				<div class="container-fluid nopadding bookExtras">
					<div class="col-sm-6 col-sm-offset-3 autoheight">
						<h4 class="center"><b>External Files</b></h4>
						<ul class="downloads">
							<?php
								if($row['file1']!=''){
							?>
							<li class="center">
								<a style="cursor: pointer;font-size:20px;color: red" class="center" 
								   href="<?php echo base_url()?>uploads/download/<?php echo $row['file1'] ?>" target="_blank">
									<?php echo $row['file1'] ?>
								</a>
							</li>
							<?php
								}
							?>
							<?php
								if($row['file2']!=''){
							?>
							<li class="center">
								<a style="cursor: pointer;font-size:20px;color: red" class="center" 
								   href="<?php echo base_url()?>uploads/download/<?php echo $row['file2'] ?>" target="_blank">
									<?php echo $row['file2'] ?>
								</a>
							</li>
							<?php
								}
							?>
							<?php
								if($row['file3']!=''){
							?>
							<li class="center">
								<a style="cursor: pointer;font-size:20px;color: red" class="center" 
								   href="<?php echo base_url()?>uploads/download/<?php echo $row['file3'] ?>" target="_blank">
									<?php echo $row['file3'] ?>
								</a>
							</li>
							<?php
								}
							?>
						</ul>
					</div>
				</div>
				<?php
					}
				?>
				
				
				<!--
				
				<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " >সম্পর্কিত বই</h3>
			
				<div class="container-fluid nopadding relatedbooks" style="margin-bottom:0;">
					<?php
						$cat_id=$row['category_id'];
						$related_books=$this->db->get_where('book',array('category_id'=>$cat_id,'book_id !='=>$row['book_id']))->result_array();
						$c=0;
						foreach ($related_books as $row3){
							$url_title = url_title($row3['book_name'], 'dash', TRUE);
							
							
					?>
					
						<div class="col-md-3 smallbook" style="min-height:260px !important;color: #000;border-right: 1px solid #DADADA;font-size: 18px;padding: 10px;border-bottom: 1px solid #DADADA;">
							<a href="<?php echo base_url()?>index.php/home/book_details/<?php echo $row3['book_id']?>/<?php echo $url_title?>">
							<p class="bookName center">
								<?php echo $row3['book_name'];?>
							</p>
								<img src="<?php echo base_url().$row3['book_image']; ?>" alt="<?php echo $row3['book_name'];?>" class="img-responsive">
						  
						</a>
						</div>
					<?php
						}
					?>
				</div>-->
			<?php
				}
			?>


        </div>
    </div>
</div>