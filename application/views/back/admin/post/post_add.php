<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title) ?></h3>
                <a class="btn btn-primary pull-right" id="post_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            echo form_open(base_url() . 'index.php/post/post_add', array(
                'class' => 'form-horizontal',
                'method' => 'post',
                'id' => 'post_add',
                'enctype' => 'multipart/form-data'
            ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="title"  id="post_name" placeholder="Enter post Title">
                        <span class="" style="color:red" id="title1"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>

                    <div class="col-sm-9">
                        <select class="form-control select2" name="type_id">
                            <option value="0">Select a Type</option>
							<option value="1">খবর </option>
							<option value="2">দারস</option>
							<option value="3">সাহিত্য ও সংস্কৃতি </option>
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
                                <option value="<?php echo $row1['post_category_id'];?>"><?php echo $row1['name'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="description"></textarea>

                    </div>
                </div>
				
				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">post Image</label>
                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control">

                    </div>
                </div>
				
					
					<!--Only one pdf can upload-->
					
					<!--
				
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
					-->
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
        var post_name_error = checkInput('post_name', 'title1');
        $('.sub').on('click', function () {
            if (post_name_error === false) {
                var redirectUrl = '<?php echo base_url() ?>index.php/post/';
                addFormSubmit('post_add', redirectUrl);
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

