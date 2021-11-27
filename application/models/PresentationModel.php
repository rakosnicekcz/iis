<?php
    class PresentationModel extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_all_presentations(){
            $query = $this->db->get('presentations');
            return $query->result_array();
        }

        public function get_presentation_by_id($id){
            $query = $this->db->query("SELECT * FROM presentations WHERE id = ?",[$id]);
            return $query->row_array();
        }

        public function get_presentations_by_conference_id($id){
            $query = $this->db->query("SELECT * FROM presentations WHERE conference_id = ? ORDER BY start ASC",[$id]);
            return $query->result_array();
        }

        public function get_presentation_by_highest_id()
        {
            $query = $this->db->query("SELECT id FROM Presentations ORDER BY id DESC LIMIT 1");
            return $query->row_array();
        }

        public function insert_presentation($data)
        {
            $this->db->insert('Presentations', $data);
        }

        public function update_presentation($data, $id)
        {   
            $this->db->where('id', $id);
            $this->db->update('Presentations', $data);
        }
    }