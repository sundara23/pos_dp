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
						<h4 class="panel-title">Setting / Design</h4>						
					</div>
					<div class="panel-body">
						<a href="wo_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> Add W.O</a>						
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<!-- <th>ID ORDER</th>	 -->	
										<th>Date</th>		
										<th>Kostumer</th>		
										<th>Total Order</th>		
										<th>Status</th>												
										<th width="22%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$id_admin = $_SESSION['id'];
									$no = 1; 
									$data = mysqli_query($config,"select * from invoice,kostumer where invoice_kostumer=kostumer_id and id_admin='$id_admin' order by invoice_id desc");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr 
										<?php 

										if($d['invoice_status']=="0"){
											echo "class=''";
										}else if($d['invoice_status']=="1"){
											echo "class='alert alert-warning'";
										}else if($d['invoice_status']=="2"){
											echo "class='alert alert-danger'";
										}else if($d['invoice_status']=="3"){
											echo "class='alert alert-success'";
										}
										?>
										 >
											<td><?php echo $no++; ?></td>
											<!-- <td><?php echo $d['invoice_id'] ?></td> -->
											<td><?php echo date('d-m-Y',strtotime($d['invoice_tgl'])); ?></td>
											<td><?php echo $d['kostumer_nama'] ?></td>
											<td>
												<?php 
												$id = $d['invoice_id'];
												$i = mysqli_query($config,"select * from orderan where order_invoice='$id'");
												echo mysqli_num_rows($i);
												?>

											</td>
											<td>
												<?php 												
												if($d['invoice_status']=="0"){
													echo "Order";
												}else if($d['invoice_status']=="1"){
													echo "Payment";
												}else if($d['invoice_status']=="2"){
													echo "Cancel";
												}else if($d['invoice_status']=="3"){
													echo "Done";
												}
												?>
											</td>																										
											<td>	
												<?php 												
												if($d['invoice_status']=="0"){													
													?>
													<!-- <a class="btn border-green text-green btn-flat btn-icon btn-xs" href="wo_detail.php?id=<?php echo $d['invoice_id'];?>"><i class="icon-list3"></i> View</a> -->
													<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="wo_edit.php?id=<?php echo $d['invoice_id'];?>"><i class="icon-wrench3"></i> Edit</a>
													<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="wo_cancel.php?id=<?php echo $d['invoice_id'];?>"><i class="icon-trash-alt"></i> Cancel</a>
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