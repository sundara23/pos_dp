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
                        <a data-toggle="modal" href="#pengeluaran" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> Pengeluaran Umum </a>
                        <a data-toggle="modal" href="#pemasukan" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> Pemasukan Lain-lain </a>
                        <br/>
                        <br/>
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
                                                            $simpanke = mysqli_query($config,"select * from ak_tabel where ak_type='Aset'");
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
                                        $trx = mysqli_query($config,"select sum(debit) as totalmasuk, sum(kredit) as totalkeluar from arus_kas where kd_toko='$kdtoko'");
                                        $total = mysqli_fetch_assoc($trx);
                                        $totalmasuk= $total['totalmasuk'];
                                        $totalkeluar = $total['totalkeluar'];
                                        $saldo = $totalmasuk - $totalkeluar;
                                        ?>
                                        <th colspan="2" class="text-center text-blue">Rp. <?php echo number_format($totalmasuk); ?></th>
                                        <th colspan="2" class="text-center text-danger">Rp. <?php echo number_format($totalkeluar); ?></th>
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
                                        <th>KAS / BANK</th>
                                    </tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$kdtoko = $_SESSION['kd_toko'];
									$data = mysqli_query($config,"select * from arus_kas, kostumer, ak_tabel where arus_kas.id_ak=ak_tabel.id_ak and arus_kas.user=kostumer.kostumer_id and arus_kas.kd_toko='$kdtoko' order by tgl_ak desc");
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['ket_ak'] ?>
                                                <br/>
                                                <small class="text-muted"><?php echo date('d/m/Y',strtotime($d['tgl_ak'])); ?> </small>
                                            </td>
											<td><?php echo $d['kostumer_nama'] ?></td>
											<td>Rp. <?php echo number_format($d['debit']) ?> </td>
											<td>Rp. <?php echo number_format($d['kredit']) ?></td>
											<td> <?php echo $d['nama'] ?></td>
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
    <!-- Modal pengeluaran-->
    <div class="modal fade" id="pengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengeluaran Umum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="pengeluaran_act.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Tanggal : <?php echo date('d/m/Y'); ?></p>
                                <p>Keterangan</p>
                                <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
                                <input type="hidden" name="kd_toko" value="<?php echo $kdtoko; ?>">
                                <input type="hidden" name="trx_admin_id" value="<?php echo $id_admin; ?>">
                                <p><input type="text" name="ket_pengeluaran" min="0" class="form-control col-md-4"></p>
                                <p>Nilai (Rp)</p>
                                <p><input type="number" name="nilai_pengeluaran" min="0" class="form-control col-md-4 mata-uang" onkeyup="inputTerbilang();" ></p>
                                <p>Diambil Dari</p>
                                <select class="form-control col-md-4"  name="simpan_trx" required="required">
                                    <?php
                                    $simpanke = mysqli_query($config,"select * from ak_tabel where ak_type='Aset'");
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Pemasukan-->
    <div class="modal fade" id="pemasukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pemasukan Lain-lain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="pemasukan_act.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Tanggal : <?php echo date('d/m/Y'); ?></p>
                                <p>Keterangan</p>
                                <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
                                <input type="hidden" name="kd_toko" value="<?php echo $kdtoko; ?>">
                                <input type="hidden" name="trx_admin_id" value="<?php echo $id_admin; ?>">
                                <p><input type="text" name="ket_pemasukan" min="0" class="form-control col-md-4"></p>
                                <p>Nilai (Rp)</p>
                                <p><input type="number" name="nilai_pemasukan" min="0" class="form-control col-md-4 mata-uang" onkeyup="inputTerbilang();" ></p>
                                <p>Simpan Ke</p>
                                <select class="form-control col-md-4"  name="simpan_trx" required="required">
                                    <?php
                                    $simpanke = mysqli_query($config,"select * from ak_tabel where ak_type='Aset'");
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
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