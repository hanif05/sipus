<div class="row">

	<div class="col-xs-12">
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<h3 class="header smaller lighter blue">Data Anggota</h3>

		<div class="nav-search" id="nav-search">
			<form class="form-search" action="<?=base_URL()?>home/transaksi/pilih_anggota/cari" method="POST">
				<span class="input-icon">
					<input type="text" placeholder="Cari Anggota" class="nav-search-input" name="search">
						<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
		<br><br>
		<?php echo $this->session->flashdata("info");?>
		<thead>
			<tr>
				<th>No</th>
				<th>(ID) Nama</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>Aksi</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php 
				$no = $this->uri->segment(5); 
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
				
				<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="btn btn-success btn-sm btn-next" href="<?=base_URL()?>home/transaksi/pilih_anggota/pilih/<?=$row->id_anggota?>">		
							Pilih
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</a>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
		</table>
		
	</div>
</div>

