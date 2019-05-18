<h3 class="header smaller lighter blue">Pilih Anggota</h3>
<form class="form-horizontal" role="form" method="POST" action="<?=base_URL()?>home/peminjaman/tambah" name="f_pilih_a" onsubmit="return cek()">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Pilih Anggota</label>
		<div class="col-sm-9">
			<select name="id_anggota">
				<option value="">Pilih Anggota</option>
					<?php 
						$q_anggota = $this->db->query("SELECT id_anggota, nama FROM tbl_anggota")->result();
						if(!empty($q_anggota)){
							foreach ($q_anggota as $row) {
								echo "<option value='".$row->id_anggota."'>".$row->nama."</option>";
							}
						}
					?>
			</select>
		</div>
	</div>
			<?php
				$q_perpus = $this->db->query("SELECT * FROM pengaturan LIMIT 1")->row();
			?>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Jumlah Buku</label>
		<div class="col-sm-9">
			<input type="text" name="jml_buku" class="col-xs-1"  placeholder="" required="" value="">&nbsp;&nbsp;*) Maksimal 
			<?=$q_perpus->maks_buku?> 
		</div>
	</div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-success btn-sm btn-next" type="submit">
				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
					Lanjutkan
			</button>
		</div>
	</div>
</form>
<script type="text/javascript">
function cek() {
	var x=document.forms["f_pilih_a"]["jml_buku"].value;

	if (x > <?=$q_perpus->maks_buku?>) {
	  alert("Maksimal jumlah peminjaman adalah <?=$q_perpus->maks_buku?> buku..!!");
	  return false;
	}
}
</script>