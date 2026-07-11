<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        // Ambil 3 kegiatan terbaru
        $data['kegiatan'] = $this->db->order_by('tgl', 'DESC')
                                     ->limit(3)
                                     ->get('tbl_kegiatan')
                                     ->result();

        $data['title'] = 'Beranda';

        // =========================
        // Statistik Pengunjung
        // =========================

        // Total semua pengunjung
        $data['total_pengunjung'] = $this->db
        ->from('tbl_pengunjung')
        ->count_all_results();

        // Pengunjung hari ini
        $data['pengunjung_hari_ini'] = $this->db
        ->from('tbl_pengunjung')
        ->where('DATE(tanggal_kunjungan)', date('Y-m-d'))
        ->count_all_results();

        // Pengunjung bulan ini
        $data['pengunjung_bulan_ini'] = $this->db
        ->from('tbl_pengunjung')
        ->where('MONTH(tanggal_kunjungan)', date('m'))
        ->where('YEAR(tanggal_kunjungan)', date('Y'))
        ->count_all_results();

        // Total koleksi buku
        $data['total_koleksi'] = $this->db->count_all('tbl_buku');

        // =========================

        // Load view
        $this->load->view('home/index', $data);
    }
}