<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reader extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->tableName='reader';
    }
    
    public function index(){
        if($this->common_model->is_logged()){
            $data['page_title']='Readers';
            $data['page_name']='reader_list';
            $data['readers']=$this->db_model->getTableData('reader');
            $this->load->view('back/admin/reader/reader_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
	
    public function reader_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='Reader Add';
            $data['page_name']='reader_add';
            $this->load->view('back/admin/reader/reader_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function reader_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='reader Edit';
            $data['page_name']='reader_edit';
            $data['edit_data']=$this->db_model->selectByID('reader',$id);
            $this->load->view('back/admin/reader/reader_edit',$data);
        } else{
            $this->load->view('back/login');
        }
    }
    public function reader_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Reader Name', 'required',array('required' => 'You must provide a Reader Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
			else
			{
				if(!empty($_FILES['reader_image']))
				{
					$data['reader_image']=$_FILES['reader_image']['name'];
				}
				else
				{
					$data['reader_image']='';
				}
				$data['reader_name']=$this->input->post('name');
				$data['reader_email']=$this->input->post('email');
				$data['reader_phone']=$this->input->post('phone');
				$data['reader_address']=$this->input->post('address');
				$data['reader_password']=$this->input->post('password');
				$data['registration_date']=date("m/d/y");
				$this->db_model->insertDb('reader',$data);
				echo 'success';
				

            }
        } else{
            $this->load->view('back/login');
        }
        //$this->load->view('back/admin/reader_add',$data);
    }
    public function reader_update($id){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('reader_name', 'reader Name', 'required',array('required' => 'You must provide a reader Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                echo $data['image_name']=$_FILES['reader']['name'];
                if($_FILES['reader']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById('reader',$id,'image_name');

                    if($data['image_name']===''){
                        echo 'Error ! Please Select an Image !';
                    }
                } 
                $file_type=$_FILES['reader']['type'];
                $file_size=$_FILES['reader']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['reader_name']=$this->input->post('reader_name');
                    $data['ext']=$ext;
                    //$this->db_model->updateById('reader',$data,$id);
                    //$this->common_model->uploadFile('reader','reader',$id,$thumb='yes',$ext,150,150);
                    echo 'success';
                }   
            }
        } else{
            $this->load->view('back/login');
        }
    }
    public function delete_reader($id){
        if($this->common_model->is_logged()){
            $this->db_model->deleteById('reader',$id);
            echo 'success';  
        } else{
            $this->load->view('back/login');
        }
    }
    public function updateStatus($id,$value){
        if($this->common_model->is_logged()){
            $this->tableName='reader';
            $this->fieldName='status';
            $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
            echo 'success';
        } else {
            $this->load->view('back/login');
        }
    }
}