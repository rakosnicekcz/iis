<?php
class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data["conferences"] = $this->conference_model->get_all_conferences();
        var_dump($data['conferences']);

        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
}
