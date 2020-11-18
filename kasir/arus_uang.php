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
						<h4 class="panel-title">Arus Uang</h4>
					</div>
					<div class="panel-body">
                        <div class="row">
                            <div class="rw">
                                <div class="col-md-10">
                                    <form action="arus_uang_tgl.php" method="get">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Filter
                                                        </div>
                                                        <select class="form-control"  name="simpan_trx" required="required">
                                                            <option value="">- Pilih -</option>
                                                            <?php
                                                            $simpanke = mysqli_query($config,"select * from ak_tabel where ak_type='Aset' and id_ak>'1111' and id_ak<'1115'");
                                                            while($sk=mysqli_fetch_array($simpanke)){
                                                                ?>
                                                                <option value="<?php echo $sk['id_ak']; ?>"><?php echo $sk['nama']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                       </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Bulan
                                                        </div>
                                                        <select name="bulan" class="form-control" required="required">
                                                            <option value="">- Pilih -</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Tahun
                                                        </div>
                                                        <select name="tahun" class="form-control" required="required">
                                                            <option value="">- Pilih -</option>
                                                            <?php
                                                            $mulai= date('Y') - 50;
                                                            for($i = $mulai;$i<$mulai + 100;$i++){
                                                                $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-goup">
                                                    <input class="btn btn-primary form-control" value="Filter" type="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-datatable">
								<thead>
									<tr class="bg-grey-300">
										<th colspan="2" class="text-center">MASUK</th>
										<th colspan="2" class="text-center">KELUAR</th>
										<th colspan="2" class="text-center">SALDO</th>
									</tr>
                                    <tr>
                                        <?php
                                        $kdtoko = $_SESSION['kd_toko'];
                                        $id_admin = $_SESSION['id'];
                                        $debit = mysqli_query($config,"select sum(amount) as debit from arus_kas_subentry where kd_toko='$kdtoko' and type='0' and ak_tabel_id>'1111' and ak_tabel_id<'1115'");
                                        $totaldebit = mysqli_fetch_assoc($debit);
                                        $masuk= $totaldebit['debit'];
                                        $kredit = mysqli_query($config,"select sum(amount) as kredit from arus_kas_subentry where kd_toko='$kdtoko' and type='1' and ak_tabel_id>'1111' and ak_tabel_id<'1115'");
                                        $totalkredit = mysqli_fetch_assoc($kredit);
                                        $keluar= $totalkredit['kredit'];
                                        $saldo = $masuk - $keluar;
                                        ?>
                                        <th colspan="2" class="text-center text-blue">Rp. <?php echo number_format($masuk); ?></th>
                                        <th colspan="2" class="text-center text-danger">Rp. <?php echo number_format($keluar); ?></th>
                                        <th colspan="2" class="text-center text-green-600">Rp. <?php echo number_format($saldo); ?></th>
                                    </tr>
                                    <tr class="bg-grey-300">
                                        <th colspan="6" class="text-center">DATA TRANSAKSI</th>
                                    </tr>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Keterangan</th>
                                        <th>User</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Jenis Kas</th>
                                    </tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$kdtoko = $_SESSION['kd_toko'];
//									$data = mysqli_query($config,"select * from arus_kas, admin where arus_kas.admin_by=admin.id and arus_kas.kd_toko='$kdtoko' order by tgl_ak desc");
									$data = mysqli_query($config,"select * from arus_kas_subentry where kd_toko='$kdtoko' and ak_tabel_id>'1111' and ak_tabel_id<'1115' order by arus_kas_id desc");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
                                            <?php
                                            $data1 = mysqli_query($config,"select * from arus_kas where id_arus_kas='".$d['arus_kas_id']."'");
                                            $arus_kas = mysqli_fetch_assoc($data1);
                                            $data2 = mysqli_query($config,"select * from admin where id='".$arus_kas['admin_by']."'");
                                            $admin = mysqli_fetch_assoc($data2);
                                            $data3 = mysqli_query($config,"select * from ak_tabel where id_ak='".$d['ak_tabel_id']."'");
                                            $ak_tabel = mysqli_fetch_assoc($data3);
                                            ?>
											<td><?php echo $no++; ?></td>
											<td width="30%"><?php echo $arus_kas['ket_ak'] ?>
                                                <br/>
                                                <small class="text-muted"><?php echo date('d/m/Y H:i:s',strtotime($arus_kas['tgl_ak'])); ?> </small>
                                            </td>
											<td><?php echo $admin['nama'] ?></td>
											<td><?php if($d['type'] == 0){ echo number_format($d['amount']); } else { echo '0';} ?> </td>
											<td><?php if($d['type'] == 1){ echo number_format($d['amount']); } else { echo '0';} ?></td>
											<td> <?php echo $ak_tabel['nama'] ?></td>
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
    <script src="../assets/js/jquery.mask.min.js"></script>
    <script>
        function inputTerbilang() {
            //membuat inputan otomatis jadi mata uang
            $('.mata-uang').mask('0.000.000.000', {reverse: true});

            //mengambil data uang yang akan dirubah jadi terbilang
            var input = document.getElementsByClassName("terbilang-input").value.replace(/\./g, "");

            //menampilkan hasil dari terbilang
            document.getElementsByClassName("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
        }
        $(function () {
            $('.btn-xs').tooltip()
        })
    </script>
<?php include 'footer.php'; ?>