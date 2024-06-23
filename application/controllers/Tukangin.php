<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Tukangin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "Halaman Depan";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('tukangin/v-header', $data);
        $this->load->view('tukangin/v-hiro', $data);
        $this->load->view('tukangin/v-footer', $data);
    }

    public function about()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman About";
        $this->load->view('tukangin/v-header', $data);
        $this->load->view('tukangin/v-about', $data);
        $this->load->view('tukangin/v-footer', $data);
    }


    public function contact()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman contact";
        $this->load->view('tukangin/v-header', $data);
        $this->load->view('tukangin/v-contact', $data);
        $this->load->view('tukangin/v-footer', $data);
    }

    public function services()
    {
        $data['judul'] = "Halaman servis";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Bayar_model', 'bayar');

        $data['metode'] = $this->bayar->getmbayar()->result_array();


        $this->form_validation->set_rules('email', 'Email', 'required|min_length[10]', [
            'required' => 'email harus di isi',
            'min_length' => 'email terlalu pendek'
        ]);
        $this->form_validation->set_rules('metode', 'Metode Bayar', 'required', [
            'required' => 'metode harus di pilih',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]', [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat terlalu pendek'
        ]);
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|min_length[12]', [
            'required' => 'Nomor harus diisi',
            'min_length' => 'nomor terlalu pendek'
        ]);

        $config['upload_path'] = './asset/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('tukangin/v-header', $data);
            $this->load->view('tukangin/v-services', $data);
            $this->load->view('tukangin/v-footer', $data);
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama' => $this->input->post('nama'),
                'jam' => $this->input->post('jam'),
                'total_bayar' => $this->input->post('total_bayar'),
                'email' => $this->input->post('email'),
                'metode' => $this->input->post('metode'),
                'alamat' => $this->input->post('alamat'),
                'nomor' => $this->input->post('nomor'),
                'image' => $gambar,
                'tgl' => time()

            ];
            $this->bayar->simpanTransaksi($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Jasa di proses</div>');
            redirect('tukangin/services');
        }
    }


    public function blockHoom()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman blok-hoom";
        $this->load->view('tukangin/v-header', $data);
        $this->load->view('tukangin/v-blok-hoom', $data);
        $this->load->view('tukangin/v-footer', $data);
    }


    public function overview()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman portfolio-overview";
        $this->load->view('tukangin/v-header', $data);
        $this->load->view('tukangin/v-portfolio-overview', $data);
        $this->load->view('tukangin/v-footer', $data);
    }
    public function item()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman portfolio-item";
        $this->load->view('tukangin/v-header', $data);
        $this->load->view('tukangin/v-portfolio-item', $data);
        $this->load->view('tukangin/v-footer', $data);
    }

    public function mulai()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman portfolio-item";
        $this->load->view('tukangin/v-header', $data);
        $this->load->view('tukangin/v-services', $data);
        $this->load->view('tukangin/v-footer', $data);
    }


    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/profile', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);

            // //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './asset/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'asset/img/profile/' . $gambar_lama);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('tukangin/profile');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Change password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Password yang anda masukan salah </div>');
                redirect('tukangin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Password tidak boleh sama dengan password lama</div>');
                    redirect('tukangin/changepassword');
                } else
                    // password benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">password berhasil di ubah</div>');
                redirect('tukangin/changepassword');
            }
        }
    }

    public function metodebayar()
    {
        $data['title'] = 'Metode bayar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Bayar_model', 'bayar');
        $data['metode'] = $this->bayar->getmbayar()->result_array();

        $this->form_validation->set_rules('m_bayar', 'metode', 'required');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/metodebayar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'm_bayar' => $this->input->post('m_bayar', TRUE)
            ];

            $this->bayar->simpanmetod($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Metode pembayaran berhasil di tambahkan  </div>');
            redirect('tukangin/metodebayar');
        }
    }
}
