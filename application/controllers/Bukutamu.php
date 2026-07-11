<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukutamu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->model('Bukutamu_model'); // kita buat model Bukutamu_model
    }

    // Halaman utama Buku Tamu
    public function index()
    {
        $data['title_web'] = 'Buku Tamu SIPUSKITA';

        // Ambil semua data pengunjung (dari tabel pengunjung)
        $data['tamu'] = $this->Bukutamu_model->get_all();

        $this->load->view('pengunjung/buku_tamu', $data);
        $this->load->view('frontend/footer', $data);
    
    }

    // Simpan data tamu
    public function simpan()
    {
        $data = [
            'nama'               => $this->input->post('nama'),
            'jk'                 => $this->input->post('jk'),
            'alamat'             => $this->input->post('alamat'),
            'keperluan'          => $this->input->post('keperluan'),
            'tanggal_kunjungan'  => date('Y-m-d'),
            'waktu_kunjungan'    => date('H:i:s')
        ];

        $this->Bukutamu_model->insert($data);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success">Terima kasih, data kunjungan telah dicatat.</div>'
        );

        redirect('bukutamu');
    }
}
