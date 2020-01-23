<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $user = $this->User_model->getEmail($email);

        if ($user) {
            if (password_verify($pass, $user['password'])) {
                $data = [
                    'id' => $user['user_id'],
                    'name' => $user['user_name'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'isLoggedIn' => true,
                    'last_activity' => time() + 60
                ];
                $this->session->set_userdata($data);
                redirect(base_url('admin'));
            } else {
                $this->session->set_flashdata('del', 'Wrong password!');
                $this->load->view('admin/login');
            }
        } else {
            $this->session->set_flashdata('del', 'Email is not registered!');
            $this->load->view('admin/login');
        }
    }
}
