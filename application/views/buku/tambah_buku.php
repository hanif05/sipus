<?php 
$model = $this->uri->segment(3);
if($model == "edit" || $model == "proses_edit"){
	$proses 		= "proses_edit"; 
	$id_buku 		= $data_i->id_buku;
	$judul 			= $data_i->judul;
	$pengarang 		= $data_i->pengarang;
	$penerbit 		= $data_i->penerbit;
	$tahun			= $data_i->tahun;
	$isbn 			= $data_i->isbn;	
	$rak			= $data_i->rak;
}
else{
	$proses = "proses_tambah";
	$id_buku 			= "";
	$judul 			= "";
	$pengarang 		= "";
	$penerbit 		= "";
	$tahun			= "";
	$isbn 			= "";
	$rak			= "";
}
?>

<h3 class="header smaller lighter blue"><?=$sub_buku?></h3>
<form class="form-horizontal" role="form" method="POST" action="<?=base_URL()?>home/buku/<?=$proses?>">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Kode Buku</label>
		<div class="col-sm-9">
			<input type="text" name="id_buku"  class="col-xs-1" readonly="" id="form-input-readonly" value="<?=$id_buku?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Judul Buku</label>
		<div class="col-sm-9">
			<input type="text" name="judul"  placeholder="Judul" required="" value="<?=$judul?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Pengarang</label>
		<div class="col-sm-9">
			<input type="text" name="pengarang" placeholder="Pengarang" required="" value="<?=$pengarang?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Penerbit</label>
		<div class="col-sm-9">
			<input type="text" name="penerbit" placeholder="Penerbit" required="" value="<?=$penerbit?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tahun Terbit</label>
		<div class="col-sm-9">
			<input type="text" name="tahun" class="col-xs-1" placeholder="Tahun" required="" value="<?=$tahun?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">ISBN</label>
		<div class="col-sm-9">
			<input type="text" name="isbn" placeholder="Nomer ISBN" required="" value="<?=$isbn?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Rak Buku</label>
		<div class="col-sm-9">
			<select name="rak">
				<option value="">Pilih Rak Buku</option>	
				<?php 
				$rak_p = array("R01", "R02", "R03", "R04", "R05");

				for ($i=0; $i < sizeof($rak_p); $i++) { 
					if($rak == $rak_p[$i]){
						echo "<option value='".$rak_p[$i]."' selected>".$rak_p[$i]."</option>";
					}
					else{
						echo "<option value='".$rak_p[$i]."'>".$rak_p[$i]."</option>";
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
			<a href="<?=base_URL()?>home/buku">
				<div class="btn">
					<i class="ace-icon fa fa-undo bigger-110"></i>
						Kembali
				</div>
			</a>
		</div>
	</div>

</form>