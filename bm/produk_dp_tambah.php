<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">

		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
                <?php
                $query = mysqli_query($config, "SELECT max(produk_id) as kodeTerbesar FROM produk");
                $data = mysqli_fetch_array($query);
                $kodeProduk = $data['kodeTerbesar'];
                $urutan = (int) substr($kodeProduk, 3, 3);
                $urutan++;
                $huruf = "CTK";
                $kodeProduk = $huruf . sprintf("%03s", $urutan);
                ?>
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Tambah Data Produk</h4>
						<div class="heading-elements">
							<a href="produk_dp.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="produk_dp_add_act.php" method="post">
								<table class="table table-bordered">
                                    <tr>
                                        <th width="20%">Kode Produk</th>
                                        <td><input type="text" class="form-control" name="kd_produk" required="required" value="<?php echo $kodeProduk; ?>" readonly></td>
                                    </tr>
									<tr>
										<th width="20%">Nama Produk</th>
										<td><input type="text" class="form-control" name="nama" required="required"></td>
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