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
						<h4 class="panel-title">Tambah Bahan</h4>
						<div class="heading-elements">
							<a href="ma.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
                    <?php
                    $query = mysqli_query($config, "SELECT max(bahan_id) as kodeTerbesar FROM bahan");
                    $data = mysqli_fetch_array($query);
                    $kodeProduk = $data['kodeTerbesar'];
                    $urutan = (int) substr($kodeProduk, 3, 3);
                    $urutan++;
                    $huruf = "BHN";
                    $kodeProduk = $huruf . sprintf("%03s", $urutan);
                    ?>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="bahan_add_act.php" method="post">
								<table class="table table-bordered">
                                    <tr>
                                        <th width="20%">Kode Bahan</th>
                                        <td><input type="text" class="form-control" name="kd_bhn" value="<?php echo $kodeProduk; ?>" required="required" readonly></td>
                                    </tr>
									<tr>
										<th width="20%">Nama Bahan</th>
										<td><input type="text" class="form-control" name="nama" required="required"></td>
									</tr>
									<tr>
										<th width="20%">Kategori</th>
										<td>
											<select name="kategori" class="form-control" required="required">
                                                <option value="">-Pilih-</option>
                                                <?php
                                                    $data = mysqli_query($config,"select * from satuan_bahan");
                                                    while($d=mysqli_fetch_array($data)){
                                                ?>
												<option value="<?php echo $d['nama_satuan']?>"><?php echo $d['nama_satuan']?></option>
                                                <?php } ?>
											</select>
										</td>
									</tr>			
									<tr>
										<th width="20%">Harga Awal</th>
										<td><input type="number" class="form-control" name="hpp" required="required"></td>
									</tr>
                                    <tr>
                                        <th width="20%">Harga Jual</th>
                                        <td><input type="number" class="form-control" name="jual" required="required"></td>
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