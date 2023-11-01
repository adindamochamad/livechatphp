<?php
defined('BASEPATH') or exit;

class My_model extends CI_Model
{
    public function registeruser($name, $email, $type)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'type' => $type
        );
        $this->db->insert('user', $data);
    }

    public function insertchat($message, $user_id, $ref_id, $time)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'user_id' => $user_id,
            'message' => $message,
            'ref_id' => $ref_id,
            'time' => $time
        );
        $this->db->insert('message', $data);
    }

    public function loadchat($user_id, $ref_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('ref_id', $ref_id);
        $this->db->or_where('user_id', $ref_id);
        $this->db->or_where('ref_id', $user_id);
        $this->db->order_by('time', 'asc');
        $query = $this->db->get('message');
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
}
