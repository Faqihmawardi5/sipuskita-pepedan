<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
    }

    public function index()
    {
        $data['title_web'] = 'Koleksi Buku';

        $keyword = trim($this->input->get('q', TRUE));
        $data['keyword'] = $keyword;

        $this->db->from('tbl_buku');
        $this->db->order_by('id_buku', 'DESC');

        // Jika ada pencarian
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('title', $keyword);
            $this->db->or_like('pengarang', $keyword);
            $this->db->or_like('penerbit', $keyword);
            $this->db->group_end();
        }

        // PENTING: selalu kirim semua data
        $data['buku'] = $this->db->get()->result();

        $this->load->view('frontend/koleksi_view', $data);
    }

    public function detail($id_buku = NULL)
    {
        $cek = $this->M_Admin->CountTableId(
            'tbl_buku',
            'id_buku',
            $id_buku
        );

        if ($cek > 0) {

            $data['title_web'] = 'Detail Buku';

            $data['buku'] = $this->M_Admin->get_tableid_edit(
                'tbl_buku',
                'id_buku',
                $id_buku
            );

            $this->load->view('frontend/detail_buku', $data);

        } else {
            redirect('koleksi');
        }
    }
}