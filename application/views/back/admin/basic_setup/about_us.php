


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo strtoupper($page_title) ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ADMIN</a></li>
        <li class="active"><?php echo strtoupper($page_title) ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box box-info">

                    <!-- /.box-header -->
                    <!-- form start -->

                    <?php
                    echo form_open(base_url() . 'index.php/basic_setup/about_us/', array(
                        'class' => 'form-horizontal',
                        'method' => 'post',
                        'id' => 'about_editer',
                        'enctype' => 'multipart/form-data'
                    ));
                    ?>
                    <?php foreach ($edit_data as $row) { ?>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">About US Section Title</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="about_name"  id="aboutUs_name" value="<?php echo $row['about_title']; ?>">
                                    <span class="" style="color:red" id="title1"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea rows="9" class="summernotes" data-height="300" data-name="description"><?php echo $row['about_content']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mission Section Title(Optional)</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="mission_name"  value="<?php echo $row['mission_title']; ?>">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea rows="9" class="summernotes" data-height="300" data-name="description1"><?php echo $row['mission_content']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Vision</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="vision_name"  value="<?php echo $row['vision_title']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Description Section Title(Optional)</label>
                                <div class="col-sm-9">
                                    <textarea rows="9" class="summernotes" data-height="300" data-name="description2"><?php echo $row['vision_content']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <span type="submit"  class="btn btn-info pull-right sub">Update</span>
                        </div>
                        <!-- /.box-footer -->
                    <?php } ?>
                    <?php form_close(); ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<style>
    .ml-25{
        margin-left: 25%;
    }
    .ml-40{
        margin-left: 25%;
    }
    .fs{
        font-size: 20px;
        color:red;
    }
    .mr-2{
        margin-right: 2%
    }
</style>

<!-- ./wrapper -->

<script>
    $(document).ready(function () {
        summernoteInt();

        /*
         * hide all the alert field where you want to show the error 
         */
        $('#title1').hide();
        /*
         * checkInput() function has two parameter 
         * 1st is for the inuput field id 
         * 2nd is the id of the place where you want to show your error message
         */
        var about_name_error = checkInput('aboutUs_name', 'title1');
        $('.sub').on('click', function () {
            if (about_name_error === false) {
                var redirectUrl = '<?php echo base_url() ?>index.php/basic_setup/aboutUs/';
                addFormSubmit('about_editer', redirectUrl);
            }
        });
    });





    function stopRKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && (node.type == "text")) {
            return false;
        }
    }

    document.onkeypress = stopRKey;

</script>

