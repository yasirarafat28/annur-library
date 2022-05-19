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
                <a class="btn btn-primary pull-right" id="book_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($edit_data as $row) { ?>
                <?php
                echo form_open(base_url() . 'index.php/book/book_update/' . $row['book_id'], array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'book_editer',
                    'enctype' => 'multipart/form-data'
                ));
                ?>

                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Book Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="name"  id="book_name" value="<?php echo $row['book_name']; ?>">
                            <span class="" style="color:red" id="title"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Author</label>

                            <div class="col-sm-9">
                                <select class="form-control select2" name="author_id">
                                    <option>Select an Author</option>
                                    <?php
                                        foreach ($authors as $row1) {
                                    ?>
                                        <option value="<?php echo $row['author_id']; ?>" <?php if ($row['author_id'] == $row1['author_id']) {
                                        echo 'selected';
                                        } 
                                    ?>>
                                        <?php echo $row1['author_name']; ?></option>
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
                        <label for="inputEmail3" class="col-sm-2 control-label">Publisher</label>

                        <div class="col-sm-9">
                            <select class="form-control select2" name="publisher_id">
                                <option>Select a Publisher</option>
                                <?php
                                    foreach ($publishers as $row3) {
                                ?>
                                    <option value="<?php echo $row3['publisher_id']; ?>" <?php if ($row['publisher_id'] == $row3['publisher_id']) {
                                    echo 'selected';
                                } ?>>
                                        <?php echo $row3['publisher_name']; ?>
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
					
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Overview</label>
                        <div class="col-sm-9">
                            <textarea rows="9" class="summernotes" data-height="300" data-name="overview"><?php echo $row['overview']; ?></textarea>

                        </div>
                    </div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Book Image</label>
						<div class="col-sm-9">
							<input type="file" name="image" class="form-control">

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
                    </div>
                    <div class="form-group" style="margin-top:5%">
                        <?php
                            if ($row['external_pdf_url'] != '') {
                        ?>
                            <div class="col-md-6">
                                <iframe target="_blank" style="min-height:400px; width: 500px" src="<?php echo $row['external_pdf_url'] ?>"></iframe>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">PDF File</label>
						<div class="col-sm-9">
							<input type="file" name="file1" class="form-control">

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
        var book_name_error = checkInput('book_name', 'title');
        /*
         * Submit Edit Form
         */
        $('.sub').on('click', function () {
            var redirectUrl = '<?php echo base_url() ?>index.php/book/';
            if (book_name_error === false) {
                editFormSubmit('book_editer', redirectUrl);
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
            url: '<?php echo base_url() ?>index.php/book/delimg/' + index + '/' + id,
            success: function (data) {

            }
        });
    });

</script>

