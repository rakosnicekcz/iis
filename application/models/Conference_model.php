<?php
    class Conference_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_all_conferences(){
            $query = $this->db->get('Conferences');
            return $query->result_array();
        }
    }