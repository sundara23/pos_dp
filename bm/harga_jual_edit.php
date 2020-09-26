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
						<h4 class="panel-title">Harga Jual</h4>
						<div class="heading-elements">
							<a href="harga_jual.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<form action="harga_jual_update.php" method="post">							

							<?php 
							$id = $_GET['id'];							
							$no = 1; 
							$data = mysqli_query($config,"select * from harga_jual,produk,bahan,mesin,jenis_finishing,jenis_potong,jenis_display where hj_produk=produk_id and hj_bahan=bahan_id and hj_mesin=mesin_id and hj_finishing=jenis_finishing_id and hj_potong=jenis_potong_id and hj_display=jenis_display_id and hj_id='$id'");		
							while($d=mysqli_fetch_array($data)){
								?>
								<input type="hidden" name="id" value="<?php echo $d['hj_id']; ?>">
								<?php if($id=1){ ?>
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Produk</th>
										<td><?php echo $d['produk_nama'] ?></td>
									</tr>
									<tr>
										<th width="20%">Mesin</th>
										<td><?php echo $d['mesin_nama'] ?></td>
									</tr>
									<tr>
										<th>Bahan</th>
										<td><?php echo $d['bahan_nama'] ?></td>
									</tr>
									<tr>
										<th>Sisi</th>
										<td><?php echo $d['hj_sisi']; ?> Sisi</td>
									</tr>
									<tr>
										<th>Laminating</th>
										<td><?php echo $d['jenis_finishing_nama'] ?></td>
									</tr>
									<tr>
										<th>Sisi Laminating</th>
										<td><?php echo $d['hj_sisi_finishing']; ?> Sisi</td>										
									</tr>
									<tr>
										<th>Harga Jual</th>
										<td>
											<input required="required" value="<?php echo $d['hj_harga']; ?>" name="hargajual" id="hargajual" class="form-control" min="0" type="number">
										</td>
									</tr>
									<tr>
										<th>Jumlah Minimum</th>
										<td>
											<input required="required" value="<?php echo $d['hj_min_qty']; ?>" name="minimum_qty" id="minimum_qty" class="form-control" value="1" min="0" type="number">
										</td>
									</tr>									
									<tr>
										<th></th>
										<td>						
											<input class="btn btn-primary btn-block" type="submit" value="Update Data">						
										</td>
									</tr>
								</table>
								<?php }else if($id=2){ ?>
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Produk</th>
										<td><?php echo $d['produk_nama'] ?></td>
									</tr>
									<tr>
										<th width="20%">Mesin</th>
										<td><?php echo $d['mesin_nama'] ?></td>
									</tr>
									<tr>
										<th>Bahan</th>
										<td><?php echo $d['bahan_nama'] ?></td>
									</tr>
									<tr>
										<th>Ukuran</th>
										<td><?php echo $d['hj_ukuran'] ?></td>
									</tr>
									<tr>
										<th>Sisi</th>
										<td><?php echo $d['hj_sisi']; ?> Sisi</td>
									</tr>
									<tr>
										<th>Harga Jual</th>
										<td>
											<input required="required" value="<?php echo $d['hj_harga']; ?>" name="hargajual" id="hargajual" class="form-control" min="0" type="number">
										</td>
									</tr>
									<tr>
										<th>Jumlah Minimum</th>
										<td>
											<input required="required" value="<?php echo $d['hj_min_qty']; ?>" name="minimum_qty" id="minimum_qty" class="form-control" value="1" min="0" type="number">
										</td>
									</tr>										
									<tr>
										<th></th>
										<td>						
											<input class="btn btn-primary btn-block" type="submit" value="Update Data">						
										</td>
									</tr>
								</table>
								<?php }else if($id=3){ ?>
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Kaki</th>
										<td><?php echo $d['jenis_display_nama']; ?></td>
									</tr>			
									<tr>
										<th>Bahan</th>
										<td><?php echo $d['bahan_nama'] ?></td>
									</tr>				
									<tr>
										<th width="20%">Mesin</th>
										<td><?php echo $d['mesin_nama'] ?></td>
									</tr>
									<tr>
										<th>Laminating</th>
										<td><?php echo $d['jenis_finishing_nama'] ?></td>
									</tr>
									<tr>
										<th>Harga Jual</th>
										<td>
											<input required="required" value="<?php echo $d['hj_harga']; ?>" name="hargajual" id="hargajual" class="form-control" min="0" type="number">
										</td>
									</tr>
									<tr>
										<th>Jumlah Minimum</th>
										<td>
											<input required="required" value="<?php echo $d['hj_min_qty']; ?>" name="minimum_qty" id="minimum_qty" class="form-control" value="1" min="0" type="number">
										</td>
									</tr>								
									<tr>
										<th></th>
										<td>						
											<input class="btn btn-primary btn-block" type="submit" value="Tambahkan Harga">						
										</td>
									</tr>
								</table>
								<?php }else if($id=4){ ?>
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Mesin</th>
										<td><?php echo $d['mesin_nama'] ?></td>
									</tr>
									<tr>
										<th>Bahan</th>
										<td><?php echo $d['bahan_nama'] ?></td>
									</tr>
									<tr>
										<th>Sisi</th>
										<td><?php echo $d['hj_sisi']; ?> Sisi</td>
									</tr>
									<tr>
										<th>Laminating</th>
										<td><?php echo $d['jenis_finishing_nama'] ?></td>
									</tr>
									<tr>
										<th>Sisi Laminating</th>
										<td><?php echo $d['hj_sisi_finishing']; ?> Sisi</td>										
									</tr>
									<tr>
										<th>Cutting</th>
										<td><?php echo $d['jenis_potong_nama']; ?> Sisi</td>										
									</tr>									
									<tr>
										<th>Harga Jual</th>
										<td>
											<input required="required" value="<?php echo $d['hj_harga']; ?>" name="hargajual" id="hargajual" class="form-control" min="0" type="number">
										</td>
									</tr>
									<tr>
										<th>Jumlah Minimum</th>
										<td>
											<input required="required" value="<?php echo $d['hj_min_qty']; ?>" name="minimum_qty" id="minimum_qty" class="form-control" value="1" min="0" type="number">
										</td>
									</tr>							
									<tr>
										<th></th>
										<td>						
											<input class="btn btn-primary btn-block" type="submit" value="Tambahkan Harga">						
										</td>
									</tr>
								</table>
								<?php }else if($id=5){ ?>
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Mesin</th>
										<td><?php echo $d['mesin_nama'] ?></td>
									</tr>
									<tr>
										<th>Bahan</th>
										<td><?php echo $d['bahan_nama'] ?></td>
									</tr>
									<tr>
										<th>Laminating</th>
										<td><?php echo $d['jenis_finishing_nama'] ?></td>
									</tr>
									<tr>
										<th>Cutting</th>
										<td><?php echo $d['jenis_potong_nama']; ?> Sisi</td>										
									</tr>	
									<tr>
										<th>Harga Jual</th>
										<td>
											<input required="required" value="<?php echo $d['hj_harga']; ?>" name="hargajual" id="hargajual" class="form-control" min="0" type="number">
										</td>
									</tr>
									<tr>
										<th>Jumlah Minimum</th>
										<td>
											<input required="required" value="<?php echo $d['hj_min_qty']; ?>" name="minimum_qty" id="minimum_qty" class="form-control" value="1" min="0" type="number">
										</td>
									</tr>									
									<tr>
										<th></th>
										<td>						
											<input class="btn btn-primary btn-block" type="submit" value="Tambahkan Harga">						
										</td>
									</tr>
								</table>								
								<?php } ?>
																
								<?php
							}
							?>
						

						</form>
					</div>					
				</div>	


			</div>

		</div>		

		<div class="footer text-muted">

		</div>

	</div>
</div>


<?php include 'footer.php'; ?>