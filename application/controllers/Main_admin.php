<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Main_admin extends CI_Controller{
    //public $data=array();
    public function __construct(){
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('db_model');
        $this->load->helper('text');
		$this->load->library('session');
    }
    
    public function index() {
		$this->session->userdata('admin_login');
        if ($this->session->userdata('admin_login') == 'yes') {
            $data['page_title'] = 'dashboard';
            $page_data['page_name'] = "dashboard";
            $this->load->view('back/index', $page_data);
        } else {
			echo '123';
            
			$this->load->view('back/login');
        }
    }
    
    public function login_now()
    {
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $secure_pass    = $password;
        //$secure_pass    = md5($$password);
        
        if(($email == '') || ($password == ''))
        {
            $this->session->set_flashdata('error_msg', "Enter your Email and Password.");
            redirect(base_url('index.php/main_admin'));
        }
        else
        {
            $login_data = $this->db->get_where('admin', array(
                'email' => $email,
                'password' => $secure_pass
            ));
            
            if ($login_data->num_rows() > 0) 
            {
                foreach ($login_data->result_array() as $row) 
                {
                    $this->session->set_userdata('login', 'yes');
                    $this->session->set_userdata('admin_login', 'yes');
                    $this->session->set_userdata('admin_id', $row['admin_id']);
                    $this->session->set_userdata('admin_name', $row['name']);
                    $this->session->set_userdata('title', 'admin');
					$this->session->set_flashdata('success_msg', 'Your login attempt is successfull.');
					redirect(base_url('index.php/main_admin'));
                }
            } 
            else 
            {
                $this->session->set_flashdata('error_msg', 'Either Email or Password is invalid.');
                redirect(base_url('index.php/main_admin'));
            }
        }
        
    }
	
	
	

    public function login($para1 = '') {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            
            $login_data = $this->db->get_where('admin', array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
                //'password' => sha1($this->input->post('password'))
            ));
            if ($login_data->num_rows() > 0) {
                foreach ($login_data->result_array() as $row) {
                    $this->session->set_userdata('login', 'yes');
                    $this->session->set_userdata('admin_login', 'yes');
                    $this->session->set_userdata('admin_id', $row['admin_id']);
                    $this->session->set_userdata('admin_name', $row['name']);
                    $this->session->set_userdata('title', 'admin');
                    echo 'success';
                }
            } else {
                echo 'Login Failed !';
            }
        }
    }

	
	
    function logout() {
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/main_admin', 'refresh');
    }
    
    function manage_admin($para1 = "")
    {
        if ($this->session->userdata('admin_login') != 'yes') {
            redirect(base_url() . 'index.php/main_admin');
        }
        if ($para1 == 'update_password') {
            $user_data['password'] = $this->input->post('password');
            $account_data          = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->result_array();
            foreach ($account_data as $row) {
                if (sha1($user_data['password']) == $row['password']) {
                    if ($this->input->post('password1') == $this->input->post('password2')) {
                        $data['password'] = sha1($this->input->post('password1'));
                        $this->db->where('admin_id', $this->session->userdata('admin_id'));
                        $this->db->update('admin', $data);
                        echo 'success';
                    }
                } else {
                    echo 'Error ! Try again';
                }
            }
        } else if ($para1 == 'update_profile') {
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone')
            ));
            echo 'success';
        } else {
            $page_data['page_name'] = "manage_admin";
            $page_data['page_title'] = "Manage Admin";
            $this->load->view('back/manage_admin', $page_data);
        }
    }
}

