<div class="row">

    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div id="test"></div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title) ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="panel">
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="" style="border:1px solid #ebebeb; border-radius:4px;">
                            <?php
                                $admin_data = $this->db->get_where('admin', array(
                                            'admin_id' => $this->session->userdata('admin_id')
                                        ))->result_array();
                                foreach ($admin_data as $row) {
                            ?>
                                
                                <?php
                                    echo form_open(base_url() . 'index.php/admin/manage_admin/update_profile/', array(
                                        'class' => 'form-horizontal',
                                        'method' => 'post',
                                        'id'=>'prof'
                                    ));
                                ?>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="demo-hor-1">
                                            Name
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" value="<?php echo $row['name']; ?>" id="demo-hor-1" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="demo-hor-2">
                                            Email
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="email" name="email" value="<?php echo $row['email']; ?>" id="demo-hor-2" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="demo-hor-3">
                                            Phone
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" id="demo-hor-3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-info submitter" data-ing='<?php echo 'updating..'; ?>' data-msg='<?php echo 'Profile Updated!'; ?>'>
                                        Update Profile
                                    </span>
                                </div>
                                </form>

                                <div class="panel-heading">
                                    <h3 class="panel-title">Change Password</h3>
                                </div>
                                <?php
                                echo form_open(base_url() . 'index.php/admin/manage_admin/update_password/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id'=>'pass'
                                ));
                                ?>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="demo-hor-5">
                                            Current Password
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password" value="" id="demo-hor-5" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="demo-hor-6">
                                            New Password
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password1" value="" id="demo-hor-6" class="form-control pass pass1 required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="demo-hor-7">
                                            Confirm Password
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password2" value="" id="demo-hor-7" class="form-control pass pass2 required">
                                        </div>
                                        <div id="pass_note">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-info pass_chng disabled" disabled='disabled' data-ing='<?php echo 'Updating..'; ?>' data-msg='<?php echo 'Password Updated!'; ?>'>
                                        Update Password
                                    </span>
                                </div>
                                </form>
                                <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                <!--Panel body-->
            </div>
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
<script type="text/javascript">
    $(".pass").blur(function () {
        var pass1 = $(".pass1").val();
        var pass2 = $(".pass2").val();
        if (pass1 !== pass2) {
            $("#pass_note").html('' + '  <span class="require_alert" >' + '      <?php echo 'Password Mismatched !'; ?>' + '  </span>');
            $(".pass_chng").attr("disabled", "disabled");
            $(".pass_chng").addClass("disabled");
        } else if (pass1 == pass2) {
            $("#pass_note").html('');
            $(".pass_chng").removeAttr("disabled");
            $(".pass_chng").removeClass("disabled");
        }
    });

    $('.pass_chng').on('click', function () {
        FormSubmit('pass');
    });

    $('.submitter').on('click', function () {
        FormSubmit('prof');
    });

</script>

