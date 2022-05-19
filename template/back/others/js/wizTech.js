/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createDatatable(tableId){
    var i=0;
    var table=$("#"+tableId).DataTable({
         "searching": false,
         "lengthChange": false,
         "ordering": false,
         stateSave: true
             
     });  
}
function createSearchDatatable(tableId){
    var i=0;
    var table=$("#"+tableId).DataTable({
         "searching": true,
         "lengthChange": false,
         "ordering": false,
         stateSave: true
             
     });  
}
function createDatatableWithOutSwitch(tableId){
    var table=$("#"+tableId).DataTable({
        "searching": true,
        "lengthChange": false,
        "iDisplayLength": -1,
        "aoColumns": [
            { "bSortable": false },null,null,{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }
         ],
        "aaSorting": [[ 1, "desc" ],[ 2, "desc" ]] // Sort by first column descending
    });
}
function deleteItem(tableId,className,updateUrl,destUrl){
    $('#'+tableId).on('click','.'+className,function(){
        var id=$(this).data('id');
        bootbox.confirm({ 
            message: "<strong><span class='fs'>Do you really want to delete this ?</span></strong>", 
            callback: function(result){ 
                /* result is a boolean; true = OK, false = Cancel*/
                if(result){
                    $.ajax({
                        url:updateUrl+'/'+id,
                        success: function(data) {
                            if(data=='success'){
                                $.notify({
                                    icon: 'fa fa-check fa-5',
                                    title: '<strong>Data Deleted Successfully !</strong>',
                                    message: ''
                                },{
                                    type: 'success'
                                });
                                ajaxContainerLoad(destUrl);
                            } else{
                                
                            }
                        }
                    });
                } else{
                    $.notify({
                        icon: 'fa fa-exclamation-triangle fa-5',
                        title: '<strong>Canceled !</strong>',
                        message: ''
                    },{
                        type: 'danger'
                    });
                }
            }
        });
    });
}
function ajaxContainerLoad(url){
    $('#container').load(url);
}
function modalContent(tableID,className,url,title){
    $('#'+tableID).on('click', '.'+className,function (e) {
        
        var id=$(this).data('id');
        var dialog = bootbox.dialog({         
            title: title,
            message: $('<div></div>').load(url+'/'+id),
            closeButton: true,
        });
        dialog.init(function(){

        });
    });
}

function switcheryAjaxYes(url,trueMsg){
    $.ajax({
        url:url,
        success: function(data) {
            $.notify({
                icon: 'fa fa-check fa-6',
                title: '',
                message: trueMsg
            },{
                type: 'success'
            }); 
        }
    });
}
function switcheryAjaxNo(url,falseMsg){
    $.ajax({
        url:url,
        success: function(data) {
            $.notify({
                icon: 'fa fa-exclamation-triangle fa-6',
                title: '',
                message: falseMsg
            },{
                type: 'danger'
            });
        }
    });
}
/*
 * Ajax code for any kind of form submit without page reload and notification
 */
function addFormSubmit(form_id,url){
    var form=$('#'+form_id);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }
    $.ajax({
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
                $.notify({
                    icon: 'fa fa-check fa-5',
                    title: '<strong>Data Addded Successfully !</strong>',
                    message: ''
                },{
                    type: 'success'
                });
                ajaxContainerLoad(url);

            }else{
                form.fadeIn('fast');
                $.notify({
                    icon: 'fa fa-exclamation-triangle fa-5',
                    title: '<strong> &nbsp;&nbsp;&nbsp;Error !</strong>',
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
function editFormSubmit(form_id,url){
    var form=$('#'+form_id);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }
    $.ajax({
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
                $.notify({
                    icon: 'fa fa-check fa-5',
                    title: '<strong>Data Updated Successfully !</strong>',
                    message: ''
                },{
                    type: 'success'
                });
                ajaxContainerLoad(url);

            }else{
                form.fadeIn('fast');
                $.notify({
                    icon: 'fa fa-exclamation-triangle fa-5',
                    title: '<strong> &nbsp;&nbsp;&nbsp;Error !</strong>',
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
function modalFormSubmit(form_id,url){
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
                    title: '<strong>Data Updated Successfully</strong>',
                    message: ''
                }, {
                    type: 'success'
                });
                ajaxContainerLoad(url);  
            } else {
                bootbox.hideAll();
                $('#test').hide();
                $.notify({
                    icon: 'fa fa-exclamation-triangle fa-5',
                    title: '<strong>Error !</strong>',
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
function singleImageChange(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wrap').hide('fast');
                $('#blah').attr('src', e.target.result);
                $('#wrap').show('fast');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#imgInp').on('change', function () {

        readURL(this);
    });
}
function checkInput(fieldID,alertID){
    var changedVal= false;
    $('#'+fieldID).focusout(function(){
        var value=$(this).val();
        changedVal=validateInput(fieldID,value,alertID);
        if(changedVal){
            $('#'+fieldID).keyup(function(){
                var value1=$(this).val();
                changedVal=validateInput(fieldID,value1,alertID);
            });
        }
    });
    return changedVal;
}

function validateInput(id,value,alertID,errorType){
    if(value ===''){
        $('#'+alertID).html('Invalid Input ! Try again !');
        $('#'+id).css("border", "2px solid red");
        errorType=true;
        $('#'+alertID).show();
    } else {
        $('#'+alertID).hide();
        $('#'+id).css("border", "1px solid black");
        errorType=false;
    }
    return errorType;
}
function addFrom(id,url){
    $('#'+id).on('click',function(e){
        e.preventDefault();
        ajaxContainerLoad(url);

    });
}
function editFrom(id,url){
    $('.'+id).on('click',function(e){
        var editId=$(this).data('id');
        e.preventDefault();
        ajaxContainerLoad(url+'/'+editId);

    });
}
function backBtn(id,dstUrl){
    $('body').on('click','#'+id,function(){
        ajaxContainerLoad(dstUrl);
    });
}
function summernoteInt(){
    $('.summernotes').each(function() {
        var now = $(this);
        var height = now.data('height');
        var fieldName = now.data('name');
        now.closest('div').append('<input type="hidden" id="desc" class="val" name="'+fieldName+'">');
        now.summernote({
            height: height,
            onChange: function() {
                now.closest('div').find('.val').val(now.code());
            }
        });
        now.closest('div').find('.val').val(now.code());
    });
}
function emailCheck(fieldID,alertID){
    var changedVal= false;
    $('#'+fieldID).focusout(function(){
        var value=$(this).val();
        changedVal=isValidEmailAddress(fieldID,value,alertID);
        if(changedVal){
            $('#'+fieldID).keyup(function(){
                var value1=$(this).val();
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
        $('#'+alertID).hide();
        $('#'+fieldID).css("border", "1px solid black");
        error=false;
    } else {
        $('#'+alertID).html('Enter a valid Email Address !');
        $('#'+fieldID).css("border", "2px solid red");
        error=true;
        $('#'+alertID).show();
    }
    return error;
};
function phoneCheck(fieldID,alertID){
    var changedVal= false;
    $('#'+fieldID).focusout(function(){
        var value=$(this).val();
        var length=value.length;
        changedVal=isValidPhoneNo(fieldID,value,alertID,length);
        if(changedVal){
            $('#'+fieldID).keyup(function(){
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
        $('#'+alertID).hide();
        $('#'+fieldID).css("border", "1px solid black");
        error=false;
    } else{
        $('#'+alertID).html('Enter a valid Phone NO !');
        $('#'+fieldID).css("border", "2px solid red");
        error=true;
        $('#'+alertID).show();
    }
    return error;
}
function linkCheck(fieldID,alertID){
    var changedVal= false;
    $('#'+fieldID).focusout(function(){
        var value=$(this).val();
        changedVal=isValidPhoneNo(fieldID,alertID,value);
        if(changedVal){
            $('#'+fieldID).keyup(function(){
                var value1=$(this).val();
                changedVal=isValidPhoneNo(fieldID,alertID,value1);
            });
        }
    });
    return changedVal;
}
function checkLink(fieldID,alertID,value) {
    var error=false;
    var pattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
    if(pattern.test(value)){
        $('#'+alertID).hide();
        $('#'+fieldID).css("border", "1px solid black");
        error=false;
    } else{
        $('#'+alertID).html('Enter a valid Link !');
        $('#'+fieldID).css("border", "2px solid red");
        error=true;
        $('#'+alertID).show();
    }
    return error;
 }
 function checkNumber(fieldName){
     var num=$("input[name='+fieldName+']").val();
 }
 function login(form_id,url){
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
                    title: '<strong>Successfully Logged In</strong>',
                    message: ''
                }, {
                    type: 'success'
                });
                location.replace(url);
            } else {
                bootbox.hideAll();
                $('#test').hide();
                $.notify({
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
function FormSubmit(form_id){
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
                    title: '<strong>Successfully Updated !</strong>',
                    message: ''
                }, {
                    type: 'success'
                }); 
            } else {
                bootbox.hideAll();
                $('#test').hide();
                $.notify({
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
