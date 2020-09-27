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
				<form action="wo_update.php" method="post">
					<div class="panel">
						<div class="panel-body">																	
							<?php 
							$inv = mysqli_query($config,"select * from invoice where invoice_id='$id_invoice'");
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
											if($in['invoice_status']=="0"){
												echo "Order";
											}else if($in['invoice_status']=="1"){
												echo "Payment";
											}else if($in['invoice_status']=="2"){
												echo "Cancel";
											}else if($in['invoice_status']=="3"){
												echo "Done";
											}
											?>
										</b>

										| 

										ID Order / NO.WO :
										<b>
											<?php echo $in['invoice_id']; ?>
										</b> 

									</h5>
									<br/>
									<table class="xxx">
										<tr>
											<th>Update Status</th>
											<td>
												<select class="form-control" name="status">
													<option value="1">Payment</option>
													<option value="3">Done</option>
												</select>
											</td>
										</tr>
									</table>								
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
												<th>MESIN</th>																					
												<th>JENIS</th>																																
												<th>KETERANGAN</th>																					
												<th>QTY</th>																					
												<th>HARGA SATUAN</th>																					
												<th>SUB TOTAL</th>																																
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1; 									
											$data = mysqli_query($config,"select * from orderan,harga_jual,produk,bahan,mesin,jenis_finishing,jenis_potong,jenis_display where hj_produk=produk_id and hj_bahan=bahan_id and hj_mesin=mesin_id and hj_finishing=jenis_finishing_id and hj_potong=jenis_potong_id and hj_display=jenis_display_id and order_hj=hj_id and order_invoice='$id_invoice'");		
											while($d=mysqli_fetch_array($data)){
												$n = $no++;										
												?>
												<tr>
													<td><?php echo $n; ?></td>
													<td><?php echo $d['produk_nama'] ?></td>
													<td><?php echo $d['bahan_nama'] ?></td>
													<td><?php echo $d['mesin_nama'] ?></td>
													<td>
														Jenis Finishing : <?php echo $d['jenis_finishing_nama'] ?><br/>
														Jenis Potong : <?php echo $d['jenis_potong_nama'] ?><br/>
														Jenis Display : <?php echo $d['jenis_display_nama'] ?><br/>

													</td>																																																				
													<td><?php echo $d['order_keterangan'] ?></td>																						
													<td>																										
														<input type="hidden" value="<?php echo $d['order_id'] ?>" class="form-control x_id_order<?php echo $n; ?>">
														<input type="number" value="<?php echo $d['order_qty'] ?>" min="1" class="form-control x_qty<?php echo $n; ?>" style="width: 80px" disabled>
													</td>																						
													<td>													
														<input type="number" value="<?php echo $d['order_harga_satuan'] ?>" min="1" class="form-control x_harga_satuan<?php echo $n; ?>" style="width: 110px" disabled>
													</td>																						
													<td><?php echo $d['order_harga_sub_total'] ?></td>																																		
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
							
							</div>	

							<br/>
							<br/>

							<div class="row">							
								<div class="col-md-6">
									<h4>Kostumer</h4>
									<?php 
									$kos = mysqli_query($config,"select * from invoice,kostumer where invoice_id='$id_invoice' and invoice_kostumer=kostumer_id");
									$k=mysqli_fetch_assoc($kos);
									?>
									<table class="xxx">
										<tr>
											<th>Kostumer</th>
											<th>:</th>
											<td><?php echo $k['kostumer_nama']; ?></td>
										</tr>
										<tr>
											<th>Alamat</th>
											<th>:</th>
											<td><?php echo $k['kostumer_alamat']; ?></td>
										</tr>
										<tr>
											<th>Email</th>
											<th>:</th>
											<td><?php echo $k['kostumer_email']; ?></td>
										</tr>
										<tr>
											<th>No.Telp</th>
											<th>:</th>
											<td><?php echo $k['kostumer_telp']; ?></td>
										</tr>
									</table>
								</div>
								<div class="col-md-6">
									<table class="xxx table">
										<tr>
											<th width="40%">Total</th>
											<td width="60%"><input readonly="readonly" type="number" min="0" value="<?php echo $in['invoice_total']; ?>" name="" class="form-control total"></td>
											<td width="1%"></td>
										</tr>
										<tr>
											<th>Disc</th>
											<td><input type="number" min="0" max="100" name="disc" class="form-control disc" value="<?php echo $in['invoice_diskon']; ?>"></td>
											<td>%</td>
										</tr>
										<tr>
											<th>Grand Total</th>
                                            <?php
                                            $diskon = $in['invoice_diskon'];
                                            $total =  $in['invoice_total'];
                                            $totaldiskon = $total*$diskon/100;
                                            $grandtotal = $total - $totaldiskon;
                                            ?>
											<td><input type="number" readonly="readonly" min="0" value="<?php if($in['invoice_diskon']==0){echo $in['invoice_total'];}else{echo $grandtotal;} ?>" name="grand_total" class="form-control grand_total"></td>
											<td></td>
										</tr>
										<tr>
											<th>DP</th>
											<td><input type="number" min="0" name="dp" class="form-control dp" required="required" value="<?php echo $in['invoice_dp']; ?>"></td>
											<td></td>
										</tr>
										<tr>
											<th>Sisa Pembayaran</th>
											<td><input type="number" min="0" value="<?php if($in['invoice_total']==$in['invoice_dp'] ){echo "0";}else{echo $in['invoice_ar']; }; ?>" name="ar" class="form-control ar" readonly></td>
											<td></td>
										</tr>
                                        <tr>
                                            <th>Uang Kembalian</th>
                                            <td><input type="number" min="0" value="" class="form-control cb"></td>
                                            <td></td>
                                        </tr>
										<tr>
											<th>Payment Method</th>
											<td>
												<select class="form-control" name="payment" required="required">
													<option value="">- Pilih</option>
													<option <?php if($in['invoice_payment']=="cash"){echo "selected='selected'";} ?> value="cash">Cash</option>
													<option <?php if($in['invoice_payment']=="cheque"){echo "selected='selected'";} ?> value="cheque">Cheque</option>
												</select>
											</td>
										</tr>										
									</table>

									<br/>
									<br/>

									<input type="submit" value="UPDATE" class="btn btn-primary">
									&nbsp;
									&nbsp;
									&nbsp;
									<a href="index.php" class="btn btn-primary">Kembali</a>

								</div>
							</div>

							<br/>

						</div>
					</div>

				</form>


			</div>				

		</div>

	</div>		


	<div class="footer text-muted">

	</div>

</div>


<script type="text/javascript">
	$(document).ready(function(){		

		$("body").on("keyup", ".disc", function(){
			
			var total = $('.total').val();			
			var disc = $('.disc').val();	
			var grand_total = $('.grand_total').val();			
			var ar = $('.ar').val();

			var x = total*disc/100;		
			var xx = total-x;		
			
			$('.grand_total').val(xx);

			var aa = total-ar;					
			// $('.dp').val(aa);					
			$('.ar').val(aa);					
			
		});

		$("body").on("keyup", ".dp", function(){
			
			var dp = $('.dp').val();			
			var ar = $('.ar').val();			
			var cb = $('.cb').val();
			var grand_total = $('.grand_total').val();
			var x = grand_total-dp;
			if (x < 0){
                xr = 0
                $('.ar').val(xr);
            }else {
                $('.ar').val(x);
            }
			var xcb = dp - grand_total;
            if (xcb < 0){
                xcbr = 0
                $('.cb').val(xcbr);
            } else {
                $('.cb').val(xcb);
            }
		});


		//$('body').on("click",".btn-update-harga",function(){
		//
		//	var id_invoice = $(".id_invoice").val();
        //
		//	var n = <?php //echo $n; ?>//;
		//
		//	for(x=1;x<=n;x++){
		//
		//		var x_harga_satuan = $(".x_harga_satuan"+x).val();
		//		var x_qty = $(".x_qty"+x).val();
		//		var x_id_order = $(".x_id_order"+x).val();
		//
        //
		//		if(x_qty!="0"&&x_id_order!="0"&&x_id_order!="0"){
		//			var data = "id_invoice="+id_invoice+"&harga_satuan="+x_harga_satuan+"&qty="+x_qty+"&id_order="+x_id_order;
		//			$.ajax({
		//				data : data,
		//				url : 'wo_update_jumlah.php',
		//				method : "POST",
		//				success:function(html){
		//				// $(".kostumer-terpilih").val(html);
		//				// var url = "wo_tambah_ajax2.php?id="+html;
		//				// $(".xxx").load(url);
		//				// alert(html);
		//				// console.log(html);
		//			}
		//		});
		//		}else{
		//			alert("Isi data dengan benar.");
		//		}
		//	}
		//
		//	// 2x reload
		//	location.reload();
		//	location.reload();
		//
		//});


	});
</script>

<?php include 'footer.php'; ?>