
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo 'Annur Library'; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/back/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/back/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/back/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/back/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/back/plugins/iCheck/square/blue.css">
        <!-- Notification  -->
        <link rel="stylesheet" href="<?php echo base_url()?>template/back/others/css/notify.css">
        <!-- Favicons
        ================================================== -->
        <link rel="icon" href="<?php echo base_url() ?>template/front/images/favicon.ico">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url() ?>template/back/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url() ?>template/back/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url() ?>template/back/plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo base_url()?>template/back/others/js/bootstrap-notify.min.js"></script>
        <script src="<?php echo base_url()?>template/back/others/js/bootbox.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a class="col-md-12 text-center text-black" style="font-size:20px" href="<?php echo base_url()?>"><b>Annur Library Login Panel</b></a>
                    </div> 
                </div>
                <br>
                <?php
                    echo form_open(base_url() . 'index.php/main_admin/login_now', array(
                        'method' => 'post',
                        'id' => 'login_form',
                    ));
                ?>
                    
                    <?php if(isset($_SESSION['error_msg'])){  ?>
                    <div class="alert alert-danger fade in alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close" style="text-decoration:none;">×</a>
                        <?php echo $_SESSION['error_msg'];?>
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($_SESSION['success_msg'])){  ?>
                    <div class="alert alert-success fade in alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close" style="text-decoration:none;">×</a>
                        <?php echo $_SESSION['success_msg'];?>
                        <script type="text/javascript"> function Redirect(){ window.location="";} setTimeout("Redirect()", 1000); </script>
                    </div>
                    <?php } ?>
                    
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        
                        <!-- /.col -->
                        <div class="col-xs-4 pull-right">
                            <button type="submit" class="btn btn-primary ">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <script src="<?php echo base_url()?>template/back/others/js/wizTech.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
            $('.sub1').on('click', function (e) {
                e.preventDefault();
                login('login_form','<?php echo base_url();?>index.php/main_admin/');
            });
        </script>
    </body>
</html>
