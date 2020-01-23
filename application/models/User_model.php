<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = 'users';

    public function getAll()
    {
        return $this->db->query("SELECT * FROM users
                                JOIN roles ON users.role_id = roles.role_id")->result();
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function getEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function editData($id, $userData)
    {
        $this->db->where('user_id', $id);
        $this->db->update($this->_table, $userData);
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->delete($this->_table);
    }
}
