


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
                    echo form_open(base_url() . 'index.php/basic_setup/copier_add/', array(
                        'class' => 'form-horizontal',
                        'method' => 'post',
                        'id' => 'copier_editer',
                        'enctype' => 'multipart/form-data'
                    ));
                    ?>
                    <?php
                        $i=0;
                        //echo $edit_data[0]['sec_title'];
                        foreach ($edit_data as $key=>$row) {
                            //echo '<pre>'.print_r($edit_data).'</pre>';
                            $i++;
                    ?>
                        <div class="box-body">
                            <div class="rem">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Section Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="ques[]" value="<?php echo $row['sec_title']; ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea rows="9" class="summernotes" data-height="300" data-name="description[]"><?php echo $row['desc']; ?></textarea>
                                    </div>
                                </div>
                                <?php if($i>1){
                                ?>
                                    <div class="form-group">
                                        <span class="pull-right btn btn-sm btn-danger removal" style="margin-right:9% !important">
                                            Remove
                                        </span>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="add_more_faq"></div>
                    <div class="form-group">
                        <span id="more_btn" class="btn btn-primary btn-labeled fa fa-plus pull-right" style="margin-right:9% !important">
                            ADD MORE
                        </span>
                    </div>
                    <div class="box-footer">
                        <span type="submit"  class="btn btn-info pull-right sub">Update</span>
                    </div>
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
        $('.sub').on('click', function () {
            var redirectUrl = '<?php echo base_url() ?>index.php/basic_setup/copier/';
            addFormSubmit('copier_editer', redirectUrl);
        });
        $("#more_btn").click(function(){
            $("#add_more_faq").append(''
                +'<div class="rem" style="margin-top:5%">'
                +'<div class="form-group">'
                +   '<label for="inputEmail3" class="col-sm-2 control-label">Section Title</label>'
                +   '<div class="col-sm-9">'
                +'        <input type="text" class="form-control" placeholder="Enter Your Question" name="ques[]">'
                +'    </div>'
                +'</div>'
                +'<div class="form-group">'
                +'    <label for="inputEmail3" class="col-sm-2 control-label"> Description</label>'
                +'    <div class="col-sm-9">'
                +'        <textarea rows="9" class="summernotes" data-height="300" data-name="description[]"></textarea>'
                +'    </div>'
                +'</div>'
                +'<div class="form-group">'
                +'<span class="pull-right btn btn-sm btn-danger removal" style="margin-right:9% !important">'
                +'    Remove'
                +'</span>'
                +'</div>'
                +'</div>'
            );
            summernoteInt();
        });
    });
    $('body').on('click','.removal',function(){
        $(this).closest('.rem').remove();
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

