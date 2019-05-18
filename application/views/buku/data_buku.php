<div class="row">

	<div class="col-xs-12">
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<h3 class="header smaller lighter blue">Data Buku</h3>
		<div class="nav-search" id="nav-search">
			<form class="form-search" action="<?=base_URL()?>home/buku/cari" method="POST">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" name="search">
						<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
		<p>
			<a href="<?=base_URL()?>home/buku/tambah/" class="btn btn-sm btn-primary">Tambah Data</a>
		</p>
		<?php echo $this->session->flashdata("info");?>
		<thead>
			<tr>
			<th>No</th>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun</th>
			<th>ISBN</th>
			<th>Rak Buku</th>
			<th>Aksi</th>
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
			<? $i++; ?>
				<td><?=$i; ?></td>
				<td><?=$row->id_buku;?></td>
				<td><?=$row->judul;?></td>
				<td><?=$row->pengarang;?></td>
				<td><?=$row->penerbit;?></td>
				<td><?=$row->tahun;?></td>
				<td><?=$row->isbn;?></td>
				<td><?=$row->rak;?></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="<?=base_URL()?>home/buku/edit/<?=$row->id_buku?>">
							<i class="ace-icon fa fa-pencil bigger-130" ></i>
						</a>
						<a class="red" href="<?=base_URL()?>home/buku/hapus/<?=$row->id_buku?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data \n <?=$row->judul?>...?');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
				</td>

			</tr>
			<?php endforeach;?>
		</tbody>

		</table>
			<center>
				<div>
					<ul class="pagination"><?=$pagi?>
					</ul>
				</div>
			</center>
	</div>
</div>