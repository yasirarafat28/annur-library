<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
    }
    
    public function index(){
        if($this->common_model->is_logged()){
        $data['page_title']='Slider';
        $data['page_name']='slider_list';
        $data['sliders']=$this->db_model->getTableData('slider');
        $this->load->view('back/admin/slider/slider_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function slider_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='slider add';
            $data['page_name']='slider_add';
            $this->load->view('back/admin/slider/slider_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function slider_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='Slider Edit';
            $data['page_name']='slider_edit';
            $data['edit_data']=$this->db_model->selectByID('slider',$id);
            $this->load->view('back/admin/slider/slider_edit',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function slider_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required',array('required' => 'You must provide a Title !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                $data['image_name']=$_FILES['slide']['name'];
                if($_FILES['slide']['name'] ===''){
                    echo 'Error ! Please Select an Image For Slider !';
                } else{
                    $file_type=$_FILES['slide']['type'];
                    $file_size=$_FILES['slide']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        $data['title']=$this->input->post('title');
                        $data['ext']=$ext;
                        $id=$this->db_model->insertDb('slider',$data);
                        $this->common_model->uploadFile('slide','slider',$id,$thumb='yes',$ext,1600,515);
                        echo 'success';
                    }
                }

            }
        } else {
            $this->load->view('back/login');
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function slider_update($id){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required',array('required' => 'You must provide a Title !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                    $data['image_name']=$_FILES['slide']['name'];
                    if($_FILES['slide']['name'] ===''){
                        $data['image_name']=$this->db_model->getFieldValueById('slider',$id,'image_name');
                        if($data['image_name']===''){
                            echo 'Error ! Please Select an Image For Slider !';
                        }
                    } 
                    $file_type=$_FILES['slide']['type'];
                    $file_size=$_FILES['slide']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        $data['title']=$this->input->post('title');
                        $data['ext']=$ext;
                        $this->db_model->updateById('slider',$data,$id);
                        $this->common_model->uploadFile('slide','slider',$id,$thumb='yes',$ext,1600,515);
                        echo 'success';
                    }


            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function delete_slider($id){
        if($this->common_model->is_logged()){
            $this->db_model->deleteById('slider',$id);
            echo 'success';
        } else {
            $this->load->view('back/login');
        }
    }
    public function updateStatus($id,$value){
        if($this->common_model->is_logged()){
            $this->tableName='slider';
            $this->fieldName='status';
            $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
            echo 'success';
        } else {
            $this->load->view('back/login');
        }
    }
}