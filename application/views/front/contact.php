<div class="container-fluid nopadding" style="margin-top: 30px">
 
</div>

<div class="container">

	<h3 style="text-align:center;background-color: #895621; padding: 5px 8px 5px 8px;color: #fff;font-size: 16px; " >যোগাযোগ করুন </h3>
    <div class="col-md-12">

        <div class="row">
		
			<p>
				<strong>
					<span style="font-size: 20px;">
						<a href="#" style="color: #895621;">মাখলুকুর রহমান ইসলামি গ্রন্থাগার ও গবেষণা কেন্দ্র
						</a>
						<p> ঠিকানা  :  ২২৫/৫ দক্ষিণ পীরেরবাগ, মিরপুর, ঢাকা-১২১৬ (আমতলা বাজার হতে পশ্চিমে)</p>
						<p> মোবাইল: ০১৫৫৮ ০০ ৮০ ০৪</p>
						<p> ইমেইল : annurcomplex@gmail.com</p>
					</span>
				</strong>
			</p> 
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
                addFormSubmit1('contact_add');
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