<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='gallery';
        $this->fieldName='status';
    }
    
    public function index(){
        $data['page_title']='gallery';
        $data['page_name']='gallery/gallery_list';
        $data['gallerys']=$this->db_model->getTableData($this->tableName);
        $this->load->view('back/admin/gallery/gallery_list',$data);
    }
    public function gallery_form(){
        $data['page_title']='gallery Add';
        $data['page_name']='gallery_add';
        $this->load->view('back/admin/gallery/gallery_add',$data);
    }
    public function gallery_edit_form($id){
        $data['page_title']='gallery Edit';
        $data['page_name']='gallery_edit';
        $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/gallery/gallery_edit',$data);
    }
    public function gallery_add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Gallery Name', 'required',array('required' => 'You must provide a gallery Name !'));
        $this->form_validation->set_rules('description', 'Gallery Description', 'required',array('required' => 'You must provide gallery Description !'));
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
            $data['image_name']=$_FILES['gallery']['name'];
            if($_FILES['gallery']['name'] ===''){
                echo 'Error ! Please Select an Image For Gallery !';
            } else{
                $file_type=$_FILES['gallery']['type'];
                $file_size=$_FILES['gallery']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['gallery_name']=$this->input->post('name');
                    $data['gallery_desc']=$this->input->post('description',FALSE);
                    $data['ext']=$ext;
                    if(strip_tags($data['gallery_desc'])!=''){
                        $id=$this->db_model->insertDb($this->tableName,$data);
                        $this->common_model->uploadFile('gallery','gallery',$id,$thumb='yes',$ext);
                        echo 'success'; 
                    } else {
                        echo "Please Provide Gallery Details !";
                    }
                }
            }
        }
        //$this->load->view('back/admin/slider_add',$data);
    }
    public function gallery_update($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Department Name', 'required',array('required' => 'You must provide a Department Name !'));			
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
            $data['image_name']=$_FILES['gallery']['name'];
            if($_FILES['gallery']['name'] ===''){
                $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                if($data['image_name']===''){
                    echo 'Error ! Please Select an Image For Gallery !';
                }
            } 
            $file_type=$_FILES['gallery']['type'];
            $file_size=$_FILES['gallery']['size'];
            $allowedTypes= array("jpeg","jpg","png");
            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
            if(!in_array($ext, $allowedTypes)){
                echo "Image formet/type is not allowed !";
            } else{
                $data['gallery_name']=$this->input->post('name');
                $data['gallery_desc']=$this->input->post('description',FALSE);
                $data['ext']=$ext;
                if(strip_tags($data['gallery_desc'])!=''){
                    $this->db_model->updateById($this->tableName,$data,$id);
                    $this->common_model->uploadFile('gallery','gallery',$id,$thumb='yes',$ext);
                    echo 'success';
                } else{
                    echo "Please Provide Gallery Details !";
                }

            }  
        }
    }
    public function delete_gallery($id){
        $this->db_model->deleteById($this->tableName,$id);
        echo 'success';    
    }
    public function updateStatus($id,$value){
        $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
        echo 'success';    
    }
}