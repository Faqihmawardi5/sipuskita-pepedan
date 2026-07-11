<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->data['title_web'] = 'Login | Sistem Informasi Perpustakaan';
        $this->load->view('login_view', $this->data);
    }

    public function auth()
    {
        $user = $this->input->post('user', TRUE);
        $pass = $this->input->post('pass', TRUE);

        if (empty($user) || empty($pass)) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Username dan Password wajib diisi!
                </div>'
            );

            redirect('login');
        }

        $proses_login = $this->db->get_where('tbl_login', array(
            'user' => $user,
            'pass' => md5($pass)
        ));

        if ($proses_login->num_rows() > 0) {

            $hasil_login = $proses_login->row_array();

            $data_session = array(
                'masuk_perpus' => TRUE,
                'level'        => $hasil_login['level'],
                'ses_id'       => $hasil_login['id_login'],
                'anggota_id'   => $hasil_login['anggota_id']
            );

            $this->session->set_userdata($data_session);

            redirect('dashboard');

        } else {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Login gagal! Username atau Password salah.
                </div>'
            );

            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}