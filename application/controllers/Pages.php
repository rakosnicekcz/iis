<?php
class Pages extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation','session']);
        $this->load->database();
    }

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data["conferences"] = $this->conference_model->get_all_conferences();

        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function login(){
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        $this->load->view('templates/header');
        if($this->form_validation->run() == false){
            $this->load->view('pages/login');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->conference_model->get_user_by_mail($email);

            if(!$user) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                redirect(uri_string());
            }

            if(!password_verify($password,$user->password)) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                redirect(uri_string());
            }

            $this->session->set_userdata(['login'=>$user->login]); ///TODO víc dat + info o prihlaseni
            redirect('/');
        }
        $this->load->view('templates/footer');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

    public function conference()
    {
        if(count($this->input->get()) == 0 || !isset($this->input->get()["id"])){
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

    public function edit(){
        // TODO pass data from view or session??? stupid php

        if(count($this->input->get()) == 0 || !isset($this->input->get()["id"])){
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
}
