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
						<h4 class="panel-title">Tambah Admin</h4>
						<div class="heading-elements">
							<a href="admin.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="admin_add_act.php" method="post">
								<table class="table table-bordered">
									<tr>
										<th width="20%">Username</th>
										<td><input type="text" class="form-control" name="username" required="required"></td>
									</tr>
									<tr>
										<th width="20%">Password</th>
										<td><input type="password" class="form-control" name="password" required="required"></td>
									</tr>
									<tr>
										<th width="20%">Nama</th>
										<td><input type="text" class="form-control" name="nama" required="required"></td>
									</tr>
									<tr>
										<th width="20%">Handphone</th>
										<td><input type="number" class="form-control" name="handphone" required="required"></td>
									</tr>
									<tr>
										<th>Alamat</th>
										<td><input type="text" class="form-control" name="alamat" required="required"></td>
									</tr>
									<tr>
										<th width="20%">Level</th>
										<td>
											<select name="level" class="form-control" required="required">
												<option value="">-Pilih</option>												
												<option value="bm">bm</option>												
												<option value="kasir">kasir</option>												
												<option value="produksi">produksi</option>												
												<option value="owner">owner</option>												
												<option value="setting">setting</option>												
											</select>
										</td>
									</tr>
									<tr>
										<th width="20%">Kode Toko</th>
										<td>
											<select name="kd_toko" class="form-control" required="required">
												<option value="">-Pilih</option>	
											<?php 
											$sql="select * from toko";
											$hasil=mysqli_query($config,$sql);
											while ($data = mysqli_fetch_array($hasil)) {
											   ?>
											    <option value="<?php echo $data['kd_toko'];?>"><?php echo $data['ket_toko'];?></option>
											  <?php 
												}
											  ?>																							
											</select>
										</td>
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