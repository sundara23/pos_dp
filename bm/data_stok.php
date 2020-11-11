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
						<h4 class="panel-title">Data Stok</h4>
					</div>
					<div class="panel-body">
						<a href="data_stok_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH STOK</a>
						<a href="data_stok_kurang.php" class="btn btn-sm btn-primary"><i class="icon-minus2"></i> KURANGI STOK</a>
						<!-- <a href="#" class="btn btn-sm bg-green">EXCEL</a> -->
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Kode Produk</th>
										<th>Nama Produk</th>
										<th>Stok</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from data_stok, produk_atk where data_stok.kd_produk=produk_atk.kd_produk and stok_masuk='1'");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['kd_produk'] ?></td>
											<td><?php echo $d['nama_produk'] ?></td>
											<td><?php echo $d['stok'] ?></td>
											<td><?php echo date('d M Y',strtotime($d['date_stok'])); ?></td>
                                            <td><b class="text-blue-600"><i>Penambahan Stok</i></b>
                                            </td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
                        <div class="table-responsive"
                        >
                            <table class="table table-bordered table-hover table-striped table-datatable">
                                <thead>
                                <tr>
                                    <th class="bg-grey-300 text-center" colspan="6"> Riwayat Stok</th>
                                </tr>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($config,"select * from data_stok, produk_atk where data_stok.kd_produk=produk_atk.kd_produk");
                                while($d=mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['kd_produk'] ?></td>
                                    <td><?php echo $d['nama_produk'] ?></td>
                                    <td><?php
                                        if ($d['stok_masuk'] == 1){
                                            echo "<b class='text-green-600'>" . $d['stok'] . "</b>";
                                        }else if($d['stok_keluar'] == 1){
                                            echo "<b class='text-danger-600'> - " . $d['stok'] . "</b>";
                                        }
                                            ?></td>
                                        <td><?php echo date('d M Y',strtotime($d['date_stok'])); ?></td>
                                        <td>
                                            <?php
                                            if ($d['stok_masuk'] == 1){
                                                echo "<b class='text-blue-600'>Stok Masuk</b>";
                                            }else if($d['stok_keluar'] == 1){
                                                echo "<b class='text-danger-600'> Stok Keluar</b>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
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

<?php include 'footer.php'; ?>