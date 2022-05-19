<div class="navbar yamm navbar-default hidden-xs navbar-fixed-top" id="mainNav" style="min-height:90px;background-color: #fff;">
    <div id="navbar-collapse-1" class="navbar-collapse collapse">
        
		
		<div class="navbar-header" style="width: 100%;background-color: #664302;padding: .5% 2% 0% 2%;">
            <div style="float: left;">
            <p style="text-align: left;color: #fff;"><?php echo '<script type="text/javascript" src="http://bangladate.appspot.com/index4.php"></script>';?></p>
			</div>
			<div style="float: right;">
				<a href="<?php echo base_url(); ?>index.php/home/about/" style="color:#fff; font-size: 14px;">আমাদের সম্পর্কে</a> । 
				<a href="<?php echo base_url(); ?>index.php/home/contact" style="color:#fff; font-size: 14px;">যোগাযোগ</a> । 
				<a href="<?php echo base_url(); ?>index.php/home/signup" style="color:#fff; font-size: 14px;">নিবন্ধন</a>
			</div>
			
			<div style="clear: both;"></div>
			
        </div>
		
		<div class="navbar-header" style="width: 100%;background-color: #fff;">
            
			<form method="get" action="<?php echo base_url(); ?>index.php/home/search">
			
				<div style="float: right;color:#895621;">
					<a href="#"> <i class=" fa fa-facebook" style="color:#895621;">   </i> </a> </li>
					<a href="#"> <i class="fa fa-twitter"  style="color:#895621;">   </i> </a>
					<a href="#"> <i class="fa fa-google-plus"  style="color:#895621;">   </i> </a>
					<a href="#"> <i class="fa fa-linkedin" style="color:#895621;">   </i> </a>
					<a href="#"><i class="fa fa-pinterest" style="color:#895621;"></i></a>
					<a href="#"><i class="fa fa-youtube" style="color:#895621;"></i></a>
					
					<input type="text" name="search" placeholder="অনুসন্ধান করুন" style="padding-left: 10x;"><i class="fa fa-search" style="color:#895621;"></i></input>

				</div>
			
			</form>
        </div>
		
		<div class="navbar-header" style="width: 100%;;background-color: #895621;height: 120px; !important">
            <h1 style="text-align: center;font-family: SolaimanLipi;font-size: 50px;color: #fff;padding-top: 20px;">মাখলুকুর রহমান ইসলামি গ্রন্থাগার ও গবেষণা কেন্দ্র</h1>
			<!--<p style="text-align: center;font-family: SolaimanLipi;color: #fff;">(মরহুম মাখলুকুর রহমান এর মাগফেরাতের উদ্দেশ্যে আলহ্বাজ ফারুক আল নাসের এর অর্থায়নে প্রতিষ্ঠিত)</p>-->
        </div>

		<div style="width: 100%;background-color: #895621;" >
			<ul class="nav navbar-nav " style="float:right;;margin-top: .5%; font-weight: 400; font-size: 19px;width: 100%;background-color: #3b2727;">
				<li class="dropdown yamm-fw current"  style="text-align:center;">
					<a href="<?php echo base_url(); ?>" data-hover="dropdown" title="অননুর লাইব্রেরি " class="dropdown-toggle" style="text-align:center;"> প্রধান পাতা </a>
				</li>
				<li class="dropdown yamm-fw current">
					<a href="<?php echo base_url(); ?>index.php/home/blog" data-hover="dropdown" title="অননুর লাইব্রেরি " class="dropdown-toggle"> দারস </a>
				</li>



				<li class="dropdown yamm-fw link">
					<a href="<?php echo base_url(); ?>index.php/home/category/all" data-hover="dropdown" title="গ্রন্থসম্ভার" class="dropdown-toggle">গ্রন্থসম্ভার <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<div class="container" style="padding: 2% 5% 2% 5%;">
							
							<?php 
								
								$categories=$this->db_model->getTableData('category');
								foreach($categories as $category):
							?>
							<li style="width: 19%;float: left;margin-left: 1%;">
								<a style="color: #000;font-size: 17px;" href="/index.php/home/category/<?php echo $category['category_id'];?>">
									<?php echo ' >  '.$category['category_name'];?>
								</a>
								<div class="divider"></div>
							</li>
							<?php endforeach;?>
							
						</div>
					</ul>
				</li>
				<li class="dropdown yamm-fw link">
					<a href="#" data-hover="dropdown" class="dropdown-toggle">ই-লাইব্রেরি <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="container">
						</li>
						
					</ul>
				</li>
			<li><a href="<?php echo base_url(); ?>index.php/home/author_list">লেখক ও গবেষক</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/publisher_list">প্রকাশনী ও প্রকাশক </a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/lit_and_culture">সাহিত্য ও সংস্কৃতি</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/news">সংবাদ</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/service">সেবা সমূহ</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/signin">প্রবেশ </a></li>
			<!--<li><a href="<?php echo base_url(); ?>index.php/home/signup">পাঠক নিবন্ধন</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/about/">আমাদের সম্পর্কে</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/contact">যোগাযোগ</a></li>-->
			</ul>
		</div>
    </div>
</div>
<div class="navbar navbar-default navbar-fixed-top" id="mainNavmobile">
    <div class="navbar-header" style="min-height:80px">
        <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
            <span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </span>
        </button>

        <a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="" title="ANNUR LIBRARY"></a>
    </div>
    <div class="navbar-offcanvas navbar-offcanvas-right" id="js-bootstrap-offcanvas">
        <!-- div id="navbar-collapse-mobile" class="navbar-collapse collapse" -->
        <ul class="nav navbar-nav" style="overflow:auto !important;">

            <li class="dropdown current">
                <a href="<?php echo base_url(); ?>" title="BME BD">HOME </a>
            </li>
            <li><a href="<?php echo base_url(); ?>index.php/home/about/">ABOUT</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/home/category/all">PRODUCTS</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/home/service">SUPPORT</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/home/news">NEWS</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/home/signup">পাঠক নিবন্ধন</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/home/about/">আমাদের সম্পর্কে</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/home/contact">যোগাযোগ</a></li>
        </ul>
    </div>
</div>