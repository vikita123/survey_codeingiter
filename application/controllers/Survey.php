<?php defined('BASEPATH') or exit('No direct script access allowed');

class Survey extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('survey_model');
    }
    function saveSurveyQuestion()
    {
        if ($this->session->userdata('ROLE_ID') == 0) {
            redirect('User/Panel');
        }
        // echo "<pre>";
        // print_r($_POST);
        if (!empty($_POST['checkbox_label']) || !empty($_POST['radio_label']) || !empty($_POST['question'])) {
            $survey_data = array();
            $survey_data['title'] = $_POST['form_title'];
            $survey_data['description'] = $_POST['form_description'];
            $survey_data['user_id'] = $this->session->userdata('USER_ID');
            $result = $this->survey_model->Add($survey_data);
            if ($result) {
                foreach ($_POST['question'] as $key => $value) {
                    $queation_data = array();
                    $queation_data['question'] = $value;
                    $queation_data['type'] = $_POST['question_type'][$key];
                    if ($_POST['question_type'][$key] == 'tp_checkbox') {
                        $queation_data['frm_option'] = implode(',', $_POST['checkbox_label'][$key]);
                    } else {
                        $queation_data['frm_option'] = implode(',', $_POST['radio_label'][$key]);
                    }
                    $queation_data['survey_id'] = $result;
                    $this->survey_model->AddQuestion($queation_data);
                }
            }
        }
        redirect('User/Panel');
    }
    function viewSurvey($id)
    {
        if ($this->session->userdata('ROLE_ID') == 0) {
            redirect('User/Panel');
        }
        $data['page_title'] = "Welcome to Admin Panel";
        $data['getQuestion'] = $this->survey_model->GetQuestions(array('survey_id' => $id));
        $this->load->view('_Layout/home/header.php', $data);
        $this->load->view("admin/viewSurvey");
        $this->load->view('_Layout/home/footer.php');
    }
    function viewResponse($id)
    {
        if ($this->session->userdata('ROLE_ID') == 0) {
            redirect('User/Panel');
        }
        $data['page_title'] = "Welcome to Admin Panel";
        $data['getUsers'] = $this->survey_model->GetUser(array('survey_id' => $id));
        $this->load->view('_Layout/home/header.php', $data);
        $this->load->view("admin/userList");
        $this->load->view('_Layout/home/footer.php');
    }

    function viewAnswer($user_id, $survey_id)
    {

        if ($this->session->userdata('ROLE_ID') == 0) {
            redirect('User/Panel');
        }
        $data['page_title'] = "Welcome to Admin Panel";
        $data['getAllQuestions'] = $this->survey_model->GetAllQuestion(array('survey_answers.survey_id' => $survey_id, 'survey_answers.user_id' => $user_id));
        $this->load->view('_Layout/home/header.php', $data);
        $this->load->view("admin/responseSurvey");
        $this->load->view('_Layout/home/footer.php');
    }
    function TakeSurvey($id)
    {
        $data['page_title'] = "Welcome to Admin Panel";
        $data['getQuestion'] = $this->survey_model->GetQuestions(array('survey_id' => $id));
        $this->load->view('_Layout/home/header.php', $data);
        $this->load->view("user/takeSurvey");
        $this->load->view('_Layout/home/footer.php');
    }
    function saveSurveyAnswer()
    {
        if (!empty($_POST['question_id'])) {
            foreach ($_POST['question_id'] as $key => $value) {
                $survey_data = array();
                $survey_data['survey_id'] = $_POST['survey_id'];
                $survey_data['user_id'] = $this->session->userdata('USER_ID');
                $survey_data['question_id'] = $value;
                $question_type = $_POST['question_type'][$key];
                if ($question_type == 'tp_checkbox') {
                    $survey_data['answer'] = implode(',', $_POST['checkbox_label'][$key]);
                } else {
                    $survey_data['answer'] = implode(',', $_POST['radio_label'][$key]);
                }
                $this->survey_model->AddAnswer($survey_data);
            }
        }
        redirect('User/Panel');
    }
}
