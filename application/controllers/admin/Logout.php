<?php defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        $this->session->set_userdata('isLoggedIn', false);
        $this->session->unset_userdata('last_activity');

        $this->session->sess_destroy();

        $this->session->set_flashdata('successTambah', 'You have been logged out');
        redirect(base_url('admin/login'));
    }
}
