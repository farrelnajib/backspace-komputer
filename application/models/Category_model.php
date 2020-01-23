<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    private $_table = 'categories';

    public $category_name;

    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("category_name", "asc");
        return $this->db->get()->result();
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->_table, ["category_id" => $id])->row();
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function editData($id, $name)
    {
        $this->db->where('category_id', $id);
        $this->db->update($this->_table, $name);
    }

    public function delete($id)
    {
        $this->db->where('category_id', $id);
        return $this->db->delete('categories');
    }
}
