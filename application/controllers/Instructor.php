<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Instructor extends CI_Controller{
    //public $data=array();
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='instructor';
        $this->fieldName='status';
    }
    
    public function index(){
        $data['page_title']='Instructor';
        $data['page_name']='instructor/instructor_list';
        $data['instructors']=$this->db_model->getTableData($this->tableName);
        $this->load->view('back/admin/instructor/instructor_list',$data);
    }
    public function instructor_form(){
        $data['page_title']='Insructor Add';
        $data['page_name']='instructor_add';
        $this->load->view('back/admin/instructor/instructor_add',$data);
    }
    public function instructor_edit_form($id){
        $data['page_title'] ='Insturctor Edit';
        $data['page_name']  ='instructor_edit';
        $data['edit_data']  =$this->db_model->selectByID($this->tableName,$id);
        foreach($data['edit_data'] as $row){
            $data['edus']   =  json_decode($row['edu_back'],TRUE);
            $data['exps']   =  json_decode($row['job_exp'],TRUE);
            $data['trains'] =  json_decode($row['certification'],TRUE);
        }
        $this->load->view('back/admin/instructor/instructor_edit',$data);
    }
    public function instructor_add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Insturctor Name', 'required',array('required' => 'You must provide  Insturctor Name !'));
        $this->form_validation->set_rules('designation', 'Designation', 'required',array('required' => 'You must provide a Designation !'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',array('required' => 'You must provide a valid email !'));
        $this->form_validation->set_rules('phone', 'Phone No', 'required',array('required' => 'You must provide a valid Phone No !'));
        $this->form_validation->set_rules('address', 'Address', 'required',array('required' => 'You must provide a valid Address !'));
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['instructor']['name'];
                if($_FILES['instructor']['name'] ===''){
                    echo 'Error ! Please Select an Image of Instuctor !';
                } else{
                    $file_type=$_FILES['instructor']['type'];
                    $file_size=$_FILES['instructor']['size'];
                    $allowedTypes= array("jpeg","jpg","png");
                    $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                    if(!in_array($ext, $allowedTypes)){
                        echo "Image formet/type is not allowed !";
                    } else{
                        $data['instructor_name']=$this->input->post('name');
                        $data['designation']=$this->input->post('designation');
                        $data['email']=$this->input->post('email');
                        $data['phone']=$this->input->post('phone');
                        $data['address']=$this->input->post('address');
                        $data['fb']=$this->input->post('fb');
                        $data['twiiter']=$this->input->post('twitter');
                        $data['google']=$this->input->post('google');
                        $data['linkedin']=$this->input->post('linkedin');
                        
                        $edus = array();
                        $inst_name  = $this->input->post('inst_name');
                        $start_time  = $this->input->post('start_time');
                        $end_time  = $this->input->post('end_time');
                        $deg  = $this->input->post('deg');
                        $grade  = $this->input->post('grade');
                        $description  = $this->input->post('description');
                        foreach ($inst_name as $i => $r) {
                            $edus[] = array(
                                'institue' => $inst_name[$i],
                                'start_time' => $start_time[$i],
                                'end_time'=>$end_time[$i],
                                'degree'=>$deg[$i],
                                'grade'=>$grade[$i],
                                'description'=>$description[$i]
                            );
                        }
                        $data['edu_back']=  json_encode($edus);
                        
                        $exps = array();
                        $company_name  = $this->input->post('company_name');
                        $e_start_time  = $this->input->post('e_start_time');
                        $e_end_time  = $this->input->post('e_end_time');
                        $designation  = $this->input->post('desg');
                        $location  = $this->input->post('location');
                        $exp_description  = $this->input->post('exp_description');
                        foreach ($company_name as $i => $r) {
                            $exps[] = array(
                                'company_name' => $company_name[$i],
                                'exp_start_time' => $e_start_time[$i],
                                'exp_end_time'=>$e_end_time[$i],
                                'designation'=>$designation[$i],
                                'location'=>$location[$i],
                                'exp_description'=>$exp_description[$i]
                            );
                        }
                        $data['job_exp']=  json_encode($exps);
                        
                        $cers = array();
                        $org_name  = $this->input->post('org_name');
                        $t_start_time  = $this->input->post('t_start_time');
                        $t_end_time  = $this->input->post('t_end_time');
                        $course_name  = $this->input->post('course_name');
                        $org_location  = $this->input->post('org_location');
                        $t_description  = $this->input->post('t_description');
                        foreach ($org_name as $i => $r) {
                            $cers[] = array(
                                'org_name' => $org_name[$i],
                                'train_start_time' => $t_start_time[$i],
                                'train_end_time'=>$t_end_time[$i],
                                'course_name'=>$course_name[$i],
                                'org_location'=>$org_location[$i],
                                'train_description'=>$t_description[$i]
                            );
                        }
                        $data['certification']=  json_encode($cers);
                        
                        $data['ext']=$ext;
                        if($data['address']!=''){
                            $id=$this->db_model->insertDb($this->tableName,$data);
                            $this->common_model->uploadFile('instructor','instructor',$id,$thumb='yes',$ext);
                           echo 'success'; 
                        } else {
                            echo "Please Provide Address !";
                        }
                    }
                }
            
        }
        
    }
    public function instructor_update($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Insturctor Name', 'required',array('required' => 'You must provide  Insturctor Name !'));
        $this->form_validation->set_rules('designation', 'Designation', 'required',array('required' => 'You must provide a Designation !'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',array('required' => 'You must provide a valid email !'));
        $this->form_validation->set_rules('phone', 'Phone No', 'required',array('required' => 'You must provide a valid Phone No !'));
        $this->form_validation->set_rules('address', 'Address', 'required',array('required' => 'You must provide a valid Address !'));
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
                $data['image_name']=$_FILES['instructor']['name'];
                if($_FILES['instructor']['name'] ===''){
                    $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');
                    if($data['image_name']===''){
                        echo 'Error ! Please Select Instructor !';
                    }
                } 
                $file_type=$_FILES['instructor']['type'];
                $file_size=$_FILES['instructor']['size'];
                $allowedTypes= array("jpeg","jpg","png");
                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);
                if(!in_array($ext, $allowedTypes)){
                    echo "Image formet/type is not allowed !";
                } else{
                    $data['instructor_name']=$this->input->post('name');
                    $data['designation']=$this->input->post('designation');
                    $data['email']=$this->input->post('email');
                    $data['phone']=$this->input->post('phone');
                    $data['address']=$this->input->post('address');
                    $data['fb']=$this->input->post('fb');
                    $data['twiiter']=$this->input->post('twitter');
                    $data['google']=$this->input->post('google');
                    $data['linkedin']=$this->input->post('linkedin');

                    $edus = array();
                    $inst_name  = $this->input->post('inst_name');
                    $start_time  = $this->input->post('start_time');
                    $end_time  = $this->input->post('end_time');
                    $deg  = $this->input->post('deg');
                    $grade  = $this->input->post('grade');
                    $description  = $this->input->post('description');
                    foreach ($inst_name as $i => $r) {
                        $edus[] = array(
                            'institue' => $inst_name[$i],
                            'start_time' => $start_time[$i],
                            'end_time'=>$end_time[$i],
                            'degree'=>$deg[$i],
                            'grade'=>$grade[$i],
                            'description'=>$description[$i]
                        );
                    }
                    $data['edu_back']=  json_encode($edus);

                    $exps = array();
                    $company_name  = $this->input->post('company_name');
                    $e_start_time  = $this->input->post('e_start_time');
                    $e_end_time  = $this->input->post('e_end_time');
                    $designation  = $this->input->post('desg');
                    $location  = $this->input->post('location');
                    $exp_description  = $this->input->post('exp_description');
                    foreach ($company_name as $i => $r) {
                        $exps[] = array(
                            'company_name' => $company_name[$i],
                            'exp_start_time' => $e_start_time[$i],
                            'exp_end_time'=>$e_end_time[$i],
                            'designation'=>$designation[$i],
                            'location'=>$location[$i],
                            'exp_description'=>$exp_description[$i]
                        );
                    }
                    $data['job_exp']=  json_encode($exps);

                    $cers = array();
                    $org_name  = $this->input->post('org_name');
                    $t_start_time  = $this->input->post('t_start_time');
                    $t_end_time  = $this->input->post('t_end_time');
                    $course_name  = $this->input->post('course_name');
                    $org_location  = $this->input->post('org_location');
                    $t_description  = $this->input->post('t_description');
                    foreach ($org_name as $i => $r) {
                        $cers[] = array(
                            'org_name' => $org_name[$i],
                            'train_start_time' => $t_start_time[$i],
                            'train_end_time'=>$t_end_time[$i],
                            'course_name'=>$course_name[$i],
                            'org_location'=>$org_location[$i],
                            'train_description'=>$t_description[$i]
                        );
                    }
                    $data['certification']=  json_encode($cers);

                    $data['ext']=$ext;
                    if($data['address']!=''){
                        $this->db_model->updateById($this->tableName,$data,$id);
                        $this->common_model->uploadFile('instructor','instructor',$id,$thumb='yes',$ext);
                        echo 'success';
                    } else{
                        echo "Please Provide Address  !";
                    }
                    
                }
              
            
        }
    }
    public function delete_instructor($id){
        $this->db_model->deleteById($this->tableName,$id);
        echo 'success';    
    }
    public function updateStatus($id,$value){
        $this->db_model->updateFieldById($this->tableName,$this->fieldName,$id,$value);
        echo 'success';    
    }
    public function instructor_preview($id){
        $data['page_title']='Service View';
        $data['page_name']='instructor_preview';
        $data['instructor_details']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/instructor/instructor_preview',$data);
    }
}