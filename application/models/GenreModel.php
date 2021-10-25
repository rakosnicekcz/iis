<?php
    class GenreModel extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_all_genres(){
            $query = $this->db->get('Genres');
            return $query->result_array();
        }
    }