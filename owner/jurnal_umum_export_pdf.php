<?php include 'header.php'; ?>
<?php
$gettoko = $_GET['toko'];
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

require_once  '../assets/mpdf7/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPageByArray([
    'margin-left' => 0,
    'margin-right' => 0,
    'margin-top' => 0,
    'margin-bottom' => 0,
]);
// Buffer the following html with PHP so we can store it to a variable later
ob_start();
?>


<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
                <?php show_alert(); ?>
        <!-- Dashboard content -->
                <div class="row">
            <div class="col-lg-12">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <a href="jurnal_umum.php" class="btn btn-primary">Kembali</a>
                    <div class="panel-heading">
                        <h4 class="panel-title">Jurnal Umum Bulan <?php echo tanggal_indo($getbln);?> Tahun <?php echo $getthn;?></h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
                        <div class="rw">
                            <div class="col-md-12">
                                <form action="jurnal_umum_tgl.php" method="get">
                                    <div class="row">
                                    <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Toko
                                                        </div>
                                                        <input type="text" class="form-control" value="<?php echo $gettoko;?>" readonly>
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
                                                    <a href="jurnal_umum_export_excel.php?simpan_trx=<?php echo $gettoko;?>&bulan=<?php echo $getbln;?>&tahun=<?php echo $getthn;?>" class="btn btn-success"><i class="far fa-file-excel"></i> Export excel</a>
                                                    <a target="_blank" href="jurnal_umum_export_pdf.php?toko=<?php echo $gettoko;?>&bulan=<?php echo $getbln;?>&tahun=<?php echo $getthn;?>" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Export PDF</a>
                                                </div>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        <!-- /dashboard content -->
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-datatable">
                        <thead>
                        <tr>
                            <th colspan="7"class="text-center bg-blue-300">JURNAL UMUM</th>
                        </tr>
                        <?php
                        $debit = mysqli_query($config,"select sum(amount) as debit from arus_kas_subentry where type='0'");
                        $totaldebit = mysqli_fetch_assoc($debit);
                        $masuk= $totaldebit['debit'];
                        $kredit = mysqli_query($config,"select sum(amount) as kredit from arus_kas_subentry where type='1'");
                        $totalkredit = mysqli_fetch_assoc($kredit);
                        $keluar= $totalkredit['kredit'];
                        ?>
                        <tr>
                            <th colspan="3" class="text-center bg-grey-300">Jumlah</th>
                            <th colspan="2" class="text-center bg-grey-300">Rp. <?php echo number_format($masuk)?></th>
                            <th colspan="2" class="text-center bg-grey-300">Rp. <?php echo number_format($keluar)?></th>
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
                        if ($gettoko=='All'){

                        $aruskas = mysqli_query($config,"select * from arus_kas where month(tgl_ak)='$getbln' and year(tgl_ak)='$getthn' order by tgl_ak desc");


                        }else{


                         $aruskas = mysqli_query($config,"select * from arus_kas where kd_toko='$gettoko' and month(tgl_ak)='$getbln' and year(tgl_ak)='$getthn' order by tgl_ak desc");

                        }
                        while($ak=mysqli_fetch_array($aruskas)){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($ak['tgl_ak'])); ?></td>
                                <td><?php echo $ak['ket_ak']; ?></td>
                                <?php
                                $subentry = mysqli_query($config,"select * from arus_kas_subentry where arus_kas_id='".$ak['id_arus_kas']."'");
                                while($aks=mysqli_fetch_array($subentry)){
                                    $data3 = mysqli_query($config,"select * from ak_tabel where id_ak='".$aks['ak_tabel_id']."'");
                                    $ak_tabel = mysqli_fetch_assoc($data3);
                                ?>
                                <td><?php echo $ak_tabel['id_ak'].' - '.$ak_tabel['nama']; ?></td>
                                <td><?php echo $aks['amount']; ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <!-- Footer -->
        <div class="footer text-muted"></div>
        <!-- /footer -->
    </div>
    <!-- /content area -->
</div>
<!-- /main content -->

<?php
// Now collect the output buffer into a variable
$html = ob_get_contents();
ob_end_clean();
$nama_file = 'struk-kasir';
// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);
$mpdf->Output($nama_file."-".date("Y/m/d H:i:s").".pdf" ,'I');
?>

<?php include 'footer.php'; ?>

