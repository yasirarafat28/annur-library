<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title)?></h3>
                <a class="btn btn-primary pull-right" id="publisher_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open(base_url().'index.php/publisher/publisher_add', array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'publisher_add',
                    'enctype' => 'multipart/form-data'
                ));
            ?>
            <div class="box-body">
                
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-9">
                        <input type="file" class="form-control " name="publisher_image"  id="publisher_image">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="name"  id="publisher_name" placeholder="Enter your title of publisher">
                        <span class="" style="color:red" id="title1"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="address"  id="publisher_address" placeholder="Enter your title of fthe publisher">
                        <span class="" style="color:red" id="title3"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Overview</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" id="desc" data-height="300" data-name="description"></textarea>
                        <span class="" style="color:red" id="title2"></span>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <span class="btn btn-info pull-right sub">Submit</span>
            </div>
            <!-- /.box-footer -->
            <?php form_close();?>
        </div>
    </div>
    <!--/.col (right) -->
</div>
<style>
    .ml-40{
        margin-left: 11%;
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
    $('#title3').hide();
    /*
     * checkInput() function has two parameter 
     * 1st is for the inuput field id 
     * 2nd is the id of the place where you want to show your error message
     */
    
    var name_error=checkInput('publisher_name','title1');
    //var name_error=false;
    
    $('.sub').on('click',function(){
        if(name_error===false){
            var redirectUrl='<?php echo base_url()?>index.php/publisher/';
            addFormSubmit('publisher_add',redirectUrl);
        }
     });
});
</script>

