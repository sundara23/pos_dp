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
						<h4 class="panel-title">Customer Service</h4>
					</div>
					<div class="panel-body">
						<a href="cs_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> Tambah Pesanan</a>
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
                                        <th>Invoice</th>
										<th>Date</th>
										<th>Total Order</th>		
										<th>Status</th>												
										<th width="22%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$id_admin = $_SESSION['id'];
									$kd_toko = $_SESSION['kd_toko'];
									$no = 1;
									$data = mysqli_query($config,"select * from transaksi where kd_toko='$kd_toko' and trx_status ='8'");
									while($d=mysqli_fetch_array($data)){
                                        $kd_inv = $d['trx_invoice'];
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											 <td><?php echo $d['trx_invoice'] ?></td>
											<td><?php echo date('d M Y',strtotime($d['trx_date'])); ?></td>
											<td>
												<?php 
												$id = $d['trx_invoice'];
												$i = mysqli_query($config,"select * from orderan where order_invoice='$id'");
												echo mysqli_num_rows($i);
												?>

											</td>
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
                                                <a data-placement="top" title="Detail Pesanan" class="btn border-green text-green btn-flat btn-icon btn-xs" href="cs_detail.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-list3"></i></a>
                                                <a data-placement="top" title="Edit Pesanan" class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="cs_edit.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-wrench3"></i></a>
                                                <a data-toggle="modal" data-placement="top" title="Batalkan pesanan" class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="#cancel<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i></a>
                                                <a data-toggle="modal" data-placement="top" title="Lanjutkan Ke setting/designer" class="btn btn-success btn-xs" href="#next<?php echo $d['trx_invoice'];?>"><i class="fas fa-check-circle fa-lg"></i></a>
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
                                                        <a class="btn btn-danger" href="cs_cancel.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i> Ya</a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Next-->
                                        <div class="modal fade" id="next<?php echo $d['trx_invoice'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Pesanan Akan dilanjutkan Ke setting/Designer ? </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-primary" href="cs_next_act.php?id=<?php echo $d['trx_invoice'];?>&&status=0">Ya</a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <?php } ?>
								</tbody>
							</table>
						</div>					
					</div>					
				</div>
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Status Pesanan</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-datatable">
                                <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Invoice</th>
                                    <th>Date</th>
                                    <th>Total Order</th>
                                    <th>Status</th>
                                    <th width="22%">OPSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $id_admin = $_SESSION['id'];
                                $kd_toko = $_SESSION['kd_toko'];
                                $no = 1;
                                $data = mysqli_query($config,"select * from transaksi where kd_toko='$kd_toko'");
                                while($d=mysqli_fetch_array($data)){
                                    $kd_inv = $d['trx_invoice'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['trx_invoice'] ?></td>
                                        <td><?php echo date('d M Y',strtotime($d['trx_date'])); ?></td>
                                        <td>
                                            <?php
                                            $id = $d['trx_invoice'];
                                            $i = mysqli_query($config,"select * from orderan where order_invoice='$id'");
                                            echo mysqli_num_rows($i);
                                            ?>

                                        </td>
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
                                        <td width="1%">
                                            <a data-placement="top" title="Detail Pesanan" class="btn border-green text-green btn-flat btn-icon btn-xs" href="cs_detail.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-list3"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
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