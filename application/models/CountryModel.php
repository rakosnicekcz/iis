<?php
class CountryModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_countries()
    {
        $query = $this->db->get('countries');
        return $query->result_array();
    }
}
