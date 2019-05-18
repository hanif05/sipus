<h3 class="header smaller lighter blue">Laporan Peminjaman</h3>
<button class="btn btn-sm btn-primary" type="button">Cetak Hari Ini</button>
<button class="btn btn-sm btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/l_peminjam', '_blank')">Cetak Bulan Ini</button> 
<br>
	<h5>Peminjaman Hari ini</h5>
	<table style="width: 100%; font-size: 10px"  class="table table-striped table-bordered table-hover">
		<tr>
			<th width="5%">No</th>
			<th width="25%">Nama Peminjam</th>
			<th width="35%">Judul Buku</th>
			<th width="10%">Tanggal Pinjam</th>
			<th width="10%">Tanggal Kembali</th>
			<th width="10%">Denda</th>
			<th width="5%">Status</th>
		</tr>		
		<tr><td colspan='7' style='text-align: center'> - Tidak ada data - </td></tr>

	</table>
	<h5>Peminjaman Bulan Ini</h5>
	<table style="width: 100%; font-size: 10px"  class="table table-striped table-bordered table-hover">
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
			<td style="text-align: center">2</td>
			<td style="text-align: left">Surya</td>
			<td style="text-align: left">Buku IPA</td>
			<td style="text-align: center">2018-08-12</td>
			<td style="text-align: center">2018-08-19</td>
			<td style="text-align: center">0</td>
			<td style="text-align: center">P</td>
		</tr>
	</table>