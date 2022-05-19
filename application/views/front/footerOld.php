<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
          <!-- dialog body -->
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div></div>
            </div>
        </div>
    </div>
</div>
<footer class="footer1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-6 col-xs-6" style="min-height:370px">
                <h3> Useful Links </h3>
                <ul style="font-size:14px">
                    <li> <a href="<?php echo base_url()?>"> HOME </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/about/"> ABOUT BME </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/category/all"> PRODUCTS </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/solution/"> SOLUTIONS </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/service/"> SERVICES </a> </li>  
                    <li> <a href="<?php echo base_url()?>index.php/home/career/"> CAREER </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/contact/"> CONTACT </a> </li>
                </ul>
            </div>
            <div class="col-lg-3  col-md-2 col-sm-6 col-xs-6" style="min-height:370px">
                <h3> Brands </h3>
                <ul style="font-size:14px">
                    <li> <a href="<?php echo base_url()?>index.php/home/brand/45/TOSHIBA"> TOSHIBA </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/brand/47/HP"> HP </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/brand/31/DELL"> DELL </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/brand/37/CANON"> CANON </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/brand/43/DELI"> DELI </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/brand/33/CHIHUA"> CHIHUA </a> </li>
                    <li> <a href="<?php echo base_url()?>index.php/home/brand/40/JINPEX"> JINPEX </a> </li>
                </ul>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-6" style="min-height:370px">
                <h3> Get In Touch </h3>
                <ul  style="font-size:11px">
                    <li> BUSINESS MACHINES & EQUIPMENT </li>
                    <li> 10, Taher Tower, Suite# 319~321,(2nd Floor), 
                    <li> Gulshan- 02,Dhaka -1212, Bangladesh.</li>
                    <li> <strong>Hotline :02 9890665, 9886192, 57165317 </strong> </li>
                    <li> <strong>Mobile :01755-601720-35, 01748-981082 </strong> </li>
                    <li> <strong>Email :info@bmebd.com </strong> </li>
                </ul>
                <ul class="social">
                    <li> <a href="https://www.facebook.com/BMEToshiba/"> <i class=" fa fa-facebook" style="font-size:30px;color:red">   </i> </a> </li>
                   
                    <li> <a href="https://twitter.com/bmebd"> <i class="fa fa-twitter">   </i> </a> </li>
                    <li> <a href="https://google.com/+bmebd"> <i class="fa fa-google-plus"style="font-size:30px;color:red">   </i> </a> </li>
                    <li> <a href="http://www.linkedin.com/company/business-machines-&-equipment?trk=top_nav_home"> <i class="fa fa-linkedin">   </i> </a> </li>
                    <li> <a href="https://www.pinterest.com/bmebd/"><i class="fa fa-pinterest"></i></a></li>
                      <li> <a href="https://www.vk.com/bmebd/"><i class="fa fa-vk"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom col-md-12">
            <div class="col-md-8">
                <p class="text-center"> <a href="<?php echo base_url()?>" class="text-center" style="corsor:pointer;font-size:11px;"><strong>BME SOLUTIONS (BD) LTD, BANGLADESH</strong></a>   © <?php echo "2003-2017"?> ALL RIGHT RESERVED. </p>
            </div>
            
            <div class="col-md-4">
                <span class="pull-right" style="margin-top:2%">
                   <strong style="font-size: 15px;"></strong> <a id="cloud" href="#" class="text-center" style="font-size: 15px;corsor:pointer"><strong><em> </em></strong></a> 
                </span>
            </div>
        </div>
    </div>
    
</footer>
<script>
    jQuery(document).ready(function () {
        jQuery('#cloud').on('click', function (e) {
            e.preventDefault();
            location.replace("http://cloud-bd.com");
        });
    });
</script>