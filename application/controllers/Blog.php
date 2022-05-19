<?php defined('BASEPATH') OR exit('No direct script access allowed');
class blog extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='blog';
        $this->fieldName='status';
    }
    
    public function index(){
        $data['page_title']='blog';
        $data['page_name']='blog/blog_list';
        $data['blogs']=$this->db_model->getTableData($this->tableName);
        $this->load->view('back/admin/blog/blog_list',$data);
    }
    public function blog_form(){
        $data['page_title']='blog Add';
        $data['page_name']='blog_add';
        $this->load->view('back/admin/blog/blog_add',$data);
    }
    public function blog_edit_form($id){
        $data['page_title']='blog Edit';
        $data['page_name']='blog_edit';
        $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/blog/blog_edit',$data);
    }
    public function blog_add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Blog Name', 'required',array('required' => 'You must provide a Blog Title !'));
        
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['blog']['name'];
                if($_FILES['blog']['name'] ===''){
                    echo 'Error ! Please Select an Image For Blog !';
                } else{
                    $file_type=$_FILES['blog']['type'];
                    $file_size=$_FILES['blog']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        $data['blog_name']=$this->input->post('name');
                        $data['blog_desc']=$this->input->post('description',FALSE);
						$data['author']='Admin';
						$data['upload_time']=time();
                        $data['ext']=$ext;
                        if(strip_tags($data['blog_desc'])!=''){
                            $id=$this->db_model->insertDb($this->tableName,$data);
                            $this->common_model->uploadFile('blog','blog',$id,$thumb='yes',$ext);
                            echo 'success'; 
                        } else {
                            echo "Please Provide Blog Details !";
                        }
                    }
                }
            
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function blog_update($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Blog Name', 'required',array('required' => 'You must provide a Blog Name !'));			
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['blog']['name'];
                if($_FILES['blog']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                    if($data['image_name']===''){
                        echo 'Error ! Please Select an Image For Blog !';
                    }
                } 
                $file_type=$_FILES['blog']['type'];
                $file_size=$_FILES['blog']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['blog_name']=$this->input->post('name');
                    $data['blog_desc']=$this->input->post('description',FALSE);
                    $data['ext']=$ext;
                    if(strip_tags($data['blog_desc'])!=''){
                        $this->db_model->updateById($this->tableName,$data,$id);
                        $this->common_model->uploadFile('blog','blog',$id,$thumb='yes',$ext);
                        echo 'success';
                    } else{
                        echo "Please Provide Blog Details !";
                    }
                    
                }
              
            
        }
    }
    public function delete_blog($id){
        $this->db_model->deleteById($this->tableName,$id);
        echo 'success';    
    }
    public function updateStatus($id,$value){
        $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
        echo 'success';    
    }
    
}