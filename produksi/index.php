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
                                $data = mysqli_query($config,"select * from transaksi where kd_toko='$kd_toko' and trx_status ='2'");
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['trx_invoice'] ?></td>
                                        <td><?php echo date('d-m-Y',strtotime($d['trx_date'])); ?></td>
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
                                            <a data-placement="top" title="Detail Pesanan" class="btn border-green text-green btn-flat btn-icon btn-xs" href="wo_detail.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-list3"></i></a>
                                            <?php
                                            $data2 = mysqli_query($config,"select * from orderan where admin2='0' and order_invoice ='$id'");
                                            $status = mysqli_num_rows($data2);
                                            if($status == null){
                                                ?>
                                                <a data-toggle="modal" data-placement="top" title="Pesanan Selesai Dicetak" class="btn btn-success btn-xs" href="wo_next_act.php?id=<?php echo $d['trx_invoice'];?>&&status=3"><i class="fas fa-check-circle fa-lg"></i></a>
                                            <?php } ?>
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

<?php include 'footer.php'; ?>