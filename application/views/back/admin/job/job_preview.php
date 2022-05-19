<div class="row">
    <div class="col-xs-12">


        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <?php
                        foreach ($job_details as $row) {
                    ?>
                        
                        <tr>
                            <th class="text-center">Job Title</th>
                            <td class="text-center">
                                <?php echo $row['job_title']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Position</th>
                            <td class="text-center">
                                <?php echo $row['position']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Job Location</th>
                            <td class="text-center">
                                <?php echo $row['job_location']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Job Nature</th>
                            <td class="text-center">
                                <?php echo $row['job_nature']; ?>
                            </td>
                        </tr>
                        <?php if($row['job_level'] !=''){?>
                        <tr>
                            <th class="text-center">Job Level</th>
                            <td class="text-center">
                                <?php echo $row['job_level']; ?>
                            </td>
                        </tr>
                        <?php }?>
                        
                        <?php if($row['job_category'] !=''){?>
                        <tr>
                            <th class="text-center">Job Category</th>
                            <td class="text-center">
                                <?php echo $row['job_category']; ?>
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <th class="text-center">Salary</th>
                            <td class="text-center">
                                <?php echo $row['salary']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Deadline</th>
                            <td class="text-center">
                                <?php echo $row['deadline']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Job Description</th>
                            <td class="text-center">
                                <?php echo $row['job_desc']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Educational Requirements</th>
                            <td class="text-center">
                                <?php echo $row['edu_req']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Experience Requirements</th>
                            <td class="text-center">
                                <?php echo $row['exp_req']; ?>
                            </td>
                        </tr>
                        <?php if(strip_tags($row['add_req']) !=''){?>
                        <tr>
                            <th class="text-center">Additional Requirements</th>
                            <td class="text-center">
                                <?php echo $row['add_req']; ?>
                            </td>
                        </tr>
                        <?php }?>
                        <?php if(strip_tags($row['benefits']) !=''){?>
                        <tr>
                            <th class="text-center">Other Benefits</th>
                            <td class="text-center">
                                <?php echo $row['benefits']; ?>
                            </td>
                        </tr>
                        <?php }?>
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