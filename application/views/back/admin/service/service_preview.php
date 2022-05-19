<div class="row">
    <div class="col-xs-12">


        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <?php
                        foreach ($service_details as $row) {
                    ?>
                        <tr>
                            <th class="text-center">Image</th>
                            <td class="text-center">
                                <center>
                                    <img class="img-lg img-border img-responsive ml-36"
                                        <?php if (file_exists('uploads/service/service_' . $row['service_id'] . '.' . $row['ext'])) { ?>
                                                 src="<?php echo base_url(); ?>uploads/service/service_<?php echo $row['service_id'] ?>.<?php echo $row['ext'] ?>"
                                             <?php } else { ?>
                                                 src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                        <?php
                                             }
                                        ?>
                                    >
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Service Name</th>
                            <td class="text-center">
                                <?php echo $row['service_name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Service Description</th>
                            <td class="text-center">
                                <?php echo $row['service_desc']; ?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<style>
    .ml-36{
        margin-left: 36%;
    }
    
</style>