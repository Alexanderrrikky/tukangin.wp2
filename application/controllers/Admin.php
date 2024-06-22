<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }




    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('usermodel');
        $data['anggota'] = $this->usermodel->getUser()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('usermodel');
        $data['transaksi'] = $this->usermodel->transaksi()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('usermodel');

        $data['role'] = $this->usermodel->userrole();

        $this->form_validation->set_rules('role', 'Role', 'required|min_length[3]', [
            'required' => 'Role harus diisi',
            'min_length' => 'Role  terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role', true)
            ];
            $this->usermodel->simpanRole($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Tambah role berhasil</div>');
            redirect('admin/role');
        }
    }

    public function editrole()
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('usermodel');

        $data['role'] = $this->usermodel->roleWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|min_length[3]', [
            'required' => 'Role harus diisi',
            'min_length' => 'Role  terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role', true)
            ];
            $this->usermodel->updateRole(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Role Berhasil di Edit</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id

        ];

        $result = $this->db->get_where('user_access_menu', $data);


        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">akses di ubah</div>');
    }

    public function editPembayaran()
    {
        $data['title'] = 'Edit Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('usermodel');

        $data['metode'] = $this->usermodel->metodeWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('metode', 'Metode', 'required|min_length[3]', [
            'required' => 'Metode bayar harus diisi',
            'min_length' => 'Metode bayar terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editPembayaran', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'm_bayar' =>  $this->input->post('metode', true)
            ];

            $this->usermodel->updatePembayaran(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Metode pembayaran berhasil di ubah </div>');
            redirect('tukangin/metodebayar');
        }
    }
}
