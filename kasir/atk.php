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
						<h4 class="panel-title">Penjualan ATK</h4>
                        <a href="atk_trx.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> Tambah Penjualan</a>
                        <br/>
                        <br/>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-datatable">
								<thead>
									<tr>
										<th>No</th>
										<th>Date</th>		
										<th>Invoice</th>
										<th>Rincian</th>
										<th width="18%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$kdtoko = $_SESSION['kd_toko'];
									$data = mysqli_query($config,"select * from transaksi where kd_toko='$kdtoko' and jenis_barang='ATK' and trx_status='1' order by trx_date desc");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo date('d M Y',strtotime($d['trx_date'])); ?></td>
											<td><?php echo $d['trx_invoice'] ?></td>
											<td width="200px">
                                                <?php
                                                $pembayaran = $d['trx_total_pembayaran'];
                                                $pembayarandiskon = $pembayaran - $d['trx_diskon'];
                                                $pembayaranpajak = $pembayarandiskon * $d['trx_pajak'] / 100;
                                                $totalpembayaran = $pembayarandiskon + $pembayaranpajak;
                                                ?>
												Rp. <?php echo number_format($totalpembayaran);?>
												<br/>
                                                <small class="text-muted">Grand Total : Rp. <?php echo $d['trx_total_pembayaran']; ?> </small>
                                                <br>
												<small class="text-muted">Diskon : Rp. <?php echo $d['trx_diskon']; ?> </small>
                                                <br>
                                                <small class="text-muted">Pajak : <?php echo number_format($d['trx_pajak']); ?> %</small>
                                                <br>
												<small class="text-muted">DP : Rp. <?php echo number_format($d['trx_dp']); ?></small>
                                                <br>
                                                <small class="text-muted">Piutang : Rp. <?php echo number_format($d['trx_ar']); ?></small>
                                                <br>
											</td>
											<td>
                                                <?php
                                                if($d['trx_total_pembayaran'] != 0 && $d['trx_jenis_pembayaran'] != 0){
                                                    ?>
                                                    <a data-placement="top" title="Detail Pesanan" class="btn border-green text-green btn-flat btn-icon btn-xs" href="atk_trx_edit.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-list3"></i></a>
                                                    <a data-toggle="modal" data-placement="top" title="Transaksi Selesai" class="btn btn-success btn-xs" href="atk_next_act.php?id=<?php echo $d['trx_invoice'];?>&&status=3"><i class="fas fa-check-circle fa-lg"></i></a>
                                                <?php }else{ ?>
                                                <a data-placement="top" title="Proses Pembayaran" class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="atk_trx_edit.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-pencil"></i></a>
                                                <a data-toggle="modal" data-placement="top" title="Batalkan pesanan" class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="#cancel<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i></a>
                                                <?php } ?>
                                            </td>
										</tr>
                                        <!-- Modal Cancel-->
                                        <div class="modal fade" id="cancel<?php echo $d['trx_invoice'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Anda Yakin Ingin Membatalkan Pesanan Ini? </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-danger" href="atk_cancel.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i> Ya</a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script>
        $(function () {
            $('.btn-xs').tooltip()
        })
    </script>
<?php include 'footer.php'; ?>