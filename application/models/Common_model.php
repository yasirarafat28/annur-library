<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    public function createThumb($type,$id,$ext='.jpg',$width='',$height='400')
	{
	  $this->load->library('image_lib');
	  ini_set("memory_limit", "-1");
	  
	  $config1['image_library']  = 'gd2';
	  $config1['create_thumb']   = TRUE;
	  $config1['maintain_ratio'] = FALSE;
	  $config1['width']          = $width;
	  $config1['height']         = $height;
	  $config1['source_image']   = 'uploads/'.$type.'/'.$type.'_'.$id.'.'.$ext;
	  
	  $this->image_lib->initialize($config1);
	  $this->image_lib->resize();
	  $this->image_lib->clear();
	}
    public function uploadFile($name,$type,$id,$thumb='',$ext='',$width='',$height=''){
        
        move_uploaded_file($_FILES[$name]['tmp_name'], 'uploads/'.$type.'/'.$type.'_'.$id.'.'.$ext);
        if($thumb == 'yes'){
            if($width!='' && $height !=''){
               $this->createThumb($type,$id,$ext,$width,$height); 
            } else{
                $this->createThumb($type,$id,$ext);
            }
            
        }
        
    }
    public function productBanner($name,$type,$id,$thumb='',$ext='',$width='',$height=''){
        
        move_uploaded_file($_FILES[$name]['tmp_name'], 'uploads/'.$type.'/'.$type.'_'.$id.'.'.$ext);
        if($thumb == 'yes'){
            if($width!='' && $height !=''){
               $this->createThumb($type,$id,$ext,$width,$height); 
            } else{
                $this->createThumb($type,$id,$ext);
            }
            
        }
        
    }
    public function uploadFileTime($name,$type,$filename){
        move_uploaded_file($_FILES[$name]['tmp_name'], 'uploads/'.$type.'/'.$filename);    
    }
    public function uploadFileForJson($name,$type,$img,$thumb='',$ext='',$id){
        move_uploaded_file($_FILES[$name]['tmp_name'], 'uploads/'.$type.'/'.$img.'.'.$ext);
        if($thumb == 'yes'){
            $this->createThumb($type,$id,$ext);
        }
        
    }
    public function multipleFileUp($name,$i,$img,$foldername){
        $this->load->library('image_lib');
        ini_set("memory_limit", "-1");
        move_uploaded_file($_FILES[$name]['tmp_name'][$i],'uploads/'.$foldername.'/'.$img);
        $config1['image_library']  = 'gd2';
        $config1['create_thumb']   = TRUE;
        $config1['maintain_ratio'] = FALSE;
        $config1['width']          = '640';
        $config1['height']         = '440';
        $config1['source_image']   = 'uploads/'.$foldername.'/'.$img;
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
    public function multipleFileUp1($name,$i,$img,$foldername){
        $this->load->library('image_lib');
        ini_set("memory_limit", "-1");
        move_uploaded_file($_FILES[$name]['tmp_name'][$i],'uploads/'.$foldername.'/'.$img);
        $config1['image_library']  = 'gd2';
        $config1['create_thumb']   = TRUE;
        $config1['maintain_ratio'] = FALSE;
        $config1['width']          = '150';
        $config1['height']         = '100';
        $config1['source_image']   = 'uploads/'.$foldername.'/'.$img;
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
    function is_logged() {
        if ($this->session->userdata('admin_login') == 'yes') {
            return true;
        } else {
            return false;
        }
    }
	
    public function is_reader_logged() {
        if ($this->session->userdata('reader_login') == 'yes') {
            return true;
        } else {
            return false;
        }
    }
	
	
    function do_email($msg = NULL, $sub = NULL, $to = NULL, $from = NULL)
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ' . $from . '<' . $from . '>' . "\r\n";
        $headers .= 'Reply-To:   info@bmebd.com  <' . $from . '>' . "\r\n";
        $headers .= 'Return-Path:   info@bmebd.com  <' . $from . '>' . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
        $headers .= "Organization: " . $from . "\r\n";	
        @mail($to, $sub, $msg, $headers, "-f " . $from);  
    }
    
}


