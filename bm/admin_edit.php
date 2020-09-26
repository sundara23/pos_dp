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
						<h4 class="panel-title">Edit admin</h4>
						<div class="heading-elements">
							<a href="admin.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="admin_update.php" method="post">
								<?php
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from admin inner join toko on admin.kd_toko=toko.kd_toko where id='$id'");		
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">
										<tr>
											<th width="20%">Username</th>
											<td>
												<input type="hidden" name="id" value="<?php echo $d['id']; ?>">												
												<input type="text" class="form-control" name="username" required="required" value="<?php echo $d['username']; ?>">
											</td>
										</tr>
										<!-- <tr>
											<th width="20%">Password</th>
											<td><input type="text" class="form-control" name="password" required="required" value="<?php echo $d['password']; ?>"></td>
										</tr> -->
										<tr>
											<th width="20%">Nama</th>
											<td><input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['nama']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Handphone</th>
											<td><input type="number" class="form-control" name="handphone" required="required" value="<?php echo $d['handphone']; ?>"></td>
										</tr>
										<tr>
											<th>Alamat</th>
											<td><input type="text" class="form-control" name="alamat" required="required" value="<?php echo $d['alamat']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Level</th>
											<td>
												<select name="level" class="form-control" required="required">
													<option value="">-Pilih</option>												
													<option <?php if($d['level']=="bm"){echo "selected='selected'";} ?> value="bm">bm</option>												
													<option <?php if($d['level']=="kasir"){echo "selected='selected'";} ?> value="kasir">kasir</option>												
													<option <?php if($d['level']=="produksi"){echo "selected='selected'";} ?> value="produksi">produksi</option>												
													<option <?php if($d['level']=="owner"){echo "selected='selected'";} ?> value="owner">owner</option>												
													<option <?php if($d['level']=="setting"){echo "selected='selected'";} ?> value="setting">setting</option>												
												</select>
											</td>
										</tr>
										<tr>
											<th width="20%">Toko</th>
											<td>
												<select name="kd_toko" class="form-control" required="required">
													<option value="">-Pilih</option>												
													<option <?php if($d['kd_toko']=="faskal01"){echo "selected='selected'";} ?> value="faskal01">Faskal Pusat</option>
													<option <?php if($d['kd_toko']=="faskal02"){echo "selected='selected'";} ?> value="faskal02">Faskal Cabang</option>			
												</select>
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


		</div>
	</div>

	<?php include 'footer.php'; ?>