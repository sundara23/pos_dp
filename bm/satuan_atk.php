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
						<h4 class="panel-title">Data Satuan Produk</h4>
						<div class="heading-elements">
							<a href="satuan_atk_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH SATUAN PRODUK</a>
							<!-- <a href="#" class="btn btn-sm bg-green">EXCEL</a> -->
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Satuan</th>
										<th width="13%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from satuan_atk");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['nama_satuan'] ?></td>
											<td>																					
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="satuan_atk_edit.php?id=<?php echo $d['kd_satuan'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="satuan_atk_hapus.php?id=<?php echo $d['kd_satuan'];?>"><i class="icon-trash-alt"></i></a>
											</td>
										</tr>
										<?php } ?>
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