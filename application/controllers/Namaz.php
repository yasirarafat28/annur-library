<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Namaz extends CI_Controller{
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='post';
        
    }
    public $j=0;
    public function index(){
        if($this->common_model->is_logged()){
            $data['page_title']='Namaz Schedule';
            $data['page_name']='post_list'; 
			$data['namazs']=$this->db_model->getTableData('namaz');
            
            $this->load->view('back/admin/namaz/namaz_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
	
    public function namaz_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='Namaz add';
            $data['page_name']='namaz_add';
            $this->load->view('back/admin/post/namaz_add',$data);
        } else{
            $this->load->view('back/login');
        }
    }
    public function namaz_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('namaz_name', 'namaz Name', 'required',array('required' => 'You must provide namaz Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{

                $data['name']=$this->input->post('namaz_name');
                $data['post_type']=$this->input->post('type');
                $id=$this->db_model->insertDb('post_namaz',$data);
                echo 'success';
            }
        } else {
            $this->load->view('back/login');
        }
    }
	
    public function post_namaz(){
        if($this->common_model->is_logged()){
            $data['page_title']='Categories';
            $data['page_name']='namaz_list';
            $data['namazs']=$this->db_model->getTableData('post_namaz');
            $this->load->view('back/admin/post/namaz_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
}