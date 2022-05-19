

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
                    <a href="#" class="btn btn-primary pull-right" id="author_add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;ADD AUTHOR</a>
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Options</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($authors as $row){
                            ?>
                                <tr>
									
                                    <td class="text-center">
                                        <center>
                                            <img class="img-md img-border img-responsive ml-25"
                                                <?php if(file_exists($row['photo'])){ ?>
                                                    src="<?php echo base_url(). $row['photo']?>"
                                                <?php }else { ?>
                                                    src="<?php echo base_url(); ?>uploads/others/default.jpg"
                                                <?php
                                                    }
                                                ?>
                                            >
                                        </center>
                                    </td>
									
                                    <td class="text-center">
                                        <?php echo $row['author_name'];?>
                                    </td>
                                    <td class="text-center">
                                        <a  class="btn btn-primary mr-2 author_edit" data-id="<?php echo $row['author_id']?>" ><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Edit</a>
                                        <a  class="btn btn-danger author_delete" data-id="<?php echo $row['author_id']?>" id="author_delete"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Delete</a>  
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
    
    var authorAddFormUrl='<?php echo base_url()?>index.php/author/author_form';
    /*
     * add form() gets the author add form 
     * 1st parameter is the button id from which it was requested
     */
    addFrom('author_add',authorAddFormUrl);
    
    var authorEditUrl='<?php echo base_url()?>index.php/author/author_edit_form';
    /*
     * modalcontent function returns the edit form in modal
     */
    modalContent('example1','author_edit',authorEditUrl,'author EDIT');
    
    var authorDelUrl='<?php echo base_url()?>index.php/author/delete_author';
    var destUrl='<?php echo base_url()?>index.php/author/';
    /*
     * delete author item 
     * 1st pram is the class of the delete button
     */
    deleteItem('example1','author_delete',authorDelUrl,destUrl);
    
    function set_switchery(){
        $(".switchery").each(function(){
            new Switchery($(this).get(0), {
                color:'rgb(100, 189, 99)', 
                secondaryColor: '#cc2424', 
                jackSecondaryColor: '#c8ff77',
                size: 'large'
            });
            var changeCheckbox = $(this).get(0);
            changeCheckbox.onchange = function() {
                var falseMsg = $(this).data('falsemsg');
                var trueMsg = $(this).data('truemsg');
                var id=$(this).data('id');
                if(changeCheckbox.checked == true){
                    var yesUrl='<?php echo base_url()?>index.php/author/updateStatus/'+id+'/yes/';
                    switcheryAjaxYes(yesUrl,trueMsg);       
                } else if(changeCheckbox.checked == false) {
                    var noUrl='<?php echo base_url()?>index.php/author/updateStatus/'+id+'/no/';
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

