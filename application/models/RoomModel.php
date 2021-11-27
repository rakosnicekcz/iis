<?php
class RoomModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_rooms()
    {
        $query = $this->db->get('Rooms');
        return $query->result_array();
    }

    public function get_rooms_by_conference_id($id)
    {
        $query = $this->db->query("SELECT * FROM Rooms WHERE conference_id = ? ", [$id]);
        return $query->result_array();
    }

    public function get_room_by_presentation_id($id)
    {
        $query = $this->db->query("SELECT * FROM Rooms WHERE presentation_id = ? LIMIT 1", [$id]);
        return $query->row_array();
    }

    public function get_room_by_highest_id()
    {
        $query = $this->db->query("SELECT room_id FROM Rooms ORDER BY room_id DESC LIMIT 1");
        return $query->row_array();
    }

    public function insert_room($data)
    {
        $this->db->insert('rooms', $data);
    }

    public function get_room_by_id($id)
    {
        return $this->db->get_where('rooms', ['id' => $id])->row_array();
    }

    public function update_room($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('Rooms', $data);
    }
}
