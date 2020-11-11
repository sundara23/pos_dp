<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">
    <?php
    if(isset($_GET['id'])){
        $id_invoice = $_GET['id'];
    }else{
        header("location:cs.php");
    }
    ?>
	<!-- Content area -->
	<div class="content">
		<?php show_alert(); ?>
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">List Pesanan</h4>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Nama produk</th>
										<th>Keterangan</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$id_admin = $_SESSION['id'];
									$kd_toko = $_SESSION['kd_toko'];
									$no = 1;
									$data = mysqli_query($config,"select * from orderan, produk, transaksi where orderan.order_invoice=transaksi.trx_invoice and orderan.order_produk_id=produk.produk_id and orderan.order_invoice='$id_invoice'");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											 <td><?php echo $d['produk_nama'] ?></td>
											<td><?php echo $d['order_keterangan']; ?></td>
											<td>
                                                <?php
                                                if($d['trx_status']=="0"){
                                                    echo "Proses Design/Setting";
                                                }else if($d['trx_status']=="1"){
                                                    echo "Proses Pembayaran";
                                                }else if($d['trx_status']=="2"){
                                                    echo "Proses Cetak";
                                                }else if($d['trx_status']=="3"){
                                                    echo "Pesanan Selesai";
                                                }else if($d['trx_status']=="9"){
                                                    echo "Dibatalkan";
                                                }
                                                ?>
                                            </td>
										</tr>
                                        <!-- Modal Cancel-->
                                        <div class="modal fade" id="hapus<?php echo $d['order_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Anda Yakin Ingin Menghapus Data Ini? </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-danger" href="cs_order_hapus.php?id=<?php echo $d['order_id'];?>"><i class="icon-trash-alt"></i> Ya</a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <?php } ?>
								</tbody>
							</table>
						</div>
                        <a href="cs.php" class="btn btn-sm btn-primary alpaca-float-right mt-15" >Kembali</a>
					</div>
				</div>	


			</div>

		</div>


        <div class="footer text-muted">

		</div>

	</div>
</div>

<?php include 'footer.php'; ?>