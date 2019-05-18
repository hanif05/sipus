<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		$isi['q_perpus'] 	= $this->db->query("SELECT * FROM pengaturan LIMIT 1")->row();

		$isi ['judul'] = "Home";
		$isi ['subjudul'] = "";
		$isi ['content'] = "index/pengunjung";
		$this->load->view('index/index',$isi);
	}

	public function caribuku(){
		$q 		= addslashes($this->input->post('search'));
		if ($this->uri->segment(3) == "cari") {
			$q_cari				= $this->db->query("SELECT * FROM tbl_buku WHERE judul LIKE '%$q%' OR pengarang LIKE '%$q%' OR penerbit LIKE '%$q%' ");
			$isi['data'] 			= $q_cari->result();
			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Ditemukan ".$q_cari->num_rows()." data </div>");
		} else {
			$q_cari				= $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC LIMIT 10");
			$isi['data'] 			= $q_cari->result();
			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Ditemukan ".$q_cari->num_rows()." data </div>");
		}
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi ['judul'] = "Home";
		$isi ['subjudul'] = "Cari Buku";
		$isi['content']			= "index/cari_buku";
		$this->load->view('index/index', $isi);
	}
	public function post_pengunjung() {
		$nama		= addslashes($this->input->post('nama'));
		$kelas		= addslashes($this->input->post('kelas'));
		$jk			= addslashes($this->input->post('jk'));
		$perlu		= addslashes($this->input->post('perlu1'))."#".addslashes($this->input->post('perlu2'))."#".addslashes($this->input->post('perlu3'))."#".addslashes($this->input->post('perlu4'))."#".addslashes($this->input->post('perlu5'));
		
		$this->db->query("INSERT INTO tbl_pengunjung VALUES ('', '','$nama', '$kelas', '$jk', '$perlu', NOW())");
		$this->session->set_flashdata("info1", "<div class=\"alert alert-success\">Terima kasih, data Anda telah Masuk </div>");
		redirect('index');
	}
	
}
