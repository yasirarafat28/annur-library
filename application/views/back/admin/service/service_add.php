<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title)?></h3>
                <a class="btn btn-primary pull-right" id="service_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open(base_url().'index.php/service/service_add', array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'service_add',
                    'enctype' => 'multipart/form-data'
                ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label " for="demo-hor-inputemail">Service Image</label>
                    
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-2">
                                <img class="img-responsive img-border"   src="<?php echo base_url(); ?>uploads/others/default.jpg" id="blah" >
                            </div>
                        </div>
                        <span id="img"></span>
                    </div>
                    <div class="col-sm-9" style="margin-top:1%;">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-6">
                                <span class="pull-left btn btn-default btn-file ml-40">
                                    Select Image
                                    <input type="file" name="service" class="form-control" id="imgInp">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Service Name</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="name"  id="service_name" placeholder="Enter Service Name">
                        <span class="" style="color:red" id="title1"></span>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Service Description</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="description"></textarea>
                        <span class="" style="color:red" id="title2"></span>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <span class="btn btn-info  pull-right sub">Submit</span>
            </div>
            <!-- /.box-footer -->
            <?php form_close();?>
        </div>
    </div>
    <!--/.col (right) -->
</div>
<style>
    .ml-40{
        margin-left: 17%;
    }
</style>
<script>
$(document).ready(function(){
    summernoteInt();
    /*
     * singleImageChange function loads any changed image instantly
     */
    singleImageChange();
    /*
     * hide all the alert field where you want to show the error 
     */
    $('#title1').hide();
    /*
     * checkInput() function has two parameter 
     * 1st is for the inuput field id 
     * 2nd is the id of the place where you want to show your error message
     */
    var service_name_error=checkInput('service_name','title1');
    $('.sub').on('click',function(){
        if(service_name_error=== false){
            var redirectUrl='<?php echo base_url()?>index.php/service/';
            addFormSubmit('service_add',redirectUrl);
        }
     });
});
</script>

