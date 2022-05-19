<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='service';
        $this->fieldName='status';
    }
    
    public function index(){
        if($this->common_model->is_logged()){
            $data['page_title']='Service';
            $data['page_name']='service/service_list';
            $data['services']=$this->db_model->getTableData($this->tableName);
            $this->load->view('back/admin/service/service_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function service_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='Service Add';
            $data['page_name']='service_add';
            $this->load->view('back/admin/service/service_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function service_edit_form($id){
        if($this->common_model->is_logged()){
        $data['page_title']='Service Edit';
        $data['page_name']='service_edit';
        $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/service/service_edit',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function service_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Service Name', 'required',array('required' => 'You must provide a Service Name !'));
            $this->form_validation->set_rules('description', 'Service Description', 'required',array('required' => 'You must provide Service Description !'));
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                    $data['image_name']=$_FILES['service']['name'];
                    if($_FILES['service']['name'] ===''){
                        echo 'Error ! Please Select an Image For Service !';
                    } else{
                        $file_type=$_FILES['service']['type'];
                        $file_size=$_FILES['service']['size'];
                        $allowedTypes= array("jpeg","jpg","png");
                        $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                        if(!in_array($ext, $allowedTypes)){
                            echo "Image formet/type is not allowed !";
                        } else{
                            $data['service_name']=$this->input->post('name');
                            $data['service_desc']=$this->input->post('description',FALSE);
                            $data['ext']=$ext;
                            if(strip_tags($data['service_desc'])!=''){
                                $id=$this->db_model->insertDb($this->tableName,$data);
                                $this->common_model->uploadFile('service','service',$id,$thumb='yes',$ext);
                                echo 'success'; 
                            } else {
                                echo "Please Provide Service Details !";
                            }
                        }
                    }

            }
        } else {
            $this->load->view('back/login');
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function service_update($id){
            if($this->common_model->is_logged()){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Department Name', 'required',array('required' => 'You must provide a Department Name !'));			
                if ($this->form_validation->run() == FALSE)
                {
                    echo validation_errors();
                } else{
                        $data['image_name']=$_FILES['service']['name'];
                        if($_FILES['service']['name'] ===''){
                            $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                            if($data['image_name']===''){
                                echo 'Error ! Please Select an Image For Service !';
                            }
                        } 
                        $file_type=$_FILES['service']['type'];
                        $file_size=$_FILES['service']['size'];
                        $allowedTypes= array("jpeg","jpg","png");
                        $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                        if(!in_array($ext, $allowedTypes)){
                            echo "Image formet/type is not allowed !";
                        } else{
                            $data['service_name']=$this->input->post('name');
                            $data['service_desc']=$this->input->post('description',FALSE);
                            $data['ext']=$ext;
                            if(strip_tags($data['service_desc'])!=''){
                                $this->db_model->updateById($this->tableName,$data,$id);
                                $this->common_model->uploadFile('service','service',$id,$thumb='yes',$ext);
                                echo 'success';
                            } else{
                                echo "Please Provide Service Details !";
                            }

                        }


                }
            } else {
                $this->load->view('back/login');
            } 
    }
    public function delete_service($id){
        if($this->common_model->is_logged()){
            $this->db_model->deleteById($this->tableName,$id);
            echo 'success'; 
        } else {
            $this->load->view('back/login');
        }
    }
    public function updateStatus($id,$value){
        if($this->common_model->is_logged()){
            $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
            echo 'success';
        } else {
            $this->load->view('back/login');
        }
    }
    public function service_preview($id){
        if($this->common_model->is_logged()){
            $data['page_title']='Service View';
            $data['page_name']='service_preview';
            $data['service_details']=$this->db_model->selectByID($this->tableName,$id);
            $this->load->view('back/admin/service/service_preview',$data);
        } else {
            $this->load->view('back/login');
        }
    }
}