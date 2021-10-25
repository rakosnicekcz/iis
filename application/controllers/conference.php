<?php
class Pages extends CI_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation']);
        $this->load->database();
    }

    public function edit(){
        // TODO pass data from view or session??? stupid php

        if(count($this->input->get()) == 0 || !isset($this->input->get()["id"])){
            $this->load->helper('url');
            redirect('/');
        }
                $data["conference"] = $this->conference_model->get_conference_by_id(intval($this->input->get()["id"]));
        
                $this->load->view('templates/header');
                $this->load->view('conferenceeditview', $data);
                $this->load->view('templates/footer');
    }
}