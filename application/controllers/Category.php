<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller{
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
            $data['page_title']='Categories';
            $data['page_name']='category_list';
            $data['categorys']=$this->db_model->getTableData('category');
            $this->load->view('back/admin/category/category_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function category_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='category add';
            $data['page_name']='category_add';
			
            $this->db->select('*');
            $this->db->from('category');
            $this->db->where('parent_category_id=0');
			$query = $this->db->get(); 
			$data['paren_categories']= $query->result_array();
			
            $this->load->view('back/admin/category/category_add',$data);
        } else{
            $this->load->view('back/login');
        }
    }
    public function category_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='Category Edit';
            $data['page_name']='category_edit';
            $data['edit_data']=$this->db_model->selectByID('category',$id);
            $this->load->view('back/admin/category/category_edit',$data);
        } else {
            $this->load->view('back/admin');
        }
    }
    public function category_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category_name', 'Category Name', 'required',array('required' => 'You must provide Category Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{

                $data['category_name']=$this->input->post('category_name');
                $data['parent_category_id']=$this->input->post('category_id');
                $id=$this->db_model->insertDb('category',$data);
                echo 'success';
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function category_update($id){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category_name', 'Category Name', 'required',array('required' => 'You must provide Category Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                $data['category_name']=$this->input->post('category_name');
                $this->db_model->updateById('category',$data,$id);
                echo 'success';    
            }
        } else{
            $this->load->view('back/login');
        }
    }
    public function delete_category($id){
        if($this->common_model->is_logged()){
            $this->db_model->deleteById('category',$id);
            echo 'success';
        } else {
            $this->load->view('back/login');
        }
    }
    public function updateStatus($id,$value){
        if($this->common_model->is_logged()){
            $this->tableName='category';
            $this->fieldName='status';
            $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
            echo 'success';
        } else {
            $this->load->view('back/login');
        }
    }
}