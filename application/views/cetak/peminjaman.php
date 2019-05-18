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
<h5>Peminjaman Bulan Ini</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="2" class="table table-striped table-bordered table-hover">
		<tr>
			<th width="5%">No</th>
			<th width="25%">Nama Peminjam</th>
			<th width="35%">Judul Buku</th>
			<th width="10%">Tanggal Pinjam</th>
			<th width="10%">Tanggal Kembali</th>
			<th width="10%">Denda</th>
			<th width="5%">Status</th>
		</tr>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: left">Kurnia Setiawan</td>
			<td style="text-align: left">Buku Agama</td>
			<td style="text-align: center">2018-08-01</td>
			<td style="text-align: center">2018-08-07</td>
			<td style="text-align: center">1500</td>
			<td style="text-align: center">K</td>
		</tr>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: left">Surya</td>
			<td style="text-align: left">Buku IPA</td>
			<td style="text-align: center">2018-08-12</td>
			<td style="text-align: center">2018-08-19</td>
			<td style="text-align: center">0</td>
			<td style="text-align: center">P</td>
		</tr>
	</table>