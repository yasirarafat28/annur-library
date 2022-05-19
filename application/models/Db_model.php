<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Db_model extends CI_Model{
	
	//Edited By memory_get_peak_usage
	
    public function getLatestProduct($table){
        $this->db->order_by($table.'_id','desc');
        return $this->db->get($table)->result_array();
    }
	//Previous
    public function getTableData($table){
        $this->db->order_by($table.'_id','desc');
        return $this->db->get($table)->result_array();
    }
	
    public function insertDb($table,$data){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    public function selectByID($table,$id){
        /*$this->db->from($table);
        $this->db->where($table.'_id',$id);
        $this->db->insert($table,$data);
        */
        return $this->db->get_where($table,array($table.'_id'=>$id))->result_array();
    }
    public function selectBySlug($table,$slug){
        /*$this->db->from($table);
        $this->db->where($table.'_id',$id);
        $this->db->insert($table,$data);
        */
        return $this->db->get_where($table,array('slug'=>$slug))->result_array();
    }
    public function selectByCondiction($table,$condition,$id){
        /*$this->db->from($table);
        $this->db->where($table.'_id',$id);
        $this->db->insert($table,$data);
        */
        return $this->db->get_where($table,array($condition.'_id'=>$id))->result_array();
    }
    public function selectByfield($table,$field,$value){
        /*$this->db->from($table);
        $this->db->where($table.'_id',$id);
        $this->db->insert($table,$data);
        */
        return $this->db->get_where($table,array($field=>$value))->result_array();
    }
    public function updateById($table,$data,$id){
        $this->db->where($table.'_id',$id);
        $this->db->update($table,$data);
    }
    public function updateBySlug($table,$data,$slug){
        $this->db->where('slug',$slug);
        $this->db->update($table,$data);
    }
    public function getFieldValueById($table,$id,$fieldname=''){
        return $this->db->get_where($table,array($table.'_id'=>$id))->row()->$fieldname;
    }
    public function deleteById($table,$id,$extn='ext'){
        $ext=$this->getFieldValueById($table,$id,$extn);
        unlink('uploads/'.$table.'/'.$table.'_'.$id.'.'.$ext);
        unlink('uploads/'.$table.'/'.$table.'_'.$id.'_thumb.'.$ext);
        $this->db->where($table.'_id', $id);
        $this->db->delete($table);
    }
    public function delMulImage($table,$id,$fieldName,$folderName){
        $features = json_decode($this->db->get_where($table,array($table.'_id'=>$id))->row()->$fieldName,true);		
        foreach($features as $row2){
            if(file_exists('uploads/'.$folderName.'/'.$row2['img'])){
                unlink('uploads/'.$folderName.'/'.$row2['img']);			
            }
            if(file_exists('uploads/'.$folderName.'/'.$row2['thumb'])){
                unlink('uploads/'.$folderName.'/'.$row2['thumb']);		
            }
        }
    }
    public function delMulImage1($table,$id){
        $features = json_decode($this->db->get_where($table,array($table.'_id'=>$id))->row()->features,true);		
        foreach($features as $row2){
            if(file_exists('uploads/'.$folderName.'/'.$row2['img'])){
                unlink('uploads/'.$folderName.'/'.$row2['img']);			
            }
            if(file_exists('uploads/'.$folderName.'/'.$row2['thumb'])){
                unlink('uploads/'.$folderName.'/'.$row2['thumb']);		
            }
        }
    }
    public function delSnglImage($table,$index,$id,$fieldName,$folderName){
        $features = json_decode($this->db->get_where($table,array($table.'_id'=>$id))->row()->$fieldName,true);		
        foreach($features as $row2){
            if($row2['index']==$index){
                if(file_exists('uploads/'.$folderName.'/'.$row2['img'])){
                    unlink('uploads/'.$folderName.'/'.$row2['img']);			
                }
                if(file_exists('uploads/'.$folderName.'/'.$row2['thumb'])){
                    unlink('uploads/'.$folderName.'/'.$row2['thumb']);		
                }
            }
        }
    }
    public function deletedataById($table,$id){
        $this->db->where($table.'_id', $id);
        $this->db->delete($table);
    }
    public function updateFieldById($table,$fieldName,$id,$value){
        $this->db->where($table.'_id', $id);
        $this->db->update($table, array(
            $fieldName => $value
        ));
    }
    public function getTwoJoinTableData($table1,$table2,$joinCondition){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2,$table1.'.'.$joinCondition.'='.$table2.'.'.$joinCondition);
        $this->db->order_by($table1.'.'.$table1.'_id','desc');
        return $this->db->get()->result_array();
    }
    public function getTwoJoinTableDataWithCondition($table1,$table2,$joinCondition,$conditionTable,$whereCondition){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2,$table1.'.'.$joinCondition.'='.$table2.'.'.$joinCondition);
        $this->db->where($conditionTable.'_id',$whereCondition);
        return $this->db->get()->result_array();
    }
    public function jsonDataget($tableName,$filedName){
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->where('name',$filedName);
        return $this->db->get()->row()->value;
    }
    public function jsonDatagetByID($id,$tableName,$filedName){
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->where($tableName.'_id',$id);
        return $this->db->get()->row()->$filedName;
    }
    public function jsonDataGetByField($tableName,$filedName,$requiedFieldName){
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->where('name',$filedName);
        $jsonData=json_decode($this->db->get()->row()->value,true);
        $result='';
        foreach($jsonData as $row){
            if($row[$requiedFieldName]!=''){
                $result=$row[$requiedFieldName];
            }
        }
        return $result;
    }
    public function jsonDataUpdate($tableName,$filedName,$jsonEncodedData){
        $this->db->where('name',$filedName);
        $this->db->update($tableName,array(
            'value' => $jsonEncodedData
        ));
    }
    public function updateByFieldName($tableName,$filedName,$value){
        $this->db->where('name',$filedName);
        $this->db->update($tableName,array(
            'value' => $value
        ));
    }
    public function deleteById1($table,$type,$id,$extn='ext'){
        $ext=$this->getFieldValueById($table,$id,$extn);
        unlink('uploads/'.$type.'/'.$type.'_'.$id.'.'.$ext);
        unlink('uploads/'.$type.'/'.$type.'_'.$id.'_thumb.'.$ext);
        
    }
    public function deleteById2($table,$type,$id,$field1='',$field2='',$field3=''){
        if($field1!=''){
            $f1= $this->getFieldValueById($table,$id,$field1);
            if($f1 !=''){
                unlink('uploads/'.$type.'/'.$f1);
            }
        }
        if($field2 !=''){
            $f2=$this->getFieldValueById($table,$id,$field2);
            if($f2 !=''){
                unlink('uploads/'.$type.'/'.$f2);
            }
        }
        if($field3 !=''){
            $f3=$this->getFieldValueById($table,$id,$field3);
            if($f3 !=''){
                unlink('uploads/'.$type.'/'.$f3);
            }
        }  
    }
}

