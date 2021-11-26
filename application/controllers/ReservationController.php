<?php
class ReservationController extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation']);
        $this->load->library('session');
        $this->load->database();
    }

    public function number_of_tickets()
    {
        
    }

    public function reserve()
    {

    }
}
?>