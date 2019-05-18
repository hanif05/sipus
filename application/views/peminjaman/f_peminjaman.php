

<script src="<?=base_URL()?>aset/js/bootstrap-modal.js"></script>
<script src="<?=base_URL()?>aset/js/jquery.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-transition.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-alert.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-modal.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tab.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tooltip.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-popover.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-button.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-collapse.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-carousel.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>


<h3 class="header smaller lighter blue">Detail Peminjaman</h3>
<?php echo $this->session->flashdata("info");?>
<form class="form-horizontal" role="form" method="POST" action="#" name="f_peminjaman" onsubmit="return cek()">
			<input type="hidden" name="jml_buku" value="<?=$jml_buku?>">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">ID Anggota</label>
		<div class="col-sm-9">
			<input type="text" name="id_anggota"  class="col-xs-1" readonly="" id="form-input-readonly" value="<?=$det_anggota->id_anggota?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Nama</label>
		<div class="col-sm-9">
			<input type="text" name="nama"  placeholder="" readonly="" value="<?=$det_anggota->nama?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tanggal Pinjam</label>
		<div class="col-sm-9">
			<input type="text" name="tgl_pinjam"  placeholder="" readonly="" value="<?=date('Y-m-d')?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tanggal Kembali</label>
		<div class="col-sm-9">
			<input type="text" name="tgl_kembali"  placeholder="" readonly="" value="<?=adddate(7);?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Keterangan/Catatan</label>
		<div class="col-sm-9">
				<textarea name="ket"></textarea>
		</div>
	</div>
<h3 class="header smaller lighter blue">Masukkan Data Buku</h3>
	<?php 
		for ($i = 1; $i <= $jml_buku; $i++) {
	?>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Buku ke-<?=$i?></label>
		<div class="col-sm-9">
			<input type="text" name="id_buku_<?=$i?>"  class="col-xs-1" placeholder="ID Buku" readonly="" id="id_buku_<?=$i?>" value="">&nbsp;&nbsp;&nbsp;
			<input type="text" name="judul_buku_<?=$i?>"  class="col-xs-10 col-sm-5" placeholder="Judul Buku" readonly="" id="judul_buku_<?=$i?>" value="">
			<input type="button" class="btn btn-purple" onclick="openbuku(<?=$i?>)" value="Cari">
		</div>
	</div>
	<?php
		}
	?>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
					Simpan
			</button>


			&nbsp; &nbsp; &nbsp;
			<a href="<?=base_URL()?>home/peminjaman/pilih_anggota">
				<div class="btn">
					<i class="ace-icon fa fa-undo bigger-110"></i>
						Kembali
				</div>
			</a>
		</div>
	</div>
</form>
<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Cari Buku</h3>
	</div>

	<div class="modal-body">
		<form class="form" method="post" id="cari_kode">
			<input type="hidden" name="id_data" id="id_data" value="0">
			<input type="text" id="kata_kunci" class="span10" name="kata_kunci" autofocus placeholder="kata kunci : judul buku" required style="width: 80%">
			<button type="submit" class="btn btn-purple" style="margin-top: -10px;">Cari</button>
		</form>
		<div id="hasil_cari"></div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="" class="close" data-dismiss="modal" aria-hidden="true">Close</a>
	</div>
</div>

<script type="text/javascript">
$(document).on("ready", function() {
	$("#cari_kode").submit(function(event) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>home/peminjaman/caribuku",
			data: $("#cari_kode").serialize(),
			success: function(response) {
				$("#hasil_cari").html(response);
			}
		});
		return false;
    });
});

function openbuku(y) {
	$("#id_data").val(y);
	$("#kata_kunci").val('');
	$("#hasil_cari").html('');
	$('#myModal').modal("show");
}

function tutup() {
	$('#myModal').modal("hide");
}

function isikan_kode(id_data, id_buku, nama) {
	$("#id_buku_"+id_data).val(id_buku);
	$("#judul_buku_"+id_data).val(nama);
	$('#myModal').modal('hide');
	return false;
}

function cek() {
	<?php 
	for ($i = 1; $i <= $jml_buku; $i++) {
	?>
	var x_<?=$i?> = document.forms["f_peminjaman"]["id_buku_<?=$i?>"].value;
	<?php 
	}
	?>
	
	<?php 
	for ($j = 1; $j <= $jml_buku; $j++) {
	?>
	
	if ( x_<?=$j?> == "") {
	  alert("Pilihlah buku isian buku ke - <?=$j?>");
	  openbuku(<?=$j?>)
	  return false;
	} 
	<?php 
	}

	for ($k = 1; $k < $jml_buku; $k++) {
	?>
	
	if ( x_<?=$k+1?> == x_<?=$k?>) {
	  alert("Pilihan buku ke - <?=$k+1?> tidak boleh sama dengan sebelumnya");
	  openbuku(<?=$k+1?>)
	  return false;
	} 
	<?php 
	}
	?> 
	
}

</script>
