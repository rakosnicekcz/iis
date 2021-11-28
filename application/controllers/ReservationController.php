<?php
class ReservationController extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('TicketModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation']);
        $this->load->library('session');
        $this->load->database();
    }

    public function reserveTickets()
    {
        $this->load->view('templates/header');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('surename', 'Surename', 'required');
        $this->form_validation->set_rules('num_tickets', 'Number of tickets', 'required');

        $code = "";
        while (1) {
            $code = bin2hex(random_bytes(5));
            if (!$this->TicketModel->get_ticket_by_code($code)) {
                break;
            }
        }

        if ($this->session->has_userdata("email")) {
            $this->load->view('pages/reserveTicketsLogged');
            $id = $_SESSION["id"];
            $name = $_SESSION["name"];
            $surename = $_SESSION["surename"];
            $email = $_SESSION["email"];
            $num_tickets = $this->input->post('num_tickets');
            $conference_id = "";
            $conference_id = $_GET['reserve'];
            for ($i = 0; $i < $num_tickets; $i++) {
                $this->TicketModel->add_ticketR($email, $name, $surename, $code, $conference_id, $id);
            }
        } else {
            $this->load->view('pages/reserveTickets');
            $name = $this->input->post('name');
            $surename = $this->input->post('surename');
            $email = $this->input->post('email');
            $num_tickets = $this->input->post('num_tickets');
            $conference_id = $_GET['reserve'];

            for ($i = 0; $i < $num_tickets; $i++) {
                $this->TicketModel->add_ticket($email, $name, $surename, $code, $conference_id);
            }
        }
        $this->load->view('templates/footer');
    }

    public function removeTicket()
    {
        if (!isset($_POST["removed"])) {
            redirect("/");
        }
        $ticket = $this->TicketModel->get_ticket_by_code($_POST["removed"]);
        if (!$ticket || ($ticket["user_id"] != $_SESSION["id"] && $_SESSION["admin"] != "1")) {
            redirect("/");
        }
        $this->TicketModel->delete_ticket_by_code($this->input->post('removed'));
        redirect("user/user");
    }
}
