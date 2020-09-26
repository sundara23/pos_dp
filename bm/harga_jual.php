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
						<h4 class="panel-title">Harga Jual</h4>
						<div class="heading-elements">
							<a href="harga_jual_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH HARGA BARU</a>
							<!-- <a href="#" class="btn btn-sm bg-green">EXCEL</a> -->
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th>Produk</th>		
										<th>Bahan</th>		
										<th>Mesin</th>		
										<th>Finishing</th>		
										<th>Potong</th>		
										<th>Display</th>		
										<th>Harga Jual</th>		
										<th>Min.Qty</th>		
										<th width="13%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from harga_jual,produk,bahan,mesin,jenis_finishing,jenis_potong,jenis_display where hj_produk=produk_id and hj_bahan=bahan_id and hj_mesin=mesin_id and hj_finishing=jenis_finishing_id and hj_potong=jenis_potong_id and hj_display=jenis_display_id");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['produk_nama'] ?></td>
											<td><?php echo $d['bahan_nama'] ?></td>					
											<td><?php echo $d['mesin_nama'] ?></td>					
											<td><?php echo $d['jenis_finishing_nama'] ?></td>					
											<td><?php echo $d['jenis_potong_nama'] ?></td>						
											<td><?php echo $d['jenis_display_nama'] ?></td>						
											<td>Rp.<?php echo number_format($d['hj_harga']); ?></td>																						
											<td><?php echo $d['hj_min_qty'] ?></td>																						
											<td>																					
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="harga_jual_edit.php?id=<?php echo $d['hj_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="harga_jual_hapus.php?id=<?php echo $d['hj_id'];?>"><i class="icon-trash-alt"></i></a>
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