<div class="row">

    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div id="test"></div>
        <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($edit_data as $row) { ?>
                <?php
                echo form_open(base_url() . 'index.php/namaz/namaz_update/' . $row['namaz_id'], array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'namaz_editer',
                    'enctype' => 'multipart/form-data'
                ));
                ?>

                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Namazamaz Name</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="name"  id="namaz_title" value="<?php echo $row['name']; ?>">
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
    var namaz_title_error=checkInput('namaz_title','title');
    $('.sub').on('click', function () {
        var redirectUrl='<?php echo base_url()?>index.php/namaz/';
        if (namaz_title_error === false) {
            modalFormSubmit('namaz_editer',redirectUrl);
        }

    });
}); 
</script>

