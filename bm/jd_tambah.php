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
						<h4 class="panel-title">Tambah Mesin</h4>
						<div class="heading-elements">
							<a href="ma.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="mesin_add_act.php" method="post">
								<table class="table table-bordered">
									<tr>
										<th width="20%">Nama Mesin</th>
										<td><input type="text" class="form-control" name="nama" required="required"></td>
									</tr>
									<tr>
										<th width="20%">Kategori</th>
										<td>
											<select name="kategori" class="form-control" required="required">
												<option value="">-Pilih</option>												
												<option value="meter">meter</option>												
												<option value="lembar">lembar</option>																																		
											</select>
										</td>
									</tr>		
									<tr>
										<th width="20%">Tipe</th>
										<td><input type="text" class="form-control" name="tipe" required="required"></td>
									</tr>										
									<tr>
										<th width="20%">HPP</th>
										<td><input type="number" class="form-control" name="hpp" required="required"></td>
									</tr>																				
									<tr>
										<th></th>
										<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
									</tr>		
								</table>
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