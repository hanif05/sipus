<?php
$id_anggota = $data_i->id_anggota;
$nama 		= $data_i->nama;
$kelas 		= $data_i->kelas;
?>
<h3 class="header smaller lighter blue">Pilih Anggota</h3>
<form class="form-horizontal" role="form" method="POST" action="#">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">ID Anggota</label>
		<div class="col-sm-9">
			<input type="text" name="id_anggota"  class="col-xs-1" readonly="" id="form-input-readonly" value="<?=$id_anggota ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Nama</label>
		<div class="col-sm-9">
			<input type="text" name="nama"  placeholder="Nama Anggota" readonly="" value="<?=$nama?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Jumlah Buku</label>
		<div class="col-sm-9">
			<input type="text" name="jml_buku"  placeholder="Masukan Jumlah Buku" required="" value="">Maksimal <??>
		</div>
	</div>
</form>