<?php
class Conference extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation']);
        $this->load->library('session');
        $this->load->database();
    }

    public function edit()
    {
        // TODO pass data from view or session??? stupid php

        if (count($this->input->get()) == 0 || !isset($this->input->get()["id"])) {
            $this->load->helper('url');
            redirect('/');
        }

        $data["conference"] = $this->conference_model->get_conference_by_id(intval($this->input->get()["id"]));
        $this->load->model('GenreModel');
        $data["genres"] = $this->GenreModel->get_all_genres();

        $this->load->view('templates/header');
        $this->load->view('conferenceeditview', $data);
        $this->load->view('templates/footer');
    }

    public function conference()
    {
        if (count($this->input->get()) == 0 || !isset($this->input->get()["id"])) {
            $this->load->helper('url');
            redirect('/');
        }

        $data["conference"] = $this->conference_model->get_conference_by_id(intval($this->input->get()["id"]));

        $this->load->model('PresentationModel');
        $data["presentations"] = $this->PresentationModel->get_presentations_by_conference_id(intval($this->input->get()["id"]));

        $result = $this->conference_model->get_sold_tickets_count_by_conference_id(intval($this->input->get()["id"]));
        $data["available"] = $data["conference"]["capacity"] - $result["sold"];

        $this->load->view('templates/header');
        $this->load->view('pages/ConferenceDetailView', $data);
        $this->load->view('templates/footer');
    }
}
