<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->Model('login_model');
        
    }

    public function logged_in(){
        if(!($this->session->userdata('authenticated'))){
          
            // redirect('login/');
        }
        
    }

    public function index(){
        // loading to buffer using php
        
        // $this -> load ->model('login');
        // $message = $this -> getMessage();
        // ob_start();
        // $this->load->view('login');
       
        // $contents = ob_get_clean();

        $contents = $this->load->view('login', '', true);
        $data = [
            'title' => 'Login-Page',
            'output' => $contents
        ];

        $this->load->view('layout', $data);

    }

    public function checkdata(){
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('message', validation_errors());
            redirect('login');

        }else{
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = $this->login_model-> login($email, $password);

            if($user){
                $userdata = [
                    'id' => $user->id,
                    'email' => $user->email,
                    'authenticated' => true
                ];

                $this->session->set_userdata($userdata);

                redirect('login/dashboard');
            }else{
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('login');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }


}
?>