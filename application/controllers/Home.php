<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
    }

    public function home()
    {
        if (!file_exists(APPPATH . 'views/pages/home.php')) {
            show_404();
        }

        $data["conferences"] = $this->conference_model->get_all_conferences();
        $data["justloggedin"] = $this->session->has_userdata('justloggedin');
        $this->session->unset_userdata('justloggedin');

        $this->load->view('templates/header');
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }
}
