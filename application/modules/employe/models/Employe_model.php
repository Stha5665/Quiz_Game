<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true); // no need for now
    }


     # 2. Using Query Builder
    //  e.g., $return_data = $this->db_name->select('*')
    //  ->from('TABLE_NAME')
    //  ->get()
    //  ->result();

    //now execute the query

    // This function fetches all records from employe
    function executeEmployeData(){
        $return_data=$this->db->select('*')->from('EMPLOYE')->get()->result_array();
        return $return_data;
    }

    //save data to the table

    // This saveData function works as both insert and update function
    // It checks whether the input id exists to database or not
    // If id already exists to database then It update the record
    // If id doesnot exists it insert as new record

    function saveData($employename,$employeid,$employemail)
    {
        $getData=$this->db->set('EMPLOYENAME',$employename)
                                ->set('EMPLOYEID',$employeid)
                                ->set('EMPLOYEMAIL',$employemail);

        $updateData = $this->findWhere($employeid);
        if($updateData -> num_rows()){
            $getData = $this->db->where('EMPLOYEID', $employeid);
            $getData=$this->db->update('EMPLOYE');

        }else{
            $getData=$this->db->insert('EMPLOYE');
        }
                            
        if($getData){
            return true;
        }else{
            return false;
        }
    }

    // This function is to find record by id
    function findWhere($employeid){
        $getData = $this->db->get_where('employe', array('EMPLOYEID' => $employeid));
        return $getData;
    }
   
    function deleteData($id){
        $deleteData = $this -> db -> delete('employe', array('EMPLOYEID' => $id));

        if($deleteData){
            return true;
        }else{
            return false;
        }
    }
}
?>