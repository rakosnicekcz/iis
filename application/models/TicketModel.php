<?php
class TicketModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_tickets()
    {
        $query = $this->db->get('Tickets');
        return $query->result_array();
    }

    public function add_ticket($email, $name, $surename, $code, $conference_id)
    {
        $this->db->insert("tickets", ["email" => $email, "name" => $name, "surename" => $surename, "code" => $code, "conference_id" => $conference_id]);
    }

    public function add_ticketR($email, $name, $surename, $code, $conference_id, $user_id)
    {
        $this->db->insert("tickets", ["email" => $email, "name" => $name, "surename" => $surename, "code" => $code, "conference_id" => $conference_id, "user_id" => $user_id]);
    }
    
    public function delete_ticket_by_id($id)
    {
        $this->db->delete('tickets', ['id' => $id]);
    }
}
