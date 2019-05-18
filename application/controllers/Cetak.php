<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('M_security');
		$this->M_security->getsecurity();
	}
	public function data_buku(){

		$isi['data']	= $this->db->query("SELECT * FROM tbl_buku")->result();
		$this->load->view('cetak/buku', $isi);
	}
	public function data_anggota(){
		$isi['data']	= $this->db->query("SELECT * FROM tbl_anggota")->result();
		$this->load->view('cetak/anggota', $isi);

	}	
	public function anggota(){
		$isi['data']		= $this->db->query("SELECT * FROM tbl_anggota ORDER BY id_anggota ASC")->result();
		$this->load->view('cetak/kartu_anggota', $isi);
	}
	public function kunjungan_hari_ini(){
		$this->load->view('cetak/kunjungan_hari_ini');
	}
	public function kunjungan_bulan(){
		$isi['bulan']		= str_pad($this->uri->segment(3), 2, '0', STR_PAD_LEFT);
		
		$this->load->view('cetak/kunjungan_bulan', $isi);
	}
	public function l_peminjam(){
		$this->load->view('cetak/peminjaman');
	}

}