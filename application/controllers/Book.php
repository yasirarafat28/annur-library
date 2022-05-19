<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Book extends CI_Controller{
    private $tableName;
    private $fieldName;
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
        $this->tableName='book';
        $this->fieldName='status';
        
    }
    public $j=0;
    public function index(){
        if($this->common_model->is_logged()){
            $data['page_title']='Books';
            $data['page_name']='book_list';
            $this->db->select('*');
            $this->db->from('book b'); 
            $this->db->join('category c', 'b.category_id=c.category_id', 'inner');
            $this->db->join('author a', 'b.author_id=a.author_id', 'inner');
            $this->db->order_by('b.book_id','desc');         
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {
                $data['books']= $query->result_array();
            }
            else
            {
                $data['books']=null;
            }
			
            
            $this->load->view('back/admin/book/book_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
	
	
    public function book_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='Book Add';
            $data['page_name']='book_add';
            $data['categroies']=$this->db_model->getTableData('category');
            $data['authors']=$this->db_model->getTableData('author');
            $data['publishers']=$this->db_model->getTableData('publisher');
            $this->load->view('back/admin/book/book_add',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function book_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='book Edit';
            $data['page_name']='book_edit';
            $data['categroies']=$this->db_model->getTableData('category');
            $data['authors']=$this->db_model->getTableData('author');
            $data['publishers']=$this->db_model->getTableData('publisher');
            $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
            foreach($data['edit_data'] as $row){
                $data['features']   =  json_decode($row['features'],TRUE);
            }
            $this->load->view('back/admin/book/book_edit',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function book_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'book Name', 'required',array('required' => 'You must provide a book Name !'));
            $this->form_validation->set_rules('category_id', 'Book Category', 'required',array('required' => 'You must provide book Category !'));
            $this->form_validation->set_rules('author_id', 'Book Author', 'required',array('required' => 'You must provide book author !'));
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } 
			else
			{
                $data['book_name']=$this->input->post('name');
                $data['external_pdf_url']=$this->input->post('external_pdf_url');
                $data['keywords']=$this->input->post('keywords');
                $data['overview']=$this->input->post('overview',FALSE);
                $data['category_id']=$this->input->post('category_id');
                $data['author_id']=$this->input->post('author_id');
                $data['publisher_id']=$this->input->post('publisher_id');
                $data['status']='yes';
                $data['book_image']=$_FILES['image']['name'];
				
				
				
				
                if($_FILES['file1']['name']){
                    $data['file1']=$_FILES['file1']['name'];
                } else {
                    $data['file1']='';
                }
				/*
                if($_FILES['file2']['name']){
                    $data['file2']=$_FILES['file2']['name'];
                } else {
                    $data['file2']='';
                }
                if($_FILES['file3']['name']){
                    $data['file3']=$_FILES['file3']['name'];
                } else{
                    $data['file3']='';
                }
				*/
				
				$id=$this->db_model->insertDb($this->tableName,$data);
				if($_FILES['file1']['name']){
					$allowedTypes1= array("pdf","doc","docx");
					$ext1 = pathinfo($_FILES['file1']['name'],PATHINFO_EXTENSION);
					if(!in_array($ext1, $allowedTypes1)){
					   echo "Invalid formet/type !"; 
					} else {
						$this->common_model->uploadFileTime('file1','download',$data['file1']);
					}
				}
				
				/*
				if($_FILES['file2']['name']){
					$allowedTypes2= array("pdf","doc","docx");
					$ext2 = pathinfo($_FILES['file2']['name'],PATHINFO_EXTENSION);
					if(!in_array($ext2, $allowedTypes2)){
					   echo "Invalid formet/type !"; 
					} else {
						$this->common_model->uploadFileTime('file2','download',$data['file2']);
					}
				}
				if($_FILES['file3']['name']){
					$allowedTypes3= array("pdf","doc","docx");
					$ext3 = pathinfo($_FILES['file3']['name'],PATHINFO_EXTENSION);
					if(!in_array($ext3, $allowedTypes3)){
					   echo "Invalid formet/type !"; 
					} else {
						$this->common_model->uploadFileTime('file3','download',$data['file3']);
					}
				}
				*/
				
				if(!empty($_FILES['image']))
				{
					$allowedTypes= array("jpg","jpeg","png");
					$ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
					if(!in_array($ext, $allowedTypes)){
					echo "Invalid formet/type !"; 
					} else {
					$data['book_image']='uploads/book/book'.$id.'.'.$ext;
					$this->common_model->uploadFileTime('image','book','book'.$id.'.'.$ext);
					}
					
					$this->db_model->updateById($this->tableName,$data,$id);
				}
				echo 'success';
            }
        } else {
            $this->load->view('back/login');
        }
    }
	
	
    public function book_update($id){
        if($this->common_model->is_logged()){
            $this->j++;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'book Name', 'required',array('required' => 'You must provide a book Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                    $data['book_name']=$this->input->post('name');
                    $data['overview']=$this->input->post('overview',FALSE);
                    $data['category_id']=$this->input->post('category_id');
                    $data['author_id']=$this->input->post('author_id');
					$data['publisher_id']=$this->input->post('publisher_id');
                    if($_FILES['file1']['name']){
                        $data['file1']=$_FILES['file1']['name'];
                    } 
					else 
					{
                        $data['file1']=$this->db_model->getFieldValueById($this->tableName,$id,'file1');
                    }
					
					if($_FILES['file1']['name']){
						$allowedTypes1= array("pdf","doc","docx");
						$ext1 = pathinfo($_FILES['file1']['name'],PATHINFO_EXTENSION);
						if(!in_array($ext1, $allowedTypes1)){
						   //$data['file1']='';
						   echo "Invalid formet/type !"; 
						} else {
							//$data['file1']=$_FILES['file1']['name'];
							$this->common_model->uploadFileTime('file1','download',$data['file1']);

						}
					}
					
					$this->db_model->updateById($this->tableName,$data,$id);
					echo 'success';   
            }
        } else {
            $this->load->view('back/login');
        }
    }
    public function delete_book($id){
        if($this->common_model->is_logged()){
            $this->db_model->delMulImage($this->tableName,$id,'features','book');
            $this->db_model->deleteById2($this->tableName,'download',$id,'file1','file2','file3');
            $this->db_model->deletedataById($this->tableName,$id);
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
    function delimg($index,$id){
        $newArray=array();
        $features=json_decode($this->db_model->jsonDatagetByID($id,$this->tableName,'features'),TRUE);
        foreach($features as $row){
            if($row['index']!=$index){
                $newArray[]= array('index'=>$row['index'],'img'=>$row['img'],'thumb'=>$row['thumb']);
            } else{
                $this->db_model->delSnglImage($this->tableName,$index,$id,'features','book');
            } 
        }
        
        $data['features']= json_encode($newArray);
        $this->db_model->updateById($this->tableName,$data,$id);
    }
    public function book_preview($id){
        $data['page_title']='Service View';
        $data['page_name']='book_preview';
        $data['book_details']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/book/book_preview',$data);
    }
}