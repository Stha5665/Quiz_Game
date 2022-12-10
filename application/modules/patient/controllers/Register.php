<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->Model('register_model');
    }

    // get all country details
    public function getAllCountry(){
        $data = $this->register_model->getAllData('countries');
        echo json_encode($data);
        
    }

    // fetch provinces by country id
    public function getProvinces(){
        $country_id = $this->input->post('countryID');
        $data = $this->register_model->findWhere('provinces', 'country_id', $country_id)->result();
        echo json_encode($data);
    }
    // fetch municipality of that province
    public function getMunicipalities(){
        $province_id = $this->input->post('provinceID');
        $data = $this->register_model->findWhere('municipalities', 'province_id', $province_id)->result();
        echo json_encode($data);
    }

    // This saves the data of new patient
    public function savePatient(){
        $response = [];
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('age', 'Age', 'required|numeric|trim|greater_than[0]|less_than[100]');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('province', 'Province', 'required|trim');
        $this->form_validation->set_rules('municipality', 'Municipality', 'required|trim');
  
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        // validation rule for phone number
        $this->form_validation->set_rules('phoneno', 'Mobile Number', 'required|trim|required|regex_match[/^[0-9]{10}$/]',
        array('required' => 'You have not provided %s.',
            'regex_match' => 'You must enter 10 digits only'));

        $this->form_validation->set_message('phoneno', 'Mobile Number should be in digit');
        $this->form_validation->set_rules('language[]', 'Language', 'required|trim');
       
        if($this->form_validation->run() == true){
            $name = $this->input->post('name');
            $age = $this->input->post('age');
            $gender = $this->input->post('gender');
            $country = $this->input->post('country');
            $province = $this->input->post('province');
            $municipality = $this->input->post('municipality');
            $address = $this->input->post('address');
            $phoneno = $this->input->post('phoneno');

            // getting checkbox values and storing it as string
            $languages = $this->input->post('language[]');
            $language = implode(" ", $languages);

            $data = [
                'name' => $name,
                'age' => $age,
                'gender' => $gender,
                'country' => $country,
                'province' => $province,
                'municipality' => $municipality,
                'address' => $address,
                'phoneno' => $phoneno,
                'language' => $language,
                'date_time' => date("Y-m-d H:i:s")
            ];


            $insertData = $this->register_model->insertData('patients', $data);

            if($insertData){
                $response = array(
                    'status' => 'success',
                    'message' => "Successfully Registered"
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

    

}

?>