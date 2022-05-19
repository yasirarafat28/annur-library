<?php defined('BASEPATH') OR exit('No direct script access allowed');
class PageNotFound extends CI_Controller{
    //public $data=array();
    public function __construct(){
        parent::__construct();
    }
    
    public function index() { 
        $this->output->set_status_header('404'); // setting header to 404
        $this->load->view('front/error');//loading view
    }
}

