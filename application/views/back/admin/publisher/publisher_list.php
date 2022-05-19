


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <?php echo strtoupper($page_title)?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
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
                    <a href="#" class="btn btn-primary pull-right" id="publisher_add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;ADD PUBLISHER</a>
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Company Name</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($publishers as $row){
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <center>
                                            <img class="img-md img-border img-responsive ml-25"
                                                <?php if(file_exists($row['publisher_image'])){ ?>
                                                    src="<?php echo base_url(). $row['publisher_image']?>.<?php echo $row['ext']?>"
                                                <?php }else { ?>
                                                    src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                                <?php
                                                    }
                                                ?>
                                            >
                                        </center>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['publisher_name'];?>
                                    </td>
                                    <td class="text-center">
                                        <a  class="btn btn-primary mr-2 publisher_edit" data-id="<?php echo $row['publisher_id']?>" ><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Edit</a>
                                        <a  class="btn btn-danger publisher_delete" data-id="<?php echo $row['publisher_id']?>" id="slider_delete"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Delete</a>  
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
    
    var publisherAddFormUrl='<?php echo base_url()?>index.php/publisher/publisher_form';
    /*
     * add form() gets the slider add form 
     * 1st parameter is the button id from which it was requested
     */
    addFrom('publisher_add',publisherAddFormUrl);
    
    
    /*
     * 
     * editfom shows the edit form
     * 1st parameter is the classname of the edit button
     * 2nd perameter is the edit URL
     */
    var publisherEditUrl='<?php echo base_url()?>index.php/publisher/publisher_edit_form';
    editFrom('publisher_edit',publisherEditUrl);
    
    /*
     * delete slider item 
     * 1st pram is the class of the delete button
     */
    var publisherDelUrl='<?php echo base_url()?>index.php/publisher/delete_publisher';
    var destUrl='<?php echo base_url()?>index.php/publisher/';
    deleteItem('example1','publisher_delete',publisherDelUrl,destUrl);
    
    function set_switchery(){
        $(".switchery").each(function(){
            new Switchery($(this).get(0), {
                color:'rgb(100, 189, 99)', 
                secondaryColor: '#cc2424', 
                jackSecondaryColor: '#c8ff77'
            });
            var changeCheckbox = $(this).get(0);
            changeCheckbox.onchange = function() {
                var falseMsg = $(this).data('falsemsg');
                var trueMsg = $(this).data('truemsg');
                var id=$(this).data('id');
                if(changeCheckbox.checked == true){
                    var yesUrl='<?php echo base_url()?>index.php/publisher/updateStatus/'+id+'/yes/';
                    switcheryAjaxYes(yesUrl,trueMsg);       
                } else if(changeCheckbox.checked == false) {
                    var noUrl='<?php echo base_url()?>index.php/publisher/updateStatus/'+id+'/no/';
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

