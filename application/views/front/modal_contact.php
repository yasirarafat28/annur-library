<link rel="stylesheet" href="<?php echo base_url() ?>template/back/others/css/notify.css">
<script src="<?php echo base_url()?>template/back/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url() ?>template/back/others/js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>template/front/js/validateCustom.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="block">

                <div class="contact-form">
                    <?php
                        echo form_open(base_url() . 'index.php/home/contact_add', array(
                            'class' => 'form-horizontal',
                            'method' => 'post',
                            'id' => 'contact_add',
                            'enctype' => 'multipart/form-data'
                        ));
                    ?>

                        <div class="form-group">
                            <input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
                            <span class="" style="color:red" id="title1"></span>
                        </div>

                        <div class="form-group">
                            <input type="email" placeholder="Your Email" class="form-control" name="email" id="email" >
                            <span class="" style="color:red" id="title3"></span>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
                            <span class="" style="color:red" id="title4"></span>
                        </div>

                        <div class="form-group">
                            <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>    
                        </div>


                        <div id="submit">
                            <span type="submit" class="btn btn-info btn-send pull-right sub">Send Message</span>
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
        jQuery('#title3').hide();
        jQuery('#title4').hide();
        var name_error = checkInput('name', 'title1');
        var email_error = emailCheck('email', 'title3');
        var sub_error = checkInput('subject', 'title4');
        jQuery('.sub').on('click', function () {
            if (name_error === false && email_error == false && sub_error == false) {
                modalFormSubmit('contact_add');
            }
        });
    });
    function modalFormSubmit(form_id){
        var form = $('#'+form_id);
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(form[0]);
        }
        $.ajax({
            url: form.attr('action'), // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data 
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            success: function (data) {
                if (data === 'success') {
                    bootbox.hideAll();
                    $.notify({
                        icon: 'fa fa-check fa-5',
                        title: '<strong>Message Successfully Sent</strong>',
                        message: ''
                    }, {
                        type: 'success'
                    });  
                } else {
                    bootbox.hideAll();
                    $('#test').hide();
                    $.notify({
                        icon: 'fa fa-exclamation-triangle fa-5',
                        title: '',
                        message: data
                    }, {
                        type: 'danger'
                    });
                }

            },
            error: function (e) {
                console.log(e);
            }
        });
    }
</script>
