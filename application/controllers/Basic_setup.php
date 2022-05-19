<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Basic_setup extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='basic_setup';
        $this->fieldName='status';
    }
    
    public function index(){
        //$data['page_title']='Department';
        //$data['page_name']='dept/dept_list';
        //$data['departments']=$this->db_model->getTableData($this->tableName);
        //$this->load->view('back/admin/dept/dept_list',$data);
    }
    
    public function joinUs(){
        if($this->common_model->is_logged()){
            $data['page_title']='Why Join Us & Benifits';
            $data['page_name']='chairman';
            $join_us=$this->db_model->jsonDataget($this->tableName,'join_us');
            $data['edit_data']=  json_decode($join_us,TRUE);
            //$data['basic_setup_id']=  1;
            $this->load->view('back/admin/basic_setup/join_us',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function joinUsAdd(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('join_name', 'Join US Section Title', 'required',array('required' => 'You must provide Join US Section title !'));
            $this->form_validation->set_rules('benefit_name', 'Benefit Section Title', 'required',array('required' => 'You must provide Benefit Section Title !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                $join_title=$this->input->post('join_name');
                $join_content=$this->input->post('description',FALSE);
                $join_status=$this->db_model->jsonDataGetByField($this->tableName,'join_us','join_status');
                $benefit_title=$this->input->post('benefit_name');
                $benefit_content=$this->input->post('description1',FALSE);
                $benefit_status=$this->db_model->jsonDataGetByField($this->tableName,'join_us','benefit_status');
                if(strip_tags($join_content)!=='' && strip_tags($benefit_content) !==''){
                    $newArray=array("join_title"=>$join_title,"join_content"=>$join_content,"join_status"=>$join_status,"benefit_title"=>$benefit_title,"benefit_content"=>$benefit_content,"benefit_status"=>$benefit_status);
                    $jsonEncodedData=  '['.json_encode($newArray).']';
                    $this->db_model->jsonDataUpdate($this->tableName,'join_us',$jsonEncodedData);
                    echo 'success';
                } else{
                }   
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function aboutUs(){
        if($this->common_model->is_logged()){
            $data['page_title']='About US';
            $data['page_name']='About Us';
            $jsonData=$this->db_model->jsonDataget($this->tableName,'about_us');
            $data['edit_data']=  json_decode($jsonData,TRUE);
            $this->load->view('back/admin/basic_setup/about_us',$data);
        } else{
            $this->load->view('back/login');
        }
    }
    public function about_us(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('about_name', 'About US Section Title', 'required',array('required' => 'You must provide About US Section title !'));		
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                $about_title=$this->input->post('about_name');
                $about_content=$this->input->post('description',FALSE);
                $mission_title=$this->input->post('mission_name');
                $mission_content=$this->input->post('description1',FALSE);
                $vision_title=$this->input->post('vision_name');
                $vision_content=$this->input->post('description2',FALSE);
                $newArray=array();
                if(strip_tags($about_content)!==''){
                    $newArray[]=array("about_title"=>$about_title,"about_content"=>$about_content,"mission_title"=>$mission_title,"mission_content"=>$mission_content,"vision_title"=>$vision_title,"vision_content"=>$vision_content);
                    $jsonEncodedData=  json_encode($newArray);
                    $this->db_model->jsonDataUpdate($this->tableName,'about_us',$jsonEncodedData);
                    echo 'success';
                } else{
                    echo "Please Provide About Content !";
                }   

            }
        } else {
            $this->load->view('back/login');
        }
    }
    
    public function sol(){
        if($this->common_model->is_logged()){
        $data['page_title']='SOLUTIONS';
        $data['page_name']='SOLUTIONS';
        $jsonData=$this->db_model->jsonDataget($this->tableName,'sol');
        $data['edit_data']=  json_decode($jsonData,TRUE);
        $this->load->view('back/admin/basic_setup/solutions',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function sol_add(){
        if($this->common_model->is_logged()){
            $sols   = array();
            $sec_title   = $this->input->post('ques');
            $desc    = $this->input->post('description',FALSE);
            if(!empty($sec_title)){
                foreach ($sec_title as $i => $r) {
                    $sols[] = array(
                        'sec_title' =>$sec_title[$i],
                        'desc' =>$desc[$i]
                    );
                }
            } else {
               echo "Please Put question and answer !"; 
            }
            if(!empty($sols)){
                 $jsonEncodedData=  json_encode($sols);
                 $this->db_model->jsonDataUpdate($this->tableName,'sol',$jsonEncodedData);
                 echo 'success';
            } else{
                echo "Provide appropriate Question or Answer !";
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function service(){
        if($this->common_model->is_logged()){
        $data['page_title']='SERVICES';
        $data['page_name']='service';
        $jsonData=$this->db_model->jsonDataget($this->tableName,'service');
        $data['edit_data']=  json_decode($jsonData,TRUE);
        $this->load->view('back/admin/basic_setup/service',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function service_add(){
        if($this->common_model->is_logged()){
            $services   = array();
            $sec_title   = $this->input->post('ques');
            $desc    = $this->input->post('description',FALSE);
            if(!empty($sec_title)){
                foreach ($sec_title as $i => $r) {
                    $services[] = array(
                        'sec_title' =>$sec_title[$i],
                        'desc' =>$desc[$i]
                    );
                }
            } else {
               echo "Please Put Section title and Desvcription !"; 
            }
            if(!empty($services)){
                 $jsonEncodedData=  json_encode($services);
                 $this->db_model->jsonDataUpdate($this->tableName,'service',$jsonEncodedData);
                 echo 'success';
            } else{
                echo "Provide appropriate Section title or Desvcription !";
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function ad_background(){
        if($this->common_model->is_logged()){
        $data['page_title']='Ads Background';
        $data['page_name']='admin/basic_setup/ads_background';	
        $data['edit_data']=$this->db_model->selectByID('background',1);
        $this->load->view('back/admin/basic_setup/ads_background',$data);
        } else {
            $this->load->view('back/login');
        }
    }
	
    public function ads_background_update(){
        if($this->common_model->is_logged()){
            $data['image_name']=$_FILES['ads_background']['name'];
            if($_FILES['ads_background']['name'] ===''){
                $data['image_name']=$this->db_model->getFieldValueById('background',1,'image_name');
                if($data['image_name']===''){
                    echo 'Error ! Please Select an Image For About Us Background !';
                }
            } 
            $file_type=$_FILES['ads_background']['type'];
            $file_size=$_FILES['ads_background']['size'];
            $allowedTypes= array("jpeg","jpg","png");
            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
            if(!in_array($ext, $allowedTypes)){
                echo "Image formet/type is not allowed !";
            } else{
                $data['ext']=$ext;
                $this->db_model->updateById('background',$data,1);
                $this->common_model->uploadFile('ads_background','background',1,$thumb='no',$ext,1600,400);
                echo 'success';
            }
        } else {
            $this->load->view('back/login');
        }
    }
}