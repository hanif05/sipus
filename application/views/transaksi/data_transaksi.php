<div class="row">

	<div class="col-xs-12">
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<h3 class="header smaller lighter blue">Data Transaksi</h3>
		<div class="nav-search" id="nav-search">
			<form class="form-search" action="#" method="POST">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" name="search">
						<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
		<p>
			<a href="<?=base_URL()?>home/transaksi/pilih_anggota" class="btn btn-sm btn-primary">Tambah Data</a>
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
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="#">
							<i class="ace-icon fa fa-pencil bigger-130" ></i>
						</a>
						<a class="red" href="#">
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
					
					</ul>
				</div>
			</center>
	</div>
</div>

