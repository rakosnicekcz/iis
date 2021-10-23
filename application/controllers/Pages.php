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
        $data["justloggedin"] = $this->session->has_userdata('justloggedin');
        $this->session->unset_userdata('justloggedin');

        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    private function redirect_if_logged(){
        if($this->session->has_userdata("email")){
            redirect('/');
        }
    }

    public function registration(){
        $this->redirect_if_logged();
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('surename', 'Surename', 'required');
        $this->form_validation->set_rules('passwordAgain', 'Password again', 'required');

        $this->load->view('templates/header');
        if($this->form_validation->run() == false){
            $this->load->view('pages/registration');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $passwordAgain = $this->input->post('passwordAgain');
            $name = $this->input->post('name');
            $surename = $this->input->post('surename');

            if($this->conference_model->get_user_by_email($email)){
                $this->session->set_flashdata('registration_error', 'Account with this email already exist.', 300);
                redirect(uri_string());
            }elseif($password !== $passwordAgain){
                $this->session->set_flashdata('registration_error', 'Passwords are not same.', 300);
                redirect(uri_string());
            }else{
                $this->session->set_userdata(['name'=>$name, 'surename'=>$surename, 'email'=>$email, "justloggedin"=>true]);
                $this->conference_model->add_user($email, $name, $surename, password_hash($password, PASSWORD_DEFAULT));
                redirect('/');
            }
        }
    }

    public function login(){
        $this->redirect_if_logged();

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        $this->load->view('templates/header');
        if($this->form_validation->run() == false){
            $this->load->view('pages/login');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->conference_model->get_user_by_email($email);

            if(!$user) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                redirect(uri_string());
            }

            if(!password_verify($password,$user->password)) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                redirect(uri_string());
            }

            $this->session->set_userdata(['name'=>$user->name, 'surename'=>$user->surename, 'email'=>$user->email, "justloggedin"=>true]); ///TODO víc dat + info o prihlaseni
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

        $this->load->view('templates/header');
        $this->load->view('pages/conference', $data);
        $this->load->view('templates/footer');
    }
}
