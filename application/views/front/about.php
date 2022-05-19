<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>

<?php foreach ($about as $row){?>

<section class="ContentPageMainSection marginnone" itemscope>
    <div class="container">
        
		<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " ><?php echo $row['title']?> </h3>
        <div class="col-md-12 marginbottom30">
            <p  style="text-align: justify;">
                <?php echo $row['description']?>
            </p>
        </div>
    </div>
</section>


<?php
}
?>