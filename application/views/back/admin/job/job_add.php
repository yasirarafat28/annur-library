<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title control-label"><?php echo strtoupper($page_title)?></h3>
                <a class="btn btn-primary pull-right" id="job_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp; Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open(base_url().'index.php/job/job_add', array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => 'job_add',
                    'enctype' => 'multipart/form-data'
                ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Job Title</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="name"  id="job_name" placeholder="Enter Job Title">
                        <span class="" style="color:red" id="title1"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Job Position</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="pos"  id="job_pos" placeholder="Enter Job Postion E.g. Manger/IT Executive">
                        <span class="" style="color:red" id="title2"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Job Nature</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="nature"  id="job_nature" placeholder="Enter Job Nature E.g. Full-Time/Coractual ">
                        <span class="" style="color:red" id="title3"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Job Level(Optional)</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="level"   placeholder="Enter Job Level">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Job Category (Optional)</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="cat"  placeholder="Enter Job Category">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Deadline</label>

                    <div class="col-sm-9">
                        <input type="date" class="form-control pull-right" name="deadline" id="reservation">
                    </div>
                <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Job Location</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="loc"  id="job_loc" placeholder="Enter Job Location">
                        <span class="" style="color:red" id="title4"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No of Vacancies</label>

                    <div class="col-sm-9">
                        <input type="number" min="0" step="100" class="form-control " name="no_of_vacancies"  id="no_of_vacancies" placeholder="Enter Salary">
                        <span class="" style="color:red" id="title7"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Sex</label>

                    <div class="col-sm-9">
                        <select class="form-control select2" name="sex">
                            <option>Select Sex</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="both">Male-Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Salary</label>

                    <div class="col-sm-9">
                        <input type="number" min="0" step="100" class="form-control " name="sal"  id="job_sal" placeholder="Enter Salary">
                        <span class="" style="color:red" id="title5"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Job Description</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="description"></textarea>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Educational Requirement</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="edu_req"></textarea>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Experience Requirement</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="exp_req"></textarea>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Additional Requirement (Optional)</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="add_req"></textarea>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Benefits (Optional)</label>
                    <div class="col-sm-9">
                        <textarea rows="9" class="summernotes" data-height="300" data-name="benefit"></textarea>
                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <span class="btn btn-info  pull-right sub">Submit</span>
            </div>
            <!-- /.box-footer -->
            <?php form_close();?>
        </div>
    </div>
    <!--/.col (right) -->
</div>
<style>
    .ml-40{
        margin-left: 17%;
    }
</style>
<script>
$(document).ready(function(){
    summernoteInt();
    
    /*
     * hide all the alert field where you want to show the error 
     */
    $('#title1').hide();
    $('#title2').hide();
    $('#title3').hide();
    $('#title4').hide();
    $('#title5').hide();
    $('#title5').hide();
    /*
     * checkInput() function has two parameter 
     * 1st is for the inuput field id 
     * 2nd is the id of the place where you want to show your error message
     */
    var job_name_error=checkInput('job_name','title1');
    var job_pos_error=checkInput('job_pos','title2');
    var job_nature_error=checkInput('job_nature','title3');
    var job_loc_error=checkInput('job_loc','title4');
    var job_sal_error=checkInput('job_sal','title5');
    var no_error=checkInput('no_of_vacancies','title7');
    $('.sub').on('click',function(){
        if(job_name_error=== false && job_pos_error=== false && job_nature_error=== false && job_loc_error=== false && job_sal_error=== false && no_error===false){
            var redirectUrl='<?php echo base_url()?>index.php/job/';
            addFormSubmit('job_add',redirectUrl);
        }
     });
});
</script>

