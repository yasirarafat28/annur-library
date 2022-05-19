<div class="row">
    <div class="col-xs-12">


        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <?php
                        foreach ($contact_details as $row) {
                    ?>
                        
                        <tr>
                            <th class="text-center">Sender Name</th>
                            <td class="text-center">
                                <?php echo $row['name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Email</th>
                            <td class="text-center">
                                <?php echo $row['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Sent At</th>
                            <td class="text-center">
                                <?php echo date("Y-m-d h:i:sa", $row['sent_at']);?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Subject</th>
                            <td class="text-center">
                                <?php echo $row['subject']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Message</th>
                            <td class="text-center">
                                <?php echo $row['message']; ?>
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