<div class="row">
    <div class="col-xs-12">

        <?php
            foreach ($applicant_details as $row) {
        ?>
        <div class="box">
            <div class="box-body">
                
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <img class="img-lg img-circle img-responsive ml-36"
                                <?php if (file_exists('uploads/job_apply/job_apply_' . $row['job_apply_id'] . '_thumb.' . $row['ext'])) { ?>
                                         src="<?php echo base_url(); ?>uploads/job_apply/job_apply_<?php echo $row['job_apply_id'] ?>_thumb.<?php echo $row['ext'] ?>"
                                     <?php } else { ?>
                                         src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                <?php
                                     }
                                ?>
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="text-lg text-overflow mar-no"><?php echo $row['name']?></h4>
                            <div class="pad-ver btn-group">
                                <?php if($row['fb'] != ''){ ?>
                                    <a href="<?php echo $row['fb'];?>" target="_blank" class="btn btn-icon btn-hover-primary fa fa-facebook icon-lg"></a>
                                <?php } if($row['twiiter'] != ''){ ?>
                                    <a href="<?php echo $row['twiiter'];?>" target="_blank" class="btn btn-icon btn-hover-info fa fa-twitter icon-lg"></a>
                                <?php } if($row['google'] != ''){ ?>
                                    <a href="<?php echo $row['google'];?>" target="_blank" class="btn btn-icon btn-hover-danger fa fa-google-plus icon-lg"></a>
                                <?php } if($row['linkedin'] != ''){ ?>
                                    <a href="<?php echo $row['linkedin'];?>" target="_blank" class="btn btn-icon btn-hover-danger fa fa-linkedin icon-lg"></a>
                                <?php } ?>
                                <a href="<?php echo $row['email']?>" class="btn btn-icon btn-hover-mint fa fa-envelope icon-lg"></a>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <tr>
                                <th class="text-center">Expected Salary</th>
                                <td class="text-center">
                                    <?php echo $row['exp_salary']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Applied For</th>
                                <td class="text-center">
                                    <?php echo $row['job_title']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Father's Name</th>
                                <td class="text-center">
                                    <?php echo $row['f_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Mother's Name</th>
                                <td class="text-center">
                                    <?php echo $row['m_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Email</th>
                                <td class="text-center">
                                    <?php echo $row['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Phone</th>
                                <td class="text-center">
                                    <?php echo $row['phone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Present Address</th>
                                <td class="text-center">
                                    <?php echo $row['address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Parmanet Address</th>
                                <td class="text-center">
                                    <?php echo $row['address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Sex</th>
                                <td class="text-center">
                                    <?php echo $row['sex']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Material Status</th>
                                <td class="text-center">
                                    <?php echo $row['m_status']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Relagion</th>
                                <td class="text-center">
                                    <?php echo $row['relagion']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Nationality</th>
                                <td class="text-center">
                                    <?php echo $row['nationality']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">National ID No.</th>
                                <td class="text-center">
                                    <?php echo $row['nid']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Educational Background</th>
                                <td class="text-center">
                                    <?php 
                                        $edu= json_decode($row['edu_back'],TRUE);
                                        foreach($edu as $row1){
                                    ?>
                                        <span>
                                            <p>
                                                <b>Institute Name:</b> <?php echo $row1['institue']?>
                                            </p>
                                            <p>
                                                <b>Join :</b> <?php echo date('d/m/Y', strtotime($row1['start_time']));?>
                                            </p>
                                            <p>
                                                <b>Passed :</b> <?php echo date('d/m/Y', strtotime($row1['end_time']));?>
                                            </p>
                                            <p>
                                                <b>Degree :</b> <?php echo $row1['degree'];?>
                                            </p>
                                            <p>
                                                <b>Grade :</b> <?php echo $row1['grade'];?>
                                            </p>
                                            <p>
                                                <b>Description :</b> <?php echo $row1['description'];?>
                                            </p>
                                        </span>
                                    ``<hr>
                                    <?php      
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Job Experience</th>
                                <td class="text-center">
                                    <?php 
                                        $jobss= json_decode($row['job_exp'],TRUE);
                                        foreach($jobss as $row2){
                                    ?>
                                        <span>
                                            <p>
                                                <b>Company Name:</b> <?php echo $row2['company_name']?>
                                            </p>
                                            <p>
                                                <b>Joining Date :</b> <?php echo date('d/m/Y', strtotime($row2['exp_start_time']));?>
                                            </p>
                                            <p>
                                                <b>Leave Time :</b> <?php echo date('d/m/Y', strtotime($row2['exp_end_time']));?>
                                            </p>
                                            <p>
                                                <b>Designation :</b> <?php echo $row2['designation'];?>
                                            </p>
                                            <p>
                                                <b>Location :</b> <?php echo $row2['location'];?>
                                            </p>
                                            <p>
                                                <b>Description :</b> <?php echo $row2['exp_description'];?>
                                            </p>
                                        </span>
                                    ``<hr>
                                    <?php      
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Training/Certification</th>
                                <td class="text-center">
                                    <?php 
                                        $trains= json_decode($row['certification'],TRUE);
                                        foreach($trains as $row3){
                                    ?>
                                        <span>
                                            <p>
                                                <b>Organization Name:</b> <?php echo $row3['org_name']?>
                                            </p>
                                            <p>
                                                <b>Joining Date :</b> <?php echo date('d/m/Y', strtotime($row3['train_start_time']));?>
                                            </p>
                                            <p>
                                                <b>End Date :</b> <?php echo date('d/m/Y', strtotime($row3['train_end_time']));?>
                                            </p>
                                            <p>
                                                <b>Course Name :</b> <?php echo $row3['course_name'];?>
                                            </p>
                                            <p>
                                                <b>Location :</b> <?php echo $row3['org_location'];?>
                                            </p>
                                            <p>
                                                <b>Description :</b> <?php echo $row3['train_description'];?>
                                            </p>
                                        </span>
                                    ``<hr>
                                    <?php      
                                        }
                                    ?>
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
        margin-left: 41%;
    }
    
</style>