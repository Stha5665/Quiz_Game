<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->Model('dashboard_model');
        $this->logged_in();
    }

    public function logged_in() {
        if(!($this->session->userdata('authenticated'))) {
            redirect('login');
        }
    }
    
    public function index(){
        ob_start();
        $data['quizPlayed'] = $this->dashboard_model->getAllPlayerData();
        $this->load->view('index', $data);
       
        $contents = ob_get_clean();
        $data = [
            'title' => 'Hello '.$this->session->userdata('id'),
            'output' => $contents
        ];
        $this->load->view('layout', $data);

    }

    

}