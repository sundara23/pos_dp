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
						<h4 class="panel-title">Edit Pesanan</h4>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="cs_order_edit_act.php" method="post">
								<?php
                                $id_invoice = $_GET['id_invoice'];
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from orderan,produk where orderan.order_produk_id=produk.produk_id and order_id='$id'");
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">
										<tr>
											<th width="20%">Nama Produk</th>
											<td>
												<input type="hidden" name="id" value="<?php echo $id; ?>">
												<input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
												<input type="text" class="form-control" required="required" value="<?php echo $d['produk_nama']; ?>" readonly>
											</td>
										</tr>
                                        <tr>
                                            <th width="20%">Keterangan</th>
                                            <td>
                                                <textarea name="ket_produk" class="form-control"><?php echo $d['order_keterangan']; ?></textarea>
                                            </td>
                                        </tr>
										<tr>
											<th></th>
											<td>
                                                <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
                                                <a href="cs_edit.php?id=<?php echo $id_invoice; ?>" class="btn btn-info btn-sm">Kembali</a>
                                            </td>
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