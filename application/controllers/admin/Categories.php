<?php defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
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

        $this->load->model('Category_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["categories"] = $this->Category_model->getAll();
        $this->load->view("admin/category/list", $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('category_name', 'Category', 'required|is_unique[categories.category_name]');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/category/new_form');
        } else {
            $name = $this->input->post('category_name');
            $dataRegister = ['category_name' => $name];
            $this->Category_model->save($dataRegister);

            $this->session->set_flashdata('successTambah', "Berhasil memasukkan kategori $name");
            redirect(base_url('admin/categories'));
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Category_model->getByID($id) == null) show_404();

        $data['category'] = $this->Category_model->getByID($id);
        $this->form_validation->set_rules('category_name', 'Category', 'required|is_unique[categories.category_name]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/category/edit_form', $data);
        } else {
            $dataRegister = ['category_name' => $this->input->post('category_name')];
            $this->Category_model->editData($id, $dataRegister);
            $this->session->set_flashdata('successEdit', 'Berhasil mengedit kategori');
            redirect(base_url('admin/categories'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Category_model->getByID($id) == null) show_404();

        $deleted = $this->Category_model->getByID($id);
        $jumlah = $this->Product_model->getByCategory($id);

        if (count($jumlah) > 0) {
            $this->session->set_flashdata('del', "Mohon ganti dulu kategori dari produk yang memiliki kategori $deleted->category_name");
            redirect(base_url('admin/products'));
        } else if ($this->Category_model->delete($id)) {
            $this->session->set_flashdata('del', "Anda baru saja menghapus kategori $deleted->category_name");
            redirect(site_url('admin/categories'));
        }
    }
}
