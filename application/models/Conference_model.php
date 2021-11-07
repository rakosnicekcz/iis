<?php
class Conference_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_conferences()
    {
        $query = $this->db->get('Conferences');
        return $query->result_array();
    }

    public function get_conference_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM Conferences WHERE conference_id = ?", [$id]);
        return $query->row_array();
    }

    public function get_conference_by_highest_id()
    {
        $query = $this->db->query("SELECT conference_id FROM Conferences ORDER BY conference_id DESC LIMIT 1");
        return $query->row_array();
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('Users', ['email' => $email])->row();
    }

    public function add_user($email, $name, $surename, $password)
    {
        $this->db->insert("users", ["email" => $email, "name" => $name, "surename" => $surename, "password" => $password]);
    }

    public function get_sold_tickets_count_by_conference_id($id)
    {
        $query = $this->db->query("SELECT COUNT(*) AS sold FROM Tickets WHERE conference_id = ?", [$id]);
        return $query->row_array();
    }

    public function insert_conference($data)
    {
        $this->db->insert('conferences', $data);
    }

    public function update_conference($data, $id)
    {   
        $this->db->where('conference_id', $id);
        $this->db->update('conferences', $data);
    }
    

}
