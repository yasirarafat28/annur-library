<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Publisher extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->tableName='publisher';
        $this->fieldName='status';
    }
    
    public function index(){
        if($this->common_model->is_logged()){
        $data['page_title']='Publisher';
        $data['page_name']='publisher_list';
        $data['publishers']=$this->db_model->getTableData($this->tableName);
        $this->load->view('back/admin/publisher/publisher_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function publisher_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='Publisher';
            $data['page_name']='publisher_add';
            $this->load->view('back/admin/publisher/publisher_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function publisher_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='Publisher Edit';
            $data['page_name']='publisher_edit';
            $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
            $this->load->view('back/admin/publisher/publisher_edit',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function publisher_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Publisher Name', 'required',array('required' => 'You must provide Publisher Name !'));
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }			
			else
			{	
				$data['publisher_name']=$this->input->post('name');				
				$data['publisher_address']=$this->input->post('address');				
				$data['publisher_overview']=$this->input->post('description',FALSE); 								
				$id=$this->db_model->insertDb($this->tableName,$data);	
				
				if(!empty($_FILES['publisher_image']))
				{
					$allowedTypes= array("jpg","jpeg","png");
					$ext = pathinfo($_FILES['publisher_image']['name'],PATHINFO_EXTENSION);
					if(!in_array($ext, $allowedTypes)){
					echo "Invalid formet/type !"; 
					} else {
					$data['photo']='uploads/publisher/publisher'.$id.'.'.$ext;
					$this->common_model->uploadFileTime('publisher_image','publisher','publisher'.$id.'.'.$ext);
					}
					
					$this->db_model->updateById($this->tableName,$data,$id);
				}



               
				$data['publisher_image']=$_FILES['publisher_image']['name']; 				
				echo 'success'; 				
            }
			
        } else {
            $this->load->view('back/login');
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function publisher_update($id){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Sister Concern', 'required',array('required' => 'You must provide Sister Concern Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                $data['image_name']=$_FILES['publisher']['name'];
                if($_FILES['publisher']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                    if($data['image_name']===''){
                        echo 'Error ! Please Select an Image For Sister Concern !';
                    }
                } 
                $file_type=$_FILES['publisher']['type'];
                $file_size=$_FILES['publisher']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['publisher_name']=$this->input->post('name');
                    $data['publisher_desc']=$this->input->post('description',FALSE);
                    $data['link']=$this->input->post('link');
                    $data['ext']=$ext;
                    if(strip_tags($data['publisher_desc'])!=''){
                        $this->db_model->updateById($this->tableName,$data,$id);
                        $this->common_model->uploadFile('publisher','publisher',$id,$thumb='yes',$ext);
                        echo 'success'; 
                    } else {
                        echo "Please Provide Publisher Details !";
                    }
                }   
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function delete_publisher($id){
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