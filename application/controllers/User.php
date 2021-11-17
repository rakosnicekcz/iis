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

        if ($this->session->userdata["admin"]) {
            $data["users"] = $this->user_model->get_all_users();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/user', $data);
        $this->load->view('templates/footer');
    }

    public function ajaxGetUserById()
    {
        if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
            echo json_encode($this->user_model->get_user_by_id($_POST["id"]));
        }
    }

    public function ajaxUpdateUserById()
    {
        if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
            $newData = ["name" => $_POST["name"], "surename" => $_POST["surename"], "email" => $_POST["email"], "is_admin" => (int)$_POST["admin"]];
            $this->user_model->update_user_by_id($_POST["id"], $newData);
            echo json_encode($this->user_model->get_all_users());
        }
    }

    public function ajaxDeleteUserById()
    {
        if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
            $this->user_model->delete_user_by_id($_POST["id"]);
            echo json_encode($this->user_model->get_all_users());
        }
    }
}
