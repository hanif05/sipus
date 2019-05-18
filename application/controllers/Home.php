<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_security');
		$this->M_security->getsecurity();

	}

	public function index()
	{
		//$this->load->view('home/tampil_home')
		//$this->M_security->getsecurity();
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['title'] = 'Home Page';
		$isi['judul'] = 'Home';
		$isi['subjudul'] = '';
		$isi['subjudul2'] = '';
		$isi['content'] = 'home/tampil_content';
		$isi['nama_user'] = $this->db->get('tbl_admin');
		
		$this->load->view('home/tampil_home',$isi);
	}
	public function buku(){
		//pagination
		$this->load->library('pagination');
		$total_rows = $this->db->query("SELECT *FROM tbl_buku")->num_rows();

		$config['base_url']= base_url('home/buku/p/');
		$config['total_rows'] 	= $total_rows;
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 10; 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>';
		$config['prev_link'] 	= '&lt;';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';
		$config['next_link'] 	= '&gt;';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';
		$config['cur_tag_open']='<li class="active disabled"><a href="#"  style="background: #e3e3e3">';
		$config['cur_tag_close']='</a></li>';
		$config['first_tag_open']='<li>';
		$config['first_tag_close']='</li>';
		$config['last_tag_open']='<li>';
		$config['last_tag_close']='</li>';
		
		$this->pagination->initialize($config);

		$awal	= $this->uri->segment(4); 
		if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $config['per_page'];
		
		$isi['pagi']	= $this->pagination->create_links(); 
		//pagination\\
		
		//variable URL
		$mau_ke					= $this->uri->segment(3);
		$id_b				= $this->uri->segment(4);
		//variable URL\\

		//ngambil variable post
		$id_buku 	= addslashes($this->input->post('id_buku'));
		$judul 		= addslashes($this->input->post('judul'));
		$pengarang 	= addslashes($this->input->post('pengarang'));
		$penerbit 	= addslashes($this->input->post('penerbit'));
		$tahun		= addslashes($this->input->post('tahun'));
		$isbn 		= addslashes($this->input->post('isbn'));
		$rak		= addslashes($this->input->post('rak'));
		$cari 		= addslashes($this->input->post('search'));
		//ngambil variable post\\

		//tampilan view
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['data']		= $this->db->query("SELECT * FROM tbl_buku LIMIT $awal, $akhir ")->result();
		$isi['title'] = 'Buku Page';
		$isi['judul'] = 'Buku';
		$isi['subjudul'] = 'Data Buku';
		$isi['subjudul2'] = '';
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$isi['content'] = 'buku/data_buku';
		//tampilan view\\

		if($mau_ke == "cari"){
			$isi['data'] = $this->db->query("SELECT *FROM tbl_buku where judul LIKE '%$cari%' OR pengarang LIKE '%$cari%' OR penerbit LIKE '%$cari%' OR rak LIKE '%$cari%' ORDER BY id_buku DESC")->result();
			$isi['content'] = "buku/data_buku";
		} 
		else if($mau_ke == "hapus"){
			$this->db->query("DELETE FROM tbl_buku WHERE id_buku = '$id_b'");
			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Data Berhasil Di Hapus </div>");
			redirect('home/buku');
		}
		else if($mau_ke == "tambah"){
			$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
			$isi['content'] = "buku/tambah_buku";
			$isi['subjudul2'] = "Tambah Data Buku";
			$isi['sub_buku'] = "Tambah Data Buku";
		}
		else if($mau_ke == "proses_tambah"){
			$this->db->query("INSERT INTO tbl_buku VALUES('$id_buku','', '$judul', '$pengarang' , '$penerbit' , '$tahun' , '$isbn', '$rak' , NOW())");
			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Data Berhasil di Tambah</div>");
			redirect('home/buku');
		}
		else if($mau_ke == "edit"){
			$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
			$isi['data_i'] = $this->db->query("SELECT *FROM tbl_buku WHERE id_buku = '$id_b'")->row();
			$isi['content'] = "buku/tambah_buku";
			$isi['subjudul2'] = "Edit Data Buku";
			$isi['sub_buku'] = "Edit Data Buku";
		}
		else if ($mau_ke == "proses_edit"){
			$this->db->query("UPDATE tbl_buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun', isbn = '$isbn', rak = '$rak' WHERE id_buku = '$id_buku'");
			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Data Berhasil di Ubah</div>");
			redirect('home/buku');
		}


		//$isi['data'] = $this->db->get('tbl_buku');
		$this->load->view('home/tampil_home',$isi);
	}
	public function anggota(){
		//pagination
		$this->load->library('pagination');
		$total_rows = $this->db->query("SELECT *FROM tbl_anggota")->num_rows();

		$config['base_url']= base_url('home/anggota/p/');
		$config['total_rows'] 	= $total_rows;
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 10; 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>';
		$config['prev_link'] 	= '&lt;';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';
		$config['next_link'] 	= '&gt;';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';
		$config['cur_tag_open']='<li class="active disabled"><a href="#"  style="background: #e3e3e3">';
		$config['cur_tag_close']='</a></li>';
		$config['first_tag_open']='<li>';
		$config['first_tag_close']='</li>';
		$config['last_tag_open']='<li>';
		$config['last_tag_close']='</li>';
		
		$this->pagination->initialize($config);

		$awal	= $this->uri->segment(4); 
		if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $config['per_page'];
		
		$isi['pagi']	= $this->pagination->create_links();
		
		//variable URL
		$mau_ke					= $this->uri->segment(3);
		$id_a					= $this->uri->segment(4);
		//variable URL\\

		//ngambil variable post
		$id_anggota = addslashes($this->input->post('id_anggota'));
		$nama 		= addslashes($this->input->post('nama'));
		$kelas 		= addslashes($this->input->post('kelas'));
		$alamat 	= addslashes($this->input->post('alamat'));
		$jk 		= addslashes($this->input->post('jk'));
		$tmpt_lahir = addslashes($this->input->post('tmpt_lahir'));
		$tgl_lahir	= $this->input->post('th')."-".str_pad($this->input->post('bl'), 2, '0', STR_PAD_LEFT)."-".str_pad($this->input->post('tg'), 2, '0', STR_PAD_LEFT);

		$status 	= addslashes($this->input->post('status'));

		$cari 		= addslashes($this->input->post('search'));
		//ngambil variable post\\

		//tampilan view
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['data']		= $this->db->query("SELECT * FROM tbl_anggota LIMIT $awal, $akhir ")->result();
		$isi['title'] = 'Anggota Page';
		$isi['judul'] = 'Anggota';
		$isi['subjudul'] = 'Data Anggota';
		$isi['subjudul2'] = '';
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$isi['content'] 	= 'anggota/data_anggota';
		//tampilan view\\

		if ($mau_ke == "cari") {
			$isi['data']	= $this->db->query("SELECT * FROM tbl_anggota WHERE nama LIKE '%$cari%' OR kelas LIKE '%$cari%' OR alamat LIKE '%$cari%' ORDER BY id_anggota DESC")->result();
			$isi['content']	= "anggota/data_anggota";
		} 
		else if($mau_ke == "hapus"){
			$this->db->query("DELETE FROM tbl_anggota WHERE id_anggota = '$id_a'");
			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Data Berhasil Di Hapus </div>");
			redirect('home/anggota');
		}
		else if($mau_ke == "tambah"){

			$isi['content'] = "anggota/tambah_anggota";
			$isi['sub_anggota'] = "Tambah Data Anggota";
		}
		else if($mau_ke == "proses_tambah"){
			$this->db->query("INSERT INTO tbl_anggota VALUES ('', '', '$nama', '$kelas', '$alamat', '$jk', '$tmpt_lahir', '$tgl_lahir', '',  NOW(), '1')");
			
			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Data Berhasil di Tambah</div>");
			redirect('home/anggota');
		}
		else if($mau_ke == "edit"){
			$isi['data_i'] = $this->db->query("SELECT *FROM tbl_anggota WHERE id_anggota = '$id_a'")->row();
			$isi['content'] = "anggota/tambah_anggota";
			$isi['subjudul2'] = "Edit Data anggota";
			$isi['sub_anggota'] = "Edit Data anggota";
		}
		else if ($mau_ke == "proses_edit") {
			$this->db->query("UPDATE tbl_anggota SET nama = '$nama', kelas = '$kelas', alamat = '$alamat', jk = '$jk', tmpt_lahir = '$tmpt_lahir', tgl_lahir = '$tgl_lahir', status = '$status' WHERE id_anggota = '$id_anggota'");

			$this->session->set_flashdata("info", "<div class=\"alert alert-success\">Data Berhasil Di Ubah</div>");			
			redirect('home/anggota');
		}


		$this->load->view('home/tampil_home',$isi);
	}
	public function transaksi(){

		//variable URL
		$mau_ke					= $this->uri->segment(3);
		$id_t					= $this->uri->segment(4);
		$id_t2					= $this->uri->segment(5);
		//variable URL\\
		//ambil variabel Postingan
		$id_anggota				= addslashes($this->input->post('id_anggota'));
		$tgl_pinjam				= addslashes($this->input->post('tgl_pinjam'));
		$tgl_kembali			= addslashes($this->input->post('tgl_kembali'));
		$keterangan				= addslashes($this->input->post('keterangan'));
		$jml_buku				= addslashes($this->input->post('jml_buku'));
		
		$cari					= addslashes($this->input->post('search'));
		//ambil variabel Postingan\\
		//tampilan view
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['data']		= $this->db->query("SELECT *, COUNT(id_anggota) AS jml_pinjam FROM tbl_transaksi WHERE status = 'P' GROUP BY id_anggota DESC")->result();
		$isi['title'] = 'Transaksi Page';
		$isi['judul'] = 'Transaksi';
		$isi['subjudul'] = 'Data Transaksi';
		$isi['subjudul2'] = '';
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$isi['content']		= "transaksi/data_transaksi";
		//tampilan view \\

		if($mau_ke == "pilih_anggota"){
			$isi['data']		= $this->db->query("SELECT * FROM tbl_anggota")->result();
			$isi['sub_pilih'] = "Pilih Anggota";
			$isi['subjudul2'] = "Tambah Peminjaman";
			$isi['content'] = "transaksi/data_pilih_a";
			$cari					= addslashes($this->input->post('search'));
			$mau_pilih = $this->uri->segment(4);
			$id_a1 = $this->uri->segment(5);
			if($mau_pilih == "cari"){
				$isi['data']	= $this->db->query("SELECT * FROM tbl_anggota WHERE nama LIKE '%$cari%' OR kelas LIKE '%$cari%' OR alamat LIKE '%$cari%' ORDER BY id_anggota DESC")->result();
				$isi['content'] = "transaksi/data_pilih_a";
			}
			else if($mau_pilih == "pilih"){
				$a = $this->db->query("SELECT * FROM tbl_anggota LIMIT 1")->row();
				$isi['data_i'] = $this->db->query("SELECT *FROM tbl_anggota WHERE id_anggota = '$id_a1'")->row();
				$isi ['content'] = "transaksi/data_pilih_a1"; 
			}
		}
		if($mau_ke == "tambah"){
			$id_anggota		= $this->input->post('id_anggota');
			$jumlah_buku	= $this->input->post('jml_buku');
			$cek_peminjam	= $this->db->query("SELECT *, COUNT(id_anggota) AS jml FROM tbl_peminjaman WHERE status = 'P' AND id_anggota = '$id_anggota' GROUP BY id_anggota")->num_rows();
		}









		$this->load->view('home/tampil_home',$isi);
	}
	public function peminjaman(){
		//variable URL
		$mau_ke					= $this->uri->segment(3);
		$id_p					= $this->uri->segment(4);
		$id_p2					= $this->uri->segment(5);
		//variable URL\\
		//ambil variabel Postingan
		$id_anggota				= addslashes($this->input->post('id_anggota'));
		$tgl_pinjam				= addslashes($this->input->post('tgl_pinjam'));
		$tgl_kembali			= addslashes($this->input->post('tgl_kembali'));
		$keterangan				= addslashes($this->input->post('keterangan'));
		$jml_buku				= addslashes($this->input->post('jml_buku'));
		
		$cari					= addslashes($this->input->post('search'));
		//ambil variabel Postingan\\
		//tampilan view
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['data']		= $this->db->query("SELECT *, COUNT(id_anggota) AS jml_pinjam FROM tbl_peminjaman WHERE status = 'P' GROUP BY id_anggota DESC")->result();
		$isi['title'] = 'Peminjaman Page';
		$isi['judul'] = 'Peminjaman';
		$isi['subjudul'] = 'Data Peminjaman';
		$isi['subjudul2'] = '';
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$isi['content']		= "peminjaman/data_peminjaman";
		//tampilan view \\
		if ($mau_ke == "cari") {
			$isi['data']		= $this->db->query("SELECT *, COUNT(id_anggota) AS jml_pinjam FROM tbl_peminjaman WHERE id_anggota = '$cari' AND status = 'P' GROUP BY id_anggota DESC")->result();
			$isi['content']		= "peminjaman/data_peminjaman";
		}
		else if($mau_ke == "pilih_anggota"){
			$isi['subjudul2'] = "Tambah Peminjaman";
			$isi['content'] = "peminjaman/d_pilih_a";
		}
		else if($mau_ke == "tambah"){
			$id_anggota		= $this->input->post('id_anggota');
			$jumlah_buku	= $this->input->post('jml_buku');
			
			$cek_peminjam	= $this->db->query("SELECT *, COUNT(id_anggota) AS jml FROM tbl_peminjaman WHERE status = 'P' AND id_anggota = '$id_anggota' GROUP BY id_anggota")->num_rows();
			
			if ($cek_peminjam > 0) {
				$this->session->set_flashdata("info", "<div class=\"alert alert-error\">Peminjam tersebut masih mempunyai peminjaman yang belum dikembalikan. </div>");
				redirect('home/peminjaman/pilih_anggota');
			}
			else {
				$isi['det_anggota']	= $this->db->query("SELECT * FROM tbl_anggota WHERE id_anggota = '$id_anggota'")->row();
				$isi['data']		= $this->db->query("SELECT * FROM tbl_peminjaman WHERE id_anggota = '$id_anggota' AND status = 'P' ORDER BY id_peminjam DESC")->result();
				$isi['jml_buku']	= $jumlah_buku;
				$isi['content']		= "peminjaman/f_peminjaman";
			}
		}
		else if ($mau_ke == "caribuku") {
			$id_data			=  empty($_POST['id_data']) ? $_GET['id_data'] : $_POST['id_data'];
			$kata_kunci			=  empty($_POST['kata_kunci']) ? $_GET['kata_kunci'] : $_POST['kata_kunci'];
		
			$q_data				=  $this->db->query("SELECT id_buku, judul FROM tbl_buku WHERE judul LIKE '%$kata_kunci%' ORDER BY id_buku ASC");
			$data				=  $q_data->result();
			$jumlah_hasil		=  $q_data->num_rows();
			
			if (strlen($kata_kunci) < 4) {
				echo '<div class="alert alert-error">Kata kunci minimal 3 huruf</a>';
			} else if (!empty($data)) {
				echo ' 	<div class="alert alert-info">Ditemukan <b>'.$jumlah_hasil.'</b> data</div>';
				echo '	<table class="table table-bordered">
							<thead>
								<tr>
									<th width="20%">ID</th>
									<th width="70%">Judul</th>
									<th width="10%">Pilih</th>
								</tr>
							</thead>
							<tbody>';
				foreach ($data as $d) {
					echo '	<tr>
								<td>'.$d->id_buku.'</td>
								<td>'.$d->judul.'</td>
								<td><a href="#" class="btn btn-success btn-sm" onclick="return isikan_kode('.$id_data.', '.$d->id_buku.', \''.addslashes($d->judul).'\');">OK</a></td>
							</tr>';
				}
				echo '	</tbody></table>';
			} else {
				echo '<div class="alert alert-error">Tidak ditemukan</a>';
			}
			exit;
		} else if ($mau_ke == "detail") {
			$isi['subjudul2'] = "Detail Peminjaman";
			$isi['content'] = "peminjaman/detail";
		}



		$this->load->view('home/tampil_home',$isi);
	}
	public function l_buku(){
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['title'] = 'Laporan Page';
		$isi['judul'] = 'Laporan';
		$isi['subjudul'] = 'Laporan Buku';
		$isi['subjudul2'] = '';
		$isi['jml']		= $this->db->query("SELECT * FROM tbl_buku")->num_rows();
		$isi['content']		= "laporan/l_buku";
		$isi['data']		= $this->db->query("SELECT * FROM tbl_buku")->result();
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$this->load->view('home/tampil_home', $isi);





	}
	public function l_anggota(){
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['title'] = 'Laporan Page';
		$isi['judul'] = 'Laporan';
		$isi['subjudul'] = 'Laporan Anggota';
		$isi['subjudul2'] = '';
		$isi['jml']		= $this->db->query("SELECT * FROM tbl_anggota WHERE status = '1'")->num_rows();
		$isi['content']		= "laporan/l_anggota";
		$isi['data']		= $this->db->query("SELECT * FROM tbl_anggota WHERE status = '1'")->result();
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$this->load->view('home/tampil_home', $isi);

	}
	public function l_pengunjung(){
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['title'] = 'Laporan Page';
		$isi['judul'] = 'Laporan';
		$isi['subjudul'] = 'Laporan Pengunjung';
		$isi['subjudul2'] = '';
		$isi['content']		= "laporan/l_pengunjung";
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$this->load->view('home/tampil_home', $isi);
	}
	public function l_peminjaman(){
		$isi ['q_perpus'] = $this->db->query("SELECT *FROM pengaturan LIMIT 1")->row();
		$isi['title'] = 'Laporan Page';
		$isi['judul'] = 'Laporan';
		$isi['subjudul'] = 'Laporan Peminjaman';
		$isi['subjudul2'] = '';
		$isi['content']		= "laporan/l_peminjaman";
		$isi['nama_user'] = $this->db->get('tbl_admin');
		$this->load->view('home/tampil_home', $isi);	
	}
	public function profile(){
		$isi['title'] = 'Profile Page';
		$isi['judul'] = 'Home';
		$isi['subjudul'] = 'Profile';
		$isi['subjudul2'] = '';
		$isi['content'] = 'home/tampil_profile';
		$isi['nama_user'] = $this->db->get('tbl_admin');
		
		$this->load->view('home/tampil_home',$isi);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	
}