<?php defined('BASEPATH') or exit('No direct script access allowed');

class Brand_model extends CI_Model
{
    private $_table = 'brands';

    public $brand_name;

    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("brand_name", "asc");
        return $this->db->get()->result();
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->_table, ["brand_id" => $id])->row();
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function editData($id, $brand_name)
    {
        $this->db->where('brand_id', $id);
        $this->db->update($this->_table, $brand_name);
    }

    public function delete($id)
    {
        $this->db->where('brand_id', $id);
        return $this->db->delete('brands');
    }
}
