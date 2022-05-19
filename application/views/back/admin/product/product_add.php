<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title) ?></h3>
                <a class="btn btn-primary pull-right" id="product_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            echo form_open(base_url() . 'index.php/product/product_add', array(
                'class' => 'form-horizontal',
                'method' => 'post',
                'id' => 'product_add',
                'enctype' => 'multipart/form-data'
            ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="name"  id="product_name" placeholder="Enter Product Name">
                        <span class="" style="color:red" id="title1"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keywords</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="keywords"  id="keywords" placeholder="Examples - Print, Scan, Fax Secure MFP">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Brand</label>

                    <div class="col-sm-9">
                        <select class="form-control select2" name="brand_id">
                            <option>Select a Brand</option>
                            <?php
                                foreach($brands as $row){
                            ?>
                                <option value="<?php echo $row['brand_id'];?>"><?php echo $row['brand_name'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>

                    <div class="col-sm-9">
                        <select class="form-control select2" name="category_id">
                            <option>Select a Category</option>
                            <?php
                                foreach($categroies as $row1){
                            ?>
                                <option value="<?php echo $row1['category_id'];?>"><?php echo $row1['category_name'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Highlights</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="product_highlights"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Overview</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="overview"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Specification</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="specification"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Accessories</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="accessories"></textarea>

                    </div>
                </div>
                <div class="form-group" style="margin-top:5%">
                    <label for="inputEmail3" class="col-sm-3 col-sm-offset-4 control-label">Product Image(1000px X 700px)</label>
                </div>
                <div class="form-group">
                    <span id="more_f_btn" class="btn btn-primary btn-labeled fa fa-plus pull-right" style="margin-right:9% !important">
                        ADD MORE
                    </span>
                </div>
                <div class="form-group">
                    <div class="rem col-sm-3">
                        <div class="col-sm-12" style="border:1px solid #ccc; border-radius:5px; margin-right:10px; margin-bottom:10px; margin-top: 5px">
                            <div class="form-group" style="margin-top:5%">    
                                <div class="col-sm-12">
                                    <input type="hidden" class="form-control" placeholder="Enter Feature Name" name="f_name[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <center>
                                        <div class="col-sm-12" style="padding:10px;">
                                            <img class="img-responsive img-border blah"  src="<?php echo base_url(); ?>uploads/others/default.jpg" style="height:150px; width:100%;" >
                                        </div>
                                    </center>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-6" style="margin-left:9px">
                                        <span class="pull-left btn btn-sm btn-default btn-file" style="margin-left:-5px">
                                            Select Image
                                            <input type="file" name="nimg[]" class="form-control imgInp">
                                        </span>

                                    </div>
                                    <div class="col-sm-6" style="margin-left:-12px">
                                        <span class="pull-right btn btn-sm btn-danger removal" style="margin-left:5px">
                                            Remove
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="add_more_f"></div>
                </div>
                <div class="form-group" style="margin-top:5%">
                    <label for="inputEmail3" class="col-sm-3 col-sm-offset-4 control-label">External Files(MAX:3 Files)</label>
                    
                </div>
                <div class="form-group" style="margin-top:5%">
                    <div class="col-sm-4">
                        <input type="file" name="file1" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="file" name="file2" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="file" name="file3" class="form-control">
                    </div>
                </div>
                
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <span class="btn btn-info  pull-right sub">Submit</span>
            </div>
            <!-- /.box-footer -->
            <?php form_close(); ?>
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
    $(document).ready(function () {
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
        var product_name_error = checkInput('product_name', 'title1');
        $('.sub').on('click', function () {
            if (product_name_error === false) {
                var redirectUrl = '<?php echo base_url() ?>index.php/product/';
                addFormSubmit('product_add', redirectUrl);
            }
        });
        function readURL_all(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var parent = $(input).closest('.form-group');
                reader.onload = function (e) {
                    parent.find('.wrap').hide('fast');
                    parent.find('.blah').attr('src', e.target.result);
                    parent.find('.wrap').show('fast');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#more_f_btn").click(function(){
        $("#add_more_f").append(''
            +'<div class="rem col-sm-3">'
            +'  <div class="col-sm-12" style="border:1px solid #ccc; border-radius:5px;  margin-bottom:10px;margin-top:5px">'
            +'        <div class="form-group" style="margin-top:5%">'    
            +'            <div class="col-sm-12">'
            +'                <input type="hidden" class="form-control" placeholder="Enter Feature Name" name="f_name[]">'
            +'            </div>'
            +'        </div>'
            +'            <div class="form-group">'
            +'                <div class="col-sm-12">'
            +'                    <center>'
            +'                        <div class="col-sm-12" style="padding:10px;">'
            +'                            <img class="img-responsive img-border blah"  src="<?php echo base_url(); ?>uploads/others/default.jpg" style="height:150px; width:100%;" >'
            +'                        </div>'
            +'                    </center>'
            +'                </div>'
            +'               <div class="col-sm-12">'
            +'                    <div class="col-sm-6" style="margin-left:9px">'
            +'                        <span class="pull-left btn btn-sm btn-default btn-file" style="margin-left:-5px">'
            +'                            Select Image'
            +'                            <input type="file" name="nimg[]" class="form-control imgInp">'
            +'                        </span>' 
            +'                    </div>'
            +'                    <div class="col-sm-6" style="margin-left:-12px">'
            +'                        <span class="pull-right btn btn-sm btn-danger removal" style="margin-left:5px">'
            +'                            Remove'
            +'                        </span>'
            +'                    </div>'
            +'                </div>'
            +'           </div>'
            +'        </div>'   
            +'</div>'
            
            
        );
    });
        $(".box-body").on('change', '.imgInp', function () {
            readURL_all(this);
        });
        $('body').on('click', '.removal', function () {
            $(this).closest('.rem').remove();
        });

    });
     
</script>

