<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true);
    }

    // gets all data of that table
    function getAllData($tableName){
        $return_data=$this->db->select('*')->from($tableName)->get()->result_array();
        return $return_data;
    }

    // gets all data from patients table order by date_time in descending order
    function getAllPatientData(){
        $return_data=$this->db->select('*')->from('patients')->order_by('date_time', 'DESC')->get()->result_array();
        
        return $return_data;
    }

    // This finds the data by use of where condition
    function findWhere($tableName, $field, $value){
        $getData = $this->db->get_where($tableName, array($field => $value));
        return $getData;
    }
}
?>