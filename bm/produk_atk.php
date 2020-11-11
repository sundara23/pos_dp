<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">
		<?php show_alert(); ?>
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Daftar Produk ATK</h4>
					</div>
					<div class="panel-body">
						<a href="produk_atk_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH PRODUK</a>
						<!-- <a href="#" class="btn btn-sm bg-green">EXCEL</a> -->
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Kode Produk</th>
										<th>Nama Produk</th>
										<th>Kategori</th>
										<th>Stok</th>
										<th>Harga Awal</th>
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from produk_atk, kategori_atk where produk_atk.kd_kategori_atk=kategori_atk.kd_kategori_atk order by kd_produk desc");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['kd_produk'] ?></td>
											<td><?php echo $d['nama_produk'] ?></td>
											<td><?php echo $d['nama_kategori'] ?></td>
											<td>
                                                <?php
                                                $id_produk = $d['kd_produk'] ;
                                                $jumlah_stok_masuk = mysqli_query($config,"select sum(stok) as jml_stok_masuk from data_stok where kd_produk='$id_produk' and stok_masuk='1'");
                                                $jumlah_stok_keluar = mysqli_query($config,"select sum(stok) as jml_stok_keluar from data_stok where kd_produk='$id_produk' and stok_keluar='1'");
                                                $jmasuk = mysqli_fetch_assoc($jumlah_stok_masuk);
                                                $jkeluar = mysqli_fetch_assoc($jumlah_stok_keluar);
                                                $jumlah_stok = $jmasuk['jml_stok_masuk'] - $jkeluar['jml_stok_keluar'];
                                                echo $jumlah_stok;
                                                ?>
                                            </td>
											<td>Rp. <?php echo number_format($d['produk_harga']); ?></td>
											<td>
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="produk_atk_edit.php?id=<?php echo $d['kd_produk'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="produk_atk_hapus.php?id=<?php echo $d['kd_produk'];?>"><i class="icon-trash-alt"></i></a>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>					
					</div>					
				</div>	


			</div>

		</div>		



		<div class="footer text-muted">

		</div>

	</div>
</div>

<?php include 'footer.php'; ?>