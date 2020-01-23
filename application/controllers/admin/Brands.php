<?php defined('BASEPATH') or exit('No direct script access allowed');

class Brands extends CI_Controller
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

        $this->load->model('Brand_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["brands"] = $this->Brand_model->getAll();
        $this->load->view("admin/brand/list", $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('brand_name', 'Brand', 'required|is_unique[brands.brand_name]|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/brand/new_form');
        } else {
            $name = $this->input->post('brand_name');
            $dataRegister = ['brand_name' => $name];
            $this->Brand_model->save($dataRegister);

            $this->session->set_flashdata('successTambah', "Berhasil memasukkan brand $name");
            redirect(base_url('admin/brands'));
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Brand_model->getByID($id) == null) show_404();

        $this->form_validation->set_rules('brand_name', 'Brand', 'required|is_unique[brands.brand_name]');
        if ($this->form_validation->run() == false) {
            $data['brand'] = $this->Brand_model->getByID($id);
            $this->load->view('admin/brand/edit_form', $data);
        } else {
            $dataRegister = ['brand_name' => $this->input->post('brand_name')];
            $this->Brand_model->editData($id, $dataRegister);
            $this->session->set_flashdata('successEdit', 'Berhasil mengedit brand');
            redirect(base_url('admin/brands'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Brand_model->getByID($id) == null) show_404();

        $deleted = $this->Brand_model->getByID($id);
        $jumlah = $this->Product_model->getByBrand($id);

        if (count($jumlah) > 0) {
            $this->session->set_flashdata('del', "Mohon ganti dulu brand dari produk yang punya brand $deleted->brand_name");
            redirect(base_url('admin/products'));
        } else if ($this->Brand_model->delete($id)) {
            $this->session->set_flashdata('del', "Anda baru saja menghapus brand $deleted->brand_name");
            redirect(site_url('admin/brands'));
        }
    }
}
