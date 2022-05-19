

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
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Azan Time</th>
                                <th class="text-center">Namaz Time</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($namazs as $row){
                            ?>
                                <tr>
                                    
                                    <td class="text-center">
                                        <?php echo $row['name'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['azan_time'];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['namaz_time'];?>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a  class="btn btn-primary mr-2 category_edit" data-id="<?php echo $row['namaz_id']?>" ><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Edit</a>
                                        <a  class="btn btn-danger category_delete" data-id="<?php echo $row['namaz_id']?>" id="category_delete"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Delete</a>  
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
    
    var categoryAddFormUrl='<?php echo base_url()?>index.php/post/category_form';
    /*
     * add form() gets the category add form 
     * 1st parameter is the button id from which it was requested
     */
    addFrom('category_add',categoryAddFormUrl);
    
    var categoryEditUrl='<?php echo base_url()?>index.php/category/category_edit_form';
    /*
     * modalcontent function returns the edit form in modal
     */
    modalContent('example1','category_edit',categoryEditUrl,'SLIDER EDIT');
    
    var categoryDelUrl='<?php echo base_url()?>index.php/category/delete_category';
    var destUrl='<?php echo base_url()?>index.php/category/';
    /*
     * delete category item 
     * 1st pram is the class of the delete button
     */
    deleteItem('example1','category_delete',categoryDelUrl,destUrl);
    
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
                    var yesUrl='<?php echo base_url()?>index.php/category/updateStatus/'+id+'/yes/';
                    switcheryAjaxYes(yesUrl,trueMsg);       
                } else if(changeCheckbox.checked == false) {
                    var noUrl='<?php echo base_url()?>index.php/category/updateStatus/'+id+'/no/';
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

