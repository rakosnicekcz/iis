<?php
class UserAccessController extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
        $this->load->library(['form_validation']);
        $this->load->library('session');
        $this->load->database();
    }

    private function redirect_if_logged()
    {
        if ($this->session->has_userdata("email")) {
            redirect('/');
        }
    }

    public function registration()
    {
        $this->redirect_if_logged();
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('surename', 'Surename', 'required');
        $this->form_validation->set_rules('passwordAgain', 'Password again', 'required');

        $this->load->view('templates/header');
        if ($this->form_validation->run() == false) {
            $this->load->view('pages/registration');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $passwordAgain = $this->input->post('passwordAgain');
            $name = $this->input->post('name');
            $surename = $this->input->post('surename');

            if ($this->user_model->get_user_by_email($email)) {
                $this->session->set_flashdata('registration_error', 'Account with this email already exists.', 300);
                $this->load->view('pages/registration');
                $this->load->view('templates/footer');
                return;
            } elseif ($password !== $passwordAgain) {
                $this->session->set_flashdata('registration_error', 'Passwords are not same.', 300);
                $this->load->view('pages/registration');
                $this->load->view('templates/footer');
                return;
            } else {
                $insertedId = $this->user_model->add_user($email, $name, $surename, password_hash($password, PASSWORD_DEFAULT));
                $this->session->set_userdata(['id' => $insertedId, 'name' => $name, 'surename' => $surename, 'email' => $email, "admin" => "0", "justloggedin" => true]);
                redirect("/");
            }
        }
    }

    public function login()
    {
        $this->redirect_if_logged();

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->load->view('templates/header');
        if ($this->form_validation->run() == false) {
            $this->load->view('pages/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->user_model->get_user_by_email($email);

            if (!$user) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                $this->load->view('pages/login');
                $this->load->view('templates/footer');
                return;
            }

            if (!password_verify($password, $user->password)) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                $this->load->view('pages/login');
                $this->load->view('templates/footer');
                return;
            }
            if (intval($user->is_deactivated)) {
                $this->session->set_flashdata('login_error_deactivated', true);
                redirect('/');
            }

            $this->session->set_userdata(['admin' => $user->is_admin, 'id' => $user->id, 'name' => $user->name, 'surename' => $user->surename, 'email' => $user->email, "justloggedin" => true]); ///TODO víc dat + info o prihlaseni
            redirect('/');
        }
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }
}
