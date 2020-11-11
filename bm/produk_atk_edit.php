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
							<a href="produk_atk.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="produk_atk_update.php" method="post">
								<?php
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from produk_atk where kd_produk='$id'");
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">
										<tr>
											<th width="20%">Kode Produk</th>
											<td>
												<input type="text" class="form-control" name="id" required="required" value="<?php echo $d['kd_produk']; ?>" readonly>
											</td>
										</tr>
                                        <tr>
                                            <th width="20%">Nama Produk</th>
                                            <td>
                                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['nama_produk']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Kategori</th>
                                            <td>
                                                <select name="kategori" class="form-control" required="required">
                                                    <?php
                                                    $data = mysqli_query($config,"select * from kategori_atk");
                                                    while($k=mysqli_fetch_array($data)){
                                                        if ($k['kd_kategori_atk']==$d['kd_kategori_atk']) {
                                                            $select="selected";
                                                        }else{
                                                            $select="";
                                                        }
                                                        echo "<option $select value=".$k['kd_kategori_atk'].">".$k['nama_kategori']."</option>";
                                                    }
                                                        ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Harga Awal</th>
                                            <td>
                                                <input type="text" class="form-control" name="harga_awal" required="required" value="<?php echo $d['produk_harga']; ?>">
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