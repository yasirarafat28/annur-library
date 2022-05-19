<link rel="stylesheet" href="<?php echo base_url() ?>template/back/others/css/notify.css">
<script src="<?php echo base_url() ?>template/back/others/js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>template/front/js/validateCustom.js"></script>

<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>

<div class="container">
<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " >নিবন্ধন করুন </h3>
    <div class="col-md-12">
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 5%">
            <div class="block">
               <!-- <h1 itemprop="name" class="text-center" style="color: red;"><b>CONTACT WITH US</b></h1>-->

                <div class="contact-form">
                    <?php
                        echo form_open(base_url() . 'index.php/home/reader_add', array(
                            'class' => 'form-horizontal',
                            'method' => 'post',
                            'id' => 'reader_add',
                            'enctype' => 'multipart/form-data' 
                        ));
                    ?>

                        <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">নাম :  </label>

							<div class="col-sm-9">
								<input type="text" class="form-control " name="name"  id="reader_name" placeholder="আপনার নাম প্রবেশ করুন">
								<span class="" style="color:red" id="title1"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">ইমেইল</label>

							<div class="col-sm-9">
								<input type="email" class="form-control " name="email"  id="reader_address" placeholder="এখানে আপনার ইমেল ঠিকানা লিখুন">
								<span class="" style="color:red" id="title3"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">মোবাইল নম্বর </label>

							<div class="col-sm-9">
								<input type="text" class="form-control " name="phone"  id="reader_address" placeholder="এখানে আপনার মোবাইল নম্বর লিখুন">
								<span class="" style="color:red" id="title3"></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">ঠিকানা </label>

							<div class="col-sm-9">
								<input type="text" class="form-control " name="address"  id="reader_address" placeholder="এখানে আপনার ঠিকানা লিখুন">
								<span class="" style="color:red" id="title3"></span>
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
                            <span type="submit" class="btn btn-info btn-send pull-right sub">নিবন্ধন করুন</span>
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
        var name_error = checkInput('name', 'title1');
        jQuery('.sub').on('click', function () {
            if (name_error === false) {
                addFormSubmit1('reader_add');
            }
        });
    });
    function addFormSubmit1(form_id,url){
        var form=jQuery('#'+form_id);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        jQuery.ajax({
            url: form.attr('action'), // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data 
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
                //form.fadeOut('slow');
                //form.html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            },
            success: function(data) {
                if(data==='success'){
                    jQuery.notify({
                        icon: 'fa fa-check fa-5',
                        title: '<strong>Message Successfully Sent!</strong>',
                        message: ''
                    },{
                        type: 'success'
                    });
                }else{
                    form.fadeIn('fast');
                    jQuery.notify({
                        icon: 'fa fa-exclamation-triangle fa-5',
                        title: '',
                        message: data
                    },{
                        type: 'danger'
                    });
                }
                
            },
            error: function(e) {
                console.log(e);
            }
        });
    }
</script>