<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = 'products';

    public $category_name;

    public function getAll()
    {
        return $this->db->query('SELECT products.product_id, product_name, categories.category_name, brands.brand_name, stocks.quantity, price FROM products
                                JOIN brands ON brands.brand_id = products.brand_id
                                JOIN categories ON categories.category_id = products.category_id
                                JOIN stocks ON stocks.product_id = products.product_id
                                ORDER BY product_name');
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function getByBrand($brand_id)
    {
        return $this->db->query("SELECT * FROM products WHERE brand_id = $brand_id")->result();
    }

    public function getByCategory($category_id)
    {
        return $this->db->query("SELECT * FROM products WHERE category_id = $category_id")->result();
    }


    public function getID($product_name)
    {
        return $this->db->get_where($this->_table, ["product_name" => $product_name])->row();
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function editData($id, $name)
    {
        $this->db->where('product_id', $id);
        $this->db->update($this->_table, $name);
    }

    // public function delete($id)
    // {
    //     $this->db->where('product_id', $id);
    //     return $this->db->delete('products');
    // }
}
