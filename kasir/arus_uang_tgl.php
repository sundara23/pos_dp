<?php include 'header.php'; ?>
<?php
$getbln = $_GET['bulan'];
$getthn = $_GET['tahun'];
$getcashbox = $_GET['simpan_trx'];
function tanggal_indo($tanggal)
{
    $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $bulan[ (int)$split[0] ];
}
$cashbox = mysqli_query($config,"select * from ak_tabel where id_ak='$getcashbox'");
$box = mysqli_fetch_assoc($cashbox);
?>
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
                    <a href="arus_uang.php" class="btn btn-primary">Kembali</a>
					<div class="panel-heading">
						<h4 class="panel-title">Arus Uang Bulan <?php echo tanggal_indo($getbln);?> Tahun <?php echo $getthn;?> [<?php echo $box['nama'];?>]</h4>
					</div>
					<div class="panel-body">
                        <div class="row">
                            <div class="rw">
                                <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Cashbox
                                                        </div>
                                                        <input type="text" class="form-control" value="<?php echo $box['nama']; ?>" readonly>
                                                       </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Bulan
                                                        </div>
                                                        <input type="text" class="form-control" value="<?php echo tanggal_indo($getbln);?>" readonly>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Tahun
                                                        </div>
                                                        <input type="text" class="form-control" value="<?php echo $getthn;?>" readonly>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-goup">
                                                    <a href="arus_uang_export_excel.php?simpan_trx=<?php echo $getcashbox;?>&bulan=<?php echo $getbln;?>&tahun=<?php echo $getthn;?>" class="btn btn-success"><i class="far fa-file-excel"></i> Export excel</a>
                                                    <a target="_blank" href="arus_uang_export_pdf.php?simpan_trx=<?php echo $getcashbox;?>&bulan=<?php echo $getbln;?>&tahun=<?php echo $getthn;?>" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Export PDF</a>
                                                </div>
                                            </div>
                                        </div>
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
                                    $id_admin = $_SESSION['id'];;
                                    $masuk = 0;
                                    $keluar = 0;
                                    $datamasuk = mysqli_query($config,"select * from arus_kas_subentry where kd_toko='$kdtoko' and ak_tabel_id>'1111' and ak_tabel_id<'1115' and type='0'");
                                    while($d=mysqli_fetch_array($datamasuk)){
                                        $data1x = mysqli_query($config,"select * from arus_kas where id_arus_kas='".$d['arus_kas_id']."'");
                                        $arus_kasx = mysqli_fetch_assoc($data1x);
                                        if(date('m',strtotime($arus_kasx['tgl_ak'])) == $getbln && date('Y',strtotime($arus_kasx['tgl_ak'])) == $getthn && $d['ak_tabel_id'] == $getcashbox) {
                                            $masuk += $d['amount'];
                                        }
                                    }
                                    $datakeluar = mysqli_query($config,"select * from arus_kas_subentry where kd_toko='$kdtoko' and ak_tabel_id>'1111' and ak_tabel_id<'1115' and type='1'");
                                    while($d=mysqli_fetch_array($datakeluar)){
                                        $data2x = mysqli_query($config,"select * from arus_kas where id_arus_kas='".$d['arus_kas_id']."'");
                                        $arus_kasxx = mysqli_fetch_assoc($data2x);
                                        if(date('m',strtotime($arus_kasxx['tgl_ak'])) == $getbln && date('Y',strtotime($arus_kasxx['tgl_ak'])) == $getthn && $d['ak_tabel_id'] == $getcashbox) {
                                            $keluar += $d['amount'];
                                        }
                                    }
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
                                    $data1 = mysqli_query($config,"select * from arus_kas where id_arus_kas='".$d['arus_kas_id']."'");
                                    $arus_kas = mysqli_fetch_assoc($data1);
                                    $data2 = mysqli_query($config,"select * from admin where id='".$arus_kas['admin_by']."'");
                                    $admin = mysqli_fetch_assoc($data2);
                                    $data3 = mysqli_query($config,"select * from ak_tabel where id_ak='".$d['ak_tabel_id']."'");
                                    $ak_tabel = mysqli_fetch_assoc($data3);
                                    if(date('m',strtotime($arus_kas['tgl_ak'])) == $getbln && date('Y',strtotime($arus_kas['tgl_ak'])) == $getthn && $d['ak_tabel_id'] == $getcashbox) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td width="30%"><?php echo $arus_kas['ket_ak'] ?>
                                                <br/>
                                                <small class="text-muted"><?php echo date('d/m/Y H:i:s', strtotime($arus_kas['tgl_ak'])); ?> </small>
                                            </td>
                                            <td><?php echo $admin['nama'] ?></td>
                                            <td><?php if ($d['type'] == 0) {
                                                    echo number_format($d['amount']);
                                                } else {
                                                    echo '0';
                                                } ?> </td>
                                            <td><?php if ($d['type'] == 1) {
                                                    echo number_format($d['amount']);
                                                } else {
                                                    echo '0';
                                                } ?></td>
                                            <td> <?php echo $ak_tabel['nama'] ?></td>
                                        </tr>
                                        <?php
                                    } }
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