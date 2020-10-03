<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">
		<?php show_alert(); ?>
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Data Transaksi</h4>
					</div>
					<div class="panel-body">

						<div class="table-responsive">
							<table class="table table-bordered table-hover table-datatable">
								<thead>
									<tr>
										<th>No</th>
										<th>Date</th>		
										<th>Kostumer</th>												
										<th>Total</th>		
										<th>Sisa Pembayaran</th>
										<th>Status</th>												
										<th width="18%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$kdtoko = $_SESSION['kd_toko'];
									$data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='$kdtoko' order by id desc");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo date('d M Y',strtotime($d['trx_date'])); ?></td>
											<td><?php echo $d['kostumer_nama'] ?></td>
											<td>
												Rp. <?php echo number_format($d['trx_total_pembayaran']);?>
												<br/>
												<small class="text-muted">Diskon : <?php echo $d['trx_diskon']; ?> %</small>
                                                <br>
												<small class="text-muted">DP : Rp. <?php echo number_format($d['trx_dp']); ?></small>
                                                <br>
												<small class="text-muted">
                                                    <?php if($d['trx_ar']==0 && $d['trx_status']==0){
                                                        echo "Belum Dibayar";
                                                    }else if($d['trx_ar']==0 && $d['trx_status']==1) {
                                                        echo "Lunas";
                                                    }else{
                                                        echo "Piutang : Rp. ".number_format($d['trx_ar']);
                                                    } ?>
                                                </small>
											</td>
											<td>Rp. <?php echo number_format($d['trx_ar']);?></td>
											<td>
												<?php 												
												if($d['trx_status']=="0"){
													echo "Order";
												}else if($d['trx_status']=="1"){
													echo "Payment";
												}else if($d['trx_status']=="2"){
													echo "Print";
												}else if($d['trx_status']=="3"){
													echo "Done";
												}
												?>
											</td>																										
											<td>	
												<?php 												
												if($d['trx_status']=="0"){
													?>													
													<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="wo_edit.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-pencil"></i> Update</a>
													<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="wo_cancel.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i> Cancel</a>
													<?php												
												}else if($d['trx_status']=="1"){
													?>													
													<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="wo_edit.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-pencil"></i> Update</a>
													<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="wo_cancel.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i> Cancel</a>
													<?php												
												}else if($d['trx_status']=="2"){
													?>
													<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="wo_edit.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-pencil"></i> Update</a>
													<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="wo_cancel.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i> Cancel</a>
													<?php												
												}else if($d['trx_status']=="3"){
													?>
													<a class="btn border-green text-green btn-flat btn-icon btn-xs btn-block" href="wo_detail.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-list3"></i> View Detail</a>
													<?php												
												}
												?>																																
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
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