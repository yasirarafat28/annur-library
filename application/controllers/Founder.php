<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Founder extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='founder';
        $this->fieldName='status';
    }
    
    public function index(){
        $data['page_title']='Founder/Advisors/Board of Directors';
        $data['page_name']='founder/founder_list';
        $data['founders']=$this->db_model->getTableData($this->tableName);
        $this->load->view('back/admin/founder/founder_list',$data);
    }
    public function founder_form(){
        $data['page_title']='Founder/Advisors/Board of Directors Add';
        $data['page_name']='founder_add';
        $this->load->view('back/admin/founder/founder_add',$data);
    }
    public function founder_edit_form($id){
        $data['page_title']='Founder/Advisors/Board of Directors Edit';
        $data['page_name']='Founder/Advisors/Board of Directors';
        $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/founder/founder_edit',$data);
    }
    public function founder_add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required',array('required' => 'You must provide a Name !'));
        $this->form_validation->set_rules('title', 'Role', 'required',array('required' => 'You must provide Role !'));
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['founder']['name'];
                if($_FILES['founder']['name'] ===''){
                    echo 'Error ! Please Select an Image For Founder !';
                } else{
                    $file_type=$_FILES['founder']['type'];
                    $file_size=$_FILES['founder']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        $data['founder_name']=$this->input->post('name');
                        $data['founder_desc']=$this->input->post('description',FALSE);
                        $data['title']=$this->input->post('title');
                        $data['ext']=$ext;
                        if(strip_tags($data['founder_desc'])!=''){
                            $id=$this->db_model->insertDb($this->tableName,$data);
                            $this->common_model->uploadFile('founder','founder',$id,$thumb='yes',$ext);
                            echo 'success'; 
                        } else {
                            echo "Please Provide Description of Founder !";
                        }
                    }
                }
            
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function founder_update($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required',array('required' => 'You must provide a Name !'));
        $this->form_validation->set_rules('title', 'Role', 'required',array('required' => 'You must provide Role !'));			
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['founder']['name'];
                if($_FILES['founder']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                    if($data['image_name']===''){
                        echo 'Error ! Please Select an Image For Founder !';
                    }
                } 
                $file_type=$_FILES['founder']['type'];
                $file_size=$_FILES['founder']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['founder_name']=$this->input->post('name');
                    $data['founder_desc']=$this->input->post('description',FALSE);
                    $data['title']=$this->input->post('title');
                    $data['ext']=$ext;
                    if(strip_tags($data['founder_desc'])!=''){
                        $this->db_model->updateById($this->tableName,$data,$id);
                        $this->common_model->uploadFile('founder','founder',$id,$thumb='yes',$ext);
                        echo 'success';
                    } else{
                        echo "Please Provide Founder Details !";
                    }
                    
                }
              
            
        }
    }
    public function delete_founder($id){
        $this->db_model->deleteById($this->tableName,$id);
        echo 'success';    
    }
    public function updateStatus($id,$value){
        $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
        echo 'success';    
    }
    public function founder_preview($id){
        $data['page_title']='Service View';
        $data['page_name']='founder_preview';
        $data['founder_details']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/founder/founder_preview',$data);
    }
}