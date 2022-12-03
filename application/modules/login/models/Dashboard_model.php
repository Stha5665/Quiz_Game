<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true); // no need for now
    }

    // This function fetches all records from quiz_played table
    function getAllPlayerData(){
        $return_data=$this->db->select('*')->from('quiz_played')->get()->result_array();
        return $return_data;
    }

}