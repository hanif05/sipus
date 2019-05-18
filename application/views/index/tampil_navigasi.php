				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo base_url();?>index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Home </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										

										<b class="arrow"></b>
									</li>

									<li class="">
										

										<b class="arrow"></b>
									</li>

									<li class="">
										

										<b class="arrow"></b>
									</li>

									<li class="">
										

										<b class="arrow"></b>
									</li>

									<li class="">
										
										<b class="arrow"></b>
									</li>

									<li class="">
										

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							

							<li class="">
								

								<b class="arrow"></b>
							</li>

							<li class="">
								

								<b class="arrow"></b>
							</li>

							<li class="">
								

								<b class="arrow"></b>
							</li>

							<li class="">
								

								<b class="arrow"></b>
							</li>

							<li class="">
								

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-leaf green"></i>
											Item #1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											4th level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Product
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-eye pink"></i>
													View Products
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="<?=BASE_URL()?>index/caribuku">
							<i class="menu-icon glyphicon glyphicon-search"></i>
							<span class="menu-text">
								Cari Buku
							</span>

							
						</a>

					</li>
					<?php 
						$q_terakhir = $this->db->query("SELECT COUNT(id_pengunjung) AS terakhir FROM tbl_pengunjung WHERE LEFT(tgl, 10) = DATE(NOW())")->row();
						$q_hari_ini = $this->db->query("SELECT COUNT(id_pengunjung) AS terakhir FROM tbl_pengunjung WHERE LEFT(tgl, 10) = DATE(NOW())")->row();
						$q_bulan_ini = $this->db->query("SELECT COUNT(id_pengunjung) AS terakhir FROM tbl_pengunjung WHERE MID(tgl, 6, 2) = MONTH(NOW())")->row();
					?>
					<hr style="border-width: 2px; border-color: #000">
					<li>
						<center> Statsitik Hari Ini </center>
					</li>
					<center style="margin-top: 20px">Anda pengunjung ke :</center>
					<center style="font-size: 35px; margin-top: 20px; font-weight: bold"><?=($q_terakhir->terakhir + 1)?></center>
					<center style="margin-top: 20px">Total Hari Ini : <?=$q_hari_ini->terakhir?></center>
					<center style="margin-top: 0px; margin-bottom: 10px">Total Bulan Ini : <?=$q_bulan_ini->terakhir?></center>
					<hr style="border-width: 2px; border-color: #000">
						
					<center><?=$this->calendar->generate();?></center>
					<div id="calendar"></div>
				</ul>