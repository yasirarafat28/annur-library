/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function checkInput(fieldID,alertID){
        var changedVal= false;
        jQuery('#'+fieldID).focusout(function(){
            var value=jQuery(this).val();
            changedVal=validateInput(fieldID,value,alertID);
            if(changedVal){
                jQuery('#'+fieldID).keyup(function(){
                    var value1=jQuery(this).val();
                    changedVal=validateInput(fieldID,value1,alertID);
                });
            }
        });
        return changedVal;
    }
    function validateInput(id,value,alertID,errorType){
        if(value ===''){
            jQuery('#'+alertID).html('Invalid Input ! Try again !');
            
            jQuery('#'+id).css("border", "2px solid red");
            errorType=true;
            jQuery('#'+alertID).show();
        } else {
            jQuery('#'+alertID).hide();
            jQuery('#'+id).css("border", "1px solid black");
            errorType=false;
        }
        return errorType;
    }
    function emailCheck(fieldID,alertID){
        var changedVal= false;
        jQuery('#'+fieldID).focusout(function(){
            var value=jQuery(this).val();
            changedVal=isValidEmailAddress(fieldID,value,alertID);
            if(changedVal){
                jQuery('#'+fieldID).keyup(function(){
                    var value1=jQuery(this).val();
                    changedVal=isValidEmailAddress(fieldID,value1,alertID);
                });
            }
        });
        return changedVal;
    }
    function isValidEmailAddress(fieldID,emailAddress,alertID) {
        var error=false;
        var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
        if(pattern.test(emailAddress)){
            jQuery('#'+alertID).hide();
            jQuery('#'+fieldID).css("border", "1px solid black");
            error=false;
        } else {
            jQuery('#'+alertID).html('Enter a valid Email Address !');
            jQuery('#'+fieldID).css("border", "2px solid red");
            error=true;
            jQuery('#'+alertID).show();
        }
        return error;
    };
    function phoneCheck(fieldID,alertID){
        var changedVal= false;
        jQuery('#'+fieldID).focusout(function(){
            var value=jQuery(this).val();
            var length=value.length;
            changedVal=isValidPhoneNo(fieldID,value,alertID,length);
            if(changedVal){
                jQuery('#'+fieldID).keyup(function(){
                    var value1=$(this).val();
                    var length1=value1.length;
                    changedVal=isValidPhoneNo(fieldID,value1,alertID,length1);
                });
            }
        });
        return changedVal;
    }
    function isValidPhoneNo(fieldID,value,alertID,length) {
        var error=false;
        var pattern = /^[0-9 -()+]+$/;
        if(pattern.test(value) && length>10){
            jQuery('#'+alertID).hide();
            jQuery('#'+fieldID).css("border", "1px solid black");
            error=false;
        } else{
            jQuery('#'+alertID).html('Enter a valid Phone NO !');
            jQuery('#'+fieldID).css("border", "2px solid red");
            error=true;
            jQuery('#'+alertID).show();
        }
        return error;
    }
    
    function addFormSubmit(form_id,url){
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
                        title: '<strong>Successfully Applied!</strong>',
                        message: ''
                    },{
                        type: 'success'
                    });
                    setTimeout(function(){ 
                        location.replace(url);; 
                    }, 3000);
                }else{
                    form.fadeIn('fast');
                    jQuery.notify({
                        icon: 'fa fa-exclamation-triangle fa-5',
                        title: '<strong> &nbsp;&nbsp;&nbsp;Error ! Try Again</strong>',
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
function modalContent(className,url,title){
    jQuery('body').on('click', '.'+className,function (e) {
        
        var dialog = bootbox.dialog({         
            title: '<h1 itemprop="name" class="text-center" style="color: red;"><b>'+title+'</b></h1>',
            message: jQuery('<div></div>').load(url),
            closeButton: true,
        });
        dialog.init(function(){

        });
    });
}
    

