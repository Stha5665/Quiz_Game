<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->Model('preview_model');
        $this->logged_in();
    }

    public function logged_in() {
        if(!($this->session->userdata('authenticated'))) {
            redirect('login');
        }
    }
    
    public function index(){
        ob_start();
        // $this->load->view('login');
        $this->load->view('preview');
        
        $contents = ob_get_clean();
        $data = [
            'title' => "Preview-Quiz",
            'output' => $contents
        ];

        $this->load->view('layout', $data);
    }

    public function getSubmitedAnswer(){
        $player_id = $this->input->get('userId');
        $user = $this->preview_model->findWhere('quiz_played', 'player_id', $player_id)->row(0);
        echo $user->choosen_answer;
    }
    // public function showQuiz(){

    //     $question_id = $this->input->post('page');
    //     $data['question'] = $this->quiz_model->findWhere('quiz_questions', 'question_id',$question_id)->row(0);
    //     $data['options'] = $this->quiz_model->findWhere('quiz_options', 'question_id', $question_id)->row(0);
    //     echo json_encode($data);
    
    // }
}