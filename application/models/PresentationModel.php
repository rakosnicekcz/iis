<?php
    class PresentationModel extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_all_presentations(){
            $query = $this->db->get('Presentations');
            return $query->result_array();
        }

        public function get_presentation_by_id($id){
            $query = $this->db->query("SELECT * FROM Presentations WHERE presentation_id = ?",[$id]);
            return $query->row_array();
        }

        public function get_presentation_by_highest_id()
        {
        $query = $this->db->query("SELECT presentation_id FROM Presentations ORDER BY presentation_id DESC LIMIT 1");
        return $query->row_array();
        }

        public function get_presentations_by_conference_id($id){
            $query = $this->db->query("SELECT * FROM Presentations WHERE conference_id = ? ORDER BY start ASC",[$id]);
            return $query->result_array();
        }

        public function insert_presentation($data)
        {
            $this->db->insert('presentations', $data);
        }

        public function update_presentation($data, $id)
        {   
            $this->db->where('presentation_id', $id);
            $this->db->update('presentations', $data);
        }

    }