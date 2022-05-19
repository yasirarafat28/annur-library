<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title)?></h3>
                <a class="btn btn-primary pull-right" id="category_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open(base_url().'index.php/post/category_add', array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'category_add',
                    'enctype' => 'multipart/form-data'
                ));
            ?>
            <div class="box-body">
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Parent Category</label>

					<div class="col-sm-9">
						<select class="form-control select2" name="type">
							<option value="0">Select a Category</option>
							<option value="1">খবর </option>
							<option value="2">দারস</option>
							<option value="3">সাহিত্য ও সংস্কৃতি </option>
						</select>
					</div>
				</div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="category_name"  id="category_title" placeholder="Enter your title of the image">
                        <span class="" style="color:red" id="title"></span>
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
    /*
     * singleImageChange function loads any changed image instantly
     */
    singleImageChange();
    /*
     * hide all the alert field where you want to show the error 
     */
    $('#title').hide();
    /*
     * checkInput() function has two parameter 
     * 1st is for the inuput field id 
     * 2nd is the id of the place where you want to show your error message
     */
    var category_title_error=checkInput('category_title','title');
    $('.sub').on('click',function(){
        if(category_title_error=== false){
            var redirectUrl='<?php echo base_url()?>index.php/post/';
            addFormSubmit('category_add',redirectUrl);
        }
     });
});
</script>

