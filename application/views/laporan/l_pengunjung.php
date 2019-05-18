<h3 class="header smaller lighter blue">Laporan Pengunjung</h3>
<button class="btn btn-sm btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/kunjungan_hari_ini', '_blank')">Cetak Hari Ini</button>
<br>
	
	<h5>Pengunjung Hari Ini Per Jenis Kelamin</h5>
	<table style="width: 50%"  class="table table-striped table-bordered table-hover">
		<tr>
			<th width="10%">No</th>
			<th width="35%">Laki-Laki</th>
			<th width="35%">Perempuan</th>
			<th width="20%">Jumlah</th>
		</tr>
		<?php
		$c_jk_hi 	= $this->db->query("SELECT SUM(IF( jk =  'Laki-Laki', 1, 0 ) ) AS jkl, SUM( IF( jk =  'Perempuan', 1, 0 ) ) AS jkp FROM tbl_pengunjung  WHERE LEFT(tgl, 10) = DATE(NOW()) ")->result();

		foreach($c_jk_hi as $row) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$row->jkl?></td>
			<td style="text-align: center"><?=$row->jkp?></td>
			<td style="text-align: center"><?=$row->jkl+$row->jkp?> orang</td>
		</tr>	
		<?php
		}
		?>
	</table>
	<h5>Pengunjung Hari Ini Per Kelas</h5>
	<table style="width: 80%"  class="table table-striped table-bordered table-hover">
		<tr>
			<th width="5%">No</th>
			<th width="10%">Kelas 1 (A-B)</th>
			<th width="10%">Kelas 2 (A-B)</th>
			<th width="10%">Kelas 3 (A-B)</th>
			<th width="10%">Kelas 4 (A-B)</th>
			<th width="10%">Kelas 5 (A-B)</th>
			<th width="10%">Kelas 6 (A-B)</th>
			<th width="10%">Jumlah</th>
		</tr>
		<?php
		$kel 	= $this->db->query("SELECT SUM(IF( kelas =  '1-A', 1, 0 ) ) AS kel1a, SUM( IF( kelas =  '1-B', 1, 0 ) ) AS kel1b, SUM( IF( kelas =  '2-A', 1, 0 ) ) AS kel2a, SUM( IF( kelas =  '2-B', 1, 0 ) ) AS kel2b, SUM( IF( kelas =  '3-A', 1, 0 ) ) AS kel3a, SUM( IF( kelas =  '3-B', 1, 0 ) ) AS kel3b, SUM( IF( kelas =  '4-A', 1, 0 ) ) AS kel4a, SUM( IF( kelas =  '4-B', 1, 0 ) ) AS kel4b, SUM( IF( kelas =  '5-A', 1, 0 ) ) AS kel5a, SUM( IF( kelas =  '5-B', 1, 0 ) ) AS kel5b, SUM( IF( kelas =  '6-A', 1, 0 ) ) AS kel6a, SUM( IF( kelas =  '6-B', 1, 0 ) ) AS kel6b FROM tbl_pengunjung  WHERE LEFT(tgl, 10) = DATE(NOW()) ")->result();

		foreach($kel as $row) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$row->kel1a+$row->kel1b?></td>
			<td style="text-align: center"><?=$row->kel2a+$row->kel2b?></td>
			<td style="text-align: center"><?=$row->kel3a+$row->kel3b?></td>
			<td style="text-align: center"><?=$row->kel4a+$row->kel4b?></td>
			<td style="text-align: center"><?=$row->kel5a+$row->kel5b?></td>
			<td style="text-align: center"><?=$row->kel6a+$row->kel6b?></td>
			<td style="text-align: center"><?=$row->kel1a+$row->kel1b+$row->kel2a+$row->kel2b+$row->kel3a+$row->kel3b+$row->kel4a+$row->kel4b+$row->kel5a+$row->kel5b+$row->kel6a+$row->kel6b?> orang</td>
		</tr>	
		<?php
		}
		?>
	</table>
	<h5>Pengunjung Hari Ini Per Keperluan</h5>
	<table style="width: 50%"  class="table table-striped table-bordered table-hover">
		<tr>
			<th width="10%">No</th>
			<th width="18%">Belajar</th>
			<th width="18%">Baca Buku</th>
			<th width="18%">Pinjam Buku</th>
			<th width="18%">Kembalikan Buku</th>
			<th width="18%">Lainnya</th>
		</tr>
		<?php 
		$c_p1	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Belajar%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p2	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Baca Buku%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p3	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Pinjam Buku%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p4	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Kembalikan Buku%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p5	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Lainnya%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();

		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$c_p1?></td>
			<td style="text-align: center"><?=$c_p2?></td>
			<td style="text-align: center"><?=$c_p3?></td>
			<td style="text-align: center"><?=$c_p4?></td>
			<td style="text-align: center"><?=$c_p5?></td>
		</tr>
	</table>
	<hr id="bulanan" style="border-width: 3px; border-color: #000">
	<a class="btn btn-sm btn-primary" href="<?=base_URL()?>cetak/kunjungan_bulan/<?=date('m')?>" target="_blank">Cetak Bulan  Ini</a>
	<div class="btn-group">
		<a class="btn btn-sm btn-primary" data-toggle="dropdown" href="<?=base_URL()?>cetak/kunjungan_bulan/<?=date('m')?>">Cetak Bulan </a>
		<ul class="dropdown-menu">
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/1" target="_blank">Januari</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/2" target="_blank">Februari</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/3" target="_blank">Maret</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/4" target="_blank">April</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/5" target="_blank">Mei</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/6" target="_blank">Juni</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/7" target="_blank">Juli</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/8" target="_blank">Agustus</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/9" target="_blank">September</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/10" target="_blank">Oktober</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/11" target="_blank">November</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjungan_bulan/12" target="_blank">Desember</a></li>
		</ul>
	</div>
	<br>
	<h5>Pengunjung Bulan Ini Per Jenis Kelamin</h5>
	<table style="width: 50%"  class="table table-striped table-bordered table-hover">
		<tr>
			<th width="10%">No</th>
			<th width="35%">Laki-Laki</th>
			<th width="35%">Perempuan</th>
			<th width="20%">Jumlah</th>
		</tr>
		<?php 
		$c_jk_hi 	= $this->db->query("SELECT SUM(IF( jk =  'Laki-Laki', 1, 0 ) ) AS jkl, SUM( IF( jk =  'Perempuan', 1, 0 ) ) AS jkp FROM tbl_pengunjung  WHERE MID(tgl, 6, 2) = MONTH(NOW()) ")->result();

		foreach($c_jk_hi as $row) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$row->jkl?></td>
			<td style="text-align: center"><?=$row->jkp?></td>
			<td style="text-align: center"><?=$row->jkl+$row->jkp?> orang</td>
		</tr>	
		<?php
		}
		?>
	</table>
	<h5>Pengunjung Bulan Ini Per Kelas</h5>
	<table style="width: 80%"  class="table table-striped table-bordered table-hover">
		<tr>
			<th width="5%">No</th>
			<th width="10%">Kelas 1 (A-B)</th>
			<th width="10%">Kelas 2 (A-B)</th>
			<th width="10%">Kelas 3 (A-B)</th>
			<th width="10%">Kelas 4 (A-B)</th>
			<th width="10%">Kelas 5 (A-B)</th>
			<th width="10%">Kelas 6 (A-B)</th>
			<th width="10%">Jumlah</th>
		</tr>
		<?php
		$kel 	= $this->db->query("SELECT SUM(IF( kelas =  '1-A', 1, 0 ) ) AS kel1a, SUM( IF( kelas =  '1-B', 1, 0 ) ) AS kel1b, SUM( IF( kelas =  '2-A', 1, 0 ) ) AS kel2a, SUM( IF( kelas =  '2-B', 1, 0 ) ) AS kel2b, SUM( IF( kelas =  '3-A', 1, 0 ) ) AS kel3a, SUM( IF( kelas =  '3-B', 1, 0 ) ) AS kel3b, SUM( IF( kelas =  '4-A', 1, 0 ) ) AS kel4a, SUM( IF( kelas =  '4-B', 1, 0 ) ) AS kel4b, SUM( IF( kelas =  '5-A', 1, 0 ) ) AS kel5a, SUM( IF( kelas =  '5-B', 1, 0 ) ) AS kel5b, SUM( IF( kelas =  '6-A', 1, 0 ) ) AS kel6a, SUM( IF( kelas =  '6-B', 1, 0 ) ) AS kel6b FROM tbl_pengunjung  WHERE MID(tgl, 6, 2) = MONTH(NOW()) ")->result();

		foreach($kel as $row) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$row->kel1a+$row->kel1b?></td>
			<td style="text-align: center"><?=$row->kel2a+$row->kel2b?></td>
			<td style="text-align: center"><?=$row->kel3a+$row->kel3b?></td>
			<td style="text-align: center"><?=$row->kel4a+$row->kel4b?></td>
			<td style="text-align: center"><?=$row->kel5a+$row->kel5b?></td>
			<td style="text-align: center"><?=$row->kel6a+$row->kel6b?></td>
			<td style="text-align: center"><?=$row->kel1a+$row->kel1b+$row->kel2a+$row->kel2b+$row->kel3a+$row->kel3b+$row->kel4a+$row->kel4b+$row->kel5a+$row->kel5b+$row->kel6a+$row->kel6b?> orang</td>
		</tr>	
		<?php
		}
		?>
	</table>
	<h5>Pengunjung Bulan Ini Per Keperluan</h5>
	<table style="width: 80%"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="18%">Belajar</th>
			<th width="18%">Baca Buku</th>
			<th width="18%">Pinjam Buku</th>
			<th width="18%">Kembalikan Buku</th>
			<th width="18%">Lainnya</th>
		</tr>
		<?php 
		$c_p1	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Belajar%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p2	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Baca Buku%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p3	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Pinjam Buku%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p4	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Kembalikan Buku%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p5	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Lainnya%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();

		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$c_p1?></td>
			<td style="text-align: center"><?=$c_p2?></td>
			<td style="text-align: center"><?=$c_p3?></td>
			<td style="text-align: center"><?=$c_p4?></td>
			<td style="text-align: center"><?=$c_p5?></td>
		</tr>	
	</table>



