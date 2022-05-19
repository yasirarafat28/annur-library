<script src="<?php echo base_url()?>template/back/others/js/bootbox.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>template/back/others/css/notify.css">
<script src="<?php echo base_url() ?>template/back/others/js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>template/front/js/validateCustom.js"></script>
<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>

<section class="ContentPageOddEvenSection" style="margin: 0px 0 0 0 !important" itemscope>
    <?php
        
        foreach($services as $row){
              
    ?>
		
        <div class="container">
			<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " ><?php echo $row['sec_title']; ?></h3>
            <p><?php echo $row['desc']; ?></p>
        </div>
    <?php 
        }
    ?>
    
    <script>
        var formUrl='<?php echo base_url()?>index.php/home/contact_modal/';
        modalContent('service_contact',formUrl,'CONTACT US');
    </script>
</section>

