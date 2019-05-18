
<h3 class="header smaller lighter blue">Laporan Buku</h3>
<p>
	<button class="btn btn-app btn-light btn-xs" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/data_buku', '_blank')">
		<i class="ace-icon fa fa-print bigger-160"></i>
			Cetak
	</button>
</p>
	<h5>Total Buku yang dimiliki : <?=$jml?></h5>
	<table style="width: 100%; font-size: 10px" class="table table-striped table-bordered table-hover">
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