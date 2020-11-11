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
                                $data = mysqli_query($config,"select * from transaksi where kd_toko='$kd_toko' and trx_status ='0'");
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
                                            <a data-toggle="modal" data-placement="top" title="Batalkan pesanan" class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="#cancel<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i></a>
                                            <?php
                                            $data2 = mysqli_query($config,"select * from orderan where admin1='0' and order_invoice ='$id'");
                                            $status = mysqli_num_rows($data2);
                                            if($status == null){
                                                ?>
                                                <a data-toggle="modal" data-placement="top" title="Lanjutkan Ke Kasir" class="btn btn-success btn-xs" href="wo_next_act.php?id=<?php echo $d['trx_invoice'];?>&&status=1"><i class="fas fa-check-circle fa-lg"></i></a>
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
                                                    <a class="btn btn-danger" href="wo_cancel.php?id=<?php echo $d['trx_invoice'];?>"><i class="icon-trash-alt"></i> Ya</a>
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
                        <h4 class="panel-title">Riwayat Setting/design</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-datatable">
                                <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama produk</th>
                                    <th>Jumlah</th>
                                    <th>Bahan</th>
                                    <th>Keterangan</th>
                                    <th>Finishing</th>
                                    <th>Lokasi File</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $id_admin = $_SESSION['id'];
                                $kd_toko = $_SESSION['kd_toko'];
                                $no = 1;
                                $data = mysqli_query($config,"select * from orderan, bahan, produk, transaksi, jenis_display, jenis_finishing, jenis_potong where orderan.order_bahan_id=bahan.bahan_id and orderan.jd_id=jenis_display.jenis_display_id and orderan.jf_id=jenis_finishing.jenis_finishing_id and orderan.jp_id=jenis_potong.jenis_potong_id and orderan.order_invoice=transaksi.trx_invoice and orderan.order_produk_id=produk.produk_id and orderan.kd_toko='$kd_toko' and orderan.admin1='$id_admin' order by order_datetime desc");
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date('d-m-Y',strtotime($d['order_datetime'])); ?></td>
                                        <td><?php echo $d['produk_nama'] ?></td>
                                        <td><?php echo $d['order_qty'] ?></td>
                                        <td><?php echo $d['bahan_nama'] ?></td>
                                        <td><?php echo $d['order_keterangan']; ?></td>
                                        <td width="300px">
                                            <p>Jenis Display : <b><?php echo $d['jenis_display_nama']; ?></b></p>
                                            <p>Jenis Finishing : <b><?php echo $d['jenis_finishing_nama']; ?></b></p>
                                            <p>Jenis Potong : <b><?php echo $d['jenis_potong_nama']; ?></b></p>
                                        </td>
                                        <td><?php echo $d['lokasi_file']; ?></td>
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