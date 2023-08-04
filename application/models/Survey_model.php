<?php
class Survey_model extends CI_Model
{

    function Add($data)
    {
        $this->db->insert('survey_master', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    function AddQuestion($data)
    {
        $this->db->insert('survey_questions', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    function AddAnswer($data)
    {
        $this->db->insert('survey_answers', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    function GetFromField($where)
    {
        $this->db->select('*', FALSE)->from('survey_master');
        $query = $this->db->where($where)->get();
        $data = $query->result();
        return $data;
    }
    function GetQuestions($where)
    {
        $this->db->select('*, survey_master.id as survey_id,survey_questions.id as question_id', FALSE)->from('survey_questions');
        $query = $this->db->join('survey_master', 'survey_questions.survey_id = survey_master.id');
        $query = $this->db->where($where)->get();
        $this->db->order_by('survey_master.id' . " " . 'ASC');
        $data = $query->result();
        return $data;
    }
    function GetSurvey($user_id)
    {
        $query = $this->db->query("SELECT DISTINCT sm.id,sm.title,sm.description FROM survey_master sm LEFT JOIN survey_answers sa ON sm.id = sa.survey_id AND sa.user_id = $user_id WHERE sa.survey_id IS NULL;");
        $data = $query->result();
        return $data;
    }
    function getSurveyById($surveyId = [])
    {
        $this->db->select('*', FALSE)->from('survey_questions');
        $query = $this->db->join('survey_master', 'survey_questions.survey_id = survey_master.id');
        $this->db->where_in('survey_master.id', $surveyId);
        $query = $this->db->get(); // Perform the query
        $data = $query->result();
        return $data;
    }
    function GetUser($where)
    {
        $this->db->select('users.*, survey_answers.survey_id', FALSE)->from('users');
        $query = $this->db->join('survey_answers', 'survey_answers.user_id = users.id');
        $query = $this->db->where($where);
        $this->db->order_by('users.id', 'ASC');
        $this->db->group_by('survey_answers.user_id');
        $query = $this->db->get();
        return $query->result();
    }
    function GetAllQuestion($where)
    {
        $this->db->select('*, survey_master.id as surveyid,survey_questions.id as question_id', FALSE)->from('survey_answers');
        $query = $this->db->join('survey_master', 'survey_answers.survey_id = survey_master.id');
        $query = $this->db->join('survey_questions', 'survey_questions.id = survey_answers.question_id');
        $query = $this->db->join('users', 'users.id = survey_answers.user_id');
        $query = $this->db->where($where)->get();
        $data = $query->result();
        return $data;
    }
}
