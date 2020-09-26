<?php include 'header3.php'; ?>
<!-- Main content -->
<style type="text/css">

.xxx tr th,
.xxx tr td{
	padding: 10px;
	font-size: 10pt;
}
</style>

<?php 
if(isset($_GET['id'])){
	$id_invoice = $_GET['id'];
}else{	
	header("location:index.php");
}
?>


<!-- Content area -->

<div style="width: 90%;margin: 10px auto" class="xxx">
	<div class="row">
		<div class="col-md-4">
			<h2>Digital Printing</h2>
			<?php 
			$kos = mysqli_query($config,"select * from invoice,kostumer where invoice_id='$id_invoice' and invoice_kostumer=kostumer_id");
			$k=mysqli_fetch_assoc($kos);
			?>
			<table class="table">
				<tr>
					<th>No. WO</th>
					<th>:</th>
					<td><?php echo $k['invoice_id']; ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<th>:</th>
					<td><?php echo date('d-m-Y',strtotime($k['invoice_tgl'])); ?></td>
				</tr>
				<tr>
					<th>Status</th>
					<th>:</th>
					<td>
						<?php 

						if($k['invoice_status']=="0"){
							echo "Order";
						}else if($k['invoice_status']=="1"){
							echo "Payment";
						}else if($k['invoice_status']=="2"){
							echo "Cancel";
						}else if($k['invoice_status']=="3"){
							echo "Done";
						}
						?>

					</td>
				</tr>				
			</table>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2>Bill To</h2>			
			<table class="table">
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



	</div>
	<br/>
	<br/>	
	<div class="row">
		<div class="col-md-12">
			<h2>Detail Order</h2>
			<br/>
			<br/>
			<table class="table table-bordered">						
				<thead>
					<tr>
						<th width="1%">No</th>									
						<th>PRODUK</th>																					
						<th>BAHAN</th>																					
						<th>MESIN</th>																					
						<th>FINISHING</th>																					
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
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td>
								<?php echo $d['produk_nama'] ?>
								<br/>
								<small class="text-muted"><?php echo date('H:i:s | d-m-Y',strtotime($d['order_datetime'])); ?></small>
							</td>
							<td><?php echo $d['bahan_nama'] ?></td>
							<td><?php echo $d['mesin_nama'] ?></td>
							<td><?php echo $d['jenis_finishing_nama'] ?></td>																						
							<td><?php echo $d['order_keterangan'] ?></td>																						
							<td>																			
								<?php echo $d['order_qty'] ?>
							</td>																						
							<td><?php echo $d['order_harga_satuan'] ?></td>																						
							<td><?php echo $d['order_harga_sub_total'] ?></td>																												
						</tr>
						<?php
					}
					?>																						
				</tbody>
			</table>
			<br/>
			<br/>
			<div class="row">
				<div class="col-md-3 col-md-offset-9">
					<table class="table">
						<tr>
							<td>Total</td>
							<td>:</td>
							<td>Rp. <?php echo number_format($k['invoice_total']); ?></td>							
						</tr>
						<tr>
							<td>Disc</td>
							<td>:</td>
							<td><?php echo number_format($k['invoice_diskon']);?> %</td>
						</tr>						
						<tr>
							<td>DP</td>
							<td>:</td>
							<td>Rp. <?php echo number_format($k['invoice_dp']); ?></td>
						</tr>
						<tr>
							<td>Sisa Pembayaran</td>
							<td>:</td>
							<td>Rp. <?php echo number_format($k['invoice_ar']); ?></td>
						</tr>
						<tr>
							<td>Payment Method</td>
							<td>:</td>
							<td><?php echo $k['invoice_payment']; ?></td>
						</tr>
					</table>
				</div>
			</div>

			<br/>
			<br/>
			<br/>

			
		</div>
	</div>
</div>
<div class="col-md-4 col-md-offset-8">
	<a class="btn btn-success btn-xs" href="wo_detail_print.php?id=<?php echo $id_invoice; ?>" target="_blank"><i class="icon-printer"></i> Print</a>											
	<a type="submit" href="index.php" class="btn btn-primary btn-icon btn-xs"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>											
</div>



<?php include 'footer.php'; ?>