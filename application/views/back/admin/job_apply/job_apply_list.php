


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <?php echo strtoupper($page_title)?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ADMIN</a></li>
        <li class="active"><?php echo strtoupper($page_title)?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            
            
            <div class="box">
                <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Job Title</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Expected Salary</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($job_applicants as $row){
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <center>
                                            <img class="img-md img-border img-responsive ml-25"
                                                
                                                
                                                <?php if(file_exists('uploads/job_apply/job_apply_' . $row['job_apply_id'] . '.' . $row['ext'])){ ?>
                                                    src="<?php echo base_url();?>uploads/job_apply/job_apply_<?php echo $row['job_apply_id']?>.<?php echo $row['ext']?>"
                                                <?php }else { ?>
                                                    src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                                <?php
                                                    }
                                                ?>
                                            >
                                        </center>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['job_title'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['name'];?>
                                    </td>
                                    
                                    <td class="text-center">
                                        <?php echo $row['email']?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['phone']?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['exp_salary'];?>
                                    </td>
                                    <td class="text-center">
                                        <a  class="btn btn-info btn-sm mr-2 job_apply_preview" data-id="<?php echo $row['job_apply_id']?>" ><i class="fa fa-location-arrow" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Preview</a>
                                        
                                        <a  class="btn btn-danger btn-sm job_apply_delete" data-id="<?php echo $row['job_apply_id']?>"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Delete</a>  
                                    </td>
                                    
                                </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                        
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<style>
    .ml-25{
        margin-left: 25%;
    }
    .fs{
        font-size: 20px;
        color:red;
    }
    .mr-2{
        margin-right: 2%
    }
    .mt-2{
        margin-top:2%;
        padding-right:2%;
    }
</style>

<!-- ./wrapper -->

<script>
    $(function () {
        /*
         * datatable creation 'exmaple1' is the id of the table
         */
            createDatatable('example1');   
    });   
    /*
     * modalcontent function returns the department details in modal
     * 1st parameter is the classname of the preview button
     * 2nd perameter is the preview URL
     */
        var previewUrl='<?php echo base_url()?>index.php/job_apply/job_apply_preview';
        modalContent('example1','job_apply_preview',previewUrl,"APPLICANT's DETAILS");
    
    
    /*
     * delete slider item 
     * 1st pram is the class of the delete button
     * 2nd parameter is the delete URL
     * 3rd parameter is reload URL
     */
        var deptDelUrl='<?php echo base_url()?>index.php/job_apply/delete_job_apply';
        var destUrl='<?php echo base_url()?>index.php/job_apply/';
        deleteItem('example1','job_apply_delete',deptDelUrl,destUrl);
    function stopRKey(evt) { 
        var evt = (evt) ? evt : ((event) ? event : null); 
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
        if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
    } 

    document.onkeypress = stopRKey; 

</script>

