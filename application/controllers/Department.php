<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Department extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='department';
        $this->fieldName='status';
    }
    
    public function index(){
        $data['page_title']='Department';
        $data['page_name']='dept/dept_list';
        $data['departments']=$this->db_model->getTableData($this->tableName);
        $this->load->view('back/admin/dept/dept_list',$data);
    }
    public function department_form(){
        $data['page_title']='department add';
        $data['page_name']='dept_add';
        $this->load->view('back/admin/dept/dept_add',$data);
    }
    public function department_edit_form($id){
        $data['page_title']='Department Edit';
        $data['page_name']='dept_edit';
        $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/dept/dept_edit',$data);
    }
    public function department_add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Department Name', 'required',array('required' => 'You must provide a Department Name !'));
        
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['dept']['name'];
                if($_FILES['dept']['name'] ===''){
                    echo 'Error ! Please Select an Image For Department !';
                } else{
                    $file_type=$_FILES['dept']['type'];
                    $file_size=$_FILES['dept']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        $data['department_name']=$this->input->post('name');
                        $data['department_desc']=$this->input->post('description',FALSE);
                        $data['ext']=$ext;
                        $id=$this->db_model->insertDb($this->tableName,$data);
                        $this->common_model->uploadFile('dept','department',$id,$thumb='yes',$ext);
                        echo 'success';
                    }
                }
            
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function department_update($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Department Name', 'required',array('required' => 'You must provide a Department Name !'));			
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['dept']['name'];
                if($_FILES['dept']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                    if($data['image_name']===''){
                        echo 'Error ! Please Select an Image For Department !';
                    }
                } 
                $file_type=$_FILES['dept']['type'];
                $file_size=$_FILES['dept']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['department_name']=$this->input->post('name');
                    $data['department_desc']=$this->input->post('description',FALSE);
                    $data['ext']=$ext;
                    $this->db_model->updateById($this->tableName,$data,$id);
                    $this->common_model->uploadFile('dept','department',$id,$thumb='yes',$ext);
                    echo 'success';
                }
              
            
        }
    }
    public function delete_department($id){
        $this->db_model->deleteById($this->tableName,$id);
        echo 'success';    
    }
    public function updateStatus($id,$value){
        $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
        echo 'success';    
    }
    public function department_preview($id){
        $data['page_title']='Department View';
        $data['page_name']='dept_preview';
        $data['dept_details']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/dept/dept_preview',$data);
    }
}