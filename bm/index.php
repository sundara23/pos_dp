	<?php include 'header.php'; ?>
	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			
			<!-- Dashboard content -->
			<div class="row">
				<div class="col-lg-12">
					
					<!-- Quick stats boxes -->
					<div class="row">
						<div class="col-lg-3">

							<!-- Members online -->
							<div class="panel bg-teal-400">
								<div class="panel-body">
									<?php $admin=mysqli_query($config,"select * from admin"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($admin) . " Pengguna"; ?></h3>
									Jumlah Pengguna Sistem
									
								</div>

								<div class="container-fluid">
									<div id="members-online"></div>
								</div>
							</div>
							<!-- /members online -->

						</div>

						<div class="col-lg-3">

							<!-- Current server load -->
							<div class="panel bg-pink-400">
								<div class="panel-body">
									<?php $kostumer=mysqli_query($config,"select * from kostumer"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($kostumer) . " Pelanggan"; ?></h3>
									Jumlah Pelanggan
									
								</div>

								<div id="server-load"></div>
							</div>
							<!-- /current server load -->

						</div>

						<div class="col-lg-3">

							<!-- Today's revenue -->
							<div class="panel bg-blue-400">
								<div class="panel-body">									
									<?php $orderan=mysqli_query($config,"select * from orderan"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($orderan) . " Orderan"; ?></h3>
									Jumlah orderan								
								</div>

								<div id="today-revenue"></div>
							</div>
							<!-- /today's revenue -->
						</div>

						<div class="col-lg-3">

							<!-- Today's revenue -->
							<div class="panel bg-orange-400">
								<div class="panel-body">
									<?php $invoice=mysqli_query($config,"select * from invoice"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($invoice) . " W.O"; ?></h3>
									Jumlah W.O								
								</div>

								<div id="today-revenue"></div>
							</div>
							<!-- /today's revenue -->
						</div>				

					</div>
					<!-- /quick stats boxes -->			
					<div class="row">
						<div class="col-lg-3">

							<!-- Members online -->
							<div class="panel bg-slate-400">
								<div class="panel-body">
                                    <a href="#"><span class="alpaca-float-right" style="font-size: 35px; color: #FFFFFF;"><i class="fas fa-sign-out-alt"></i></span></a>
									<?php $admin=mysqli_query($config,"select * from invoice where invoice_status='0'"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($admin) . " W.O Order"; ?></h3>
									W.O Berstatus Order
									
								</div>

								<div class="container-fluid">
									<div id="members-online"></div>
								</div>
							</div>
							<!-- /members online -->

						</div>

						<div class="col-lg-3">

							<!-- Current server load -->
							<div class="panel bg-brown-400">
								<div class="panel-body">
                                    <a href="#"><span class="alpaca-float-right" style="font-size: 35px; color: #FFFFFF;"><i class="fas fa-sign-out-alt"></i></span></a>
									<?php $kostumer=mysqli_query($config,"select * from invoice where invoice_status='1'"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($kostumer) . " W.O Payment"; ?></h3>
									W.O Berstatus Payment
									
								</div>

								<div id="server-load"></div>
							</div>
							<!-- /current server load -->

						</div>

						<div class="col-lg-3">

							<!-- Today's revenue -->
							<div class="panel bg-purple-400">
								<div class="panel-body">
                                    <a href="#"><span class="alpaca-float-right" style="font-size: 35px; color: #FFFFFF;"><i class="fas fa-sign-out-alt"></i></span></a>
									<?php $orderan=mysqli_query($config,"select * from invoice where invoice_status='2'"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($orderan) . " W.O Print"; ?></h3>
                                    W.O Berstatus Print
								</div>

								<div id="today-revenue"></div>
							</div>
							<!-- /today's revenue -->
						</div>

						<div class="col-lg-3">

							<!-- Today's revenue -->
							<div class="panel bg-success-400">
								<div class="panel-body">									
									<?php $invoice=mysqli_query($config,"select * from invoice where invoice_status='3'"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($invoice) . " W.O Done"; ?></h3>
									W.0 Berstatus Done						
								</div>

								<div id="today-revenue"></div>
							</div>
							<!-- /today's revenue -->
						</div>				

					</div>
				</div>
                <!--  HPP-->
				<div class="row">
<!--					<div class="col-md-6">-->
<!--						<form action="index_tgl.php" method="get">-->
<!--							<div class="row">-->
<!--								<div class="col-md-6">-->
<!--									<div class="form-group">-->
<!--										<label>Date start:</label>-->
<!--										<div class="input-group date">-->
<!--											<div class="input-group-addon">-->
<!--												<i class="icon-calendar"></i>-->
<!--											</div>-->
<!--											<input name="from" class="form-control pull-right tanggal" value="" type="text">-->
<!--										</div>-->
<!--										<!-- /.input group -->-->
<!--									</div></div>-->
<!--									<div class="col-md-6">-->
<!--										<div class="form-group">-->
<!--											<label>Date finish:</label>-->
<!--											<div class="input-group date">-->
<!--												<div class="input-group-addon">-->
<!--													<i class="icon-calendar"></i>-->
<!--												</div>-->
<!--												<input name="to" class="form-control pull-right tanggal" value="" type="text">-->
<!--											</div>-->
<!--											<!-- /.input group -->-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="row">-->
<!--									<div class="col-md-offset-8 col-md-4">-->
<!--										<div class="form-group">-->
<!--											<input class="btn btn-primary form-control" value="Submit Date" type="submit">-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</form>-->
<!--						</div>-->
<!--                    <div class="col-md-6">-->
<!--							<table class="table table-bordered table-condensed table-hovered" style="background: white;" width="100%">-->
<!--								<thead>-->
<!--									<tr>-->
<!--										<th colspan="3" class="text-center">Data Keuangan</th>-->
<!--									</tr>-->
<!--									<tr class="info">-->
<!--										<th>HPP (Rp)</th>-->
<!--										<th>PROFIT (Rp)</th>-->
<!--										<th>TOTAL OMSET (Rp)</th>-->
<!--									</tr>-->
<!--								</thead>-->
<!--								<tbody>-->
<!--									<tr>-->
<!--										<td align="right">-->
<!--											<h3>-->
<!--												<b>-->
<!--													--><?php //
//													$jenis_display = mysqli_query($config,"select sum(jenis_display_hpp) as hpp from jenis_display");
//													$jd = mysqli_fetch_assoc($jenis_display);
//													?><!--	-->
<!--													--><?php //
//													$jenis_finishing = mysqli_query($config,"select sum(jenis_finishing_hpp) as hpp from jenis_finishing");
//													$jf = mysqli_fetch_assoc($jenis_finishing);
//													?><!--	-->
<!--													--><?php //
//													$jenis_potong = mysqli_query($config,"select sum(jenis_potong_hpp) as hpp from jenis_potong");
//													$jp = mysqli_fetch_assoc($jenis_potong);
//													?><!--	-->
<!--													--><?php //
//													$bahan = mysqli_query($config,"select sum(bahan_hpp) as hpp from bahan");
//													$b = mysqli_fetch_assoc($bahan);
//													?><!--	-->
<!--													--><?php //
//													$mesin = mysqli_query($config,"select sum(mesin_hpp) as hpp from mesin");
//													$m = mysqli_fetch_assoc($mesin);
//													?><!--	-->
<!--													--><?php //
//													$total_hpp = $jd['hpp']+$jf['hpp']+$jp['hpp']+$b['hpp']+$m['hpp'];
//													echo number_format($total_hpp);
//													?>
<!--												</b>		-->
<!--											</h3>-->
<!--										</td>-->
<!--										<td align="right">-->
<!--											<h3>-->
<!--												<b>-->
<!--													--><?php //
//													$jumlah = mysqli_query($config,"select sum(hj_harga) as total from harga_jual");
//													$j = mysqli_fetch_assoc($jumlah);
//													if($j['total']>0){
//														$b = $j['total'];
//
//													}else{
//														$b=0;
//														echo $b;
//													}
//													?><!--	-->
<!--													--><?php //echo number_format($b-$total_hpp); ?>
<!--												</b>		-->
<!--											</h3>-->
<!--										</td>-->
<!--										<td align="right">-->
<!--											<h3>-->
<!--												<b>-->
<!--													--><?php //echo number_format($b); ?>
<!--												</b>												-->
<!--											</h3>-->
<!--										</td>-->
<!---->
<!--									</tr>-->
<!--								</tbody>-->
<!--							</table>-->
<!--							<br>-->
<!--						</div>-->
                </div>


					<div class="col-lg-12">					
						<!-- Daily sales -->
						<div class="panel panel-flat">
							<div class="panel-heading">	
								<h5><i class="icon-chart"></i> Persentasi Omset per Mesin</h5>						
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div id="chart-per-mesin"></div>
									</div>
									<div class="col-md-6">
										<div class="table-responsive">							
											<table class="table table-bordered table-hover table-striped">
												<thead>
													<tr>				
														<th>Mesin</th>		
														<th>Tipe</th>		
														<th>Jumlah</th>	
														<th>Pendapatan</th>	
													</tr>
												</thead>
												<tbody>
													<?php											
													$data = mysqli_query($config,"select * from mesin order by mesin_id desc");		
													while($d=mysqli_fetch_array($data)){
														?>
														<tr>																										
															<td><?php echo $d['mesin_nama'] ?></td>
															<td><?php echo $d['mesin_tipe'] ?></td>			
															<td>
																<?php  
																$id_mesin = $d['mesin_id'];
																$jumlah = mysqli_query($config,"select * from orderan,harga_jual where order_hj=hj_id and hj_mesin='$id_mesin'");
																$j = mysqli_num_rows($jumlah);
																echo $j;
																?>																									
															</td>
															<td>
																<?php  
																$xxx = 0;
																$id_mesin = $d['mesin_id'];
																$jumlah = mysqli_query($config,"select sum(order_harga_sub_total) as total from orderan,harga_jual where order_hj=hj_id and hj_mesin='$id_mesin'");
																$j = mysqli_fetch_assoc($jumlah);
																if($j['total']>0){
																	$xxx+=$j['total'];
																	echo number_format($j['total']);															
																}else{
																	echo "0";
																}
																?>	
															</td>
														</tr>
														<?php
													}
													?>
													<tr>																										
														<td colspan="3">TOTAL</td>
														<td><b><?php echo number_format($xxx); ?></b></td>																
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<br/>
								

								<div class="row">																	
									<div class="col-md-12">
										<h5>Grafik Penjualan (day-to-day)</h5>
										<div id="chart-omset-per-mesin"></div>
									</div>
								</div>
								<br/>


							</div>


						</div>
						<!-- /daily sales -->


					</div>


					<div class="col-md-6">
						<div class="panel">
							<div class="panel-heading">
								<h5><i class="icon-chart"></i> Chart Bahan Meter</h5>
							</div>
							<div class="panel-body">
								<div id="chart-bahan-meter"></div>
							</div>
							<div class="panel-footer">
								<table class="table table-bordered table-condensed table-hovered" width="100%">
									<thead>
										<tr>
											<th>Bahan</th>
											<th>Jumlah</th>
											<th>Pendapatan</th>
										</tr>
									</thead>
									<tbody>
										<?php	
										$xxxx = 0;										
										$data = mysqli_query($config,"select * from bahan where bahan_kategori='meter'");		
										while($d=mysqli_fetch_array($data)){
											?>
											<tr>																										
												<td><?php echo $d['bahan_nama'] ?></td>														
												<td>
													<?php  
													$id_bahan = $d['bahan_id'];
													$jumlah = mysqli_query($config,"select * from orderan,harga_jual where order_hj=hj_id and hj_bahan='$id_bahan'");
													$j = mysqli_num_rows($jumlah);
													echo $j;
													?>																									
												</td>
												<td>
													<?php  
													
													$id_bahan = $d['bahan_id'];
													$jumlah = mysqli_query($config,"select sum(order_harga_sub_total) as total from orderan,harga_jual where order_hj=hj_id and hj_bahan='$id_bahan'");
													$j = mysqli_fetch_assoc($jumlah);
													if($j['total']>0){
														$xxxx+=$j['total'];
														echo number_format($j['total']);															
													}else{
														echo "0";
													}
													?>	
												</td>
											</tr>
											<?php
										}
										?>
									</tbody>
									<tfoot>
										<tr style="background: lightgrey; font-weight: bold;">
											<td colspan="2"></td>
											<td align="right"><?php echo number_format($xxxx); ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel">
							<div class="panel-heading">
								<h5><i class="icon-chart"></i> Chart Bahan Lembar</h5>
							</div>
							<div class="panel-body">
								<div id="chart-bahan-lembar"></div>
							</div>
							<div class="panel-footer">
								<table class="table table-bordered table-condensed table-hovered" width="100%">
									<thead>
										<tr>
											<th>Bahan</th>
											<th>Jumlah</th>
											<th>Pendapatan</th>
										</tr>
									</thead>
									<tbody>
										<?php	
										$xxxx = 0;										
										$data = mysqli_query($config,"select * from bahan where bahan_kategori='lembar'");		
										while($d=mysqli_fetch_array($data)){
											?>
											<tr>																										
												<td><?php echo $d['bahan_nama'] ?></td>														
												<td>
													<?php  
													$id_bahan = $d['bahan_id'];
													$jumlah = mysqli_query($config,"select * from orderan,harga_jual where order_hj=hj_id and hj_bahan='$id_bahan'");
													$j = mysqli_num_rows($jumlah);
													echo $j;
													?>																									
												</td>
												<td>
													<?php  
													
													$id_bahan = $d['bahan_id'];
													$jumlah = mysqli_query($config,"select sum(order_harga_sub_total) as total from orderan,harga_jual where order_hj=hj_id and hj_bahan='$id_bahan'");
													$j = mysqli_fetch_assoc($jumlah);
													if($j['total']>0){
														$xxxx+=$j['total'];
														echo number_format($j['total']);															
													}else{
														echo "0";
													}
													?>	
												</td>
											</tr>
											<?php
										}
										?>
									</tbody>
									<tfoot>
										<tr style="background: lightgrey; font-weight: bold;">
											<td colspan="2"></td>
											<td align="right"><?php echo number_format($xxxx); ?></td>
										</tr>
									</tfoot>
								</table>
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


		<script type="text/javascript">
			Highcharts.chart('chart-per-mesin', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: ''
				},
				tooltip: {
					pointFormat: '{series.name} <br/> <b>{point.percentage:.0f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b> <br/> {point.percentage:.0f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					name: 'Mesin',
					colorByPoint: true,
					data: 
					[


					<?php											
					$data = mysqli_query($config,"select * from mesin order by mesin_id desc");		
					while($d=mysqli_fetch_array($data)){
						?>


						<?php
						$nama_mesin = $d['mesin_nama'];
						$id_mesin = $d['mesin_id'];
						$jumlah_mesin = mysqli_query($config,"select * from mesin");
						$jj_mesin = mysqli_num_rows($jumlah_mesin);
						$jumlah = mysqli_query($config,"select * from orderan,harga_jual where order_hj=hj_id and hj_mesin='$id_mesin'");
						$j = mysqli_num_rows($jumlah);								
						?>																									
						{
							name: '<?php echo $nama_mesin; ?>',
							y: <?php echo $jj_mesin*$j/100; ?>
						},
						<?php
					}
					?>



					]
				}]
			});




			Highcharts.chart('chart-omset-per-mesin', {
				chart: {
					type: 'line'
				},
				title: {
					text: ''
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					type: 'category',
					labels: {
						rotation: -45,
						style: {
							fontSize: '11px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				},
				yAxis: {
					min: 0,
					title: {
						text: ''
					}
				},
				legend: {
					enabled: false
				},
				tooltip: {
					pointFormat: '<b>{point.y:.0f}</b>'
				},
				series: [{
					name: 'Population',
					data: 
					[
					<?php	
					$xxxx = 0;										
					$data = mysqli_query($config,"select * from invoice");		
					while($d=mysqli_fetch_array($data)){
						?>
						
						<?php  
						$tgl = $d['invoice_tgl'];
						$jumlah = mysqli_query($config,"select * from invoice where invoice_tgl='$tgl' order by date(invoice_tgl) desc");
						$j = mysqli_num_rows($jumlah);						
						?>																															
						['<?php echo $d['invoice_tgl'] ?>', <?php echo $j; ?>],
						<?php
					}
					?>
					
					]

					,
					dataLabels: {
						enabled: true,
						rotation: -90,
						color: '#FFFFFF',
						align: 'right',
						format: '{point.y:.0f}',
						y: 10,
						style: {
							fontSize: '13px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				}]

				});




			Highcharts.chart('chart-bahan-lembar', {
				chart: {
					type: 'column'
				},
				title: {
					text: ''
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					type: 'category',
					labels: {
						rotation: -45,
						style: {
							fontSize: '13px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				},
				yAxis: {
					min: 0,
					title: {
						text: ''
					}
				},
				legend: {
					enabled: false
				},
				tooltip: {
					pointFormat: '<b>{point.y:.0f}</b>'
				},
				series: [{
					name: 'Population',
					data: 
					[
					<?php	
					$xxxx = 0;										
					$data = mysqli_query($config,"select * from bahan where bahan_kategori='lembar'");		
					while($d=mysqli_fetch_array($data)){
						?>
						
						<?php  
						$id_bahan = $d['bahan_id'];
						$jumlah = mysqli_query($config,"select * from orderan,harga_jual where order_hj=hj_id and hj_bahan='$id_bahan'");
						$j = mysqli_num_rows($jumlah);						
						?>																															
						['<?php echo $d['bahan_nama'] ?>', <?php echo $j; ?>],
						<?php
					}
					?>
					
					]

					,
					dataLabels: {
						enabled: true,
						rotation: -90,
						color: '#FFFFFF',
						align: 'right',
						format: '{point.y:.0f}',
						y: 10,
						style: {
							fontSize: '13px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				}]
			});

			Highcharts.chart('chart-bahan-meter', {
				chart: {
					type: 'column'
				},
				title: {
					text: ''
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					type: 'category',
					labels: {
						rotation: -45,
						style: {
							fontSize: '13px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				},
				yAxis: {
					min: 0,
					title: {
						text: ''
					}
				},
				legend: {
					enabled: false
				},
				tooltip: {
					pointFormat: '<b>{point.y:.0f}</b>'
				},
				series: [{
					name: 'Population',
					data: 
					[
					<?php	
					$xxxx = 0;										
					$data = mysqli_query($config,"select * from bahan where bahan_kategori='meter'");		
					while($d=mysqli_fetch_array($data)){
						?>
						
						<?php  
						$id_bahan = $d['bahan_id'];
						$jumlah = mysqli_query($config,"select * from orderan,harga_jual where order_hj=hj_id and hj_bahan='$id_bahan'");
						$j = mysqli_num_rows($jumlah);						
						?>																															
						['<?php echo $d['bahan_nama'] ?>', <?php echo $j; ?>],
						<?php
					}
					?>
					
					]

					,
					dataLabels: {
						enabled: true,
						rotation: -90,
						color: '#FFFFFF',
						align: 'right',
						format: '{point.y:.0f}',
						y: 10,
						style: {
							fontSize: '13px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				}]
			});


					//  Chart Day to Day


				</script>				
				<?php include 'footer.php'; ?>