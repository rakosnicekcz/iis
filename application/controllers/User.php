<?php
class User extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->database();
    }

    public function user()
    {
        if (!$this->session->has_userdata("id")) {
            redirect('/');
        }

        $data["tickets"] = $this->user_model->get_tickets_by_user_id(intval($this->session->userdata["id"]));
        $data["conferences"] = $this->user_model->get_conferences_by_user_id(intval($this->session->userdata["id"]));
        foreach ($data["conferences"] as $key => $value) {
            $data["conferences"][$key]["reserved"] = $this->user_model->get_ticket_count_by_conference_id($value["conference_id"])->count;
        }
        $data["presentations"] = $this->user_model->get_presentations_by_user_id(intval($this->session->userdata["id"]));

        $this->load->view('templates/header');
        $this->load->view('pages/user', $data);
        $this->load->view('templates/footer');
    }
}
