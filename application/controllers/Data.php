<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Include Dompdf manual
require_once APPPATH.'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
class Data extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper(array('form','url'));
		$this->load->model('M_Admin');

		if($this->session->userdata('masuk_perpus') != TRUE){
			redirect(base_url('login'));
		}
	}

	// =========================
	// DATA BUKU
	// =========================
	public function index()
	{
		$data['idbo'] = $this->session->userdata('ses_id');
		$data['buku'] = $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC");
		$data['title_web'] = 'Data Buku';

		$this->load->view('header_view',$data);
		$this->load->view('sidebar_view',$data);
		$this->load->view('buku/buku_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function bukudetail($id)
	{
		$data['idbo'] = $this->session->userdata('ses_id');

		$data['buku'] = $this->db->get_where('tbl_buku', ['id_buku'=>$id])->row();

		$data['title_web'] = 'Detail Buku';

		$this->load->view('header_view',$data);
		$this->load->view('sidebar_view',$data);
		$this->load->view('buku/detail',$data);
		$this->load->view('footer_view',$data);
	}



	// =========================
	// TAMBAH BUKU
	// =========================
	public function bukutambah()
	{
		$data['idbo'] = $this->session->userdata('ses_id');
		$data['kats'] = $this->db->get('tbl_kategori')->result_array();
		$data['rakbuku'] = $this->db->get('tbl_rak')->result_array();
		$data['title_web'] = 'Tambah Buku';

		$this->load->view('header_view',$data);
		$this->load->view('sidebar_view',$data);
		$this->load->view('buku/tambah_view',$data);
		$this->load->view('footer_view',$data);
	}

	// =========================
	// EDIT BUKU
	// =========================
	public function bukuedit($id)
	{
		$data['idbo'] = $this->session->userdata('ses_id');

		$data['buku'] = $this->db->get_where('tbl_buku',['id_buku'=>$id])->row();
		$data['kats'] = $this->db->get('tbl_kategori')->result_array();
		$data['rakbuku'] = $this->db->get('tbl_rak')->result_array();
		$data['title_web'] = 'Edit Buku';

		$this->load->view('header_view',$data);
		$this->load->view('sidebar_view',$data);
		$this->load->view('buku/edit_view',$data);
		$this->load->view('footer_view',$data);
	}


	public function prosesbuku()
	{
		// =====================
		// HAPUS BUKU (FIX)
		// =====================
		if($this->input->get('buku_id'))
		{
			$id = $this->input->get('buku_id');
	
			$buku = $this->db->get_where('tbl_buku', ['id_buku' => $id])->row();
	
			// hapus file sampul
			if(!empty($buku->sampul) && file_exists('./assets_style/image/buku/'.$buku->sampul)){
				unlink('./assets_style/image/buku/'.$buku->sampul);
			}
	
			// hapus file lampiran
			if(!empty($buku->lampiran) && file_exists('./assets_style/image/buku/'.$buku->lampiran)){
				unlink('./assets_style/image/buku/'.$buku->lampiran);
			}
	
			// hapus data dari database
			$this->db->delete('tbl_buku', ['id_buku' => $id]);
	
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success">Data buku berhasil dihapus.</div>'
			);
	
			redirect('data');
		}
	
		// =====================
		// KONFIG UPLOAD
		// =====================
		$config['upload_path']  = './assets_style/image/buku/';
		$config['encrypt_name'] = TRUE;
		$config['max_size']     = 5000;
	
		$this->load->library('upload');
	
		// =====================
		// TAMBAH BUKU
		// =====================
		if($this->input->post('tambah'))
		{
			$post = $this->input->post();
	
			$data = array(
				'buku_id'     => $this->M_Admin->buat_kode('tbl_buku','BK','id_buku','ORDER BY id_buku DESC LIMIT 1'),
				'id_kategori' => $post['kategori'],
				'id_rak'      => $post['rak'],
				'isbn'        => $post['isbn'],
				'title'       => $post['title'],
				'pengarang'   => $post['pengarang'],
				'penerbit'    => $post['penerbit'],
				'thn_buku'    => $post['thn'],
				'isi'         => $post['ket'],
				'jml'         => $post['jml'],
				'tgl_masuk'   => date('Y-m-d H:i:s')
			);
	
			// upload gambar
			if(!empty($_FILES['gambar']['name']))
			{
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->upload->initialize($config);
	
				if($this->upload->do_upload('gambar'))
				{
					$file = $this->upload->data();
					$data['sampul'] = $file['file_name'];
				}
			}
	
			// upload lampiran
			if(!empty($_FILES['lampiran']['name']))
			{
				$config['allowed_types'] = 'pdf';
				$this->upload->initialize($config);
	
				if($this->upload->do_upload('lampiran'))
				{
					$file = $this->upload->data();
					$data['lampiran'] = $file['file_name'];
				}
			}
	
			$this->db->insert('tbl_buku', $data);
	
			redirect('data');
		}
	
		// =====================
		// EDIT BUKU
		// =====================
		if($this->input->post('edit'))
		{
			$post = $this->input->post();
			$id   = $post['edit'];
	
			$data = array(
				'id_kategori' => $post['kategori'],
				'id_rak'      => $post['rak'],
				'isbn'        => $post['isbn'],
				'title'       => $post['title'],
				'pengarang'   => $post['pengarang'],
				'penerbit'    => $post['penerbit'],
				'thn_buku'    => $post['thn'],
				'isi'         => $post['ket'],
				'jml'         => $post['jml']
			);
	
			$buku = $this->db->get_where('tbl_buku', ['id_buku' => $id])->row();
	
			// upload sampul baru
			if(!empty($_FILES['gambar']['name']))
			{
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->upload->initialize($config);
	
				if($this->upload->do_upload('gambar'))
				{
					$file = $this->upload->data();
	
					if(!empty($buku->sampul)){
						unlink('./assets_style/image/buku/'.$buku->sampul);
					}
	
					$data['sampul'] = $file['file_name'];
				}
			}
	
			// upload lampiran baru
			if(!empty($_FILES['lampiran']['name']))
			{
				$config['allowed_types'] = 'pdf';
				$this->upload->initialize($config);
	
				if($this->upload->do_upload('lampiran'))
				{
					$file = $this->upload->data();
	
					if(!empty($buku->lampiran)){
						unlink('./assets_style/image/buku/'.$buku->lampiran);
					}
	
					$data['lampiran'] = $file['file_name'];
				}
			}
	
			$this->db->where('id_buku', $id);
			$this->db->update('tbl_buku', $data);
	
			redirect('data');
		}
	}

	public function kategori()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_kategori','id_kategori',$id);
			if($count > 0)
			{			
				$this->data['kat'] = $this->db->query("SELECT *FROM tbl_kategori WHERE id_kategori='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/kategori').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data Kategori ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('kategori/kat_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function katproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);

			$this->db->insert('tbl_kategori', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);
			$this->db->where('id_kategori',htmlentities($post['edit']));
			$this->db->update('tbl_kategori', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 		
		}

		if(!empty($this->input->get('kat_id')))
		{
			$this->db->where('id_kategori',$this->input->get('kat_id'));
			$this->db->delete('tbl_kategori');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 
		}
	}

	public function rak()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_rak','id_rak',$id);
			if($count > 0)
			{	
				$this->data['rak'] = $this->db->query("SELECT *FROM tbl_rak WHERE id_rak='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/rak').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data Rak Buku ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('rak/rak_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function rakproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);

			$this->db->insert('tbl_rak', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak'));  
		}

		if(!empty($this->input->post('edit')))
		{ 
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);
			$this->db->where('id_rak',htmlentities($post['edit']));
			$this->db->update('tbl_rak', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Rak Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak')); 		
		}

		if(!empty($this->input->get('rak_id')))
		{
			$this->db->where('id_rak',$this->input->get('rak_id'));
			$this->db->delete('tbl_rak');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak')); 
		}
	}

	public function kegiatan()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kegiatan'] = $this->db->query("SELECT * FROM tbl_kegiatan ORDER BY id_kegiatan DESC");
	
		$this->data['title_web'] = 'Data Kegiatan';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kegiatan/kegiatan_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
	
	public function kegiatan_tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Tambah Kegiatan';
	
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kegiatan/tambah', $this->data);
		$this->load->view('footer_view', $this->data);
	}


	public function kegiatan_edit($id)
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_kegiatan', 'id_kegiatan', $id);
		if ($count > 0) {
			$this->data['edit_kegiatan'] = $this->db->get_where('tbl_kegiatan', ['id_kegiatan' => $id])->row();
		} else {
			echo '<script>alert("KEGIATAN TIDAK DITEMUKAN");window.location="'.base_url('data/kegiatan').'"</script>';
		}

		$this->data['title_web'] = 'Edit Kegiatan';

		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kegiatan/edit', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function kegiatanproses()
	{
		// TAMBAH
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
	
			// Siapkan upload config
			$config['upload_path'] = './assets_style/image/kegiatan/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
	
			$data = array(
				'judul' => htmlentities($post['judul']),
				'keterangan' => htmlentities($post['keterangan']),
				'tgl' => htmlentities($post['tanggal']),
			);
	
			// Proses upload hanya jika file dipilih
			if (!empty($_FILES['foto']['name'])) {
				if ($this->upload->do_upload('foto')) {
					$file = $this->upload->data();
					$data['gambar'] = $file['file_name'];
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Upload gambar gagal!</div>');
					redirect(base_url('data/kegiatan'));
					return;
				}
			}
	
			$this->db->insert('tbl_kegiatan', $data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Tambah kegiatan sukses!</div>');
			redirect(base_url('data/kegiatan'));
		}
	
		// EDIT
		if(!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$id = htmlentities($post['edit']);
	
			$data = array(
				'judul' => htmlentities($post['judul']),
				'keterangan' => htmlentities($post['keterangan']),
				'tgl' => htmlentities($post['tanggal']),
			);
	
			// Jika upload foto baru
			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path'] = './assets_style/image/kegiatan/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['encrypt_name'] = TRUE;
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('foto')) {
					$file = $this->upload->data();
	
					// Hapus gambar lama
					$kegiatan = $this->M_Admin->get_tableid_edit('tbl_kegiatan', 'id_kegiatan', $id);
					if (!empty($kegiatan->gambar) && file_exists('./assets_style/image/kegiatan' . $kegiatan->gambar)) {
						unlink('./assets_style/image/kegiatan' . $kegiatan->gambar);
					}
	
					$data['gambar'] = $file['file_name'];
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Upload gambar gagal!</div>');
					redirect(base_url('data/kegiatan_edit/'.$id));
					return;
				}
			}
	
			$this->db->where('id_kegiatan', $id);
			$this->db->update('tbl_kegiatan', $data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Edit kegiatan sukses!</div>');
			redirect(base_url('data/kegiatan'));
		}
	
		// HAPUS
		if (!empty($this->input->get('hapus'))) {
			$id = $this->input->get('hapus');
			$kegiatan = $this->M_Admin->get_tableid_edit('tbl_kegiatan', 'id_kegiatan', $id);
	
			if (!empty($kegiatan->gambar) && file_exists('./assets_style/image/kegiatan'.$kegiatan->gambar)) {
				unlink('./assets_style/image/kegiatan/'.$kegiatan->gambar);
			}
	
			$this->db->where('id_kegiatan', $id);
			$this->db->delete('tbl_kegiatan');
			$this->session->set_flashdata('pesan','<div class="alert alert-warning">Hapus kegiatan sukses!</div>');
			redirect(base_url('data/kegiatan'));
		}
	}
	
		// ================= AGENDA =================
		public function agenda()
		{
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$this->data['agenda'] = $this->db->query("SELECT * FROM tbl_agenda ORDER BY id_agenda DESC");

			$this->data['title_web'] = 'Data Agenda';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('agenda/agenda_view', $this->data);
			$this->load->view('footer_view', $this->data);
		}

		public function agenda_tambah()
		{
			// hanya Petugas yang bisa akses
			if ($this->session->userdata('level') != 'Petugas') {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akses ditolak!</div>');
				redirect('data/agenda');
			}

			$this->data['idbo'] = $this->session->userdata('ses_id');
			$this->data['title_web'] = 'Tambah Agenda';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('agenda/tambah', $this->data);
			$this->load->view('footer_view', $this->data);
		}


		public function agenda_edit($id)
		{
			// hanya Petugas yang bisa akses
			if ($this->session->userdata('level') != 'Petugas') {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akses ditolak!</div>');
				redirect('data/agenda');
			}

			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_agenda', 'id_agenda', $id);
			if ($count > 0) {
				$this->data['edit_agenda'] = $this->db->get_where('tbl_agenda', ['id_agenda' => $id])->row();
			} else {
				echo '<script>alert("AGENDA TIDAK DITEMUKAN");window.location="'.base_url('data/agenda').'"</script>';
			}

			$this->data['title_web'] = 'Edit Agenda';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('agenda/edit', $this->data);
			$this->load->view('footer_view', $this->data);
		}

		public function agenda_proses()
		{
			if ($this->session->userdata('level') != 'Petugas') {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akses ditolak!</div>');
				return redirect('data/agenda');
			}
		
			if ($this->input->post('tambah')) {
		
				$data = [
					'judul'     => $this->input->post('judul', TRUE),
					'deskripsi' => $this->input->post('deskripsi', TRUE),
					'tgl'       => $this->input->post('tanggal', TRUE)
				];
		
				$this->db->insert('tbl_agenda', $data);
		
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success">Tambah agenda berhasil!</div>'
				);
		
				return redirect('data/agenda');
			}
		
			if ($this->input->post('edit') !== null) {

				$id = (int) $this->input->post('edit');
			
				$data = [
					'judul'     => $this->input->post('judul', TRUE),
					'deskripsi' => $this->input->post('deskripsi', FALSE),
					'tgl'       => $this->input->post('tanggal', TRUE)
				];
			
				$this->db->where('id_agenda', $id);
				$this->db->update('tbl_agenda', $data);
			
				$this->session->set_flashdata('pesan',
					'<div class="alert alert-success">Edit agenda berhasil!</div>'
				);
			
				redirect('data/agenda');
			}
		
			if ($this->input->get('hapus')) {
		
				$id = $this->input->get('hapus', TRUE);
		
				$this->db->where('id_agenda', $id);
				$this->db->delete('tbl_agenda');
		
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-warning">Hapus agenda berhasil!</div>'
				);
		
				return redirect('data/agenda');
			}
		
			return redirect('data/agenda');
		}
}
