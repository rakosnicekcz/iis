<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('Users', ['email' => $email])->row();
    }

    public function add_user($email, $name, $surename, $password)
    {
        $this->db->insert("users", ["email" => $email, "name" => $name, "surename" => $surename, "password" => $password]);
    }

    public function get_tickets_by_user_id($id)
    {
        return $this->db->query('SELECT C.name, c.image, c.from, c.to, t.code, c.conference_id, t.ID, count(T.Conference_id) as "count" FROM TICKETS T iNNER JOIN CONFERENCES C ON T.Conference_id = c.Conference_id WHERE t.User_id = ? Group by T.Conference_id', [$id])->result_array();
    }

    public function get_conferences_by_user_id($id)
    {
        return $this->db->query('SELECT c.conference_id, c.name, c.image, c.from, c.to, c.capacity FROM conferences c INNER JOIN genres g ON c.conference_id=g.genre_id WHERE c.User_id= ?', [$id])->result_array();
    }

    public function get_ticket_count_by_conference_id($id)
    {
        return $this->db->query('SELECT count(*) as "count" FROM tickets WHERE Conference_id = ?', [$id])->row();
    }

    public function get_presentations_by_user_id($id)
    {
        return $this->db->query('SELECT p.name "p_name", p.presentation_id, p.start, p.finish, p.conference_id, c.name "c_name" FROM presentations p JOIN conferences c on c.conference_id=p.conference_id WHERE p.User_id = ?', [$id])->result_array();
    }
}
