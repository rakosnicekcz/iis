<?php
    class Conference_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_all_conferences(){
            $query = $this->db->get('Conferences');
            return $query->result_array();
        }

        public function get_conference_by_id($id){
            $query = $this->db->query("SELECT * FROM Conferences WHERE conference_id = ?",[$id]);
            return $query->row_array();
        }

        public function get_user_by_mail($email){
            return $this->db->get_where('Users',['email' => $email])->row();
        }
    }