<?php defined('BASEPATH') or exit('No direct script access allowed');

class Shipments extends CI_Controller
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
        $this->load->model('Shipment_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["shipments"] = $this->Shipment_model->getAll()->result();
        $this->load->view("admin/shipment/list", $data);
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

    private function checkAmount()
    {
        $quantity = $this->Stock_model->getByID($this->input->post('product_name'))->quantity;
        $amount = $this->input->post('amount');
        $operation = $this->input->post('status_id');

        if ($operation == "0" && $quantity - $amount < 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add()
    {
        $dataProduct["products"] = $this->Product_model->getAll()->result();
        $this->form_validation->set_rules('product_name', 'Product Name', 'callback_select_validate');
        $this->form_validation->set_rules('status_id', 'Operation', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/shipment/new_form', $dataProduct);
        } else if ($this->checkAmount()) {
            $this->session->set_flashdata('del', "Jumlah barang keluar tidak boleh lebih dari sisa stok");
            $this->load->view('admin/shipment/new_form', $dataProduct);
        } else {
            $id = $this->input->post('product_name');
            $status = $this->input->post('status_id');
            $amount = $this->input->post('amount');
            $quantity = $this->Stock_model->getByID($this->input->post('product_name'))->quantity;
            $quantity_after = 0;
            if ($status == "1") {
                $quantity_after = $quantity + $amount;
            } else {
                $quantity_after = $quantity - $amount;
            }

            $dataRegister = [
                'product_id' => $id,
                'status_id' => $status,
                'amount' => $amount,
                'quantity_after' => $quantity_after,
                'time' => date("Y-m-d H:i:s")
            ];
            $this->Shipment_model->save($dataRegister);

            $dataQuantity = [
                'quantity' => $quantity_after
            ];
            $this->Stock_model->editData($id, $dataQuantity);
            $this->session->set_flashdata('successTambah', "Berhasil menambahkan pengiriman");
            redirect(base_url('admin/shipments'));
        }
    }
}
