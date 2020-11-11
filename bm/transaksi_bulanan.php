<?php include 'header.php'; ?>
<!-- Main content -->
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
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="rw">
                <div class="col-md-10">
                    <form action="transaksi_bulanan.php" method="get">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Bulan</th>
                                            <td>
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
                                            </td>
                                            <th>Tahun</th>
                                            <td>
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
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-goup">
                                    <input class="btn btn-primary form-control" value="Proses" type="submit">
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
                <h1>Transaksi Bulan <?php echo tanggal_indo($getbln);?></h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-datatable">
                        <thead>
                        <tr>
                            <th colspan="9"class="text-center bg-blue-300">FASKAL PUSAT</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Bulan Order</th>
                            <th>Pelanggan</th>
                            <th>No. Invoice</th>
                            <th>Total Pembayaran</th>
                            <th>Diskon</th>
                            <th>DP</th>
                            <th>Sisa Pembayaran</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $total_omset_faskal01 = 0;
                        $total_pemasukan_faskal01 = 0;
                        $total_piutang_faskal01 = 0;
                        $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal01' and transaksi.jenis_barang='CTK' and month(trx_date)='$getbln' and year(trx_date)='$getthn'");
                        while($d=mysqli_fetch_array($data)){
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
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-datatable">
                        <thead>
                        <tr>
                            <th colspan="9"class="text-center bg-green-800">FASKAL CABANG</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Bulan Order</th>
                            <th>Pelanggan</th>
                            <th>No. Invoice</th>
                            <th>Total Pembayaran</th>
                            <th>Diskon</th>
                            <th>DP</th>
                            <th>Sisa Pembayaran</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $total_omset_faskal02 = 0;
                        $total_pemasukan_faskal02 = 0;
                        $total_piutang_faskal02 = 0;
                        $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal02' and transaksi.jenis_barang='CTK' and month(trx_date)='$getbln' and year(trx_date)='$getthn'");
                        while($d=mysqli_fetch_array($data)){
                            $total_pemasukan_faskal02 += $d['trx_dp'];
                            $total_omset_faskal02 += $d['trx_total_pembayaran'];
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
                            </tr>
                        <?php } ?>
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
                                <tr>
                                    <td>Total Omset</td>
                                    <th>Rp. <?php echo number_format($total_omset_faskal01); ?></th>
                                </tr>
                                <tr>
                                    <td>Total Pemasukan</td>
                                    <th>Rp. <?php echo number_format($total_pemasukan_faskal01); ?></th>
                                </tr>
                                <tr>
                                    <td>Piutang</td>
                                    <th>Rp. <?php echo number_format($total_piutang_faskal01); ?></th>
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
                                <tr>
                                    <td>Total Omset</td>
                                    <th>Rp. <?php echo number_format($total_omset_faskal02); ?></th>
                                </tr>
                                <tr>
                                    <td>Total Pemasukan</td>
                                    <th>Rp. <?php echo number_format($total_pemasukan_faskal02); ?></th>
                                </tr>
                                <tr>
                                    <td>Piutang</td>
                                    <th>Rp. <?php echo number_format($total_piutang_faskal02); ?></th>
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