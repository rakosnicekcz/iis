<?php
class ConferenceManagerController extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation']);
        $this->load->library('session');
        $this->load->database();
    }

    private function checkDateOverlap($startDate1, $endDate1, $startDate2, $endDate2)
    {
        return (strtotime($startDate1) < strtotime($endDate2)) and (strtotime($startDate2) < strtotime($endDate1));
    }

    public function ajaxDeletePlan()
    {
        $this->load->model('PresentationModel');
        $this->PresentationModel->update_presentation(["room_id" => NULL, "start" => NULL, "finish" => NULL], $_POST["id"]);
    }

    public function timePlanner()
    {
        //TODO check prihlaseni a GET id

        $this->load->model('RoomModel');
        $this->load->model('PresentationModel');
        $this->load->model('Conference_model');
        $this->load->model('TicketModel');
        $data["rooms"] = $this->RoomModel->get_rooms_by_conference_id($_GET["id"]);
        $conference = $this->Conference_model->get_conference_by_id($_GET["id"]);
        $data["presentations"] = $this->PresentationModel->get_confirmed_presentations_by_conference_id($_GET["id"]);

        $data["plan"] = $this->PresentationModel->get_confirmed_presentations_with_rooms($_GET["id"]);
        $data["reservations"] = $this->TicketModel->get_all_tickets();
        function cmp($a, $b)
        {
            return (int)$a["room_id"] > (int)$b["room_id"];
        }
        usort($data["plan"], "cmp");

        $this->form_validation->set_rules('selectPresentation', 'Presentation', 'required');
        $this->form_validation->set_rules('selectRoom', 'Room', 'required');
        $this->form_validation->set_rules('inputDateFrom', 'Date From', 'required');
        $this->form_validation->set_rules('inputDateTo', 'Date To', 'required');

        $this->load->view('templates/header');
        if ($this->form_validation->run() == false) {
            $this->load->view('pages/ManagerTimePlanner', $data);
            $this->load->view('templates/footer');
        } else {
            if (strtotime($_POST["inputDateFrom"]) < strtotime($conference["from"]) || strtotime($_POST["inputDateTo"]) > strtotime($conference["to"])) {
                $this->session->set_flashdata(
                    'conf_date_error',
                    'Presentations date is not in date of conference (' . $conference["from"] . ' - ' . $conference["to"] . ')'
                );

                $this->load->view('pages/ManagerTimePlanner', $data);
                $this->load->view('templates/footer');
                return;
            }
            if (strtotime($_POST["inputDateFrom"]) > strtotime($_POST["inputDateTo"])) {
                $this->session->set_flashdata('date_error', 'Presentation ends before it starts');

                $this->load->view('pages/ManagerTimePlanner', $data);
                $this->load->view('templates/footer');
                return;
            }
            foreach ($data["plan"] as $key => $value) {
                if ($value["room_id"] == $_POST["selectRoom"] && $value["id"] != $_POST["selectPresentation"]) {
                    if ($this->checkDateOverlap($_POST["inputDateFrom"], $_POST["inputDateTo"], $value["start"], $value["finish"])) {
                        $this->session->set_flashdata('room_error', 'Presentation overlaping with another in same room');

                        $this->load->view('pages/ManagerTimePlanner', $data);
                        $this->load->view('templates/footer');
                        return;
                    }
                }
            }
            $this->PresentationModel->update_presentation(["room_id" => $_POST["selectRoom"], "start" => $_POST["inputDateFrom"], "finish" => $_POST["inputDateTo"]], $_POST["selectPresentation"]);
            $data["plan"] = $this->PresentationModel->get_confirmed_presentations_with_rooms($_GET["id"]);
            usort($data["plan"], "cmp");
            $this->load->view('pages/ManagerTimePlanner', $data);
            $this->load->view('templates/footer');
        }
    }
}
