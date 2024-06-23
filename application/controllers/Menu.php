<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['menu'] = $this->menu->usermenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            // kalo pakai model bisa tapi cuma 1 baris jadi tidak perlu pakai model
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Menu baru berhasil di tambahkan </div>');
            redirect('menu');
        }
    }

    public function editmenu()
    {
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['menu'] = $this->menu->menuWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|min_length[3]', [
            'required' => 'Menu harus diisi',
            'min_length' => 'Menu  terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu', true)
            ];
            $this->menu->updateMenu(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"> Menu Berhasil di Edit</div>');
            redirect('menu');
        }
    }

    public function hapusmenu()
    {
        $this->load->model('Menu_model', 'menu');
        $where = ['id' => $this->uri->segment(3)];
        $this->menu->hapusmenu($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"> Menu Management Berhasil di hapus</div>');
        redirect('menu');
    }


    public function submenu()
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->menu->usermenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"> Sub menu baru berhasil di tambahkan </div>');
            redirect('menu/submenu');
        }
    }

    public function editsubmenu()
    {
        $data['title'] = 'Edit SubMenu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->submenuWhere(['id' => $this->uri->segment(3)])->result_array();
        $data['menu'] = $this->menu->usermenu();

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]', [
            'required' => 'Title harus diisi',
            'min_length' => 'Title terlalu pendek'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Menu harus di Pilih',
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required|min_length[3]', [
            'required' => 'URL harus diisi',
            'min_length' => 'URL  terlalu pendek'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required|min_length[3]', [
            'required' => 'Icone harus diisi',
            'min_length' => 'Icone  terlalu pendek'
        ]);


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah_submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->menu->updatesubmenu(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"> Sub Menu Berhasil di Edit</div>');
            redirect('menu/submenu');
        }
    }

    public function hapussubmenu()
    {
        $this->load->model('Menu_model', 'menu');
        $where = ['id' => $this->uri->segment(3)];
        $this->menu->hapussubmenu($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"> Sub Menu Management Berhasil di hapus</div>');
        redirect('menu/submenu');
    }
}
