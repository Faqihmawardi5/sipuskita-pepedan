<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // VALIDASI LOGIN
        if($this->session->userdata('masuk_perpus') != TRUE){
            redirect(base_url('login'));
        }

        $this->data['CI'] =& get_instance();

        $this->load->helper(array('form','url'));
        $this->load->model('Pengunjung_model');
    }

    // FORM PENGUNJUNG
    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['title_web'] = 'Form Pengunjung';

        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pengunjung/pengunjung_form', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    // SIMPAN DATA
    public function simpan()
    {
        $data = array(
            'nama'               => htmlspecialchars($this->input->post('nama', TRUE)),
            'jenis_kelamin'      => htmlspecialchars($this->input->post('jenis_kelamin', TRUE)),
            'alamat'             => htmlspecialchars($this->input->post('alamat', TRUE)),
            'keperluan'          => htmlspecialchars($this->input->post('keperluan', TRUE)),
            'tanggal_kunjungan'  => date('Y-m-d'),
            'waktu_kunjungan'    => date('H:i:s')
        );

        $this->Pengunjung_model->insert($data);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success">
                Terima kasih, data kunjungan telah dicatat.
            </div>'
        );

        redirect('pengunjung');
    }

    // DAFTAR PENGUNJUNG + FILTER
    public function daftar()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['title_web'] = 'Daftar Pengunjung';

        // AMBIL FILTER
        $filter = $this->input->get('filter');
        $bulan  = $this->input->get('bulan');
        $tahun  = $this->input->get('tahun');

        // DEFAULT
        if(empty($filter)){
            $filter = 'total';
        }

        // QUERY
        $this->db->from('tbl_pengunjung');

        // FILTER BULANAN
        if($filter == 'bulanan'){

            if(!empty($bulan) && !empty($tahun)){

                $this->db->where('MONTH(tanggal_kunjungan)', $bulan);
                $this->db->where('YEAR(tanggal_kunjungan)', $tahun);

            }

        }

        // FILTER TAHUNAN
        elseif($filter == 'tahunan'){

            if(!empty($tahun)){

                $this->db->where('YEAR(tanggal_kunjungan)', $tahun);

            }

        }

        // TOTAL = semua data

        // ORDER TERBARU
        $this->db->order_by('tanggal_kunjungan', 'DESC');
        $this->db->order_by('waktu_kunjungan', 'DESC');

        // HASIL
        $this->data['pengunjung'] = $this->db->get()->result();

        // KIRIM FILTER KE VIEW
        $this->data['filter'] = $filter;
        $this->data['bulan']  = $bulan;
        $this->data['tahun']  = $tahun;

        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pengunjung/daftar_pengunjung', $this->data);
        $this->load->view('footer_view', $this->data);
    }
}