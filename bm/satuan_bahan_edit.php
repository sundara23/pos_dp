<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">

		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Edit jenis display</h4>
						<div class="heading-elements">
							<a href="satuan_bahan.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="satuan_bahan_update.php" method="post">
								<?php
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from satuan_bahan where kd_satuan='$id'");
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">
										<tr>
											<th width="20%">Nama Satuan Bahan</th>
											<td>
												<input type="hidden" class="form-control" name="id" required="required" value="<?php echo $d['kd_satuan']; ?>">
												<input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['nama_satuan']; ?>">
											</td>
										</tr>
										<tr>
											<th></th>
											<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
										</tr>		
									</table>
									<?php } ?>
								</form>
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