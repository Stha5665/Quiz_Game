<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true);
    }

    function getAllData($tableName){
        $return_data=$this->db->select('*')->from($tableName)->get()->result_array();
        return $return_data;
    }
    
    function findWhere($tableName, $field, $value){
        $getData = $this->db->get_where($tableName, array($field => $value));
        return $getData;
    }

    function insertData($tableName, $data){
        $getData=$this->db->insert($tableName, $data);
        if($getData){
            return true;
        }else{
            return false;
        }
    }

    // This function get last id or sample no from table
    function lastId($id,$tableName){
        // If there is no record it will return 0
        $sql = "SELECT IFNULL(MAX(".$id."),0) AS MAX FROM ".$tableName;
        $max = $this->db->query($sql)->row();

        // increasing by 1 to get new id
        $next_id = $max->MAX + 1;
        return $next_id;
          
    }

    // This deletes the data by filtering with field and value
    function deleteData($tableName, $field, $value){
        $deleteData = $this -> db -> delete($tableName, array($field => $value));

        if($deleteData){
            return true;
        }else{
            return false;
        }
    }
}
?>