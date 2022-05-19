<link rel="stylesheet" href="<?php echo base_url() ?>template/back/others/css/notify.css">
<script src="<?php echo base_url() ?>template/back/others/js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>template/front/js/validateCustom.js"></script>

<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>

<div class="container">
	<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " >প্রবেশ করুন </h3>
    <div class="col-md-12">
    </div>
    <div class="login-box">
        <div class="col-md-12" style="margin-bottom: 5%">
            <div class="block">
               <!-- <h1 itemprop="name" class="text-center" style="color: red;"><b>CONTACT WITH US</b></h1>-->

                <div class="contact-form">
                    <?php
                        echo form_open(base_url() . 'index.php/home/reader_login', array(
                            'class' => 'form-horizontal',
                            'method' => 'post',
                            'id' => 'reader_login',
                            'enctype' => 'multipart/form-data' 
                        ));
                    ?>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">ইমেইল</label>

							<div class="col-sm-9">
								<input type="email" class="form-control " name="email"  id="reader_address" placeholder="এখানে আপনার ইমেল ঠিকানা লিখুন">
								<span class="" style="color:red" id="title1"></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">পাসওয়ার্ড</label>

							<div class="col-sm-9">
								<input type="password" class="form-control " name="password"  id="reader_address" placeholder="এখানে আপনার পাসওয়ার্ড লিখুন">
								<span class="" style="color:red" id="title3"></span>
							</div>
						</div>


                        <div id="submit">
                            <span type="submit" class="btn btn-info btn-send pull-right sub">প্রবেশ করুন</span>
                        </div>                      

                    <?php form_close(); ?>
                </div>
            </div>
        </div>
        
    </div>

</div>
<script>
    $(document).ready(function () {
        jQuery('#title1').hide();
        var name_error = checkInput('email', 'title1');
        jQuery('.sub').on('click', function () {
            if (name_error === false) {
                addFormSubmit1('reader_login');
            }
        });
    });
    
</script>