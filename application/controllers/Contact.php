<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='contact';
        $this->fieldName='status';
    }
    
    public function index(){
        if($this->common_model->is_logged()){
            $data['page_title']='CONTACT';
            $data['page_name']='contact/contact_list';
            $data['contacts']=$this->db_model->getTableData($this->tableName);
            $this->load->view('back/admin/contact/contact_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function delete_contact($id){
        if($this->common_model->is_logged()){
            $this->db_model->deleteDataById($this->tableName,$id);
            echo 'success'; 
        } else {
            $this->load->view('back/login');
        }
    }
    public function contact_preview($id){
        if($this->common_model->is_logged()){
            $data['page_title']='Meassage View';
            $data['page_name']='service_preview';
            $data['contact_details']=$this->db_model->selectByID($this->tableName,$id);
            $this->load->view('back/admin/contact/contact_preview',$data);
        } else {
            $this->load->view('back/login');
        }
    }
}