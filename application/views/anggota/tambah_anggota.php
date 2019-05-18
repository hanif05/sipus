<?php
$model = $this->uri->segment(3);
if ($model == "edit" || $model == "proses_edit"){
	$proses 		= "proses_edit"; 
	$id_anggota = $data_i->id_anggota;
	$nama 		= $data_i->nama;
	$kelas 		= $data_i->kelas;
	$alamat 	= $data_i->alamat;
	$jk			= $data_i->jk;
	$tmpt_lahir	= $data_i->tmpt_lahir;
	$tgl_lahir	= $data_i->tgl_lahir;
	
	$tg			= substr($tgl_lahir, 8, 2);
	$bl			= substr($tgl_lahir, 5, 2);
	$th			= substr($tgl_lahir, 0, 4);

	$status 	= $data_i->status;
}
else{
	$proses = "proses_tambah";
	$id_anggota = "";
	$nama 		= "";
	$kelas 		= "";
	$alamat 	= "";
	$jk			= "";
	$tmpt_lahir	= "";
	$tgl_lahir	= "";
	$status 	= "";
}
?>


<h3 class="header smaller lighter blue"><?=$sub_anggota?></h3>
<form class="form-horizontal" role="form" method="POST" action="<?=base_URL()?>home/anggota/<?=$proses?>">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">ID Anggota</label>
		<div class="col-sm-9">
			<input type="text" name="id_anggota"  class="col-xs-1" readonly="" id="form-input-readonly" value="<?=$id_anggota?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Nama</label>
		<div class="col-sm-9">
			<input type="text" name="nama"  placeholder="Nama Anggota" required="" value="<?=$nama?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Kelas</label>
		<div class="col-sm-9">
			<select name="kelas">
				<option value="">Pilih Kelas</option>
				<?php 
				$kelas_p = array("1-A","1-B","2-A","2-B","3-A","3-B","4-A","4-B","5-A","5-B","6-A","6-B");
				$jk_p = array("Laki-laki","Perempuan");

				for ($i=0; $i < sizeof($kelas_p); $i++) { 
					if($kelas == $kelas_p[$i]){
						echo "<option value='".$kelas_p[$i]."' selected>".$kelas_p[$i]."</option>";
					}
					else{
						echo "<option value='".$kelas_p[$i]."'>".$kelas_p[$i]."</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Alamat</label>
		<div class="col-sm-9">
			<input type="text" name="alamat" class="col-xs-10 col-sm-5" placeholder="Alamat" required="" value="<?=$alamat?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>
		<div class="col-sm-9">
			<select name="jk">
				<option value="">Pilih Jenis Kelamin</option>
				<?php
				for ($a=0; $a < sizeof($jk_p); $a++) { 
					if($jk == $jk_p[$a]){
						echo "<option value='".$jk_p[$a]."' selected>".$jk_p[$a]."</option>";
					}
					else{
						echo "<option value='".$jk_p[$a]."'>".$jk_p[$a]."</option>";
					}
				}				
				?>
			</select>
		</div>	
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tempat Tanggal Lahir</label>
		<div class="col-sm-9">
			<input type="text" name="tmpt_lahir"  placeholder="Tempat Lahir" required="" value="<?=$tmpt_lahir?>">
			<select name="tg">
				<option value="">Pilih Tgl</option>
				<?php
					for ($tgl=1; $tgl <32 ; $tgl++) { 
						if($tgl==$tg){
							echo "<option value='$tgl' selected>$tgl</option>";
						}
						else {
							echo "<option value='$tgl'>$tgl</option>";	
						}
					}
				?>
			</select>
			<select name="bl">
				<option value="">Pilih Bulan</option>
				<?php 
					for ($bln = 1; $bln < 13; $bln++) {
						if ($bln == $bl) {
							echo "<option value='$bln' selected>$bln</option>";
						} 
						else {
							echo "<option value='$bln'>$bln</option>";
						}
					}
				?>
			</select>
			<select name="th">
				<option value="">Pilih Tahun</option>
				<?php 
					for ($thn = 1960; $thn < date('Y'); $thn++) {
						if ($thn == $th) {
							echo "<option value='$thn' selected>$thn</option>";
						} else {
							echo "<option value='$thn'>$thn</option>";
						}
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Status</label>
		<div class="col-sm-9">
			<select name="status">
				<option value="">Pilih Status</option>
				<?php 
				$status_p	= array("Non Aktif", "Aktif");
				for($d = 0; $d < sizeof($status_p); $d++) {
					if ($status == $d) {
						echo "<option value='$d' selected>".$status_p[$d]."</option>";
					} 
					else {
						echo "<option value='$d'>".$status_p[$d]."</option>";
					}		
				}
				?>
			</select>	
		</div>
	</div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
					Simpan
			</button>

			&nbsp; &nbsp; &nbsp;
			<a href="<?=base_URL()?>home/anggota">
				<div class="btn">
					<i class="ace-icon fa fa-undo bigger-110"></i>
						Kembali
				</div>
			</a>
		</div>
	</div>
</form>