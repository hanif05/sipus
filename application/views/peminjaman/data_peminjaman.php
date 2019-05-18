<div class="row">

	<div class="col-xs-12">
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<h3 class="header smaller lighter blue">Data Peminjaman</h3>
		<div class="nav-search" id="nav-search">
			<form class="form-search" action="<?=base_url()?>home/peminjaman/cari" method="POST">
				<span class="input-icon">
					<input type="text" placeholder="Cari ID anggota" class="nav-search-input" name="search">
						<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
		<p>
			<a href="<?=base_URL()?>home/peminjaman/pilih_anggota" class="btn btn-sm btn-primary">Tambah Data</a>
		</p>
		
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Peminjam (Jumlah Buku)</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Detail</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php 
				$no = $this->uri->segment(4); 
					if ($no == "") {
						$i 	= 0;
					} else {
						$i = $no;
					}
			?>
			<?php foreach ($data as $row):?>
			<? $i++ ?>
				<td><?=$i;?></td>
				<td><?=getNama($row->id_anggota);?> <b>(<?=$row->jml_pinjam?> buku)</b></td>
				<td><?=tgl_panjang($row->tgl_pinjam, "sm");?></td>
				<td><?=tgl_panjang($row->tgl_kembali, "sm");?></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="<?=base_URL()?>home/peminjaman/detail/">
							<i class="ace-icon glyphicon glyphicon-list" ></i>
						</a>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
		</table>
		<center>
				<div>
					
					</ul>
				</div>
			</center>
	</div>
</div>