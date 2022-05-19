


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
                                <th class="text-center">Sender Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Sent Date</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($contacts as $row){
                            ?>
                                <tr>
                                    
                                    <td class="text-center">
                                        <?php echo $row['name'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['email'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['subject'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo date("Y-m-d h:i:sa", $row['sent_at']);?>
                                    </td>
                                    <td class="text-center">
                                        <a  class="btn btn-info btn-sm mr-2 contact_preview" data-id="<?php echo $row['contact_id']?>" ><i class="fa fa-location-arrow" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Preview</a>
                                        <a  class="btn btn-danger btn-sm contact_delete" data-id="<?php echo $row['contact_id']?>"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Delete</a>  
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
</style>

<!-- ./wrapper -->

<script>
    $(function () {
        set_switchery();
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
        var previewUrl='<?php echo base_url()?>index.php/contact/contact_preview';
        modalContent('example1','contact_preview',previewUrl,'Message View');
    
    
    /*
     * delete slider item 
     * 1st pram is the class of the delete button
     * 2nd parameter is the delete URL
     * 3rd parameter is reload URL
     */
        var deptDelUrl='<?php echo base_url()?>index.php/contact/delete_contact';
        var destUrl='<?php echo base_url()?>index.php/contact/';
        deleteItem('example1','contact_delete',deptDelUrl,destUrl);
    
    function set_switchery(){
        $(".switchery").each(function(){
            new Switchery($(this).get(0), {
                color:'rgb(100, 189, 99)', 
                secondaryColor: '#cc2424', 
                jackSecondaryColor: '#c8ff77',
            });
            var changeCheckbox = $(this).get(0);
            changeCheckbox.onchange = function() {
                var falseMsg = $(this).data('falsemsg');
                var trueMsg = $(this).data('truemsg');
                var id=$(this).data('id');
                if(changeCheckbox.checked == true){
                    var yesUrl='<?php echo base_url()?>index.php/contact/updateStatus/'+id+'/yes/';
                    switcheryAjaxYes(yesUrl,trueMsg);       
                } else if(changeCheckbox.checked == false) {
                    var noUrl='<?php echo base_url()?>index.php/contact/updateStatus/'+id+'/no/';
                    switcheryAjaxNo(noUrl,falseMsg);
                }
             
            };
        });
    }
   
    function stopRKey(evt) { 
        var evt = (evt) ? evt : ((event) ? event : null); 
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
        if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
    } 

    document.onkeypress = stopRKey; 

</script>

