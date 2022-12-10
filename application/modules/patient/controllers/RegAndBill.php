<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegAndBill extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->Model('register_model');
    }

    // validate along with save data to bill_details table and test_details table
    public function saveTestAmount(){
        $response = [];
        $this->form_validation->set_rules('testName', 'Test Name', 'required|trim');
        $this->form_validation->set_rules('unitPrice', 'Unit Price', 'required|trim');
        $this->form_validation->set_rules('qty', 'Quantity', 'required|trim');
        $this->form_validation->set_rules('discountPercent', 'Discount %', 'required|trim');
        if($this->form_validation->run() == true){
            $name = $this->input->post('testName');
            $unitPrice = $this->input->post('unitPrice');
            $quantity = $this->input->post('qty');
            $totalPrice = $this->input->post('totalPrice');
            $discountPercent = $this->input->post('discountPercent');
            $discountAmount = $this->input->post('discount');
            $netAmount = $this->input->post('netAmount');
            $patientID = $this->input->post('patientID');

            // This get the last id from the table 
            $sampleNo = $this->register_model->lastId('sample_no', 'bill_details');
            $data = [
                'sample_no' => $sampleNo,
                'patient_id' => $patientID,
                'test_items' => $name,
                'quantity' => $quantity,
                'unit_price' => $unitPrice
                
            ];
            $insertData = $this->register_model->insertData('test_details', $data);

            $data = [
                'sample_no' => $sampleNo,
                'patient_id' => $patientID,
                'billing_date' => date("Y-m-d H:i:s"),
                'sub_total' => $totalPrice,
                'discount_percent' => $discountPercent,
                'discount_amount' => $discountAmount,
                'net_total' => $netAmount 

            ];
            $insertData = $this->register_model->insertData('bill_details', $data);

            if($insertData){
                $response = array(
                    'status' => 'success',
                    'message' => "Items Successfully Added",
                    'sampleno' => $sampleNo
                );
            }else{
                $response = array(
                    'status' => 'failed',
                    'message' => "Failed to add"
                );
            }
    
    
        }
        else{
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        echo json_encode($response);
        
    
    }

    // This function is to remove test details as well as the bill details of that test
    public function removeTestAmount(){
        $response = [];
        $sample_no = $this->input->post('sampleno');

        $delData = $this->register_model->deleteData('test_details', 'sample_no', $sample_no);
        $delData = $this->register_model->deleteData('bill_details', 'sample_no', $sample_no);

        if($delData){
            $response = array(
                'status' => 'success',
                'message' => 'Successfully Deleted!'
            );
        }else{
            $response = array(
                'status' => 'failed',
                'message' => 'Failed To Delete'
            );
        }

        echo json_encode($response);
    }
}

?>
