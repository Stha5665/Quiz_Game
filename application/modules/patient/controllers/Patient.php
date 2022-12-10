<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends MY_Controller {
    public function __construct(){
        parent::__construct();
       
        $this->load->Model('patient_model');
    }

    public function index(){
        
        $contents = $this->load->view('dashboard','', true);
    
        $data = [
            'title' => 'HMS-patient managementS',
            'output' => $contents
        ];
        $this->load->view('layout', $data);

    }

    // This loads form to register patient
    public function registerForm(){
        $contents = $this->load->view('registerPatient', '', true);
    
        $data = [
            'title' => 'HMS-patient register',
            'output' => $contents
        ];
        $this->load->view('layout', $data);

    }

    // gets all data of that table
    public function getData($tableName){
        $data = $this->patient_model->getAllData($tableName);
        echo json_encode($data);

    }
    // gets all data of table by where condition
    public function findData($tableName, $field, $value){
        $data = $this->patient_model->findWhere($tableName, $field, $value)->result_array();
        echo json_encode($data);

    }

    // This shows all patient details
    public function showPatient(){
        $data = $this->patient_model->getAllPatientData();
        echo json_encode($data);

        
    }

    // loads layout for register and billing
    public function registerBilling(){
        $contents = $this->load->view('regBill', '', true);
    
        $data = [
            'title' => 'HMS-patient Register & Billing',
            'output' => $contents
        ];
        $this->load->view('layout', $data);
    }

    // This function to load template to preview bills
    public function previewBills(){
        $contents = $this->load->view('previewBill', '', true);
    
        $data = [
            'title' => 'HMS-Bills Details of patient',
            'output' => $contents
        ];
        $this->load->view('layout', $data);

    }

    public function showBills(){

        // if patient id is given load that specific patients bills
        // it is useful while preview 
        if(isset($_GET['patient_id'])){
            $patient_id = $_GET['patient_id'];
            $this->findData('bill_details', 'patient_id', $patient_id);
        }
        else{
            // if patient_id is not set load all data
            // this is useful for showing bills page available in sidebar
            $this->getData('bill_details');
        }
    }

    // This function loads test details of that bill
    public function showTests(){

        if(isset($_POST['sample_no'])){

            $sample_id = $_POST['sample_no'];
            $this->findData('test_details', 'sample_no', $sample_id);
        }else{
            $this->getData('test_details');
        }
    }


}