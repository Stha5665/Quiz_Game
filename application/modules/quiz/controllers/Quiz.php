<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->Model('quiz_model');
    }

    // public function index(){
    //    if(isset($_POST['page'])){
    //         $question_id = $this->input->post('page');
    //    }else{
    //         $question_id = 1 ;
    //     }
    //     ob_start();
    //     $data['question'] = $this->quiz_model->findWhere('quiz_questions', 'question_id',$question_id)->row(0);
    //     $data['options'] = $this->quiz_model->findWhere('quiz_options', 'question_id', $question_id)->row(0);
    //     $this->load->view('quizview', $data);
       
    //     $contents = ob_get_clean();
    //     $data = [
    //         'title' => 'Play Quiz',
    //         'output' => $contents
    //     ];
    //     $this->load->view('layout', $data);
    // }
    public function index(){
        $data['title'] = "Play Quiz";
        // $data['question'] = 1;
        
        $this->load->view('quizview', $data);
    }

    public function showQuiz(){

        // if(isset($_POST['page'])){
        $question_id = $this->input->post('page');
    //    }else{
            // $question_id = 1 ;
        // }
        $data['question'] = $this->quiz_model->findWhere('quiz_questions', 'question_id',$question_id)->row(0);
        $data['options'] = $this->quiz_model->findWhere('quiz_options', 'question_id', $question_id)->row(0);
        echo json_encode($data);
    
    }

    public function saveAnswer(){
        $data['choosen_answer'] = $this->input->post('answer');
        $data['score'] = $this->input->post('totalScore');
        $data['played_date_time'] = date("Y-m-d H:i:s"); 
        $data['player_name'] = $this->input->post('username');
        $data['total_time_taken'] = $this->input->post('totalTime');
        $data['evaluation'] = $this->input->post('mark');
        // if($data['choosen_answer'] != "{}"){

            $this->quiz_model->saveData($data);
        // }
       

    }
}
?>