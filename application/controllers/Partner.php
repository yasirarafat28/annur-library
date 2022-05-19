<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Partner extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->tableName='partner';
        $this->fieldName='status';
    }
    
    public function index(){
        if($this->common_model->is_logged()){
        $data['page_title']='Sister Concerns';
        $data['page_name']='partner_list';
        $data['partners']=$this->db_model->getTableData($this->tableName);
        $this->load->view('back/admin/partner/partner_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function partner_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='Sister Concern';
            $data['page_name']='partner_add';
            $this->load->view('back/admin/partner/partner_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function partner_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='Sister Concern Edit';
            $data['page_name']='partner_edit';
            $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
            $this->load->view('back/admin/partner/partner_edit',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function partner_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Sister Concern Name', 'required',array('required' => 'You must provide Sister Concern Name !'));
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                $data['image_name']=$_FILES['partner']['name'];
                if($_FILES['partner']['name'] ===''){
                    echo 'Error ! Please Select an Image For Sister Concern !';
                } else{
                    $file_type=$_FILES['partner']['type'];
                    $file_size=$_FILES['partner']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        //$title=$this->input->post('title');
                        //$this->db_model->updateByFieldName('basic_setup','partner_section_title',$title);
                        $data['partner_name']=$this->input->post('name');
                        $data['partner_desc']=$this->input->post('description',FALSE);
                        $data['link']=$this->input->post('link');
                        $data['ext']=$ext;
                        if(strip_tags($data['partner_desc'])!=''){
                            $id=$this->db_model->insertDb($this->tableName,$data);
                            $this->common_model->uploadFile('partner','partner',$id,$thumb='yes',$ext);
                            echo 'success'; 
                        } else {
                            echo "Please Provide Sister Concern Details !";
                        }
                    }
                }

            }
        } else {
            $this->load->view('back/login');
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function partner_update($id){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Sister Concern', 'required',array('required' => 'You must provide Sister Concern Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                $data['image_name']=$_FILES['partner']['name'];
                if($_FILES['partner']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                    if($data['image_name']===''){
                        echo 'Error ! Please Select an Image For Sister Concern !';
                    }
                } 
                $file_type=$_FILES['partner']['type'];
                $file_size=$_FILES['partner']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['partner_name']=$this->input->post('name');
                    $data['partner_desc']=$this->input->post('description',FALSE);
                    $data['link']=$this->input->post('link');
                    $data['ext']=$ext;
                    if(strip_tags($data['partner_desc'])!=''){
                        $this->db_model->updateById($this->tableName,$data,$id);
                        $this->common_model->uploadFile('partner','partner',$id,$thumb='yes',$ext);
                        echo 'success'; 
                    } else {
                        echo "Please Provide Sister Concern Details !";
                    }
                }   
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function delete_partner($id){
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
}