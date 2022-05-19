<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Manage_content extends CI_Controller{
	
    private $tableName;
    private $fieldName;
    function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->tableName='content';
    }

    

    public function index(){

        /*if($this->common_model->is_logged()){

            $data['page_title']='About US';

            $data['page_name']='About Us'; 
			$data['edit_data']=$this->db_model->selectBySlug('content','about_us');

            //$jsonData=$this->db_model->jsonDataget($this->tableName,'about_us');

            //$data['edit_data']=  json_decode($jsonData,TRUE);

            $this->load->view('back/admin/manage_content/about_us',$data);

        } else{

            $this->load->view('back/login');

        }*/

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
    public function about_us(){
        if($this->common_model->is_logged()){
            $data['page_title']='About US';

            $data['page_name']='About Us'; 
			$data['edit_data']=$this->db_model->selectBySlug('content','about_us');

            $this->load->view('back/admin/manage_content/about_us',$data);

        } else{

            $this->load->view('back/login');

        }

    }

    public function update_about_us(){

        if($this->common_model->is_logged()){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('about_name', 'About US Section Title', 'required',array('required' => 'You must provide About US Section title !'));		

            if ($this->form_validation->run() == FALSE)

            {

                echo validation_errors();

            } else{

				$data['title']=$this->input->post('about_name');
                $data['description']=$this->input->post('description',FALSE);
				
				$this->db_model->updateBySlug('content',$data,'about_us');

				echo 'success'; 



            }

        } else {

            $this->load->view('back/login');

        }

    }

    

    public function faq(){
        if($this->common_model->is_logged()){
            $data['page_title']='Frequently Asked Question';

            $data['page_name']='About Us'; 
			$data['edit_data']=$this->db_model->selectBySlug('content','faq');

            $this->load->view('back/admin/manage_content/faq',$data);

        } else{

            $this->load->view('back/login');

        }

    }

    public function update_faq(){

        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('faq_name', 'About US Section Title', 'required',array('required' => 'You must provide FAQ title !'));		

            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
				$data['title']=$this->input->post('faq_name');
                $data['description']=$this->input->post('description',FALSE);
				$this->db_model->updateBySlug('content',$data,'faq');
				echo 'success'; 
            }
        } else {
            $this->load->view('back/login');
        }

    }
	
    public function about_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='ABOUT BACKGROUND';

        $data['page_name']='admin/basic_setup/about_back';

        $data['edit_data']=$this->db_model->selectByID('background',1);

        $this->load->view('back/admin/basic_setup/about_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function about_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['about_back']['name'];

            if($_FILES['about_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',1,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select an Image For About Us Background !';

                }

            } 

            $file_type=$_FILES['about_back']['type'];

            $file_size=$_FILES['about_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,1);

                $this->common_model->uploadFile('about_back','background',1,$thumb='no',$ext,1600,400);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function solution_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='SOLUTION BACKGROUND';

        $data['page_name']='admin/basic_setup/solution_back';

        $data['edit_data']=$this->db_model->selectByID('background',2);

        $this->load->view('back/admin/basic_setup/solution_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function solution_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['solution_back']['name'];

            if($_FILES['solution_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',2,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select an Image For Solution Background !';

                }

            } 

            $file_type=$_FILES['solution_back']['type'];

            $file_size=$_FILES['solution_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,2);

                $this->common_model->uploadFile('solution_back','background',2,$thumb='no',$ext,1600,400);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function service_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='SERVICE BACKGROUND';

        $data['page_name']='admin/basic_setup/service_back';

        $data['edit_data']=$this->db_model->selectByID('background',3);

        $this->load->view('back/admin/basic_setup/service_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function service_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['service_back']['name'];

            if($_FILES['service_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',3,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select an Image For Service Background !';

                }

            } 

            $file_type=$_FILES['service_back']['type'];

            $file_size=$_FILES['service_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,3);

                $this->common_model->uploadFile('service_back','background',3,$thumb='no',$ext,1600,400);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function copier_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='COPIER/RENTALS BACKGROUND';

        $data['page_name']='admin/basic_setup/copier_back';

        $data['edit_data']=$this->db_model->selectByID('background',4);

        $this->load->view('back/admin/basic_setup/copier_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function copier_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['copier_back']['name'];

            if($_FILES['copier_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',4,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select an Image For Service Background !';

                }

            } 

            $file_type=$_FILES['copier_back']['type'];

            $file_size=$_FILES['copier_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,4);

                $this->common_model->uploadFile('copier_back','background',4,$thumb='no',$ext,1600,400);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function career_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='CAREER BACKGROUND';

        $data['page_name']='admin/basic_setup/copier_back';

        $data['edit_data']=$this->db_model->selectByID('background',5);

        $this->load->view('back/admin/basic_setup/career_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function career_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['career_back']['name'];

            if($_FILES['career_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',5,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select an Image For Service Background !';

                }

            } 

            $file_type=$_FILES['career_back']['type'];

            $file_size=$_FILES['career_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,5);

                $this->common_model->uploadFile('career_back','background',5,$thumb='no',$ext,1600,400);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function contact_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='CONTACT BACKGROUND';

        $data['page_name']='admin/basic_setup/contact_back';

        $data['edit_data']=$this->db_model->selectByID('background',6);

        $this->load->view('back/admin/basic_setup/contact_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function contact_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['contact_back']['name'];

            if($_FILES['contact_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',6,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select an Image For Service Background !';

                }

            } 

            $file_type=$_FILES['contact_back']['type'];

            $file_size=$_FILES['contact_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,6);

                $this->common_model->uploadFile('contact_back','background',6,$thumb='no',$ext,1600,400);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu1_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='MENU IMAGE FOR COPIER';

        $data['page_name']='admin/basic_setup/contact_back';

        $data['edit_data']=$this->db_model->selectByID('background',7);

        $this->load->view('back/admin/basic_setup/menu1_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu1_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['menu1_back']['name'];

            if($_FILES['menu1_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',7,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select a Menu Image For Copier !';

                }

            } 

            $file_type=$_FILES['menu1_back']['type'];

            $file_size=$_FILES['menu1_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,7);

                $this->common_model->uploadFile('menu1_back','background',7,$thumb='no',$ext,107,70);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu2_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='MENU IMAGE FOR LAPTOP';

        $data['page_name']='admin/basic_setup/contact_back';

        $data['edit_data']=$this->db_model->selectByID('background',8);

        $this->load->view('back/admin/basic_setup/menu2_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu2_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['menu2_back']['name'];

            if($_FILES['menu2_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',8,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select a Menu Image For Laptop !';

                }

            } 

            $file_type=$_FILES['menu2_back']['type'];

            $file_size=$_FILES['menu2_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,8);

                $this->common_model->uploadFile('menu2_back','background',8,$thumb='no',$ext,107,70);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu3_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='MENU IMAGE FOR OFFICE EQUIPMENTS';

        $data['page_name']='admin/basic_setup/contact_back';

        $data['edit_data']=$this->db_model->selectByID('background',9);

        $this->load->view('back/admin/basic_setup/menu3_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu3_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['menu3_back']['name'];

            if($_FILES['menu3_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',9,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select a Menu Image For Office Equipments !';

                }

            } 

            $file_type=$_FILES['menu3_back']['type'];

            $file_size=$_FILES['menu3_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,9);

                $this->common_model->uploadFile('menu3_back','background',9,$thumb='no',$ext,107,70);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu4_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='MENU IMAGE FOR COMMUNICATION SYSTEMS';

        $data['page_name']='admin/basic_setup/contact_back';

        $data['edit_data']=$this->db_model->selectByID('background',10);

        $this->load->view('back/admin/basic_setup/menu4_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu4_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['menu4_back']['name'];

            if($_FILES['menu4_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',10,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select a Menu Image For Communication Systems !';

                }

            } 

            $file_type=$_FILES['menu4_back']['type'];

            $file_size=$_FILES['menu4_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,10);

                $this->common_model->uploadFile('menu4_back','background',10,$thumb='no',$ext,107,70);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu5_background(){

        if($this->common_model->is_logged()){

        $data['page_title']='MENU IMAGE FOR SMART DISPLAY UNIT';

        $data['page_name']='admin/basic_setup/contact_back';

        $data['edit_data']=$this->db_model->selectByID('background',11);

        $this->load->view('back/admin/basic_setup/menu5_back',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function menu5_background_update(){

        if($this->common_model->is_logged()){

            $data['image_name']=$_FILES['menu5_back']['name'];

            if($_FILES['menu5_back']['name'] ===''){

                $data['image_name']=$this->db_model->getFieldValueById('background',11,'image_name');

                if($data['image_name']===''){

                    echo 'Error ! Please Select a Menu Image For Smart Display Unit !';

                }

            } 

            $file_type=$_FILES['menu5_back']['type'];

            $file_size=$_FILES['menu5_back']['size'];

            $allowedTypes= array("jpeg","jpg","png");

            $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

            if(!in_array($ext, $allowedTypes)){

                echo "Image formet/type is not allowed !";

            } else{

                $data['ext']=$ext;

                $this->db_model->updateById('background',$data,11);

                $this->common_model->uploadFile('menu5_back','background',11,$thumb='no',$ext,107,70);

                echo 'success';

            }

        } else {

            $this->load->view('back/login');

        }

    }

}