<?php defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='news';
        $this->fieldName='status';
    }
    
    public function index(){
        if($this->common_model->is_logged()){
            $data['page_title']='news';
            $data['page_name']='news/news_list';
            $data['newss']=$this->db_model->getTableData($this->tableName);
            $this->load->view('back/admin/news/news_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function news_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='news Add';
            $data['page_name']='news_add';
            $this->load->view('back/admin/news/news_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function news_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='news Edit';
            $data['page_name']='news_edit';
            $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
            $this->load->view('back/admin/news/news_edit',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function news_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'News Title', 'required',array('required' => 'You must provide a Title !'));
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                    $data['image_name']=$_FILES['news']['name'];
                    if($_FILES['news']['name'] ===''){
                        echo 'Error ! Please Select News Image !';
                    } else{
                        $file_type=$_FILES['news']['type'];
                        $file_size=$_FILES['news']['size'];
                        $allowedTypes= array("jpeg","jpg","png");
                        $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                        if(!in_array($ext, $allowedTypes)){
                            echo "Image formet/type is not allowed !";
                        } else{
                            $data['news_name']=$this->input->post('name');
                            $data['news_desc']=$this->input->post('description',FALSE);
                            $data['upload_time']=time();
                            $data['ext']=$ext;
                            if(strip_tags($data['news_desc'])!=''){
                                $id=$this->db_model->insertDb($this->tableName,$data);
                                $this->common_model->uploadFile('news','news',$id,$thumb='yes',$ext);
                                echo 'success'; 
                            } else {
                                echo "There is an Error ! Either Type or Details is missing";
                            }
                        }
                    }

            }
        } else {
            $this->load->view('back/login');
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function news_update($id){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'News Title', 'required',array('required' => 'You must provide a Title !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                    $data['image_name']=$_FILES['news']['name'];
                    if($_FILES['news']['name'] ===''){
                        $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                        if($data['image_name']===''){
                            echo 'Error ! Please Select News Image !';
                        }
                    } 
                    $file_type=$_FILES['news']['type'];
                    $file_size=$_FILES['news']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        $data['news_name']=$this->input->post('name');
                        $data['news_desc']=$this->input->post('description',FALSE);
                        $data['ext']=$ext;
                        if(strip_tags($data['news_desc'])!=''){
                            $this->db_model->updateById($this->tableName,$data,$id);
                            $this->common_model->uploadFile('news','news',$id,$thumb='yes',$ext);
                            echo 'success';
                        } else{
                            echo "There is an Error ! Either Type or Details is missing";
                        }

                    }     
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function delete_news($id){
        if($this->common_model->is_logged()){
        $this->db_model->deleteById($this->tableName,$id);
        echo 'success';
        } else{
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
    public function news_preview($id){
        if($this->common_model->is_logged()){
        $data['page_title']='news View';
        $data['page_name']='news_preview';
        $data['news_details']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/news/news_preview',$data);
        } else {
            $this->load->view('back/login');
        }
    }
}