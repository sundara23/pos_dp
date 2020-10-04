<?php include 'header.php'; ?>
<!-- Main content -->
<style type="text/css">

.xxx tr th,
.xxx tr td{
	padding: 10px;
}

</style>
<div class="content-wrapper">

	<?php 
	if(isset($_GET['id'])){
		$id_invoice = $_GET['id'];
	}else{	
		header("location:index.php");
	}
	?>

	<!-- Content area -->
	<div class="content">
		<?php show_alert(); ?>
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">				
				
				<div class="panel">
					<div class="panel-body">																	
						<?php 
						$inv = mysqli_query($config,"select * from transaksi where trx_invoice='$id_invoice'");
						$in = mysqli_fetch_assoc($inv);
						?>
						<div class="row">		
							<div class="col-md-8">
								<h4>Detail Order</h4>
							</div>
                            <div class="col-md-4">
                                <h5>
                                    Status :
                                    <b>
                                        <?php
                                        if($in['trx_status']=="0"){
                                            echo "Belum Dibayar";
                                        }else if($in['trx_status']=="1" && $in['trx_ar']==0){
                                            echo "Lunas";
                                        }else if($in['trx_status']=="2"){
                                            echo "Cancel";
                                        }else if($in['trx_status']=="3"){
                                            echo "Selesai";
                                        }else{
                                            echo "Belum Lunas";
                                        }
                                        ?>
                                    </b>

                                </h5>
                                <h5>

                                    No. Invoice :
                                    <b>
                                        <?php echo $in['trx_invoice']; ?>
                                    </b>

                                </h5>
                                <br/>
                            </div>
						</div>
						<br/>
						<div class="table-responsive">

							<input type="hidden" name="id_invoice" value="<?php echo $id_invoice;?>" class="form-control id_invoice">
							<table class="table table-bordered table-hover table-striped">						
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th>PRODUK</th>																					
										<th>BAHAN</th>
										<th>KETERANGAN</th>																					
										<th>QTY</th>																																																												
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 									
									$data = mysqli_query($config,"select * from orderan,produk,bahan where orderan.order_produk_id=produk.produk_id and orderan.order_bahan_id=bahan.bahan_id  and order_invoice='$id_invoice'");
									while($d=mysqli_fetch_array($data)){
										$n = $no++;										
										?>
										<tr>
											<td><?php echo $n; ?></td>
											<td>
												<?php echo $d['produk_nama'] ?>
												<br/>
												<small class="text-muted"><?php echo date('d M Y',strtotime($d['order_datetime'])); ?></small>
											</td>
											<td><?php echo $d['bahan_nama'] ?></td>
											<td><?php echo $d['order_keterangan'] ?></td>																						
											<td>																										
												<?php echo $d['order_qty'] ?>
											</td>																																																																			
										</tr>
										<?php
									}
									?>																																				
								</tbody>
							</table>
							
						</div>	

						<br/>
						<br/>						

						<a href="index.php" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; KEMBALI</a>
					</div>

				</div>

				


			</div>				

		</div>

	</div>		


	<div class="footer text-muted">

	</div>

</div>

<?php include 'footer.php'; ?>