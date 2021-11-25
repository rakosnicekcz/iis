<?php
class PresentationController extends CI_Controller
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

        if (!isset($this->input->get()["id"]) && !isset($_POST["submit"])) {
            redirect('/');
        }
        $id = isset($_POST["submit"]) ? intval($_POST["submit"]) : intval($this->input->get()["id"]);

        $data["presentation"] = $this->presentation_model->get_presentation_by_id($id);
        $this->load->model('RoomModel');
        $data["rooms"] = $this->RoomModel->get_rooms_by_conference_id($data["presentation"]["conference_id"]);
        $data["id"] = $id;

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('pages/ConferenceEditView', $data);
            $this->load->view('templates/footer');
        } else {

            if ($_FILES["image"]["size"] != 0) {
                $config['upload_path'] = './uploads/'; // upload image
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 50000;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);

                $this->upload->do_upload('image');
            }

            $sdata['name'] = $this->input->post('name');
            $sdata['room_id'] = $this->input->post('room_id');
            $sdata['description'] = $this->input->post('description');
            if ($_FILES["image"]["size"] != 0) {
                $sdata['image'] = $this->upload->data()["file_name"];
            }
            $sdata['start'] = $this->input->post('start');
            $sdata['finish'] = $this->input->post('finish');
            $sdata['tags'] = $this->input->post('tags');
            $sdata['user_id'] = $this->input->post('user_id');

            if (strtotime($sdata["start"]) > strtotime($sdata["finish"])) {
                $this->session->set_flashdata('date_error', 'Presentation start time must come before its finish time.', 300);
                redirect(uri_string() . "?id=" . $id);
            }

            $this->PresentationModel->update_presentation($sdata, $data["presentation"]["presentation_id"]);
            redirect('presentation?id=' . $id);
        }
    }

    public function create()
    {   
        if (!isset($this->input->get()["id"]) && !isset($_POST["submit"])) {
            redirect('/');
        }
        $data["conference_id"] = isset($_POST["submit"]) ? intval($_POST["submit"]) : intval($this->input->get()["conference_id"]);
        $data["rooms"] = $this->RoomModel->get_rooms_by_conference_id($data["conference_id"]);

        $this->load->model('RoomModel');
        $data["genres"] = $this->RoomModel->get_all_genres();

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('pages/ConferenceCreateView', $data);
            $this->load->view('templates/footer');
        } else {

            $config['upload_path'] = './uploads/'; // upload image
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 50000;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            $this->upload->do_upload('image');

            $sdata['name'] = $this->input->post('name');
            $sdata['room_id'] = $this->input->post('room_id');
            $sdata['description'] = $this->input->post('description');
            if ($_FILES["image"]["size"] != 0) {
                $sdata['image'] = $this->upload->data()["file_name"];
            }
            $sdata['start'] = $this->input->post('start');
            $sdata['finish'] = $this->input->post('finish');
            $sdata['tags'] = $this->input->post('tags');
            $sdata['user_id'] = $this->input->post('user_id');

            if (strtotime($sdata["start"]) > strtotime($sdata["finish"])) {
                $this->session->set_flashdata('date_error', 'Presentation start time must come before its finish time.', 300);
                // dopln mateji redirect ja uz nemuzu premyslet (uri_string() . "?id=" . $id);
            }

            $this->load->model('Conference_model');
            $this->PresentationModel->insert_conference($sdata);
            $presentation_id = $this->PresentationModel->get_conference_by_highest_id();
            redirect('presentation?id=' . $presentation_id["conference_id"]);
        }

        $this->load->view('templates/footer');
    }

    public function presentation()
    {   

        $id = 0;

        if (isset($this->input->get()["id"])) {
            $id = intval($this->input->get()["id"]);
        } else {
            redirect("/");
        }

        $data["presentation"] = $this->PresentationModel->get_presentation_by_id($id);

        $this->load->model('RoomModel');
        $data["rooms"] = $this->PresentationModel->get_rooms_by_presentation_id($id);

        if($data["presentation"]["used_id"]){
            $this->load->model('User_model');
            $data["user"] = $this->User_model->get_user_by_presentation_id($id);
        }

        $this->load->view('templates/header');
        $this->load->view('pages/PresentationDetailView', $data);
        $this->load->view('templates/footer');
    }
}