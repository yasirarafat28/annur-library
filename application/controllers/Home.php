<?php

Class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
       
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
    }
    public function index(){
        $data['page_title']='প্রধান পাতা';
        $data['sliders']=$this->db_model->getTableData('slider');
		
        $data['ads_data']=$this->db_model->selectByID('background',1);
        $data['about_us']=$this->db_model->selectBySlug('content','about_us');
        $data['brands']=$this->db_model->getTableData('author');
        $data['products']=$this->db_model->selectByfield('product','status','yes');
        $data['page_name']='home';
		
		
		$this->db->select('*,pc.name as category_name');
		$this->db->from('post p'); 
		$this->db->join('post_category pc', 'p.category_id=pc.post_category_id', 'inner');        
		$this->db->where('p.post_type','1');         
		$this->db->order_by('p.post_id','desc');         
		$this->db->limit('3');         
		$query = $this->db->get(); 
		$data['newses']= $query->result_array();
		
		
		$this->db->select('*,pc.name as category_name');
		$this->db->from('post p'); 
		$this->db->join('post_category pc', 'p.category_id=pc.post_category_id', 'inner');        
		$this->db->where('p.post_type','2');         
		$this->db->order_by('p.post_id','desc');         
		$this->db->limit('3');         
		$query = $this->db->get(); 
		$data['blogs']= $query->result_array();
		
		$this->db->select('*');
		$this->db->from('book b'); 
		$this->db->join('category c', 'b.category_id=c.category_id', 'inner');
		$this->db->join('author a', 'b.author_id=a.author_id', 'inner');
		$this->db->order_by('b.book_id','desc');         
		$this->db->limit('4');         
		$query = $this->db->get(); 
		$data['latest_book']= $query->result_array();
		
		$this->db->select('*');
		$this->db->from('namaz'); 
		$this->db->order_by('namaz_id','asc');        
		$query = $this->db->get(); 
		$data['namaz_schedule']= $query->result_array();
		
		$this->db->select('*');
		$this->db->from('category'); 
		$this->db->order_by('category_id','asc');        
		$query = $this->db->get(); 
		$data['categories']= $query->result_array();
		
		
        $this->load->view('front/index',$data);
    }
    public function about(){
        $data['page_title']='আমাদের সম্পর্কে';
		
        $data['about']=$this->db_model->selectBySlug('content','about_us');
        $data['page_name']='about';
        $this->load->view('front/index',$data);
    }
	
    public function service(){
        $data['page_title']='যোগাযোগ';
        $jsonData=$this->db_model->jsonDataget('basic_setup','service');
        $data['services']=  json_decode($jsonData,TRUE);
        $data['background_id']=$this->db_model->getFieldValueById('background',3,'background_id');
        $data['background_ext']=$this->db_model->getFieldValueById('background',3,'ext');
        $data['page_name']='service';
        $this->load->view('front/index',$data);
    }
    public function news(){
        $data['page_title']='সংবাদ';
		$this->db->select('*,pc.name as category_name');
		$this->db->from('post p'); 
		$this->db->join('post_category pc', 'p.category_id=pc.post_category_id', 'inner');        
		$this->db->where('p.post_type','1');         
		$this->db->order_by('p.post_id','desc');         
		$query = $this->db->get(); 
		$data['newses']= $query->result_array();
		
		
        $data['page_name']='news';
        $this->load->view('front/index',$data);
    }
    public function news_detail($id){
        $data['page_title']='NEWS DETAILS';
        $data['news']=$this->db_model->selectByID('post',$id);
        $data['page_name']='news_details';
        $this->load->view('front/index',$data);
    }
    public function blog(){
        $data['page_title']='দারস ';
		$this->db->select('*,pc.name as category_name');
		$this->db->from('post p'); 
		$this->db->join('post_category pc', 'p.category_id=pc.post_category_id', 'inner');        
		$this->db->where('p.post_type','2');         
		$this->db->order_by('p.post_id','desc');         
		$query = $this->db->get(); 
		$data['blogs']= $query->result_array();
		
        $data['namaz_schedule']=$this->db_model->getTableData('namaz');
        $data['categories']=$this->db_model->getTableData('category');
		
        $data['page_name']='blog';
        $this->load->view('front/index',$data);
    }
    public function blog_detail($id){
        $data['page_title']='BLOG DETAILS';
        $data['blog']=$this->db_model->selectByID('post',$id);
        $data['page_name']='blog_details';
        $this->load->view('front/index',$data);
    }
    public function lit_and_culture(){
        $data['page_title']='সাহিত্য ও সংস্কৃতি';
		$this->db->select('*,pc.name as category_name');
		$this->db->from('post p'); 
		$this->db->join('post_category pc', 'p.category_id=pc.post_category_id', 'inner');        
		$this->db->where('p.post_type','3');         
		$this->db->order_by('p.post_id','desc');         
		$query = $this->db->get(); 
		$data['blogs']= $query->result_array();
        $data['page_name']='lit_and_culture';
        $this->load->view('front/index',$data);
    }
    public function lit_and_culture_detail($id){
        $data['page_title']='সাহিত্য ও সংস্কৃতি';
        $data['blog']=$this->db_model->selectByID('post',$id);
        $data['page_name']='lit_and_culture_details';
        $this->load->view('front/index',$data);
    }
	
    public function category($para1="",$para2="",$para3=""){
        if($para1=="all" || $para1==""){
			
            $this->db->select('*');
            $this->db->from('book b'); 
            $this->db->join('author a', 'b.author_id=a.author_id', 'inner');
            $this->db->join('publisher p', 'b.publisher_id=p.publisher_id', 'inner');
            $this->db->order_by('b.book_id','desc');         
            $query = $this->db->get(); 
			$data['books']= $query->result_array();
            $data['type']='All';
        } else {
            $this->db->select('*');
            $this->db->from('book b'); 
            $this->db->join('author a', 'b.author_id=a.author_id', 'inner');
            $this->db->join('publisher p', 'b.publisher_id=p.publisher_id', 'inner');
			$this->db->where('b.category_id',$para1);  
            $this->db->order_by('b.book_id','desc');         
            $query = $this->db->get(); 
			$data['books']= $query->result_array();
			
			
            $data['type']=$this->db_model->getFieldValueById('category',$para1,'category_name');
            //$data['type']='All';
        }
		
        $data['page_title']='বইয়ের তালিকা';
        $data['page_name']='book_list';
        $this->load->view('front/index',$data);
		
	}
	
    public function authorsbook($para1="",$para2="",$para3=""){
        
		$this->db->select('*');
		$this->db->from('book b'); 
		$this->db->join('author a', 'b.author_id=a.author_id', 'inner');
		$this->db->join('publisher p', 'b.publisher_id=p.publisher_id', 'inner');
		$this->db->where('b.author_id',$para1);  
		$this->db->order_by('b.book_id','desc');         
		$query = $this->db->get(); 
		$data['books']= $query->result_array();
		
		
		//$data['type']=$this->db_model->getFieldValueById('author',$para1,'category_name');
		$data['type']='All';
        $data['page_title']='বইয়ের তালিকা';
        $data['page_name']='book_list';
        $this->load->view('front/index',$data);
    }
	
    public function brand($para1="",$para2="",$para3=""){
        if($para1=="all"){
            $data['products']=$this->db_model->getTableData('product');
            $data['type']='All';
        } else {
            $data['products']=$this->db_model->selectByCondiction('product','brand',$para1);
            $data['type']=$this->db_model->getFieldValueById('brand',$para1,'brand_name');
        }
        $data['page_title']='PRODUCT LIST';
        $data['page_name']='product_list';
        $this->load->view('front/index',$data);
    }
	
	
    public function book_details($id,$para2=""){
        $data['page_title']= strtoupper($this->db_model->getFieldValueById('book',$id,'book_name'));
        
		$this->db->select('*');
		$this->db->from('book b'); 
		$this->db->join('category c', 'b.category_id=c.category_id', 'inner');
		$this->db->join('author a', 'b.author_id=a.author_id', 'inner');
		$this->db->join('publisher p', 'b.publisher_id=p.publisher_id', 'inner');
        $this->db->where('b.book_id',$id);         
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            $data['book']= $query->result_array();
        }
        else
        {
            $data['book']='';
        }
        $data['page_name']='book_details';
        
        $this->load->view('front/index',$data);
    }
	
	
    public function author_list(){
		$data['authors']=$this->db_model->getTableData('author');
		$data['type']='All';
		
        $data['namaz_schedule']=$this->db_model->getTableData('namaz');
        $data['categories']=$this->db_model->getTableData('category');
		
        $data['page_title']='লেখকের তালিকা';
        $data['page_name']='author_list';
        $this->load->view('front/index',$data);
    }
	
    public function author_details($id,$para2=""){
        $data['page_title']= $this->db_model->getFieldValueById('author',$id,'author_name');
        
		
        $data['author']=$this->db_model->selectByID('author',$id);
        $data['page_name']='author_details';
        
        $this->load->view('front/index',$data);
    }
	
    public function publisher_list(){
		$data['publishers']=$this->db_model->getTableData('publisher');
		$data['type']='All';
		
        $data['namaz_schedule']=$this->db_model->getTableData('namaz');
        $data['categories']=$this->db_model->getTableData('category');
		
        $data['page_title']='প্রকাশক ও প্রকাশনীর তালিকা';
        $data['page_name']='publisher_list';
        $this->load->view('front/index',$data);
    }
	
    public function publisher_details($id,$para2=""){
        $data['page_title']= strtoupper($this->db_model->getFieldValueById('publisher',$id,'publisher_name'));
        
		
        $data['publisher']=$this->db_model->selectByID('publisher',$id);
        $data['page_name']='publisher_details';
        
        $this->load->view('front/index',$data);
    }
    
    
    public function contact(){
        $data['page_name']='contact';
        $data['page_title']='যোগাযোগ করুন ';
        $this->load->view('front/index',$data);
    }
	
    public function contact_add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required',array('required' => 'You must provide  Name !'));       
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',array('required' => 'You must provide a valid email !'));
        $this->form_validation->set_rules('subject', 'Subject', 'required',array('required' => 'You must provide Subject !'));
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } else{
            $data['name']=$this->input->post('name');
            $data['email']=$this->input->post('email');
            $data['subject']=$this->input->post('subject');
            $data['sent_at']=time();
            $data['message']=$this->input->post('message',FALSE);
            if($data['message'] == ''){
                echo 'Please Complete The Message Part Correcrtly';  
            } else {
                $id=$this->db_model->insertDb('contact',$data);
                $this->common_model->do_email($data['message'],$data['subject'], 'info@bmebd.com', $data['email']);
                echo 'success';
            }
        }
    }
	
    public function contact_modal(){
        $data['page_name']='contact';
        $data['page_title']='আমাদের সাথে যোগাযোগ করুন';
        $this->load->view('front/modal_contact',$data);
    }
    public function e_com(){
        $data['page_name']='e_com';
        $data['page_title']='E-COMMERCE';
        $this->load->view('front/index',$data);
    }
	   
    public function signin(){
        $data['page_name']='signin';
        $data['page_title']='সাইন ইন করুন';
        $data['background_id']=$this->db_model->getFieldValueById('background',6,'background_id');
        $data['background_ext']=$this->db_model->getFieldValueById('background',6,'ext');
        $this->load->view('front/index',$data);
    }
	   
    public function signup(){
        $data['page_name']='signup';
        $data['page_title']='নিবন্ধন করুন';
        $data['background_id']=$this->db_model->getFieldValueById('background',6,'background_id');
        $data['background_ext']=$this->db_model->getFieldValueById('background',6,'ext');
        $this->load->view('front/index',$data);
    }
	
	
    public function reader_add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required',array('required' => 'You must provide  Name !'));       
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        } 
		else
		{
            
			$data['reader_name']=$this->input->post('name');
			$data['reader_email']=$this->input->post('email');
			$data['reader_phone']=$this->input->post('phone');
			$data['reader_address']=$this->input->post('address');
			$data['reader_password']=md5($this->input->post('password'));
			$data['registration_date']=date("m/d/y");
			$this->db_model->insertDb('reader',$data);
			echo 'success';
        }
    }
	
    public function reader_login(){
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $secure_pass    = md5($password);
        
        if(($email == '') || ($password == ''))
        {
            $this->session->set_flashdata('error_msg', "Enter your Email and Password.");
            redirect(base_url('front/index'));
        }
        else
        {
            $login_data = $this->db->get_where('reader', array(
                'reader_email' => $email,
                'reader_password' => $secure_pass
            ));
            
            if ($login_data->num_rows() > 0) 
            {
                foreach ($login_data->result_array() as $row) 
                {
                    //$this->session->set_userdata('login', 'yes');
                    $this->session->set_userdata('reader_login', 'yes');
                    $this->session->set_userdata('reader_id', $row['reader_id']);
                    $this->session->set_userdata('reader_name', $row['reader_name']);
                   // $this->session->set_userdata('title', 'admin');
					$this->session->set_flashdata('success_msg', 'Your login attempt is successfull.');
					redirect(base_url('front/index'));
                }
            } 
            else 
            {
                $this->session->set_flashdata('error_msg', 'Either Email or Password is invalid.');
                redirect(base_url('front/index'));
            }
        }
    }
	
	
	
    public function error(){
        $this->load->view('front/error');
    }
}
