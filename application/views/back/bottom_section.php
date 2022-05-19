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
        
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        
        <!-- Morris.js charts -->
        <script src="<?php echo base_url()?>template/back/js/raphael-min.js"></script>
        
        <!-- Sparkline -->
        <script src="<?php echo base_url()?>template/back/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url()?>template/back/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url() ?>template/back/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url()?>template/back/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url()?>template/back/js/moment.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url()?>template/back/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url()?>template/back/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url()?>template/back/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <script src="<?php echo base_url()?>template/back/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url()?>template/back/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url()?>template/back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url()?>template/back/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url()?>template/back/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>template/back/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url()?>template/back/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url()?>template/back/js/demo.js"></script>
        <script src="<?php echo base_url()?>template/back/others/js/bootbox.min.js"></script>
        <!--Summernote [ OPTIONAL ]-->
	<script src="<?php echo base_url(); ?>template/back/others/summernote/summernote.js"></script>
        <!--Switchery [ OPTIONAL ]-->
	<script src="<?php echo base_url(); ?>template/back/others/switchery/switchery.js"></script>
        <script src="<?php echo base_url();?>template/back/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url()?>template/back/others/js/wizTech.js"></script>
        
        
        

        
        <script>
            $(document).ready(function(){
                $('body').on('click','#slider',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/slider/');
                    $('#type').val('slider');
                });
                
                $('body').on('click','#slider_back',function(){
                    $('#container').load('<?php echo base_url()?>index.php/slider/');
                    
                });
                $('body').on('click','#category',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/category/');
                });
                $('body').on('click','#category_back',function(){
                    $('#container').load('<?php echo base_url()?>index.php/category/');
                });
                $('body').on('click','#author',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/author/');
                }); 
				
				
				//Content Management
				
                $('body').on('click','#faq',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/manage_content/faq/');
                });
				
                $('body').on('click','#about_us',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/manage_content/about_us/');
                });
				
				
				//Post				
				
                $('body').on('click','#post_category',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/post/post_category/');
                });			
				
                $('body').on('click','#posts',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/post/');
                });
				//Namaz				
				
                $('body').on('click','#namaz',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/namaz');
                });
				
				//Author
				
				
				
				$('body').on('click','#author_back',function(){
                    $('#container').load('<?php echo base_url()?>index.php/author/');
				});								                
				
				$('body').on('click','#reader',function(e){
                    e.preventDefault();                    
					$('#container').load('<?php echo base_url()?>index.php/reader/');
				});
                $('body').on('click','#reader_back',function(){                    $('#container').load('<?php echo base_url()?>index.php/reader/');                });
                
                var serviceUrl='<?php echo base_url()?>index.php/service/';
                backBtn('service_back',serviceUrl);
                var publisherUrl='<?php echo base_url()?>index.php/publisher/';
                backBtn('publisher_back',publisherUrl);
                var galleryUrl='<?php echo base_url()?>index.php/gallery/';
                backBtn('gallery_back',galleryUrl);
                var blogUrl='<?php echo base_url()?>index.php/blog/';
                backBtn('blog_back',blogUrl);
				var newsUrl='<?php echo base_url()?>index.php/news/';
                backBtn('news_back',newsUrl);
                var tarinUrl='<?php echo base_url()?>index.php/training/';
                backBtn('training_back',tarinUrl);
                var instructorUrl='<?php echo base_url()?>index.php/instructor/';
                backBtn('instructor_back',instructorUrl);
                var bookUrl='<?php echo base_url()?>index.php/book/';
                backBtn('book_back',bookUrl);
                var founderUrl='<?php echo base_url()?>index.php/founder/';
                backBtn('founder_back',founderUrl);
                $('body').on('click','#department',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/department/');
                    $('#type').val('slider');
                });
		$('body').on('click','#contact',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/contact/');
                });		
                
                $('body').on('click','#service',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/basic_setup/service/');
                    $('#type').val('slider');
                });
                $('body').on('click','#publisher',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/publisher/');
                    $('#type').val('slider');
                });
		
		$('body').on('click','#news',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/news/');
                    $('#type').val('slider');
                });
                
                $('body').on('click','#book',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/book/');
                    $('#type').val('slider');
                });
				/*
                $('body').on('click','#about_us',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/basic_setup/aboutUs/');
                    $('#type').val('slider');
                });
				*/
				
                $('body').on('click','#sol',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/basic_setup/sol/');
                    $('#type').val('slider');
                });
                $('body').on('click','#admin',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/admin/manage_admin/');
                });
                $('body').on('click','#ads',function(e){
                    e.preventDefault();
                    $('#container').load('<?php echo base_url()?>index.php/basic_setup/ad_background/');
                });
                
            }); 
        </script>
    </body>
</html>