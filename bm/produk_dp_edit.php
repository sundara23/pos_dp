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
						<h4 class="panel-title">Edit Data Produk</h4>
						<div class="heading-elements">
							<a href="produk_dp.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="produk_dp_update.php" method="post">
								<?php
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from produk where produk_id='$id'");
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">
										<tr>
											<th width="20%">Nama Produk</th>
											<td>
												<input type="hidden" class="form-control" name="id" required="required" value="<?php echo $d['produk_id']; ?>">
												<input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['produk_nama']; ?>">
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