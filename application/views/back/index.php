<?php
    include 'top_section.php';
?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php
                include 'header.php';
            ?>
            
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <?php
                    include 'navigation.php';
                ?>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="container">
                <?php
                   include 'admin/'.$page_name.'.php';
                ?>
                
            </div>
            <input type="text" name="type" id="type">
            <!-- /.content-wrapper -->
            <?php
                    include 'footer.php';
                    //include 'control.php';
             ?>

            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php
            include 'bottom_section.php';
        ?>




