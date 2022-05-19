<div class="row">

    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div id="test"></div>
        <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($edit_data as $row) { ?>
                <?php
                echo form_open(base_url() . 'index.php/author/author_update/' . $row['author_id'], array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'author_editer',
                    'enctype' => 'multipart/form-data'
                ));
                ?>

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label " for="demo-hor-inputemail">Image</label>

                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-2">

                                    <img class="img-responsive img-border" id="blah"
                                    <?php if (file_exists('uploads/author/author_' . $row['author_id'] . '.' . $row['ext'])) { ?>
                                             src="<?php echo base_url(); ?>uploads/author/author_<?php echo $row['author_id'] ?>.<?php echo $row['ext'] ?>"
                                         <?php } else { ?>
                                             src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                             <?php
                                         }
                                    ?>>
                                </div>
                            </div>
                            <span id="img"></span>
                        </div>
                        <div class="col-sm-10" style="margin-top:1%;">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-5">
                                    <span class="pull-left btn btn-default btn-file ml-40">
                                        Select Image<b>(150px X 150px)</b>
                                        <input type="file" name="author" class="form-control" id="imgInp">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="author_name"  id="author_title" value="<?php echo $row['author_name']; ?>">
                            <span class="" style="color:red" id="title"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Profile</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="profile"  id="author_profile" value="<?php echo $row['profile']; ?>">
                            <span class="" style="color:red" id="title"></span>
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
        margin-left: 11%;
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
     * hide all the alert field where you want to show the error 
     */
    $('#title').hide();
    /*
     * checkInput() function has two parameter 
     * 1st is for the inuput id
     * 2nd is the id of the place where you want to show your error message
     */
    var author_title_error=checkInput('author_title','title');
    $('.sub').on('click', function () {
        var redirectUrl='<?php echo base_url()?>index.php/author/';
        if (author_title_error === false) {
            modalFormSubmit('author_editer',redirectUrl);
        }

    });
}); 
</script>

