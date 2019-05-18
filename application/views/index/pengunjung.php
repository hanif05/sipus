<div class="alert alert-block alert-success">	
	<button type="button" class="close" data-dismiss="alert">	
		<i class="ace-icon fa fa-times"></i>
	</button>

		<i class="ace-icon fa fa-check green"></i>
			Selamat datang di
		<strong class="green">	
			Perpustakaan Sekolah Dasar Negeri Langensari
		</strong>
		
</div>
<div class="alert alert-block alert-success">	
	<button type="button" class="close" data-dismiss="alert">	
		<i class="ace-icon fa fa-times"></i>
	</button>

		<i class="ace-icon fa fa-check green"></i>
			Silakan masukkan data kunjungan Anda, sebelum masuk ke perpustakaan. Terima kasih ...
		<strong class="green">	
			
		</strong>
		
</div>
<?=$this->session->flashdata("info1")?>
	<div class="row">
		<div class="space-6"></div>		
			<form class="form-horizontal" role="form" method="POST" action="<?=base_URL()?>index/post_pengunjung">
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Nama</label>
				<div class="col-sm-9">
					<input type="text" name="nama"  placeholder="Nama" required="" value="">
				</div>
		</div>	
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Kelas</label>
				<div class="col-sm-9">
					<select name="kelas">
						<option value="">Pilih Kelas</option>
						<option value="1-A">1-A</option>
						<option value="1-B">1-B</option>
						<option value="2-A">2-A</option>
						<option value="2-B">2-B</option>
						<option value="3-A">3-A</option>
						<option value="3-B">3-B</option>
						<option value="4-A">4-A</option>
						<option value="4-B">4-B</option>
						<option value="5-A">5-A</option>
						<option value="5-B">5-B</option>
						<option value="6-A">6-A</option>
						<option value="6-B">6-B</option>
					</select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>
				<div class="col-sm-9">
					<select name="jk">
						<option value="">Pilih Jenis Kelamin</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Keperluan</label>
					<div class="checkbox">
						<label>
							<input name="perlu1" type="checkbox" class="ace" value="Belajar" />
								<span class="lbl"> Belajar</span>
						</label>
						<label>
							<input name="perlu2" type="checkbox" class="ace" value="Baca Buku" />
								<span class="lbl"> Baca Buku</span>
						</label>
						<label>
							<input name="perlu3" type="checkbox" class="ace" value="Pinjam Buku" />
								<span class="lbl"> Pinjam Buku</span>
						</label>
						<label>
							<input name="perlu4" type="checkbox" class="ace" value="Kembalikan Buku" />
								<span class="lbl"> Kembalikan Buku</span>
						</label>
						<label>
							<input name="perlu5" type="checkbox" class="ace" value="Lainnya" />
								<span class="lbl"> Lainnya</span>
						</label>
					</div>
				</div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button class="btn btn-info" type="submit">
							<i class="ace-icon fa fa-check bigger-110"></i>
								Simpan
						</button>
				</div>
				

	</div><!-- /.row -->

