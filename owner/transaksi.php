	<?php include 'header.php'; ?>
	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			<!-- Dashboard content -->
			<div class="row">
				<div class="rw">
					<div class="col-md-12">
						<form action="transaksi_tgl.php" method="get">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Date start:</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="icon-calendar"></i>
											</div>
											<input name="from" class="form-control pull-right tanggal" value="2018-01-01" type="text">
										</div>

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Date finish:</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="icon-calendar"></i>
											</div>
											<input name="to" class="form-control pull-right tanggal" value="2019-01-31" type="text">
										</div>
										<!-- /.input group -->
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-goup">
										<br/>
										<input class="btn btn-primary form-control" value="Submit Date" type="submit">
									</div>
								</div>
							</div>								
						</form>
					</div>
					<br/>
					<br/>									
				</div>
			</div>
			<!-- /dashboard content -->

			<br/>
			<br/>
			<div class="panel">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">

							<div class="table-responsive">
								<table class="table table-bordered table-hover table-datatable">
									<thead>
										<tr>
											<th width="1%">No</th>									
											<th>ID ORDER</th>		
											<th>Date</th>		
											<th>Kostumer</th>												
											<th>Total</th>												
											<th>Status</th>																							
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1; 
										$total_pemasukan = 0;
										$data = mysqli_query($config,"select * from invoice,kostumer where invoice_kostumer=kostumer_id and invoice_status='3' order by invoice_id desc");		
										while($d=mysqli_fetch_array($data)){
											$total_pemasukan += $d['invoice_total'];
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['invoice_id'] ?></td>
												<td><?php echo date('d-m-Y',strtotime($d['invoice_tgl'])); ?></td>
												<td><?php echo $d['kostumer_nama'] ?></td>
												<td>Rp. <?php echo number_format($d['invoice_total']);?></td>																					
												<td>
													<?php 												
													if($d['invoice_status']=="0"){
														echo "Order";
													}else if($d['invoice_status']=="1"){
														echo "Payment";
													}else if($d['invoice_status']=="2"){
														echo "Print";
													}else if($d['invoice_status']=="3"){
														echo "Done";
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

			<br>
			<div class="panel">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">

							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>																			
											<td>Total Pemasukan</td>		
											<th>Rp. <?php echo number_format($total_pemasukan); ?></th>																																				
										</tr>
									</thead>									
								</table>
							</div>	
						</div>
					</div>

				</div>
			</div>











			<!-- Footer -->
			<div class="footer text-muted">

			</div>
			<!-- /footer -->

		</div>
		<!-- /content area -->










	</div>
	<!-- /main content -->

	<?php include 'footer.php'; ?>