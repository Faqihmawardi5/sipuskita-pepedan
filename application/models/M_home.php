<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    // Mengambil kegiatan terbaru
    public function get_kegiatan($limit = 3) {
        return $this->db->order_by('tgl', 'DESC')
                        ->limit($limit)
                        ->get('tbl_kegiatan')
                        ->result();
    }

    // Menghitung total semua pengunjung
    public function total_pengunjung() {
        return $this->db->from('tbl_pengunjung')
                        ->count_all_results();
    }

    // Menghitung pengunjung hari ini
    public function pengunjung_hari_ini() {
        return $this->db->from('tbl_pengunjung')
                        ->where('DATE(tanggal_kunjungan)', date('Y-m-d'))
                        ->count_all_results();
    }
}
