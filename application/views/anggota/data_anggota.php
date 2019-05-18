<div class="row">

	<div class="col-xs-12">
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<h3 class="header smaller lighter blue">Data Anggota</h3>
		<div class="nav-search" id="nav-search">
			<form class="form-search" action="<?=base_URL()?>home/anggota/cari" method="POST">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" name="search">
						<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
		<p>
			<a href="<?=base_URL()?>home/anggota/tambah" class="btn btn-sm btn-primary">Tambah Data</a>
			<button type="button" class="btn btn-sm btn-primary" onclick="window.open('<?php echo base_URL(); ?>cetak/anggota', '_blank')">Cetak Kartu Anggota</button>
		</p>
		<?php echo $this->session->flashdata("info");?>
		<thead>
			<tr>
				<th>No</th>
				<th>(ID) Nama</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>TTL</th>
				<th>Status</th>
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
			<? $i++ ?>
				<td><?=$i;?></td>
				<td>(<?=str_pad($row->id_anggota, 2 , '0', STR_PAD_LEFT)?>) - <?=$row->nama?><br><b><?=$row->jk?></b></td>
				<td><?=$row->kelas?></td>
				<td><?=$row->alamat ?></td>
				<td><?=$row->tmpt_lahir?>, <?=tgl_panjang($row->tgl_lahir, "lm"); ?></td>
				<td><?php if ($row->status == "1") { echo "Aktif"; } else { echo "Non Aktif"; }?></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="<?=base_URL()?>home/anggota/edit/<?=$row->id_anggota?>">
							<i class="ace-icon fa fa-pencil bigger-130" ></i>
						</a>
						<a class="red" href="<?=base_URL()?>home/anggota/hapus/<?=$row->id_anggota?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data \n <?=$row->nama?>...?');">
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

