<?php include 'header.php'; ?>
<?php
$getbln = $_GET['bulan'];
$getthn = $_GET['tahun'];
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
                    <a href="jurnal_umum.php" class="btn btn-primary">Kembali</a>
					<div class="panel-heading">
						<h4 class="panel-title">Jurnal Umum <?php echo tanggal_indo($getbln);?> Tahun <?php echo $getthn;?></h4>
					</div>
					<div class="panel-body">
                        <div class="row">
                            <div class="rw">
                                <div class="col-md-10">
                                        <div class="row">
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
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Tahun
                                                        </div>
                                                        <input type="text" class="form-control" value="<?php echo $getthn;?>" readonly>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-goup">
                                                    <a href="arus_uang_export_excel.php?simpan_trx=<?php echo $getcashbox;?>&bulan=<?php echo $getbln;?>&tahun=<?php echo $getthn;?>" class="btn btn-success"><i class="far fa-file-excel"></i> Export excel</a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-datatable">
                            <thead>
                            <tr>
                                <th colspan="9"class="text-center bg-blue-300">JURNAL UMUM</th>
                            </tr>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">Keterangan</th>
                                <th colspan="2" class="text-center">Debit</th>
                                <th colspan="2" class="text-center">Kredit</th>
                            </tr>
                            <tr>
                                <td>Ket</td>
                                <td>Nilai</td>
                                <td>Ket</td>
                                <td>Nilai</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($config,"select * from buku_besar inner join ak_tabel on buku_besar.id_ak = ak_tabel.id_ak where month(tgl_ak)='$getbln'");
                            while($d=mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['tgl_ak'] ?></td>
                                    <td><?php echo $d['ket_ak'] ?></td>
                                    <td><?php echo $d['id_ak'] ?> - <?php echo $d['nama'] ?></td>
                                    <td>Rp. <?php echo number_format($d['debit']) ?></td>
                                    <td><?php echo $d['id_ak'] ?> - <?php echo $d['nama'] ?></td>
                                    <td>Rp. <?php echo number_format($d['kredit']) ?></td>
                                </tr>
                            <?php } ?>

                             <?php
                                        $trx = mysqli_query($config,"select sum(debit) as totaldebit, sum(kredit) as totalkredit from buku_besar where month(tgl_ak)='$getbln'");
                                        $total = mysqli_fetch_assoc($trx);
                                        $total_debit= $total['totaldebit'];
                                        $total_kredit = $total['totalkredit'];
                             ?>

                            <tr>
                                <th colspan="3" class="text-center">Jumlah</th>
                                <th colspan="2" class="text-center">Rp. <?php echo number_format($total_debit)?></th>
                                <th colspan="2" class="text-center">Rp. <?php echo number_format($total_kredit)?></th>
                            </tr>

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