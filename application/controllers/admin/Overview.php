<?php

class Overview extends CI_Controller
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
        $this->load->model('Shipment_model');
        $this->load->model('Stock_model');
    }

    private function getTotal()
    {
        $stocks = $this->Stock_model->getAll();
        $total = 0;
        foreach ($stocks as $stock) :
            $total += $stock->quantity;
        endforeach;

        return $total;
    }

    public function index()
    {
        $dataProduct["products"] = $this->Product_model->getAll()->result();
        $dataProduct["brands"] = $this->Brand_model->getAll();
        $dataProduct["categories"] = $this->Category_model->getAll();
        $dataProduct["jumlahShipments"] = $this->Shipment_model->getAll()->result();
        $dataProduct["totalProduk"] = $this->getTotal();
        $this->load->view('admin/overview', $dataProduct);
    }
}
