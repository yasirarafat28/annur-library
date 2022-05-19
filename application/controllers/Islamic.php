<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Islamic extends CI_Controller{

    //public $data=array();

    private $tableName;

    private $fieldName;

    public function __construct(){

        parent::__construct();

        $this->load->model('common_model');

        $this->load->model('db_model');

        $this->tableName='db_model';

    }

    

    public function index(){

        if($this->common_model->is_logged()){

        $data['page_title']='Islamic';

        $data['page_name']='reader_list';

        $data['readers']=$this->db_model->getTableData($this->tableName);

        $this->load->view('back/admin/reader/reader_list',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function reader_form(){

        if($this->common_model->is_logged()){

            $data['page_title']='reader';

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

            $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);

            $this->load->view('back/admin/reader/reader_edit',$data);

        } else {

            $this->load->view('back/login');

        }

    }

    public function reader_add(){

        if($this->common_model->is_logged()){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'reader Name', 'required',array('required' => 'You must provide reader Name !'));

            if ($this->form_validation->run() == FALSE)

            {

                echo validation_errors();

            }
			if(1==1){
				


				
				$data['reader_name']=$this->input->post('name');
				$data['reader_address']=$this->input->post('address');
				$data['reader_overview']=$this->input->post('description',FALSE);
                $data['reader_image']=$_FILES['reader_image']['name']; 
				
				$this->db_model->insertDb($this->tableName,$data);
				echo 'success'; 
				

            }

        } else {

            $this->load->view('back/login');

        }

        //$this->load->view('back/admin/slider_add',$data);

    }

    public function reader_update($id){

        if($this->common_model->is_logged()){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Sister Concern', 'required',array('required' => 'You must provide Sister Concern Name !'));			

            if ($this->form_validation->run() == FALSE)

            {

                echo validation_errors();

            } else{

                $data['image_name']=$_FILES['reader']['name'];

                if($_FILES['reader']['name'] ===''){

                    $data['image_name']=$this->db_model->getFieldValueById($this->tableName,$id,'image_name');

                    if($data['image_name']===''){

                        echo 'Error ! Please Select an Image For Sister Concern !';

                    }

                } 

                $file_type=$_FILES['reader']['type'];

                $file_size=$_FILES['reader']['size'];

                $allowedTypes= array("jpeg","jpg","png");

                $ext = pathinfo($data['image_name'],PATHINFO_EXTENSION);

                if(!in_array($ext, $allowedTypes)){

                    echo "Image formet/type is not allowed !";

                } else{

                    $data['reader_name']=$this->input->post('name');

                    $data['reader_desc']=$this->input->post('description',FALSE);

                    $data['link']=$this->input->post('link');

                    $data['ext']=$ext;

                    if(strip_tags($data['reader_desc'])!=''){

                        $this->db_model->updateById($this->tableName,$data,$id);

                        $this->common_model->uploadFile('reader','reader',$id,$thumb='yes',$ext);

                        echo 'success'; 

                    } else {

                        echo "Please Provide Sister Concern Details !";

                    }

                }   

            }

        } else {

            $this->load->view('back/login');

        }

    }

    public function delete_reader($id){

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