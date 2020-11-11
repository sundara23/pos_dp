	<?php include 'header.php'; ?>
	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			<!-- /dashboard content -->
			<div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-datatable">
                            <thead>
                            <tr>
                                <th colspan="10"class="text-center bg-blue-300">FASKAL PUSAT</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Order</th>
                                <th>Pelanggan</th>
                                <th>No. Invoice</th>
                                <th>Total Pembayaran</th>
                                <th>Diskon</th>
                                <th>DP</th>
                                <th>Sisa Pembayaran</th>
                                <th>Status</th>
                                <th>Detail Orderan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $total_omset_faskal01 = 0;
                            $total_pemasukan_faskal01 = 0;
                            $total_piutang_faskal01 = 0;
                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal01' and transaksi.jenis_barang='CTK'");
                            while($d=mysqli_fetch_array($data)){
                            if($d['trx_ar']>0 || $d['trx_ar']==0 && $d['trx_dp']==0){
                                $total_pemasukan_faskal01 += $d['trx_dp'];
                                $total_omset_faskal01 += $d['trx_total_pembayaran'];
                                $total_piutang_faskal01 += $d['trx_ar'];
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['trx_date'] ?></td>
                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                    <td><?php echo $d['trx_invoice'] ?></td>
                                    <td>Rp. <?php echo number_format($d['trx_total_pembayaran']) ?></td>
                                    <td> <?php echo $d['trx_diskon'] ?> %</td>
                                    <td>Rp. <?php echo number_format($d['trx_dp']) ?></td>
                                    <td>Rp. <?php echo number_format($d['trx_ar']) ?></td>
                                    <td><b>
                                        <?php
                                            if($d['trx_status'] == 0 && $d['trx_ar'] == 0){
                                                echo "<i class='text-danger'>Belum Bayar</i>";
                                            }elseif ($d['trx_ar'] > 0 && $d['trx_status'] > 0 ){
                                                echo "<i class='text-primary'>Belum Lunas</i>";
                                            }else{
                                                echo "<i class='text-success'>Lunas</i>";
                                            }
                                        ?>
                                        </b>
                                    </td>
                                    <td><a class="btn border-green text-green btn-flat btn-icon btn-xs btn-block" href="detail_orderan.php?inv=<?php echo $d['trx_invoice']; ?>"><i class="icon-list3"></i> Detail</a></td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-datatable">
                            <thead>
                            <tr>
                                <th colspan="10"class="text-center bg-green-800">FASKAL CABANG</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Order</th>
                                <th>Pelanggan</th>
                                <th>No. Invoice</th>
                                <th>Total Pembayaran</th>
                                <th>Diskon</th>
                                <th>DP</th>
                                <th>Sisa Pembayaran</th>
                                <th>Status</th>
                                <th>Detail Orderan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $total_piutang_faskal02 = 0;
                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal02' and transaksi.jenis_barang='CTK'");
                            while($d=mysqli_fetch_array($data)){
                                if($d['trx_ar']>0 || $d['trx_ar']==0 && $d['trx_dp']==0){
                                $total_piutang_faskal02 += $d['trx_ar'];
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['trx_date'] ?></td>
                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                    <td><?php echo $d['trx_invoice'] ?></td>
                                    <td>Rp. <?php echo number_format($d['trx_total_pembayaran']) ?></td>
                                    <td> <?php echo $d['trx_diskon'] ?> %</td>
                                    <td>Rp. <?php echo number_format($d['trx_dp']) ?></td>
                                    <td>Rp. <?php echo number_format($d['trx_ar']) ?></td>
                                    <td><b>
                                            <?php
                                            if($d['trx_status'] == 0 && $d['trx_ar'] == 0){
                                                echo "<i class='text-danger'>Belum Bayar</i>";
                                            }elseif ($d['trx_ar'] > 0 && $d['trx_status'] > 0 ){
                                                echo "<i class='text-primary'>Belum Lunas</i>";
                                            }else{
                                                echo "<i class='text-success'>Lunas</i>";
                                            }
                                            ?>
                                        </b>
                                    </td>
                                    <td><a class="btn border-green text-green btn-flat btn-icon btn-xs btn-block" href="detail_orderan.php?inv=<?php echo $d['trx_invoice']; ?>"><i class="icon-list3"></i> Detail</a></td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>


			<br>
			<div class="panel">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
                            <h5>Faskal Pusat</h5>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
                                    <?php
                                    $belum_bayar = 0;
                                    $data2 = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal01' and transaksi.jenis_barang='CTK' and transaksi.trx_status='0'");
                                    while($d=mysqli_fetch_array($data2)){
                                        $belum_bayar += $d['trx_total_pembayaran'];
                                    }
                                    $piutang_total_faskal01 = $belum_bayar + $total_piutang_faskal01;
                                    ?>
                                        <tr>
                                            <td width="30%">Total Piutang</td>
                                            <th>Rp. <?php echo number_format($piutang_total_faskal01); ?></th>
                                        </tr>
									</thead>									
								</table>
							</div>	
						</div>
					</div>

				</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Faskal Cabang</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <?php
                                    $belum_bayar = 0;
                                    $data2 = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal02' and transaksi.jenis_barang='CTK' and transaksi.trx_status='0'");
                                    while($d=mysqli_fetch_array($data2)){
                                        $belum_bayar += $d['trx_total_pembayaran'];
                                    }
                                    $piutang_total_faskal02 = $belum_bayar + $total_piutang_faskal02;
                                    ?>
                                    <tr>
                                        <td width="30%">Total Piutang</td>
                                        <th>Rp. <?php echo number_format($piutang_total_faskal02); ?></th>
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