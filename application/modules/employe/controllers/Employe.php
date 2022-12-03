<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends MX_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->Model('employe_model');
    }

    // loads the homepage
    function index(){
        $this->load->view('employeview');
    }
    // this to get all employee records from model 
    // and passing as json
    function showEmployee(){
        $data = $this->employe_model->executeEmployeData();
        echo json_encode($data);

    }
      
    function saveEmployee()
    {   
        $response = [];
        $this->form_validation->set_rules('employename', 'Name', 'required');
        $this->form_validation->set_rules('employeid', 'Id', 'required');
        $this->form_validation->set_rules('employemail', 'Email', 'valid_email|required|trim');

        if($this->form_validation->run() == true){
            $employename = $this->input->post('employename');
            $employeid = $this->input->post('employeid');
            $employemail = $this->input->post('employemail');
            $alldata = $this->employe_model->saveData($employename,$employeid,$employemail);
        
            if($alldata){

                $response = array(
                    'status' => 'success',
                    'message' => "Successfully Added"
                );
            }else{
                $response = array(
                    'status' => 'failed',
                    'message' => "Failed to add"
                    );
                }
                
                
        }else{
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        echo json_encode($response);
    }

    // This loads the update form for the selected data item
    function getUpdateForm(){
        $employeid = $this->input->get('emp_id');
        $data['emp'] = $this->employe_model->findWhere($employeid)->row(0);
        $this->load->view('updateview', $data);
    }

    // This function to delete employee record
    function deleteEmployee(){
        $employeid = $this->input->get('emp_id');
        $this -> employe_model-> deleteData($employeid);
        $this->index();
    }

}
?>