<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true); // no need for now
    }

    public function getMessage(){
        return "Hello Model";
    }

    public function login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password );
        $query = $this->db->get('users');

        if($query->num_rows() == 1){
            return $query -> row();
        }

        return false;
    
    }

}

?>