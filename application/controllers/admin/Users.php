<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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

        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["users"] = $this->User_model->getAll();
        if (isAdmin()) {
            $this->load->view("admin/user/list", $data);
        } else {
            $this->load->view("admin/user/list_kroco", $data);
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

    public function add()
    {
        if (!isAdmin()) {
            $this->session->set_flashdata('del', 'Access denied!');
            redirect(base_url('admin/users'));
        }
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[6]', [
            'matches' => 'Password don\'t match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Password don\'t match'
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'required|callback_select_validate');

        if ($this->form_validation->run() == false) {
            $data["roles"] = $this->db->get('roles')->result();
            $this->load->view('admin/user/new_form', $data);
        } else {
            $name = htmlspecialchars($this->input->post('user_name'));
            $email = htmlspecialchars($this->input->post('email'));
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $role = $this->input->post('role_id');
            $dataRegister = [
                'user_name' => $name,
                'email' => $email,
                'password' => $password,
                'role_id' => $role
            ];
            $this->User_model->save($dataRegister);

            $this->session->set_flashdata('successTambah', "Berhasil memasukkan user $name");
            redirect(base_url('admin/users'));
        }
    }

    public function edit($id = null)
    {
        if (!isset($id) || ($this->User_model->getByID($id) == null)) show_404();

        $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]', [
            'matches' => 'Password don\'t match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]', [
            'matches' => 'Password don\'t match'
        ]);
        if (isAdmin()) {
            $this->form_validation->set_rules('role_id', 'Role', 'required|callback_select_validate');
        } else {
            $this->form_validation->set_rules('old_password', 'Old password', 'required|trim');
        }

        $data['users'] = $this->User_model->getByID($id);
        $data['roles'] = $this->db->get('roles')->result();

        if ($this->form_validation->run() == false) {
            if (!isAdmin() && $this->session->userdata('id') != $id) {
                $this->session->set_flashdata('del', 'Access denied!');
                redirect(base_url('admin/users'));
            } else if (!isAdmin() && $this->session->userdata('id') == $id) {
                $this->load->view('admin/user/edit_form_kroco', $data);
            } else {
                $this->load->view('admin/user/edit_form', $data);
            }
        } else {
            if (isAdmin()) {
                $name = htmlspecialchars($this->input->post('user_name'));
                $email = htmlspecialchars($this->input->post('email'));
                $password = $this->input->post('password1');
                $role = $this->input->post('role_id');

                $dataRegister = [
                    'user_name' => $name,
                    'email' => $email,
                    'role_id' => $role
                ];

                if (isset($password) && trim($password) != '') {
                    $dataRegister['password'] = password_hash($password, PASSWORD_DEFAULT);
                }
                $this->User_model->editData($id, $dataRegister);

                $this->session->set_flashdata('successTambah', "Berhasil mengedit user $name");
                redirect(base_url('admin/users'));
            } else {
                if (password_verify($this->input->post('old_password'), $data['users']->password)) {
                    $name = htmlspecialchars($this->input->post('user_name'));
                    $email = htmlspecialchars($this->input->post('email'));
                    $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                    $dataRegister = [
                        'user_name' => $name,
                        'email' => $email
                    ];
                    if (isset($password) && trim($password) != '') {
                        $dataRegister['password'] = password_hash($password, PASSWORD_DEFAULT);
                    }
                    $this->User_model->editData($id, $dataRegister);

                    $this->session->set_flashdata('successTambah', "Berhasil mengedit user $name");
                    redirect(base_url('admin/users'));
                } else {
                    $this->session->set_flashdata('del', 'Wrong password!');
                    if (!isAdmin() && $this->session->userdata('id') == $id) {
                        $this->load->view('admin/user/edit_form_kroco', $data);
                    }
                }
            }
        }
    }

    public function delete($id = null)
    {
        if (!isset($id) || ($this->User_model->getByID($id) == null)) show_404();

        if (!isAdmin() && $this->session->userdata('id') != $id) {
            $this->session->set_flashdata('del', 'Access denied!');
            redirect(base_url('admin/users'));
        }

        if (isAdmin() && $this->session->userdata('id') == $id) {
            $this->session->set_flashdata('del', 'Can\'t delete your own user!');
            redirect(base_url('admin/users'));
        }

        $deleted = $this->User_model->getByID($id);
        if ($this->User_model->delete($id)) {
            $this->session->set_flashdata('del', "Anda baru saja menghapus user $deleted->user_name");
            redirect(base_url('admin/users'));
        }
    }
}
