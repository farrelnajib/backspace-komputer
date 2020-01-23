<?php defined('BASEPATH') or exit('No direct script access allowed');

class Shipment_model extends CI_Model
{
    private $_table = 'shipments';

    public function getAll()
    {
        return $this->db->query('SELECT time, products.product_name, status.status_info, amount, quantity_after FROM shipments
                                JOIN products ON products.product_id = shipments.product_id
                                JOIN status ON status.status_id = shipments.status_id
                                ORDER BY time DESC');
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }
}
