<div class="row">

    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div id="test"></div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title)?></h3>
                
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($edit_data as $row) { ?>
                <?php
                    echo form_open(base_url() . 'index.php/basic_setup/career_background_update/', array(
                        'class' => 'form-horizontal',
                        'method' => 'post',
                        'id' => 'career_background_editer',
                        'enctype' => 'multipart/form-data'
                    ));
                ?>

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label " for="demo-hor-inputemail">Background Image</label>

                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-2">

                                    <img class="img-responsive img-border" id="blah"
                                    <?php if (file_exists('uploads/background/background_' . $row['background_id'] . '.' . $row['ext'])) { ?>
                                             src="<?php echo base_url(); ?>uploads/background/background_<?php echo $row['background_id'] ?>.<?php echo $row['ext'] ?>"
                                         <?php } else { ?>
                                             src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                             <?php
                                         }
                                    ?>>
                                </div>
                            </div>
                            <span id="img"></span>
                        </div>
                        <div class="col-sm-9" style="margin-top:1%;">
                            <div class="row">
                                <div class="col-sm-5 col-sm-offset-6">
                                    <span class="pull-left btn btn-default btn-file ml-40">
                                        Select Image<b>(1600px X 400px)</b>
                                        <input type="file" name="career_back" class="form-control" id="imgInp">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <span type="submit"  class="btn btn-info pull-right sub">Update</span>
                </div>
                <!-- /.box-footer -->

                <?php form_close(); ?>
            <?php } ?>
        </div>

    </div>
    <!--/.col (right) -->
</div>
<style>
    .ml-40{
        margin-left: 17%;
        margin-bottom: 5%;
    }
</style>
<script>
    $(document).ready(function () {
        
        /*
         * singleImageChange function loads any changed image instantly
         */
            singleImageChange();
        
        /*
         * Submit Edit Form
         */
            $('.sub').on('click', function () {
                var redirectUrl='<?php echo base_url()?>index.php/basic_setup/career_background';
                    editFormSubmit('career_background_editer',redirectUrl);

            });
    }); 
</script>

