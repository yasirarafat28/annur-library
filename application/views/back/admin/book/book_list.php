


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
                    <a href="#" class="btn btn-primary pull-right" id="book_add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;ADD BOOK</a>
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Book Name</th>
                                <th class="text-center">Highlight(On/Off)</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($books as $row){
                                    $features=json_decode($row['features'],TRUE);
                            ?>
                            
                                <tr>
									
                                    <td class="text-center">
                                        <center>
                                            <img class="img-md img-border img-responsive ml-25"
                                                <?php if(file_exists($row['book_image'])){ ?>
                                                    src="<?php echo base_url(). $row['book_image']?>"
                                                <?php }else { ?>
                                                    src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                                <?php
                                                    }
                                                ?>
                                            >
                                        </center>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['book_name'];?>
                                    </td>
                                    <td class="text-center">
                                        <input class='switchery' type="checkbox"
                                            <?php if($row['status'] != 'no'){ echo 'checked'; } else {} ?>
                                            data-id='<?php echo $row['book_id']; ?>' 
                                                data-truemsg='<?php echo "Book Published"; ?>' 
                                                    data-falsemsg='<?php echo "Book Unpublished"; ?> ' 
                                                         />
                                    </td>
                                    <td class="text-center">
                                        
                                        <a  class="btn btn-primary btn-sm mr-2 book_edit" data-id="<?php echo $row['book_id']?>" ><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Edit</a>
                                        <a  class="btn btn-danger btn-sm book_delete" data-id="<?php echo $row['book_id']?>"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Delete</a>  
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
     * add form() gets the slider add form 
     * 1st parameter is the button id from which it was requested
     */
        var bookAddFormUrl='<?php echo base_url()?>index.php/book/book_form/';
        addFrom('book_add',bookAddFormUrl);   
    /*
     * modalcontent function returns the department details in modal
     * 1st parameter is the classname of the preview button
     * 2nd perameter is the preview URL
     */
        var previewUrl='<?php echo base_url()?>index.php/book/book_preview';
        modalContent('example1','book_preview',previewUrl,'SERVICE DETAILS');
    /*
     * 
     * editfom shows the edit form
     * 1st parameter is the classname of the edit button
     * 2nd perameter is the edit URL
     */
        var editFormUrl='<?php echo base_url()?>index.php/book/book_edit_form/';
        editFrom('book_edit',editFormUrl);
    
    /*
     * delete slider item 
     * 1st pram is the class of the delete button
     * 2nd parameter is the delete URL
     * 3rd parameter is reload URL
     */
        var deptDelUrl='<?php echo base_url()?>index.php/book/delete_book';
        var destUrl='<?php echo base_url()?>index.php/book/';
        deleteItem('example1','book_delete',deptDelUrl,destUrl);
    
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
                    var yesUrl='<?php echo base_url()?>index.php/book/updateStatus/'+id+'/yes/';
                    switcheryAjaxYes(yesUrl,trueMsg);       
                } else if(changeCheckbox.checked == false) {
                    var noUrl='<?php echo base_url()?>index.php/book/updateStatus/'+id+'/no/';
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

