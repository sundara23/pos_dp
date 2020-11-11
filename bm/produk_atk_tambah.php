<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">

		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
                <?php
                $query = mysqli_query($config, "SELECT max(kd_produk) as kodeTerbesar FROM produk_atk");
                $data = mysqli_fetch_array($query);
                $kodeProduk = $data['kodeTerbesar'];
                $urutan = (int) substr($kodeProduk, 3, 4);
                $urutan++;
                $huruf = "ATK";
                $kodeProduk = $huruf . sprintf("%04s", $urutan);
                ?>
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Tambah Data Produk</h4>
						<div class="heading-elements">
							<a href="produk_atk.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="produk_atk_add_act.php" method="post">
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
                                        <th width="20%">Kategori</th>
                                        <td>
                                            <select name="kategori" class="form-control" required="required">
                                                <option value="">-Pilih-</option>
                                                <?php
                                                $data = mysqli_query($config,"select * from kategori_atk");
                                                while($d=mysqli_fetch_array($data)){
                                                    ?>
                                                    <option value="<?php echo $d['kd_kategori_atk']?>"><?php echo $d['nama_kategori']?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Stok Produk</th>
                                        <td><input type="number" class="form-control" name="stok_produk" required="required"></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Harga Awal</th>
                                        <td><input type="number" class="form-control" name="harga_awal" required="required"></td>
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