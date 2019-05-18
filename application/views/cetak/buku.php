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
	
<h5>Data Buku</h5>
<table style="width: 100%; font-size: 10px" border="1" class="table table-striped table-bordered table-hover">
		<tr>
			<th width="1%" bgcolor="#c1bebe">No</th>
			<th width="10%" bgcolor="#c1bebe">Judul</th>
			<th width="10%" bgcolor="#c1bebe">Pengarang</th>
			<th width="10%" bgcolor="#c1bebe">Penerbit</th>
			<th width="5%" bgcolor="#c1bebe">Tahun Terbit</th>
			<th width="5%" bgcolor="#c1bebe">ISBN</th>
			<th width="5%" bgcolor="#c1bebe">Rak</th>
		</tr>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='7' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no = 1;
			foreach($data as $d) {
		?>
		<tr>
			<td style="text-align: center"><?=$no?></td>
			<td style="text-align: left"><?=$d->judul?></td>
			<td style="text-align: left"><?=$d->pengarang?></td>
			<td style="text-align: left"><?=$d->penerbit?></td>
			<td style="text-align: left"><?=$d->tahun?></td>
			<td style="text-align: left"><?=$d->isbn?></td>
			<td style="text-align: left"><?=$d->rak?></td>
			
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>