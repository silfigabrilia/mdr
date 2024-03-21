<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_username($name)
    {
        $query = $this->db->get_where('user', ['name' => $name]);
        return $query->num_rows();
    }

    public function get_password($name)
    {
        $data = $this->db->get_where('user', ['name' => $name])->row_array();
        return $data['password'];
    }

    public function userdata($name)
    {
        return $this->db->get_where('user', ['name' => $name])->row_array();
    }
	
	public function get()
    {
        $this->db->from('user');
        if ($user['role_id'] == 1) {
            $this->db->where('id', $user);
        }
        $query = $this->db->get();
        return $query;
    }
}
