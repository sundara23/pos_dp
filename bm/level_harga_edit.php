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
						<h4 class="panel-title">Edit Level Harga</h4>
						<div class="heading-elements">
							<a href="level_harga.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="level_harga_update.php" method="post">
								<?php
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from level_harga, produk_atk where level_harga.level_kd_produk=produk_atk.kd_produk and id_level_harga='$id'");
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">
										<tr>
											<th width="20%">Kode Produk</th>
											<td>
                                                <input type="hidden" name="id" value="<?php echo $d['id_level_harga']; ?>">
												<input type="text" class="form-control" name="kd_produk" required="required" value="<?php echo $d['level_kd_produk']; ?>" readonly>
											</td>
										</tr>
                                        <tr>
                                            <th width="20%">Nama Produk</th>
                                            <td>
                                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['nama_produk']; ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Nama Level</th>
                                            <td>
                                                <input type="text" class="form-control" name="nama_level" required="required" value="<?php echo $d['nama_level']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Harga Jual Level</th>
                                            <td>
                                                <input type="number" class="form-control" name="harga_level" required="required" value="<?php echo $d['harga_level']; ?>">
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
    <script type="text/javascript">
        $(document).ready(function() {

            $('#satuan').select2({
                placeholder: 'Pilih Satuan',
                allowClear: true
            });
        });
    </script>

	<?php include 'footer.php'; ?>