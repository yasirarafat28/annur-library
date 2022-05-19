<div class="row">
    <div class="col-xs-12">

        <?php
        foreach ($news_details as $row) {
            ?>
            <div class="box">
                <div class="box-body">

                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <img class="img-md img-border img-responsive ml-36"
                                <?php if (file_exists('uploads/news/news_' . $row['news_id'] . '.' . $row['ext'])) { ?>
                                         src="<?php echo base_url(); ?>uploads/news/news_<?php echo $row['news_id'] ?>.<?php echo $row['ext'] ?>"
                                     <?php } else { ?>
                                         src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                         <?php
                                     }
                                     ?>
                                     >
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <tr>
                                    <th class="text-center">Title</th>
                                    <td class="text-center">
                                        <?php echo $row['news_name']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-center">Upload Date</th>
                                    <td class="text-center">
                                        <?php echo date('d-m-Y', $row['upload_time']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">Description</th>
                                    <td class="text-center">
                                        <?php echo $row['news_desc']; ?>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <?php
        }
        ?>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<style>
    .ml-36{
        margin-left: 44%;
    }

</style>