<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Author extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->tableName='author';
    }
    
    public function index(){
        if($this->common_model->is_logged()){
            $data['page_title']='Writer';
            $data['page_name']='writer_list';
            $data['authors']=$this->db_model->getTableData('author');
            $this->load->view('back/admin/author/author_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
	
    public function author_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='Author Add';
            $data['page_name']='author_add';
            $this->load->view('back/admin/author/author_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function author_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='Author Edit';
            $data['page_name']='author_edit';
            $data['edit_data']=$this->db_model->selectByID('author',$id);
            $this->load->view('back/admin/author/author_edit',$data);
        } else{
            $this->load->view('back/login');
        }
    }
    public function author_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('author_name', 'Author Name', 'required',array('required' => 'You must provide a Author Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            }
			else
			{
				
				$data['author_name']=$this->input->post('author_name');
				$data['profile']=$this->input->post('profile',FALSE);
				$data['active']=1;
				$id=$this->db_model->insertDb('author',$data);
				
				
				
				if(!empty($_FILES['author_image']))
				{
					$allowedTypes= array("jpg","jpeg","png");
					$ext = pathinfo($_FILES['author_image']['name'],PATHINFO_EXTENSION);
					if(!in_array($ext, $allowedTypes)){
					echo "Invalid formet/type !"; 
					} else {
					$data['photo']='uploads/author/author'.$id.'.'.$ext;
					$this->common_model->uploadFileTime('author_image','author','author'.$id.'.'.$ext);
					}
					
					$this->db_model->updateById($this->tableName,$data,$id);
				}
				echo 'success';
				

            }
        } else{
            $this->load->view('back/login');
        }
        //$this->load->view('back/admin/author_add',$data);
    }
    public function author_update($id){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('author_name', 'author Name', 'required',array('required' => 'You must provide a author Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                echo $data['image_name']=$_FILES['author']['name'];
                if($_FILES['author']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById('author',$id,'image_name');

                    if($data['image_name']===''){
                        echo 'Error ! Please Select an Image !';
                    }
                } 
                $file_type=$_FILES['author']['type'];
                $file_size=$_FILES['author']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['author_name']=$this->input->post('author_name');
                    $data['ext']=$ext;
                    //$this->db_model->updateById('author',$data,$id);
                    //$this->common_model->uploadFile('author','author',$id,$thumb='yes',$ext,150,150);
                    echo 'success';
                }   
            }
        } else{
            $this->load->view('back/login');
        }
    }
    public function delete_author($id){
        if($this->common_model->is_logged()){
            $this->db_model->deleteById('author',$id);
            echo 'success';  
        } else{
            $this->load->view('back/login');
        }
    }
    public function updateStatus($id,$value){
        if($this->common_model->is_logged()){
            $this->tableName='author';
            $this->fieldName='status';
            $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
            echo 'success';
        } else {
            $this->load->view('back/login');
        }
    }
}