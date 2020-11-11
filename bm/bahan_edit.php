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
						<h4 class="panel-title">Edit Bahan</h4>
						<div class="heading-elements">
							<a href="ma.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="bahan_update.php" method="post">
								<?php
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from bahan where bahan_id='$id'");		
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">
                                        <tr>
                                            <th width="20%">Kode Bahan</th>
                                            <td>
                                                <input type="text" class="form-control" name="id" required="required" value="<?php echo $d['bahan_id']; ?>" readonly>
                                            </td>
                                        </tr>
										<tr>
											<th width="20%">Nama Bahan</th>
											<td>
												<input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['bahan_nama']; ?>">
											</td>
										</tr>
										<tr>
											<th width="20%">Satuan</th>
											<td>
												<select name="kategori" class="form-control" required="required">
													<option value="">-Pilih-</option>
													<option <?php if($d['bahan_kategori']=="Meter"){echo "selected='selected'";} ?> value="Meter">meter</option>
													<option <?php if($d['bahan_kategori']=="Lembar"){echo "selected='selected'";} ?> value="Lembar">lembar</option>
												</select>
											</td>
										</tr>			
										<tr>
											<th width="20%">Harga Awal</th>
											<td><input type="number" class="form-control" name="hpp" required="required" value="<?php echo $d['bahan_hpp']; ?>"></td>
										</tr>
                                        <tr>
                                            <th width="20%">Harga Jual</th>
                                            <td><input type="number" class="form-control" name="jual" required="required" value="<?php echo $d['bahan_jual']; ?>"></td>
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