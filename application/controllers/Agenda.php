<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
    }

    public function index()
    {
        $data['title_web'] = 'Agenda Perpustakaan';

        // ambil keyword pencarian
        $keyword = $this->input->get('q');

        // jika ada pencarian
        if (!empty($keyword)) {

            $this->db->like('judul', $keyword);
            $this->db->or_like('deskripsi', $keyword);

            $this->db->order_by('tgl', 'DESC');

            $data['agenda'] = $this->db
                ->get('tbl_agenda')
                ->result();

        } else {

            // tampilkan semua data agenda
            $data['agenda'] = $this->db
                ->order_by('tgl', 'DESC')
                ->get('tbl_agenda')
                ->result();
        }

        // kirim keyword ke view
        $data['keyword'] = $keyword;

        $this->load->view('frontend/agenda_view', $data);
    }

    public function detail($id = null)
    {
        $cek = $this->M_Admin
            ->CountTableId('tbl_agenda', 'id', $id);

        if ($cek > 0) {

            $data['title_web'] = 'Detail Agenda';

            $data['agenda'] = $this->M_Admin
                ->get_tableid_edit('tbl_agenda', 'id', $id);

            $this->load->view('frontend/detail_agenda', $data);

        } else {

            echo '
            <script>
                alert("AGENDA TIDAK DITEMUKAN");
                window.location="' . base_url('agenda') . '";
            </script>';
        }
    }
}