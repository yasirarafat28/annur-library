<!-- /.content-wrapper -->
<footer class="main-footer" style="min-height:50px;font-size: 20px;">
    <div class="col-md-8">
        <p class="pull-left"> <a href="<?php echo base_url() ?>" class="text-center" style="corsor:pointer"><strong>ANNUR LIBRARY</strong></a>   © <?php echo date('Y', time()) ?> ALL RIGHT RESERVED. </p>
    </div>

    <div class="col-md-4">
        <span class="pull-right">
            <strong style="font-size: 20px;"></strong> <a id="cloud" href="#" class="text-center" style="font-size: 20px;corsor:pointer"><strong></strong></a> 
        </span>
    </div>
</footer>
<script>
    jQuery(document).ready(function () {
        jQuery('#cloud').on('click', function (e) {
            e.preventDefault();
            location.replace("http://www.library.annurcomplex.com/");
        });
    });
</script>