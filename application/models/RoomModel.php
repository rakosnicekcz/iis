<?php
    class RoomModel extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_all_rooms()
        {
            $query = $this->db->get('Rooms');
            return $query->result_array();
        }

        public function get_rooms_by_conference_id($id){
            $query = $this->db->query("SELECT * FROM Rooms WHERE conference_id = ? ",[$id]);
            return $query->result_array();
        }

        public function get_room_by_id($id)
        {
            $query = $this->db->query("SELECT * FROM rooms WHERE id = ?", [$id]);
            return $query->row_array();
        }


        public function get_room_by_highest_id()
        {
            $query = $this->db->query("SELECT id FROM Rooms ORDER BY id DESC LIMIT 1");
            return $query->row_array();
        }

        public function insert_room($data)
        {
            $this->db->insert('rooms', $data);
        }

        public function update_presentation($data, $id)
        {   
            $this->db->where('id', $id);
            $this->db->update('Rooms', $data);
        }
    }