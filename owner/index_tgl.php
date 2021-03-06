<?php include 'header.php'; ?>
    <!-- Main content -->
<?php
$from = $_GET['from'];
$to = $_GET['to'];
?>
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Dashboard content -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Quick stats boxes -->
                    <div class="row">
                        <div class="col-lg-3">

                            <!-- Members online -->
                            <div class="panel bg-teal-400">
                                <div class="panel-body">
                                    <?php $admin=mysqli_query($config,"select * from admin"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($admin) . " Pengguna"; ?></h3>
                                    Jumlah Pengguna Sistem

                                </div>

                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                            <!-- /members online -->

                        </div>

                        <div class="col-lg-3">

                            <!-- Current server load -->
                            <div class="panel bg-pink-400">
                                <div class="panel-body">
                                    <?php $kostumer=mysqli_query($config,"select * from kostumer"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($kostumer) . " Pelanggan"; ?></h3>
                                    Jumlah Pelanggan

                                </div>

                                <div id="server-load"></div>
                            </div>
                            <!-- /current server load -->

                        </div>

                        <div class="col-lg-3">

                            <!-- Today's revenue -->
                            <div class="panel bg-blue-400">
                                <div class="panel-body">
                                    <?php $orderan=mysqli_query($config,"select * from transaksi"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($orderan) . " Transaksi"; ?></h3>
                                    Jumlah Transaksi
                                </div>

                                <div id="today-revenue"></div>
                            </div>
                            <!-- /today's revenue -->
                        </div>

                        <div class="col-lg-3">

                            <!-- Today's revenue -->
                            <div class="panel bg-orange-400">
                                <div class="panel-body">
                                    <a href="#mAntrian" data-toggle="modal"><span class="alpaca-float-right" style="font-size: 35px; color: #FFFFFF;"><i class="fas fa-sign-out-alt"></i></span></a>
                                    <?php $invoice=mysqli_query($config,"select * from transaksi where trx_status='0' and jenis_barang='CTK'"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($invoice) . " Desain"; ?></h3>
                                    Orderan Sedang Didesain
                                </div>

                                <div id="today-revenue"></div>
                            </div>
                            <!-- /today's revenue -->
                        </div>

                    </div>
                    <!-- /quick stats boxes -->

                    <div class="row">
                        <div class="col-lg-3">

                            <!-- Members online -->
                            <div class="panel bg-slate-400">
                                <div class="panel-body">
                                    <a href="#mPembayaran" data-toggle="modal"><span class="alpaca-float-right" style="font-size: 35px; color: #FFFFFF;"><i class="fas fa-sign-out-alt"></i></span></a>
                                    <?php $admin=mysqli_query($config,"select * from transaksi where trx_status='1' and jenis_barang='CTK'"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($admin) . " Pembayaran"; ?></h3>
                                    Orderan Dalam Pembayaran

                                </div>

                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                            <!-- /members online -->

                        </div>

                        <div class="col-lg-3">

                            <!-- Current server load -->
                            <div class="panel bg-brown-400">
                                <div class="panel-body">
                                    <a href="#mPrint" data-toggle="modal"><span class="alpaca-float-right" style="font-size: 35px; color: #FFFFFF;"><i class="fas fa-sign-out-alt"></i></span></a>
                                    <?php $kostumer=mysqli_query($config,"select * from transaksi where trx_status='2' and jenis_barang='CTK'"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($kostumer) . " Print"; ?></h3>
                                    Orderan Sedang Di Cetak

                                </div>

                                <div id="server-load"></div>
                            </div>
                            <!-- /current server load -->

                        </div>

                        <div class="col-lg-3">

                            <!-- Today's revenue -->
                            <div class="panel bg-purple-400">
                                <div class="panel-body">
                                    <?php $orderan=mysqli_query($config,"select * from transaksi where trx_ar>'0'"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($orderan) . " Piutang"; ?></h3>
                                    Transaksi Piutang
                                </div>

                                <div id="today-revenue"></div>
                            </div>
                            <!-- /today's revenue -->
                        </div>

                        <div class="col-lg-3">

                            <!-- Today's revenue -->
                            <div class="panel bg-success-400">
                                <div class="panel-body">
                                    <?php $invoice=mysqli_query($config,"select * from transaksi where trx_status='3'"); ?>
                                    <h3 class="no-margin"><?php echo mysqli_num_rows($invoice) . " Selesai"; ?></h3>
                                    Orderan Selesai
                                </div>

                                <div id="today-revenue"></div>
                            </div>
                            <!-- /today's revenue -->
                        </div>

                    </div>
                </div>
                <!-- Modal Dalam Antrian-->
                <div id="mAntrian" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Orderan Dalam Antrian</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-datatable">
                                            <thead>
                                            <tr>
                                                <th colspan="5"class="text-center bg-blue-300">FASKAL PUSAT</th>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Order</th>
                                                <th>Pelanggan</th>
                                                <th>No. Invoice</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal01' and transaksi.trx_status='0' ");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $d['trx_date'] ?></td>
                                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                                    <td><?php echo $d['trx_invoice'] ?></td>
                                                    <td>Rp. <?php echo number_format($d['trx_total_pembayaran']) ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-datatable">
                                            <thead>
                                            <tr>
                                                <th colspan="5"class="text-center bg-green-800">FASKAL CABANG</th>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Order</th>
                                                <th>Pelanggan</th>
                                                <th>No. Invoice</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal02' and transaksi.trx_status='0' ");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $d['trx_date'] ?></td>
                                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                                    <td><?php echo $d['trx_invoice'] ?></td>
                                                    <td>Rp. <?php echo number_format( $d['trx_total_pembayaran']) ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!--  modal end-->
                <!-- Modal Pembayaran-->
                <div id="mPembayaran" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Orderan Dalam Proses Pembayaran</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-datatable">
                                            <thead>
                                            <tr>
                                                <th colspan="5"class="text-center bg-blue-300">FASKAL PUSAT</th>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Order</th>
                                                <th>Pelanggan</th>
                                                <th>No. Invoice</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal01' and transaksi.trx_status='1' ");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $d['trx_date'] ?></td>
                                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                                    <td><?php echo $d['trx_invoice'] ?></td>
                                                    <td>Rp. <?php echo number_format($d['trx_total_pembayaran']) ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-datatable">
                                            <thead>
                                            <tr>
                                                <th colspan="5"class="text-center bg-green-800">FASKAL CABANG</th>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Order</th>
                                                <th>Pelanggan</th>
                                                <th>No. Invoice</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal02' and transaksi.trx_status='1' ");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $d['trx_date'] ?></td>
                                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                                    <td><?php echo $d['trx_invoice'] ?></td>
                                                    <td>Rp. <?php echo number_format( $d['trx_total_pembayaran']) ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!--  modal end-->
                <!-- Modal Print-->
                <div id="mPrint" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Orderan Sedang Di Cetak</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-datatable">
                                            <thead>
                                            <tr>
                                                <th colspan="5"class="text-center bg-blue-300">FASKAL PUSAT</th>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Order</th>
                                                <th>Pelanggan</th>
                                                <th>No. Invoice</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal01' and transaksi.trx_status='2' ");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $d['trx_date'] ?></td>
                                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                                    <td><?php echo $d['trx_invoice'] ?></td>
                                                    <td>Rp. <?php echo number_format($d['trx_total_pembayaran']) ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-datatable">
                                            <thead>
                                            <tr>
                                                <th colspan="5"class="text-center bg-green-800">FASKAL CABANG</th>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Order</th>
                                                <th>Pelanggan</th>
                                                <th>No. Invoice</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($config,"select * from transaksi,kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='faskal02' and transaksi.trx_status='2' ");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $d['trx_date'] ?></td>
                                                    <td><?php echo $d['kostumer_nama'] ?> <br> <small class="text-muted"><?php echo $d['kostumer_telp'] ?></small></td>
                                                    <td><?php echo $d['trx_invoice'] ?></td>
                                                    <td>Rp. <?php echo number_format( $d['trx_total_pembayaran']) ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!--  modal end-->
                <!--  HPP-->
                <div class="row">
                    <div class="col-md-offset-1 col-md-9">
                        <form action="index_tgl.php" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="icon-calendar"></i>
                                            </div>
                                            <input name="from" class="form-control pull-right tanggal" value="<?php echo $from; ?>" type="text">
                                            <div class="input-group-addon">
                                                <span>From</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="icon-calendar"></i>
                                            </div>
                                            <input name="to" class="form-control pull-right tanggal" value="<?php echo $to; ?>" type="text">
                                            <div class="input-group-addon">
                                                <span>To</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="btn btn-primary form-control" value="Submit Date" type="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Daily sales -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5><i class="icon-chart"></i> Persentasi Omset per Produk  [<b>Faskal Pusat</b>]</h5>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="chart-per-produk-faskal01"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Pendapatan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $xxx=0;
                                            $data = mysqli_query($config,"select * from produk");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $d['produk_nama'] ?></td>
                                                    <td>
                                                        <?php
                                                        $id_produk = $d['produk_id'];
                                                        $jumlah = mysqli_query($config,"select sum(order_qty) as qty from orderan where orderan.order_produk_id='$id_produk' and kd_toko='faskal01' and date(order_datetime) >= '$from' and date(order_datetime) <= '$to'");
                                                        $j = mysqli_fetch_assoc($jumlah);
                                                        if($j['qty']== null){
                                                            $j['qty']=0;
                                                        }
                                                        echo $j['qty'];
                                                        ?>
                                                    </td>
                                                    <td>Rp.
                                                        <?php
                                                        $id_produk = $d['produk_id'];
                                                        $jumlah = mysqli_query($config,"select sum(order_harga_sub_total) as total from orderan where orderan.order_produk_id='$id_produk' and kd_toko='faskal01' and date(order_datetime) >= '$from' and date(order_datetime) <= '$to'");
                                                        $j = mysqli_fetch_assoc($jumlah);
                                                        if($j['total']>0){
                                                            $xxx += $j['total'];
                                                            echo number_format($j['total']);
                                                        }else{
                                                            echo "0";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="2">TOTAL</td>
                                                <td><b>Rp. <?php echo number_format($xxx); ?></b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br/>


                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Grafik Penjualan (day-to-day)</h5>
                                    <div id="chart-day-to-day-faskal01"></div>
                                </div>
                            </div>
                            <br/>


                        </div>


                    </div>
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5><i class="icon-chart"></i> Persentasi Omset per Produk  [<b>Faskal Cabang</b>]</h5>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="chart-per-produk-faskal02"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Pendapatan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $xxx=0;
                                            $data = mysqli_query($config,"select * from produk");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $d['produk_nama'] ?></td>
                                                    <td>
                                                        <?php
                                                        $id_produk = $d['produk_id'];
                                                        $jumlah = mysqli_query($config,"select sum(order_qty) as qty from orderan where orderan.order_produk_id='$id_produk' and kd_toko='faskal02' and date(order_datetime) >= '$from' and date(order_datetime) <= '$to'");
                                                        $j = mysqli_fetch_assoc($jumlah);
                                                        if($j['qty']== null){
                                                            $j['qty']=0;
                                                        }
                                                        echo $j['qty'];
                                                        ?>
                                                    </td>
                                                    <td>Rp.
                                                        <?php
                                                        $id_produk = $d['produk_id'];
                                                        $jumlah = mysqli_query($config,"select sum(order_harga_sub_total) as total from orderan where orderan.order_produk_id='$id_produk' and kd_toko='faskal02' and date(order_datetime) >= '$from' and date(order_datetime) <= '$to'");
                                                        $j = mysqli_fetch_assoc($jumlah);
                                                        if($j['total']>0){
                                                            $xxx += $j['total'];
                                                            echo number_format($j['total']);
                                                        }else{
                                                            echo "0";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="2">TOTAL</td>
                                                <td><b>Rp. <?php echo number_format($xxx); ?></b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br/>


                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Grafik Penjualan (day-to-day)</h5>
                                    <div id="chart-day-to-day-faskal02"></div>
                                </div>
                            </div>
                            <br/>


                        </div>


                    </div>
                    <!-- /daily sales -->


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


    <script type="text/javascript">
        // script faskal 01
        Highcharts.chart('chart-per-produk-faskal01', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name} <br/> <b>{point.percentage:.0f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> <br/> {point.percentage:.0f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Produk',
                type: 'pie',
                colorByPoint: true,
                data:
                    [
                        <?php
                        $data = mysqli_query($config,"select * from produk order by produk_id desc");
                        while($d=mysqli_fetch_array($data)){
                        ?>


                        <?php
                        $nama_produk = $d['produk_nama'];
                        $id_produk = $d['produk_id'];
                        $jumlah_produk = mysqli_query($config,"select * from produk");
                        $jj_produk = mysqli_num_rows($jumlah_produk);
                        $jumlah = mysqli_query($config,"select sum(order_qty) as qty from orderan where order_produk_id='$id_produk' and kd_toko='faskal01' and date(order_datetime) >= '$from' and date(order_datetime) <= '$to'");
                        $j = mysqli_fetch_assoc($jumlah);
                        if($j['qty']== null){
                            $j['qty']=0;
                        }
                        ?>
                        {
                            name: '<?php echo $nama_produk; ?>',
                            y: <?php echo $j['qty']; ?>
                        },
                        <?php
                        }
                        ?>



                    ]
            }]
        });
        Highcharts.chart('chart-day-to-day-faskal01', {
            chart: {
                type: 'line'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '<b>{point.y:.0f}</b>'
            },
            series: [{
                name: 'Population',
                data:
                    [
                        <?php
                        $xxxx = 0;
                        $data = mysqli_query($config,"select * from transaksi where kd_toko='faskal01' and date(trx_date) >= '$from' and date(trx_date) <= '$to'");
                        while($d=mysqli_fetch_array($data)){
                        ?>

                        <?php
                        $tgl = $d['trx_date'];
                        $jumlah = mysqli_query($config,"select * from transaksi where trx_date='$tgl' and kd_toko='faskal01' order by date(trx_date) desc");
                        $j = mysqli_num_rows($jumlah);
                        ?>
                        ['<?php echo $d['trx_date'] ?>', <?php echo $j; ?>],
                        <?php
                        }
                        ?>

                    ]

                ,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.0f}',
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]

        });

        // script faskal 02
        Highcharts.chart('chart-per-produk-faskal02', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name} <br/> <b>{point.percentage:.0f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> <br/> {point.percentage:.0f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Produk',
                type: 'pie',
                colorByPoint: true,
                data:
                    [
                        <?php
                        $data = mysqli_query($config,"select * from produk order by produk_id desc");
                        while($d=mysqli_fetch_array($data)){
                        ?>


                        <?php
                        $nama_produk = $d['produk_nama'];
                        $id_produk = $d['produk_id'];
                        $jumlah_produk = mysqli_query($config,"select * from produk");
                        $jj_produk = mysqli_num_rows($jumlah_produk);
                        $jumlah = mysqli_query($config,"select sum(order_qty) as qty from orderan where order_produk_id='$id_produk' and kd_toko='faskal02' and date(order_datetime) >= '$from' and date(order_datetime) <= '$to'");
                        $j = mysqli_fetch_assoc($jumlah);
                        if($j['qty']== null){
                            $j['qty']=0;
                        }
                        ?>
                        {
                            name: '<?php echo $nama_produk; ?>',
                            y: <?php echo $j['qty']; ?>
                        },
                        <?php
                        }
                        ?>



                    ]
            }]
        });
        Highcharts.chart('chart-day-to-day-faskal02', {
            chart: {
                type: 'line'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '<b>{point.y:.0f}</b>'
            },
            series: [{
                name: 'Population',
                data:
                    [
                        <?php
                        $xxxx = 0;
                        $data = mysqli_query($config,"select * from transaksi where kd_toko='faskal02' and date(trx_date) >= '$from' and date(trx_date) <= '$to'");
                        while($d=mysqli_fetch_array($data)){
                        ?>

                        <?php
                        $tgl = $d['trx_date'];
                        $jumlah = mysqli_query($config,"select * from transaksi where trx_date='$tgl' and kd_toko='faskal02' order by date(trx_date) desc");
                        $j = mysqli_num_rows($jumlah);
                        ?>
                        ['<?php echo $d['trx_date'] ?>', <?php echo $j; ?>],
                        <?php
                        }
                        ?>

                    ]

                ,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.0f}',
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]

        });
    </script>
<?php include 'footer.php'; ?>