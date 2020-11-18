<?php include 'header.php'; ?>
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
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<h4>Form Tambah Pesanan</h4>
								<br>
								<div style="background: #f0f0f0;padding: 10px;">
									<div class="row">
										<div class="col-md-7">
											<form action="cs_edit_add_act.php" method="post">
                                                <input type="hidden" class="jenis_barang" name="jenis_barang" value="CTK">
                                                <input type="hidden" class="kd_toko" name="kd_toko" value="<?php echo $_SESSION['kd_toko'];?>">
												<div class="table-responsive">
													<table class="table table-bordered">
                                                        <tr>
                                                            <th width="30%">No. Invoice</th>
                                                            <td>
                                                                <input type="text" class="form-control" name="id_invoice" value="<?php echo $id_invoice; ?>" readonly>
                                                            </td>
                                                        </tr>
														<tr class="">
															<th width="30%">Pilih Produk</th>
															<td>										
																<select class="pilih-produk form-control" name="produk" id="produk">
																	<option value="">Pilih -</option>
																	<?php 
																	$produk = mysqli_query($config,"select * from produk");		
																	while($p=mysqli_fetch_array($produk)){
																		?>										
																		<option value="<?php echo $p['produk_id']; ?>"><?php echo $p['produk_nama']; ?></option>
																		<?php 
																	}
																	?>
																</select>
															</td>
														</tr>
                                                        <tr>
                                                            <th width="30%">Keterangan</th>
                                                            <td>
                                                                <textarea name="ket_produk" class="form-control"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%"></th>
                                                            <td>
                                                                <input type="submit" class="form-control btn btn-primary" value="Tambah pesanan">
                                                            </td>
                                                        </tr>
													</table>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
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
                                    <th width="22%">OPSI</th>
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
                                            }else if($d['trx_status']=="8"){
                                                echo "Costumer Service";
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="cs_order_edit.php?id_invoice=<?php echo $d['order_invoice'];?>&&id=<?php echo $d['order_id'];?>"><i class="icon-wrench3"></i> Edit</a>
                                            <a class="btn border-danger text-danger btn-flat btn-icon btn-xs" data-toggle="modal" href="#hapus<?php echo $d['order_id'];?>"><i class="icon-trash-alt"></i> Hapus</a>
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
                                                    <a class="btn btn-danger" href="cs_order_hapus.php?id=<?php echo $d['order_id'];?>&&id_invoice=<?php echo $d['order_invoice'];?>"><i class="icon-trash-alt"></i> Ya</a>
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
	</div>
	<div class="footer text-muted">
	</div>
</div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#produk').select2({
                placeholder: 'Pilih Produk',
                allowClear: true
            });
        });
    </script>

<?php include 'footer.php'; ?>