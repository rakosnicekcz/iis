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
        
        if (count($this->input->get()) == 0 || !isset($this->input->get()["id"])) {
            $this->load->helper('url');
            redirect('/');
        }

        $data["conference"] = $this->conference_model->get_conference_by_id(intval($this->input->get()["id"]));
        $this->load->model('GenreModel');
        $data["genres"] = $this->GenreModel->get_all_genres();

        $this->load->view('templates/header');
        $this->load->view('pages/ConferenceEditView', $data);
        $this->load->view('templates/footer');

    }

    public function create()
    {   
        $this->load->model('GenreModel');
        $data["genres"] = $this->GenreModel->get_all_genres();

        $this->load->view('templates/header');
        $this->load->view('pages/ConferenceCreateView', $data);
        $this->load->view('templates/footer');
    }

    public function conference()
    {   

        if($this->input->post('save'))
		{
		    $sdata['name'] = $this->input->post('name');
			$sdata['genre_id'] = $this->input->post('genre_id');
			$sdata['description'] = $this->input->post('description');
            $sdata['image'] = "dsad";
            $sdata['place'] = $this->input->post('place');
            $sdata['from'] = $this->input->post('from');
            $sdata['to'] = $this->input->post('to');
            $sdata['price'] = $this->input->post('price');
            $sdata['capacity'] = $this->input->post('capacity');
            $sdata['user_id'] = 0;


            $this->load->model('Conference_model');
			$this->Conference_model->insert_conference($sdata);
            echo "Conference succesfuly Created.";
        }

        if(isset($this->input->get()["id"])){
            $id = intval($this->input->get()["id"]);
        }
        else if($this->input->post('edit')){
            $id = $this->input->post('edit');
        }
        else{
            $id = $this->conference_model->get_conference_by_highest_id();
        }

        $data["conference"] = $this->conference_model->get_conference_by_id($id);

        $this->load->model('PresentationModel');
        $data["presentations"] = $this->PresentationModel->get_presentations_by_conference_id($id);

        $result = $this->conference_model->get_sold_tickets_count_by_conference_id($id);
        $data["available"] = $data["conference"]["capacity"] - $result["sold"];

        if($this->input->post('edit'))
		{   
		    $sdata['name'] = $this->input->post('name');
			$sdata['genre_id'] = $this->input->post('genre_id');
			$sdata['description'] = $this->input->post('description');
            //$sdata['image'] = "dsad";
            $sdata['place'] = $this->input->post('place');
            $sdata['from'] = $this->input->post('from');
            $sdata['to'] = $this->input->post('to');
            $sdata['price'] = $this->input->post('price');
            $sdata['capacity'] = $this->input->post('capacity');
            $sdata['user_id'] = $data["conference"]["User_id"];


            $this->load->model('Conference_model');
			$this->Conference_model->update_conference($sdata, $data["conference"]["conference_id"]);
            echo "Conference succesfuly added.";
        }

        $this->load->view('templates/header');
        $this->load->view('pages/ConferenceDetailView', $data);
        $this->load->view('templates/footer');
    }
}
