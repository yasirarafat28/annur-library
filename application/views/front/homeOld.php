<div class="container-fluid" style="padding: 0px;margin-top: 6%">
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
		
		<div class="col-md-4 center LandingPageTile marginbottom60" style="width: 28%;float: left;border: 1px solid #ddd;margin-left: 5px">
			<?php foreach($about_us as $about):?>
			<img src="<?php echo base_url() ?>template/front/images/about.png" style="max-height:80px;margin-top:10px;margin-bottom: 10px;" alt="Leaf 114x114px" itemprop="image">
			
			<h3 itemprop="name" style="font-size: 1.5em"><?php echo $about['title'];?></h3>
			<?php echo substr($about['description'],0,400).' ......';?>
			<a href='<?php echo base_url()?>index.php/home/about/' >Read More</a>
			<?php endforeach;?>
		</div>
		
		<div style="clear: both"></div>
		
		
		
		
		
    </div>
</div>




<!-- BEGIN: Product Highlight Slider -->
<div class="container" style="padding: 100px 0;" itemscope itemtype="http://schema.org/Product">
    <div id="productSlide" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#productSlide" data-slide-to="0" class="active"></li>
            <li data-target="#productSlide" data-slide-to="1"></li>
            <li data-target="#productSlide" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
                $i=0;
                foreach($products as $row){
                   $i++;
                   $features=json_decode($row['features'],TRUE);
                   $url_title = url_title($row['product_name'], 'dash', TRUE);
            ?>
            <div class="item <?php if($i==1){ echo 'active';}?>">
                <div class="col-md-4">
                    <h2 class="red uppercase" itemprop="name">Product Highlights</h2>
                    <h3><?php echo $row['product_name']?></h3>
                    <p class="margin-bottom60" itemprop="description"><?php echo $row['product_highlights']?></p>
                    
                    <a href="<?php echo base_url()?>index.php/home/product_details/<?php echo $row['product_id']?>/<?php echo $url_title?>" class="btn btn-red marginbottom60" itemprop="url">to the product</a>
                </div>
                <div class="col-md-8">
                    <?php
                        $j=0;
                        foreach ($features as $row1) {
                        $j++;
                        if($j==1){
                    ?>
                        <img  src="<?php echo base_url();?>uploads/product/<?php echo $row1['thumb'] ?>" class="img-responsive marginbottom60" alt="" itemprop="image">
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <?php
                
                }
            ?>
        </div>
    </div>
</div>
<!-- Product Highlight Slider -->
<!-- BEGIN: Industry Expertise -->

