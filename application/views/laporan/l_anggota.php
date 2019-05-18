<h3 class="header smaller lighter blue">Laporan Anggota</h3>
<p>
	<button class="btn btn-app btn-light btn-xs" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/data_anggota', '_blank')">
		<i class="ace-icon fa fa-print bigger-160"></i>
			Cetak
	</button>
</p>
	<h5>Total Anggota yang dimiliki : <?=$jml?></h5>
	<table style="width: 100%; font-size: 10px" class="table table-striped table-bordered table-hover">
		<tr>
			<th width="1%" bgcolor="#c1bebe">No</th>
			<th width="10%" bgcolor="#c1bebe">Nama</th>
			<th width="5%" bgcolor="#c1bebe">Kelas</th>
			<th width="5%" bgcolor="#c1bebe">Jenis Kelamin</th>
			<th width="10%" bgcolor="#c1bebe">Tempat, Tanggal Lahir</th>
			<th width="5%" bgcolor="#c1bebe">Status</th>
			
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
			<td style="text-align: left"><?=$d->nama?></td>
			<td style="text-align: left"><?=$d->kelas?></td>
			<td style="text-align: left"><?=$d->jk?></td>
			<td style="text-align: left"><?=$d->tmpt_lahir.", ".$d->tgl_lahir?></td>
			<td style="text-align: left"><?php if ($d->status == "1") { echo "Aktif"; } else { echo "Non Aktif"; }?></td>
			
			
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>