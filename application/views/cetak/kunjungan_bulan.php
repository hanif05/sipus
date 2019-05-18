<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
		<!-- Boostrap alternative-->

		


	    
	    
	    
	    
	    <script src="<?=base_URL()?>aset/js/bootstrap-modal.js"></script>
	    	<!-- Boostrap alternative-->


		<!-- ace settings handler -->
		<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>

<?php 
$q_perpus	= $this->db->query("SELECT * FROM pengaturan LIMIT 1")->row();
echo '<img src="'.base_URL().'asset1/img/'.$q_perpus->logo.'" style="width: 80px; height: 80px; margin-right: 20px; display: inline; float: left">';
echo '<h2 style="font-size: 22px">Perpustakaan '.$q_perpus->nama.'</h2>';
echo '<h5>'.$q_perpus->alamat.'</h5>';
	
?>
<body onload="this.print()">
<hr id="bulanan" style="border-width: 2px; border-color: #000">
<h5>Pengunjung Bulan Ini (<?=date('F')?>) Per Jenis Kelamin</h5>
	<table style="width: 50%; border-collapse: collapse" border="1"  class="table table-striped table-bordered table-hover">
		<tr>
			<th width="10%">No</th>
			<th width="25%">Laki-Laki</th>
			<th width="25%">Perempuan</th>
			<th width="30%">Jumlah</th>
		</tr>
		<?php 
		$c_jk_hi 	= $this->db->query("SELECT SUM(IF( jk =  'Laki-Laki', 1, 0 ) ) AS jkl, SUM( IF( jk =  'Perempuan', 1, 0 ) ) AS jkp FROM tbl_pengunjung  WHERE MID(tgl, 6, 2) = '$bulan' ")->result();

		foreach($c_jk_hi as $row) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=($row->jkl)?></td>
			<td style="text-align: center"><?=($row->jkp)?></td>
			<td style="text-align: center"><?=($row->jkl+$row->jkp)?> orang</td>
		</tr>	
		<?php
		}
		?>
	</table>
	<h5>Pengunjung Bulan Ini (<?=date('F')?>) Per Kelas</h5>
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
		$kel 	= $this->db->query("SELECT SUM(IF( kelas =  '1-A', 1, 0 ) ) AS kel1a, SUM( IF( kelas =  '1-B', 1, 0 ) ) AS kel1b, SUM( IF( kelas =  '2-A', 1, 0 ) ) AS kel2a, SUM( IF( kelas =  '2-B', 1, 0 ) ) AS kel2b, SUM( IF( kelas =  '3-A', 1, 0 ) ) AS kel3a, SUM( IF( kelas =  '3-B', 1, 0 ) ) AS kel3b, SUM( IF( kelas =  '4-A', 1, 0 ) ) AS kel4a, SUM( IF( kelas =  '4-B', 1, 0 ) ) AS kel4b, SUM( IF( kelas =  '5-A', 1, 0 ) ) AS kel5a, SUM( IF( kelas =  '5-B', 1, 0 ) ) AS kel5b, SUM( IF( kelas =  '6-A', 1, 0 ) ) AS kel6a, SUM( IF( kelas =  '6-B', 1, 0 ) ) AS kel6b FROM tbl_pengunjung  WHERE MID(tgl, 6, 2) = '$bulan'")->result();

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
	<h5>Pengunjung Bulan Ini (<?=date('F')?>) Per Keperluan</h5>
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
		$c_p1	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Belajar%' AND MID(tgl, 6, 2) = '$bulan'")->num_rows();
		$c_p2	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Baca Buku%' AND MID(tgl, 6, 2) = '$bulan' ")->num_rows();
		$c_p3	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Pinjam Buku%' AND MID(tgl, 6, 2) = '$bulan'")->num_rows();
		$c_p4	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Kembalikan Buku%' AND MID(tgl, 6, 2) = '$bulan' ")->num_rows();
		$c_p5	= $this->db->query("SELECT id_pengunjung FROM tbl_pengunjung  WHERE perlu LIKE '%Lainnya%' AND MID(tgl, 6, 2) = '$bulan' ")->num_rows();

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
</body>