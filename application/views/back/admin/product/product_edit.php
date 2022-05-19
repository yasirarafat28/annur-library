<?php
    error_reporting(0);
?>
<div class="row">

    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div id="test"></div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title) ?></h3>
                <a class="btn btn-primary pull-right" id="product_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($edit_data as $row) { ?>
                <?php
                echo form_open(base_url() . 'index.php/product/product_update/' . $row['product_id'], array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'product_editer',
                    'enctype' => 'multipart/form-data'
                ));
                ?>

                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="name"  id="product_name" value="<?php echo $row['product_name']; ?>">
                            <span class="" style="color:red" id="title"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Brand</label>

                            <div class="col-sm-9">
                                <select class="form-control select2" name="brand_id">
                                    <option>Select a Brand</option>
                                    <?php
                                        foreach ($brands as $row1) {
                                    ?>
                                        <option value="<?php echo $row['brand_id']; ?>" <?php if ($row['brand_id'] == $row1['brand_id']) {
                                        echo 'selected';
                                        } 
                                    ?>>
                                        <?php echo $row1['brand_name']; ?></option>
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
                                    foreach ($categroies as $row2) {
                                ?>
                                    <option value="<?php echo $row2['category_id']; ?>" <?php if ($row['category_id'] == $row2['category_id']) {
                                    echo 'selected';
                                } ?>>
                                        <?php echo $row2['category_name']; ?>
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Product Highlights</label>
                        <div class="col-sm-9">
                            <textarea rows="9" class="summernotes" data-height="300" data-name="product_highlights"><?php echo $row['product_highlights']; ?></textarea>

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Overview</label>
                        <div class="col-sm-9">
                            <textarea rows="9" class="summernotes" data-height="300" data-name="overview"><?php echo $row['overview']; ?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Specification</label>
                        <div class="col-sm-9">
                            <textarea rows="9" class="summernotes" data-height="300" data-name="specification"><?php echo $row['specification']; ?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Accessories</label>
                        <div class="col-sm-9">
                            <textarea rows="9" class="summernotes" data-height="300" data-name="accessories"><?php echo $row['accessories']; ?></textarea>

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
                        <?php
                            foreach ($features as $row1) {
                        ?>
                            <div class="rem col-sm-3">

                                <div class="col-sm-12" style="border:1px solid #ccc; border-radius:5px; margin-right:10px; margin-bottom:10px; margin-top: 5px">
                                    <div class="form-group" style="margin-top:5%">
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" value=" " placeholder="Enter Feature Name" name="f_name[<?php echo $row1['index'] ?>]">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <center>
                                                <div class="col-sm-12" style="padding:10px;">
                                                    <img class="img-responsive img-border blah" style="height:150px; width:100%;" 
                                                    <?php if (file_exists('uploads/product/' . $row1['img'])) { ?>
                                                             src="<?php echo base_url(); ?>uploads/product/<?php echo $row1['img'] ?>"
                                                         <?php } else { ?>
                                                             src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                                             <?php
                                                         }
                                                         ?>
                                                         >
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-6" style="margin-left:9px">
                                                <span class="pull-left btn btn-sm btn-default btn-file" style="margin-left:-5px">
                                                    Select Image
                                                    <input type="file" name="nimg[<?php echo $row1['index'] ?>]"  class="form-control imgInp">
                                                </span>

                                            </div>
                                            <div class="col-sm-6" style="margin-left:-12px">
                                                <span class="pull-right btn btn-sm btn-danger remv" data-index="<?php echo $row1['index'] ?>" data-id="<?php echo $row['product_id'] ?>" style="margin-left:5px">
                                                    Remove
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $count = $row1['index'];
                        }
                        ?>
                        <input type="hidden" id="img_count" value="<?php echo $count; ?>" />
                        <div id="add_more_f"></div>
                        <div id="image_dummy" style="display:none">
                            <div class="rem col-sm-3">
                                <div class="col-sm-12" style="border:1px solid #ccc; border-radius:5px;  margin-bottom:10px;margin-top:5px">
                                    <div class="form-group" style="margin-top:5%">
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" placeholder="Enter Feature Name" name="f_name[{{i}}]">
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
                                                    <input type="file" name="nimg[{{i}}]" class="form-control imgInp">
                                                </span>
                                            </div>
                                            <div class="col-sm-6" style="margin-left:-12px">
                                                <span class="pull-right btn btn-sm btn-danger removal" style="margin-left:5px">
                                                    Remove
                                                </span>
                                            </div>'
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:5%">
                        <label for="inputEmail3" class="col-sm-3 col-sm-offset-4 control-label">External Files(MAX:3 Files)</label>
                    </div>
                    <div class="form-group" style="margin-top:5%">
                        <?php
                            if ($row['file1'] != '') {
                        ?>
                            <div class="col-md-6">
                                <iframe style="min-height:400px; width: 500px" src="<?php echo base_url()?>uploads/download/<?php echo $row['file1'] ?>"></iframe>
                            </div>
                        <?php
                            }
                        ?>
                        <?php
                            if ($row['file2'] != '') {
                        ?>
                            <div class="col-md-6">
                                <iframe style="min-height:400px; width: 500px" src="<?php echo base_url()?>uploads/download/<?php echo $row['file2'] ?>"></iframe>
                            </div>
                        <?php
                            }
                        ?>
                        <?php
                            if ($row['file3'] != '') {
                        ?>
                            <div class="col-md-6" style="margin-top:5%">
                                <iframe style="min-height:400px; width: 500px" src="<?php echo base_url()?>uploads/download/<?php echo $row['file3'] ?>"></iframe>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="form-group" style="margin-top:5%">
                        <label for="inputEmail3" class="col-sm-3 col-sm-offset-4 control-label">Change External Files(MAX:3 Files)</label>

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
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <span type="submit"  class="btn btn-info pull-right sub">Update</span>
                    </div>
                <!-- /.box-footer -->
                </div>
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
         * summernote/text editor initialization
         */
        summernoteInt1();
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
        var product_name_error = checkInput('product_name', 'title');
        /*
         * Submit Edit Form
         */
        $('.sub').on('click', function () {
            var redirectUrl = '<?php echo base_url() ?>index.php/product/';
            if (product_name_error === false) {
                editFormSubmit('product_editer', redirectUrl);
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
        $(".box-body").on('change', '.imgInp', function () {
            readURL_all(this);
        });

    });
    function summernoteInt1() {
        $('.summernotes').each(function () {
            var now = $(this);
            var height = now.data('height');
            var fieldName = now.data('name');
            now.closest('div').append('<input type="hidden" id="desc" class="val" name="' + fieldName + '">');
            now.summernote({
                height: height,
                onChange: function () {
                    now.closest('div').find('.val').val(now.code());
                }
            });
            now.closest('div').find('.val').val(now.code());
        });
    }
    $("#more_f_btn").click(function () {
        var image_dummy_html = $('#image_dummy').html();
        var l = $('#img_count').val();
        ln = parseInt(Number(l)+1);
        image_dummy_html = image_dummy_html.replace(/{{i}}/g, ln);
        $('#add_more_f').append(image_dummy_html);
        $('#img_count').val(ln);
    });
    $('body').on('click', '.removal', function () {
        $(this).closest('.rem').remove();
    });
    $('body').on('click', '.remv', function () {
        var index = $(this).data('index');
        var id = $(this).data('id');
        $(this).closest('.rem').remove();
        $.ajax({
            url: '<?php echo base_url() ?>index.php/product/delimg/' + index + '/' + id,
            success: function (data) {

            }
        });
    });

</script>

