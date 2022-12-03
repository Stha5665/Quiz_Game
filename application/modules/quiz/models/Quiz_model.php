<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true); // no need for now
    }

    function findWhere($tableName, $field, $value){
        $getData = $this->db->get_where($tableName, array($field => $value));
        return $getData;
    }

    function saveData($array){
        $this->db->insert('quiz_played', $array);
    }
}
?>