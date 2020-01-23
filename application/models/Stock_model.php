<?php defined('BASEPATH') or exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    private $_table = 'stocks';

    public $quantity;

    public function getAll()
    {
        $this->db->from($this->_table);
        return $this->db->get()->result();
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function getTotal()
    {
        return $this->db->query('SELECT SUM(quantity) FROM stocks');
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function editData($id, $quantity)
    {
        $this->db->where('product_id', $id);
        $this->db->update($this->_table, $quantity);
    }

    public function delete($id)
    {
        $this->db->where('product_id', $id);
        return $this->db->delete($this->_table);
    }
}
