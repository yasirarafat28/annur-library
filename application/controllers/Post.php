<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller{
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
            $data['page_title']='Post';
            $data['page_name']='post_list';
            $this->db->select('*,pc.name as category_name');
            $this->db->from('post p'); 
            $this->db->join('post_category pc', 'p.category_id=pc.post_category_id', 'inner');
            $this->db->order_by('p.post_id','desc');         
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {
                $data['posts']= $query->result_array();
            }
            else
            {
                $data['posts']=null;
            }
			
            
            $this->load->view('back/admin/post/post_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
	
    public function category_form(){
        if($this->common_model->is_logged()){
            $data['page_title']='category add';
            $data['page_name']='category_add';
            $this->load->view('back/admin/post/category_add',$data);
        } else{
            $this->load->view('back/login');
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

                $data['name']=$this->input->post('category_name');
                $data['post_type']=$this->input->post('type');
                $id=$this->db_model->insertDb('post_category',$data);
                echo 'success';
            }
        } else {
            $this->load->view('back/login');
        }
    }
	
    public function post_category(){
        if($this->common_model->is_logged()){
            $data['page_title']='Categories';
            $data['page_name']='category_list';
            $data['categorys']=$this->db_model->getTableData('post_category');
            $this->load->view('back/admin/post/category_list',$data);
        } else {
            $this->load->view('back/login');
        }
    }
	
	

    public function post_form(){

        if($this->common_model->is_logged()){

            $data['page_title']='Post Add';
            $data['page_name']='post_add';
            $data['categroies']=$this->db_model->getTableData('post_category');

            $this->load->view('back/admin/post/post_add',$data);

        } else {

            $this->load->view('back/login');

        }

    }
	
    public function post_edit_form($id){
        if($this->common_model->is_logged()){
            $data['page_title']='post Edit';
            $data['page_name']='post_edit';
            $data['categroies']=$this->db_model->getTableData('category');
            $data['authors']=$this->db_model->getTableData('author');
            $data['publishers']=$this->db_model->getTableData('publisher');
            $data['edit_data']=$this->db_model->selectByID($this->tableName,$id);
            foreach($data['edit_data'] as $row){
                $data['features']   =  json_decode($row['features'],TRUE);
            }
            $this->load->view('back/admin/post/post_edit',$data);
        } else {
            $this->load->view('back/login');
        }
    }
    public function post_add(){
        if($this->common_model->is_logged()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Post Name', 'required',array('required' => 'You must provide a post Name !'));
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } 
			else
			{
                $data['title']=$this->input->post('title');
                $data['post_type']=$this->input->post('type_id');
                $data['category_id']=$this->input->post('category_id');
                $data['description']=$this->input->post('description',FALSE);
                $data['status']='yes';
				
				
				$id=$this->db_model->insertDb($this->tableName,$data);
				if(!empty($_FILES['image']))
				{
					$allowedTypes= array("jpg","jpeg","png");
					$ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
					if(!in_array($ext, $allowedTypes)){
					echo "Invalid formet/type !"; 
					} else {
					$data['image']='uploads/post/post'.$id.'.'.$ext;
					$this->common_model->uploadFileTime('image','post','post'.$id.'.'.$ext);
					}
					
					$this->db_model->updateById($this->tableName,$data,$id);
				}
				echo 'success';
            }
        } else {
            $this->load->view('back/login');
        }
    }
	
	
    public function post_update($id){
        if($this->common_model->is_logged()){
            $this->j++;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'post Name', 'required',array('required' => 'You must provide a post Name !'));			
            if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();
            } else{
                    $data['post_name']=$this->input->post('name');
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
    public function delete_post($id){
        if($this->common_model->is_logged()){
            $this->db_model->delMulImage($this->tableName,$id,'features','post');
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
                $this->db_model->delSnglImage($this->tableName,$index,$id,'features','post');
            } 
        }
        
        $data['features']= json_encode($newArray);
        $this->db_model->updateById($this->tableName,$data,$id);
    }
    public function post_preview($id){
        $data['page_title']='Service View';
        $data['page_name']='post_preview';
        $data['post_details']=$this->db_model->selectByID($this->tableName,$id);
        $this->load->view('back/admin/post/post_preview',$data);
    }
}