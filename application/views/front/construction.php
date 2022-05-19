<div class="container-fluid nopadding" style="margin-top: 6%">
    <center>
        <img class="img img-responsive" src="<?php echo base_url() ?>uploads/background/background_<?php echo $background_id;?>.<?php echo $background_ext;?>"
    </center>
</div>
<?php foreach ($about as $row){?>

<section class="ContentPageMainSection marginnone" itemscope>
    <div class="container">
        <div class="container-fluid gradient" style="padding: 20px 0;margin-top: 2%;margin-bottom: 1%">
            <h1 class="white text-center" style="margin-left:40px;" itemprop="name"><?php echo $row['about_title']?></h1>
        </div>
        <div class="col-md-12 marginbottom30">
            <p  style="text-align: justify;">
                <?php echo $row['about_content']?>
            </p>
        </div>
    </div>
</section>

<section class="ContentPageOddEvenSection margintop" itemscope>

    <div class="container">
        <div class="col-md-6">
            <img src="<?php echo base_url()?>template/front/images/mission.png" style="padding-top:3px;" class="img-responsive marginbottom30" itemprop="image">
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h2 itemprop="name" style="color: red;"><?php echo $row['mission_title']?></h2>
                <p>
                    <?php echo $row['mission_content']?>
                </p>
            </div>
            <div class="col-md-12">
                <h2 itemprop="name" style="color: red;"><?php echo $row['vision_title']?></h2>
                <p>
                    <?php echo $row['vision_content']?>  
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ContentPageOddEvenSection marginbottom" itemscope>
    <div class="container marginbottom30">
        <div class="col-md-6">
            <h2 itemprop="name">SISTER CONCERN OF BME</h2>
        </div>
        <div class="col-md-6 hidden-xs">
            &nbsp;
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php foreach($partners as $row1){?>
                    <div class="col-md-3" style="min-height: 340px">
                        <div class="thumbnail">
                            <img class="img-responsive" height="225px" src="<?php echo base_url();?>uploads/partner/partner_<?php echo $row1['partner_id']?>.<?php echo $row1['ext']?>" alt="">
                            <div style="min-height:50px">
                                <a href="<?php echo $row1['link']?>" target="_blank">
                                    <p class="text-center" style="font-size: medium;color: #ff0000;margin-top: 13%;">
                                         <?php echo $row1['partner_name']?>                                         
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
}
?>