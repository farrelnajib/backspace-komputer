<?php defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        if (empty($this->session->userdata('id')) || $this->session->userdata('isLoggedIn') != true) {
            deleteSession();
            $this->session->set_flashdata('del', 'Please login first');
            redirect(base_url('admin/login'));
        } else if (time() > $this->session->userdata('last_activity')) {
            deleteSession();
            $this->session->set_flashdata('del', 'Session has ended, please login first');
            redirect(base_url('admin/login'));
        }

        setSession();

        $this->load->model('Product_model');
        $this->load->model('Brand_model');
        $this->load->model('Category_model');
        $this->load->model('Stock_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["products"] = $this->Product_model->getAll()->result();
        $this->load->view("admin/product/list", $data);
    }

    public function add()
    {
        $dataProduct["categories"] = $this->Category_model->getAll();
        $dataProduct["brands"] = $this->Brand_model->getAll();

        $this->form_validation->set_rules('product_name', 'product name', 'required|is_unique[products.product_name]');
        $this->form_validation->set_rules('category_name', 'Category', 'callback_select_validate');
        $this->form_validation->set_rules('brand_name', 'Brand', 'callback_select_validate');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/product/new_form', $dataProduct);
        } else {
            $name = $this->input->post('product_name');
            $category = $this->input->post('category_name');
            $brand = $this->input->post('brand_name');
            $price = $this->input->post('price');
            $dataRegister = [
                'product_name' => $name,
                'category_id' => $category,
                'brand_id' => $brand,
                'price' => $price
            ];
            $this->Product_model->save($dataRegister);

            $quantity = $this->input->post('quantity');
            $productID = $this->Product_model->getID($name)->product_id;
            $dataQuantity = [
                'product_id' => $productID,
                'quantity' => $quantity
            ];
            $this->Stock_model->save($dataQuantity);
            $this->session->set_flashdata('successTambah', "Berhasil memasukkan produk $name");
            redirect(base_url('admin/products'));
        }
    }

    public function select_validate($value)
    {
        if ($value == '0') {
            $this->form_validation->set_message('select_validate', 'Please pick one.');
            return false;
        } else {
            return true;
        }
    }

    public function edit($id = null)
    {
        if (!isset($id) || ($this->Product_model->getByID($id) == null)) show_404();

        $dataProduct['products'] = $this->Product_model->getByID($id);
        $dataProduct["stocks"] = $this->Stock_model->getByID($id);
        $dataProduct["categories"] = $this->Category_model->getAll();
        $dataProduct["brands"] = $this->Brand_model->getAll();
        $dataProduct["productCategory"] = $this->Category_model->getByID($dataProduct['products']->category_id);
        $dataProduct["productBrand"] = $this->Brand_model->getByID($dataProduct['products']->brand_id);

        $this->form_validation->set_rules('product_name', 'product name', 'required');
        $this->form_validation->set_rules('category_name', 'Category', 'callback_select_validate');
        $this->form_validation->set_rules('brand_name', 'Brand', 'callback_select_validate');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/product/edit_form', $dataProduct);
        } else {
            $name = $this->input->post('product_name');
            $category = $this->input->post('category_name');
            $brand = $this->input->post('brand_name');
            $price = $this->input->post('price');
            $dataRegister = [
                'product_name' => $name,
                'category_id' => $category,
                'brand_id' => $brand,
                'price' => $price
            ];
            $this->Product_model->editData($id, $dataRegister);

            $this->session->set_flashdata('successEdit', "Berhasil mengedit produk $name");
            redirect(base_url('admin/products'));
        }
    }

    // public function delete($id = null)
    // {
    //     if (!isset($id)) show_404();
    //     $productDeleted = $this->Product_model->getByID($id);

    //     if ($this->Product_model->delete($id) && $this->Stock_model->delete($id)) {
    //         $this->session->set_flashdata('del', "Anda baru saja menghapus produk $productDeleted->product_name");
    //         redirect(site_url('admin/products'));
    //     }
    // }
}
