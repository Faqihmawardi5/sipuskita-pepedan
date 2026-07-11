<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');

        if($this->session->userdata('masuk_perpus') != TRUE){
            redirect(base_url('login'));
        }
    }

    // 🔥 FUNCTION UTAMA AMBIL DATA (ANTI DUPLIKASI)
    private function get_data_laporan($filter, $bulan, $tahun)
    {
        $data = [];

        
        // ✅ Data statis
        //$data['count_buku']    = $this->db->count_all('tbl_buku');
        //$data['count_anggota'] = $this->db->count_all('tbl_login');

        // 🔥 FILTER
        if($filter == 'bulanan'){

            $awal  = "$tahun-$bulan-01";
            $akhir = date("Y-m-t", strtotime($awal));

            $data['count_buku'] = $this->db
                ->where('tgl_masuk >=', $awal)
                ->where('tgl_masuk <=', $akhir)
                ->count_all_results('tbl_buku');

            $data['count_anggota'] = $this->db
                ->where('level','Anggota')
                ->where('tgl_bergabung >=', $awal)
                ->where('tgl_bergabung <=', $akhir)
                ->count_all_results('tbl_login');    

            $data['count_pinjam'] = $this->db
                ->where('status','Dipinjam')
                ->where('tgl_pinjam >=', $awal)
                ->where('tgl_pinjam <=', $akhir)
                ->get('tbl_pinjam')->num_rows();

            $data['count_kembali'] = $this->db
                ->where('status','Di Kembalikan')
                ->where('tgl_kembali >=', $awal)
                ->where('tgl_kembali <=', $akhir)
                ->get('tbl_pinjam')->num_rows();

            $data['count_pengunjung'] = $this->db
                ->where('tanggal_kunjungan >=', $awal)
                ->where('tanggal_kunjungan <=', $akhir)
                ->count_all_results('tbl_pengunjung');

            // Pengunjung laki-laki
            $data['count_pengunjung_laki'] = $this->db
                ->where('jk', 'Laki-laki')
                ->where('tanggal_kunjungan >=', $awal)
                ->where('tanggal_kunjungan <=', $akhir)
                ->count_all_results('tbl_pengunjung');

            // Pengunjung perempuan
            $data['count_pengunjung_perempuan'] = $this->db
                ->where('jk', 'Perempuan')
                ->where('tanggal_kunjungan >=', $awal)
                ->where('tanggal_kunjungan <=', $akhir)
                ->count_all_results('tbl_pengunjung');

        } 
        elseif($filter == 'tahunan'){

            $awal  = "$tahun-01-01";
            $akhir = "$tahun-12-31";

            $data['count_buku'] = $this->db
                ->where('tgl_masuk >=', $awal)
                ->where('tgl_masuk <=', $akhir)
                ->count_all_results('tbl_buku');

            $data['count_anggota'] = $this->db
                ->where('level','Anggota')
                ->where('tgl_bergabung >=', $awal)
                ->where('tgl_bergabung <=', $akhir)
                ->count_all_results('tbl_login');

            $data['count_pinjam'] = $this->db
                ->where('status','Dipinjam')
                ->where('tgl_pinjam >=', $awal)
                ->where('tgl_pinjam <=', $akhir)
                ->get('tbl_pinjam')->num_rows();

            $data['count_kembali'] = $this->db
                ->where('status','Di Kembalikan')
                ->where('tgl_kembali >=', $awal)
                ->where('tgl_kembali <=', $akhir)
                ->get('tbl_pinjam')->num_rows();

            $data['count_pengunjung'] = $this->db
                ->where('tanggal_kunjungan >=', $awal)
                ->where('tanggal_kunjungan <=', $akhir)
                ->count_all_results('tbl_pengunjung');

            // Pengunjung laki-laki
            $data['count_pengunjung_laki'] = $this->db
                ->where('jk', 'Laki-laki')
                ->where('tanggal_kunjungan >=', $awal)
                ->where('tanggal_kunjungan <=', $akhir)
                ->count_all_results('tbl_pengunjung');

            // Pengunjung perempuan
            $data['count_pengunjung_perempuan'] = $this->db
                ->where('jk', 'Perempuan')
                ->where('tanggal_kunjungan >=', $awal)
                ->where('tanggal_kunjungan <=', $akhir)
                ->count_all_results('tbl_pengunjung');

        } 
        else {

            // TOTAL
            $data['count_buku'] = $this->db
                ->count_all('tbl_buku');

            $data['count_anggota'] = $this->db
                ->where('level','Anggota')
                ->count_all_results('tbl_login');   

            $data['count_pinjam'] = $this->db
                ->where('status','Dipinjam')
                ->get('tbl_pinjam')->num_rows();

            $data['count_kembali'] = $this->db
                ->where('status','Di Kembalikan')
                ->get('tbl_pinjam')->num_rows();

            $data['count_pengunjung'] = $this->db
                ->count_all('tbl_pengunjung');

            // Pengunjung laki-laki
            $data['count_pengunjung_laki'] = $this->db
                ->where('jk', 'Laki-laki')
                ->count_all_results('tbl_pengunjung');

            // Pengunjung perempuan
            $data['count_pengunjung_perempuan'] = $this->db
                ->where('jk', 'Perempuan')
                ->count_all_results('tbl_pengunjung');
        }

        return $data;
    }

    public function jumlah_data()
    {
        // 🔥 Ambil parameter
        $bulan  = $this->input->get('bulan') ?? date('m');
        $tahun  = $this->input->get('tahun') ?? date('Y');
        $filter = $this->input->get('filter') ?? 'bulanan';

        // 🔥 Data utama
        $this->data = [
            'title_web' => 'Laporan Data',
            'idbo'      => $this->session->userdata('ses_id'),
            'bulan'     => $bulan,
            'tahun'     => $tahun,
            'filter'    => $filter
        ];

        // 🔥 Ambil data laporan
        $laporan = $this->get_data_laporan($filter, $bulan, $tahun);
        $this->data = array_merge($this->data, $laporan);

        // 🔥 Load view
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('laporan_jumlah_data_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function cetak_jumlah_data()
    {
        $bulan  = $this->input->get('bulan') ?? date('m');
        $tahun  = $this->input->get('tahun') ?? date('Y');
        $filter = $this->input->get('filter') ?? 'bulanan';

        $data = [
            'bulan'  => $bulan,
            'tahun'  => $tahun,
            'filter' => $filter
        ];

        // 🔥 Pakai function yang sama (DRY)
        $laporan = $this->get_data_laporan($filter, $bulan, $tahun);
        $data = array_merge($data, $laporan);

        $this->load->view('laporan_jumlah_cetak_view', $data);
    }
}