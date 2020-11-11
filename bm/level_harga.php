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
						<h4 class="panel-title">Level Harga</h4>
					</div>
					<div class="panel-body">
						<a href="level_harga_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH LEVEL HARGA</a>
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
										<th>Nama Level</th>
										<th>Harga Jual Level</th>
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from level_harga, produk_atk where level_harga.level_kd_produk=produk_atk.kd_produk");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['level_kd_produk'] ?></td>
											<td><?php echo $d['nama_produk'] ?></td>
											<td><?php echo $d['nama_level'] ?></td>
											<td>Rp. <?php echo number_format($d['harga_level']); ?></td>
											<td>
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="level_harga_edit.php?id=<?php echo $d['id_level_harga'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="level_harga_hapus.php?id=<?php echo $d['id_level_harga'];?>"><i class="icon-trash-alt"></i></a>
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