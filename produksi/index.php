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
						<h4 class="panel-title">Dashboard <b>Produksi</b></h4>						
					</div>
					<div class="panel-body">
												
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th>ID ORDER</th>		
										<th>Date</th>		
										<th>Kostumer</th>																					
										<th>Status</th>												
										<th width="18%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id order by trx_invoice desc");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['trx_invoice'] ?></td>
											<td><?php echo date('d M Y',strtotime($d['trx_date'])); ?></td>
											<td><?php echo $d['kostumer_nama'] ?></td>																			
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
													
													<?php												
												}else if($d['trx_status']=="1"){
													?>													
													<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="wo_edit.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-pencil"></i> Detail</a>
													<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="wo_proses.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-pencil"></i> Proses</a>
													<?php												
												}else if($d['trx_status']=="2"){
													?>
													################
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